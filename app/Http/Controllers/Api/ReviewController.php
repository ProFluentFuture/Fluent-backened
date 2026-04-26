<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Store a review for a tutor
     */
    public function store(Request $request)
    {
        $request->validate([
            'tutor_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $studentId = Auth::id();

        // CHECK: Only booked students can review
        $hasCompletedBooking = Booking::where('student_id', $studentId)
            ->where('tutor_id', $request->tutor_id)
            ->where('status', 'completed')
            ->exists();

        if (!$hasCompletedBooking) {
            return response()->json([
                'status' => 'error',
                'message' => 'You can only review tutors you have had a completed class with.'
            ], 403);
        }

        $review = Review::updateOrCreate(
            ['student_id' => $studentId, 'tutor_id' => $request->tutor_id],
            ['rating' => $request->rating, 'comment' => $request->comment]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Review submitted successfully.',
            'review' => $review
        ]);
    }
}
