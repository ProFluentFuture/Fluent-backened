<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TutorProfile;
use App\Models\Location;
use App\Models\Review;
use App\Models\AvailabilitySlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TutorController extends Controller
{
    /**
     * Search Tutors with Filters
     */
    public function search(Request $request)
    {
        $query = User::role('tutor')
            ->where('status', 'active')
            ->with(['tutorProfile', 'location', 'reviews']);

        // Search by name
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }

        // Filter by city
        if ($request->has('city')) {
            $city = $request->city;
            $query->whereHas('location', function ($q) use ($city) {
                $q->where('city', 'like', "%{$city}%");
            });
        }

        // Filter by tutor type
        if ($request->has('tutor_type')) {
            $query->whereHas('tutorProfile', function ($q) use ($request) {
                $q->where('tutor_type', $request->tutor_type);
            });
        }

        // Only active tutors
        $query->whereHas('tutorProfile', function ($q) {
            $q->where('status', 'active');
        });

        $tutors = $query->paginate(10);

        // Map data to match requested Listing API format
        $tutors->getCollection()->transform(function($tutor) {
            return [
                'id' => $tutor->id,
                'name' => $tutor->name,
                'photo' => $tutor->photo_url, // Assuming a photo_url attribute exists or is null
                'experience' => $tutor->tutorProfile->experience ?? 0,
                'rating' => $tutor->reviews->avg('rating') ?? 0,
                'price' => $tutor->tutorProfile->price ?? 0,
                'availability' => $tutor->tutorProfile->is_available ? 'Available' : 'Not Available',
                'location' => $tutor->location,
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $tutors
        ]);
    }

    /**
     * Get Detailed Tutor Profile
     */
    public function show($id)
    {
        $tutor = User::role('tutor')
            ->where('status', 'active')
            ->with(['tutorProfile', 'location', 'reviews.student'])
            ->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => [
                'name' => $tutor->name,
                'bio' => $tutor->tutorProfile->bio,
                'qualification' => $tutor->tutorProfile->qualification,
                'experience' => $tutor->tutorProfile->experience,
                'total_students_taught' => 0, // Placeholder or count from bookings
                'reviews' => $tutor->reviews,
                'availability' => $tutor->tutorProfile->is_available ? 'Available' : 'Not Available',
                'price' => $tutor->tutorProfile->price,
                'tutor_type' => $tutor->tutorProfile->tutor_type,
            ]
        ]);
    }

    /**
     * Update Tutor Profile (Dashboard)
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();
        
        $request->validate([
            'bio' => 'nullable|string',
            'qualification' => 'nullable|string',
            'experience' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'tutor_type' => 'nullable|in:home,online,both',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'area' => 'nullable|string',
        ]);

        DB::transaction(function() use ($request, $user) {
            $user->update($request->only(['name', 'phone']));

            $user->tutorProfile()->update($request->only([
                'bio', 'qualification', 'experience', 'price', 'tutor_type'
            ]));

            $user->location()->update($request->only([
                'city', 'state', 'area'
            ]));
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'user' => $user->load(['tutorProfile', 'location'])
        ]);
    }

    /**
     * Toggle Availability
     */
    public function toggleAvailability(Request $request)
    {
        $user = $request->user();
        $profile = $user->tutorProfile;

        $profile->is_available = !$profile->is_available;
        $profile->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Availability updated',
            'is_available' => $profile->is_available
        ]);
    }

    /**
     * Get Tutor's Availability Slots (Public endpoint for students)
     */
    public function getTutorSlots($id)
    {
        $slots = AvailabilitySlot::where('tutor_id', $id)
            ->where('is_active', true)
            ->orderBy('day_of_week')
            ->orderBy('start_time')
            ->get();

        return response()->json([
            'status' => 'success',
            'slots' => $slots
        ]);
    }

    /**
     * Get list of active subjects
     */
    public function getSubjects()
    {
        $subjects = \App\Models\Subject::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'subjects' => $subjects
        ]);
    }
}
