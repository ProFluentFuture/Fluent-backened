<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TutorProfile;
use App\Models\Location;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherDashboardController extends Controller
{
    /**
     * Dashboard Summary Stats
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $user->load(['tutorProfile', 'location']);

        $avgRating = Review::where('tutor_id', $user->id)->avg('rating') ?? 0;
        $totalReviews = Review::where('tutor_id', $user->id)->count();
        
        // Placeholder for students taught (would come from a Bookings table in a real system)
        $totalStudents = 0; 

        return response()->json([
            'status' => 'success',
            'data' => [
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'status' => $user->status,
                    'role' => $user->role,
                ],
                'stats' => [
                    'average_rating' => round($avgRating, 1),
                    'total_reviews' => $totalReviews,
                    'total_students' => $totalStudents,
                    'is_available' => $user->tutorProfile->is_available ?? false,
                    'is_featured' => $user->tutorProfile->is_featured ?? false,
                ],
                'profile_completion' => $this->calculateProfileCompletion($user),
            ]
        ]);
    }

    /**
     * Update Profile Information
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();
        
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:20',
            'bio' => 'sometimes|string',
            'qualification' => 'sometimes|string',
            'experience' => 'sometimes|integer',
            'price' => 'sometimes|numeric',
            'tutor_type' => 'sometimes|in:home,online,both',
            'demo_class_type' => 'sometimes|in:free,paid,none',
        ]);

        DB::transaction(function() use ($request, $user) {
            if ($request->hasAny(['name', 'phone'])) {
                $user->update($request->only(['name', 'phone']));
            }

            if ($request->hasAny(['bio', 'qualification', 'experience', 'price', 'tutor_type', 'demo_class_type'])) {
                $user->tutorProfile()->update($request->only([
                    'bio', 'qualification', 'experience', 'price', 'tutor_type', 'demo_class_type'
                ]));
            }
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => $user->load('tutorProfile')
        ]);
    }

    /**
     * Update Location Information
     */
    public function updateLocation(Request $request)
    {
        $user = $request->user();
        
        $request->validate([
            'city' => 'required|string',
            'state' => 'required|string',
            'area' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $user->location()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only(['city', 'state', 'area', 'latitude', 'longitude'])
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Location updated successfully',
            'data' => $user->load('location')
        ]);
    }

    /**
     * Get Reviews Received
     */
    public function reviews(Request $request)
    {
        $reviews = Review::where('tutor_id', $request->user()->id)
            ->with('student:id,name')
            ->latest()
            ->paginate(15);

        return response()->json([
            'status' => 'success',
            'data' => $reviews
        ]);
    }

    /**
     * Toggle Availability status
     */
    public function toggleAvailability(Request $request)
    {
        $profile = $request->user()->tutorProfile;
        $profile->is_available = !$profile->is_available;
        $profile->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Availability status changed',
            'is_available' => $profile->is_available
        ]);
    }

    /**
     * Update Password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Current password does not match'
            ], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Password changed successfully'
        ]);
    }

    /**
     * Helper to calculate profile completion percentage
     */
    private function calculateProfileCompletion($user)
    {
        $totalFields = 8;
        $filledFields = 0;

        if ($user->name) $filledFields++;
        if ($user->phone) $filledFields++;
        if ($user->tutorProfile->bio) $filledFields++;
        if ($user->tutorProfile->qualification) $filledFields++;
        if ($user->tutorProfile->experience > 0) $filledFields++;
        if ($user->tutorProfile->price > 0) $filledFields++;
        if ($user->location->city) $filledFields++;
        if ($user->location->area) $filledFields++;

        return round(($filledFields / $totalFields) * 100);
    }
}
