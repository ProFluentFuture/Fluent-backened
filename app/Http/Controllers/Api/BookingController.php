<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\BookingRequest;
use App\Models\AvailabilitySlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Case 1: Student Books Now
     */
    public function bookNow(Request $request)
    {
        $request->validate([
            'tutor_id' => 'required|exists:users,id',
            'slot_id' => 'nullable|exists:availability_slots,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'mode' => 'required|in:home,online',
            'address' => 'required_if:mode,home',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
        ]);

        $tutor = User::role('tutor')->findOrFail($request->tutor_id);
        $student = Auth::user();

        // Check if tutor is available (slot check)
        $isAvailable = false;
        if ($request->slot_id) {
            $slot = AvailabilitySlot::where('id', $request->slot_id)
                ->where('tutor_id', $tutor->id)
                ->where('is_active', true)
                ->first();
            if ($slot) $isAvailable = true;
        }

        // Smart Feature: Auto Accept Nearby Requests
        $status = 'pending';
        $tutorProfile = $tutor->tutorProfile;
        if ($tutorProfile && $tutorProfile->auto_accept_nearby && $request->lat && $request->lng) {
            $distance = $this->calculateDistance(
                $request->lat, $request->lng,
                $tutor->location->latitude ?? 0,
                $tutor->location->longitude ?? 0
            );
            if ($distance <= ($tutorProfile->max_auto_accept_distance ?? 10)) {
                $status = 'accepted';
            }
        }

        $booking = Booking::create([
            'student_id' => $student->id,
            'tutor_id' => $tutor->id,
            'slot_id' => $request->slot_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'mode' => $request->mode,
            'address' => $request->address,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'status' => $status,
        ]);

        // Send Email to Tutor (wrapped so booking succeeds even if mail fails)
        try {
            \Illuminate\Support\Facades\Mail::to($tutor->email)->send(new \App\Mail\NewBookingMail([
                'tutor_name'     => $tutor->name,
                'student_name'   => $student->name,
                'timing'         => Carbon::parse($request->start_time)->format('M d, Y h:i A'),
                'mode'           => ucfirst($request->mode),
                'address'        => $request->address ?? 'Online',
                'dashboard_link' => url('/teacher/dashboard'),
            ]));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::warning('Booking email failed: ' . $e->getMessage());
        }

        return response()->json([
            'status' => 'success',
            'message' => $status === 'accepted' ? 'Booking automatically accepted based on proximity!' : 'Booking requested successfully.',
            'booking' => $booking
        ]);
    }

    /**
     * Case 2: Student Sends Request (Tutor not available)
     */
    public function sendRequest(Request $request)
    {
        $request->validate([
            'tutor_id' => 'required|exists:users,id',
            'requested_time' => 'required|date',
            'mode' => 'required|in:home,online',
            'address' => 'required_if:mode,home',
        ]);

        $student = Auth::user();
        $tutor = User::findOrFail($request->tutor_id);

        $bookingRequest = BookingRequest::create([
            'student_id' => $student->id,
            'tutor_id' => $request->tutor_id,
            'requested_time' => $request->requested_time,
            'mode' => $request->mode,
            'address' => $request->address,
            'status' => 'pending',
        ]);

        // Send Email to Tutor (wrapped so request succeeds even if mail fails)
        try {
            \Illuminate\Support\Facades\Mail::to($tutor->email)->send(new \App\Mail\NewBookingMail([
                'tutor_name'     => $tutor->name,
                'student_name'   => $student->name,
                'timing'         => Carbon::parse($request->requested_time)->format('M d, Y h:i A') . ' (Requested)',
                'mode'           => ucfirst($request->mode),
                'address'        => $request->address ?? 'Online',
                'dashboard_link' => url('/teacher/dashboard'),
            ]));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::warning('Booking request email failed: ' . $e->getMessage());
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Request sent to tutor successfully.',
            'request' => $bookingRequest
        ]);
    }

    /**
     * Helper: Haversine distance calculation
     */
    private function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371; // km

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLng / 2) * sin($dLng / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;
    }
}
