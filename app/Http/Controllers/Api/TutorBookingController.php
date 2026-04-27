<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingRequest;
use App\Models\AvailabilitySlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorBookingController extends Controller
{
    /**
     * Manage Availability Slots
     */
    public function updateSlots(Request $request)
    {
        $request->validate([
            'slots' => 'required|array',
            'slots.*.day_of_week' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'slots.*.start_time' => 'required|date_format:H:i',
            'slots.*.end_time' => 'required|date_format:H:i|after:slots.*.start_time',
        ]);

        $tutorId = Auth::id();

        // Clear existing slots or update (for simplicity, we'll sync)
        AvailabilitySlot::where('tutor_id', $tutorId)->delete();

        foreach ($request->slots as $slotData) {
            AvailabilitySlot::create([
                'tutor_id' => $tutorId,
                'day_of_week' => $slotData['day_of_week'],
                'start_time' => $slotData['start_time'],
                'end_time' => $slotData['end_time'],
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Availability slots updated successfully.'
        ]);
    }

    /**
     * View Bookings
     */
    public function bookings()
    {
        $bookings = Booking::where('tutor_id', Auth::id())
            ->with(['student', 'slot'])
            ->latest()
            ->get();

        return response()->json([
            'status' => 'success',
            'bookings' => $bookings
        ]);
    }

    /**
     * Accept / Reject Booking
     */
    public function updateBookingStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
            'rejection_reason' => 'required_if:status,rejected|nullable|string|max:500'
        ]);

        $booking = Booking::where('tutor_id', Auth::id())->findOrFail($id);
        $updateData = ['status' => $request->status];
        
        if ($request->status === 'rejected' && $request->has('rejection_reason')) {
            $updateData['rejection_reason'] = $request->rejection_reason;
        }
        
        $booking->update($updateData);

        return response()->json([
            'status' => 'success',
            'message' => "Booking {$request->status} successfully."
        ]);
    }

    /**
     * Toggle Auto-Accept
     */
    public function toggleAutoAccept(Request $request)
    {
        $request->validate([
            'auto_accept' => 'required|boolean',
            'max_distance' => 'nullable|numeric|min:1'
        ]);

        $profile = Auth::user()->tutorProfile;
        $profile->update([
            'auto_accept_nearby' => $request->auto_accept,
            'max_auto_accept_distance' => $request->max_distance ?? $profile->max_auto_accept_distance
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Auto-accept settings updated.',
            'settings' => [
                'auto_accept' => $profile->auto_accept_nearby,
                'max_distance' => $profile->max_auto_accept_distance
            ]
        ]);
    }

    /**
     * Get Tutor's Availability Slots
     */
    public function getSlots()
    {
        $slots = AvailabilitySlot::where('tutor_id', Auth::id())
            ->where('is_active', true)
            ->orderBy('day_of_week')
            ->orderBy('start_time')
            ->get();

        return response()->json([
            'status' => 'success',
            'slots' => $slots
        ]);
    }
}
