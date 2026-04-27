<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Earning;
use App\Models\AvailabilitySlot;
use Illuminate\Support\Facades\Auth;

class TeacherWebController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->load(['tutorProfile', 'location']);

        $avgRating = Review::where('tutor_id', $user->id)->avg('rating') ?? 0;
        $totalReviews = Review::where('tutor_id', $user->id)->count();
        $totalStudents = Booking::where('tutor_id', $user->id)->distinct('student_id')->count();
        $totalEarnings = Earning::where('tutor_id', $user->id)->sum('tutor_amount');

        $upcomingBookings = Booking::where('tutor_id', $user->id)
            ->where('status', 'accepted')
            ->where('start_time', '>=', now())
            ->with('student')
            ->limit(5)
            ->get();

        return view('tutor.dashboard', compact('user', 'avgRating', 'totalReviews', 'totalStudents', 'totalEarnings', 'upcomingBookings'));
    }

    public function bookings()
    {
        $bookings = Booking::where('tutor_id', Auth::id())
            ->with('student')
            ->latest()
            ->paginate(15);
        return view('tutor.bookings.index', compact('bookings'));
    }

    public function earnings()
    {
        $earnings = Earning::where('tutor_id', Auth::id())
            ->with('booking.student')
            ->latest()
            ->paginate(15);
        return view('tutor.earnings.index', compact('earnings'));
    }

    public function slots()
    {
        $slots = AvailabilitySlot::where('tutor_id', Auth::id())
            ->orderBy('day_of_week')
            ->get();
        return view('tutor.slots.index', compact('slots'));
    }

    public function storeSlot(Request $request)
    {
        $request->validate([
            'day_of_week' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        AvailabilitySlot::create([
            'tutor_id' => Auth::id(),
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'is_active' => true,
        ]);

        return redirect()->route('teacher.slots')->with('success', 'Slot added successfully.');
    }

    public function destroySlot($id)
    {
        $slot = AvailabilitySlot::where('tutor_id', Auth::id())->findOrFail($id);
        $slot->delete();

        return response()->json(['status' => 'success', 'message' => 'Slot deleted successfully.']);
    }

    public function profile()
    {
        $user = Auth::user();
        $user->load(['tutorProfile', 'location']);
        return view('tutor.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'qualification' => 'nullable|string|max:255',
            'experience' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'tutor_type' => 'required|in:home,online,both',
            'bio' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'area' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        $user->tutorProfile->update([
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'price' => $request->price,
            'tutor_type' => $request->tutor_type,
            'bio' => $request->bio,
        ]);

        $user->location->update([
            'city' => $request->city,
            'state' => $request->state,
            'area' => $request->area,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updateBookingStatus($id, $status)
    {
        $booking = Booking::where('tutor_id', Auth::id())->findOrFail($id);
        $booking->update(['status' => $status]);
        
        return back()->with('success', "Booking marked as {$status}.");
    }
}
