<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TutorProfile;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TutorWebAuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check() && Auth::user()->role === 'tutor') {
            return redirect()->route('teacher.dashboard');
        }
        return view('tutor.auth.login');
    }

    public function showRegister()
    {
        $subjects = \App\Models\Subject::where('is_active', true)->get();
        return view('tutor.auth.register', compact('subjects'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'city' => 'required|string',
            'state' => 'required|string',
            'area' => 'required|string',
            'tutor_type' => 'required|in:home,online,both',
            'subject_ids' => 'required|array',
            'subject_ids.*' => 'exists:subjects,id',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role' => 'tutor',
                'status' => 'pending',
            ]);

            $profile = TutorProfile::create([
                'user_id' => $user->id,
                'tutor_type' => $request->tutor_type,
            ]);

            if ($request->has('subject_ids')) {
                $profile->subjects()->attach($request->subject_ids);
            }

            Location::create([
                'user_id' => $user->id,
                'city' => $request->city,
                'state' => $request->state,
                'area' => $request->area,
            ]);

            Auth::login($user);
        });

        return redirect()->route('tutor.pending');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role !== 'tutor') {
                Auth::logout();
                return back()->withErrors(['email' => 'Unauthorized access.']);
            }

            if ($user->status === 'pending') {
                return redirect()->route('tutor.pending');
            }

            if ($user->status === 'rejected') {
                Auth::logout();
                return back()->withErrors(['email' => 'Your account has been blocked.']);
            }

            return redirect()->route('teacher.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showPending()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'tutor') return redirect('/');
        if ($user->status === 'active') return redirect()->route('teacher.dashboard');
        
        return view('tutor.auth.pending');
    }
}
