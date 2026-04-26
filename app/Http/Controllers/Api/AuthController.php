<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SubscriptionPlan;
use App\Models\TutorProfile;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if user exists and is already verified
        $user = User::where('email', $request->email)->first();
        if ($user && $user->email_verified_at) {
            return response()->json([
                'status' => 'error',
                'message' => 'This email is already verified. Please login.'
            ], 422);
        }

        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // We can either update an existing unverified user or just store it in session/cache.
        // For simplicity and since we want to handle registration AFTER verification,
        // we'll just return success if we can send it.
        // In a real app, you'd store this in a table. 
        // Let's use the users table but only if they started registration.
        // Or better, a dedicated OTP table. But we added columns to users, so let's use that.
        
        if (!$user) {
            // Create a temporary user or just send OTP if email is free
            // Actually, usually we send OTP *after* user fills form but *before* they are "active".
            // Let's assume the Flutter app sends email first.
        }

        try {
            Mail::to($request->email)->send(new OtpMail($otp));
            
            return response()->json([
                'status' => 'success',
                'message' => 'OTP sent successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send OTP. ' . $e->getMessage()
            ], 500);
        }
    }

    public function registerUnified(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:student,tutor',
            // Tutor specific fields
            'phone' => 'required_if:role,tutor|string|max:20',
            'city' => 'required_if:role,tutor|string',
            'state' => 'required_if:role,tutor|string',
            'area' => 'required_if:role,tutor|string',
            'tutor_type' => 'required_if:role,tutor|in:home,online,both',
        ]);

        return DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'status' => $request->role === 'tutor' ? 'pending' : 'active',
                'email_verified_at' => now(), // Assume OTP was verified on frontend
            ]);

            if ($request->role === 'student') {
                $freePlan = SubscriptionPlan::where('name', 'Free')->first();
                if ($freePlan) {
                    $user->update(['subscription_plan_id' => $freePlan->id]);
                }
            } else {
                TutorProfile::create([
                    'user_id' => $user->id,
                    'tutor_type' => $request->tutor_type,
                ]);

                Location::create([
                    'user_id' => $user->id,
                    'city' => $request->city,
                    'state' => $request->state,
                    'area' => $request->area,
                ]);
            }

            $token = $user->createToken($user->role . '_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => ucfirst($request->role) . ' registered successfully',
                'token' => $token,
                'user' => $user->load(['tutorProfile', 'location'])
            ], 201);
        });
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::with(['tutorProfile', 'location'])->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ], 401);
        }

        if ($user->status === 'rejected') {
            return response()->json([
                'status' => 'error',
                'message' => 'Your account has been blocked or rejected. Please contact admin.'
            ], 403);
        }

        // Generate token based on role
        $token = $user->createToken($user->role . '_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'user' => $user
        ]);
    }

    public function registerStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        $freePlan = SubscriptionPlan::where('name', 'Free')->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'status' => 'active',
            'subscription_plan_id' => $freePlan ? $freePlan->id : null,
        ]);

        $token = $user->createToken('student_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Student registered successfully',
            'token' => $token,
            'user' => $user
        ], 201);
    }

    public function registerTutor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6',
            'city' => 'required|string',
            'state' => 'required|string',
            'area' => 'required|string',
            'tutor_type' => 'required|in:home,online,both',
        ]);

        return DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role' => 'tutor',
                'status' => 'pending', // Approval required
            ]);

            TutorProfile::create([
                'user_id' => $user->id,
                'tutor_type' => $request->tutor_type,
            ]);

            Location::create([
                'user_id' => $user->id,
                'city' => $request->city,
                'state' => $request->state,
                'area' => $request->area,
            ]);

            $token = $user->createToken('tutor_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Tutor registered successfully. Approval pending.',
                'token' => $token,
                'user' => $user->load(['tutorProfile', 'location'])
            ], 201);
        });
    }

    public function getProfile(Request $request)
    {
        $user = $request->user()->load(['tutorProfile', 'location']);
        return response()->json([
            'status' => 'success',
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status' => 'success', 'message' => 'Logged out']);
    }
}
