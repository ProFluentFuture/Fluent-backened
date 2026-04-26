<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminTutorController extends Controller
{
    public function index()
    {
        $tutors = User::where('role', 'tutor')
            ->with(['tutorProfile', 'location'])
            ->latest()
            ->paginate(15);

        return view('admin.tutors.index', compact('tutors'));
    }

    public function approve($id)
    {
        $user = User::where('role', 'tutor')->findOrFail($id);
        $user->status = 'active';
        $user->save();

        \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\TutorStatusMail('tutor_approved', [
            'name' => $user->name,
            'dashboard_link' => route('teacher.dashboard')
        ]));

        return back()->with('success', "Tutor {$user->name} has been approved and notified.");
    }

    public function reject($id)
    {
        $user = User::where('role', 'tutor')->findOrFail($id);
        $user->status = 'rejected';
        $user->save();

        \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\TutorStatusMail('tutor_rejected', [
            'name' => $user->name,
            'reason' => 'Application did not meet our current requirements.'
        ]));

        return back()->with('success', "Tutor {$user->name} has been rejected and notified.");
    }

    public function destroy($id)
    {
        $user = User::where('role', 'tutor')->findOrFail($id);
        $user->delete();

        return back()->with('success', "Tutor account has been permanently deleted.");
    }
}
