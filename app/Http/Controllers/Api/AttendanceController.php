<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * 1. Tutor Starts Class
     */
    public function startClass(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        $booking = Booking::where('tutor_id', Auth::id())->findOrFail($request->booking_id);

        // GPS Validation (within 100m)
        if ($booking->mode === 'home' && $booking->lat && $booking->lng) {
            $distance = $this->calculateDistance($request->lat, $request->lng, $booking->lat, $booking->lng);
            if ($distance > 0.1) { // 100 meters
                return response()->json([
                    'status' => 'error',
                    'message' => 'You must be within 100m of the student location to start class.'
                ], 403);
            }
        }

        $attendance = Attendance::create([
            'booking_id' => $booking->id,
            'check_in_time' => now(),
            'tutor_lat' => $request->lat,
            'tutor_lng' => $request->lng,
            'status' => 'started',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Class started successfully.',
            'attendance' => $attendance
        ]);
    }

    /**
     * 2. Tutor Marks Attendance (End Class)
     */
    public function markAttendance(Request $request, $id)
    {
        $attendance = Attendance::whereHas('booking', function ($q) {
            $q->where('tutor_id', Auth::id());
        })->findOrFail($id);

        if ($attendance->status !== 'started') {
            return response()->json(['status' => 'error', 'message' => 'Class already marked or locked.'], 400);
        }

        $checkOut = now();
        $duration = Carbon::parse($attendance->check_in_time)->diffInMinutes($checkOut);

        $attendance->update([
            'check_out_time' => $checkOut,
            'duration' => $duration,
            'status' => 'marked',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Attendance marked. Waiting for student confirmation.',
            'duration_minutes' => $duration
        ]);
    }

    /**
     * 3. Student Confirms Attendance
     */
    public function confirmAttendance(Request $request, $id)
    {
        $attendance = Attendance::whereHas('booking', function ($q) {
            $q->where('student_id', Auth::id());
        })->findOrFail($id);

        if ($attendance->status !== 'marked') {
            return response()->json(['status' => 'error', 'message' => 'Invalid attendance status.'], 400);
        }

        $attendance->update(['status' => 'confirmed']);

        return response()->json([
            'status' => 'success',
            'message' => 'Attendance confirmed successfully.'
        ]);
    }

    /**
     * 4. Lock Record (Automatic or Tutor manual)
     */
    public function lockRecord($id)
    {
        $attendance = Attendance::whereHas('booking', function ($q) {
            $q->where('tutor_id', Auth::id());
        })->findOrFail($id);

        if ($attendance->status !== 'confirmed') {
            return response()->json(['status' => 'error', 'message' => 'Student must confirm before locking.'], 400);
        }

        $attendance->update(['status' => 'locked']);

        return response()->json([
            'status' => 'success',
            'message' => 'Attendance record locked. No further changes allowed.'
        ]);
    }

    private function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371; // km
        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLng / 2) * sin($dLng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;
    }
}
