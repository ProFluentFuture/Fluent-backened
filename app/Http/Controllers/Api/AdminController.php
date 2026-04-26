<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TutorProfile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Approve a Tutor
     */
    public function approveTutor($id)
    {
        $user = User::role('tutor')->findOrFail($id);
        $user->status = 'active';
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Tutor approved successfully'
        ]);
    }

    /**
     * Reject a Tutor
     */
    public function rejectTutor($id)
    {
        $user = User::role('tutor')->findOrFail($id);
        $user->status = 'rejected';
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Tutor rejected'
        ]);
    }

    /**
     * Block a User (any role)
     */
    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'rejected'; // Or add a 'blocked' status
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User blocked'
        ]);
    }

    /**
     * Mark Tutor as Featured
     */
    public function markFeatured(Request $request, $id)
    {
        $user = User::role('tutor')->findOrFail($id);
        $profile = $user->tutorProfile;
        
        $profile->is_featured = $request->input('is_featured', true);
        $profile->save();

        return response()->json([
            'status' => 'success',
            'message' => $profile->is_featured ? 'Tutor marked as featured' : 'Tutor removed from featured'
        ]);
    }

    /**
     * List Pending Tutors
     */
    public function pendingTutors()
    {
        $tutors = User::role('tutor')
            ->where('status', 'pending')
            ->with(['tutorProfile', 'location'])
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $tutors
        ]);
    }
}
