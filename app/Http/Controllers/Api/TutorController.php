<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TutorProfile;
use App\Models\Location;
use Illuminate\Http\Request;
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

        // Filter by Price Range
        if ($request->has('min_price')) {
            $query->whereHas('tutorProfile', function($q) use ($request) {
                $q->where('price', '>=', $request->min_price);
            });
        }
        if ($request->has('max_price')) {
            $query->whereHas('tutorProfile', function($q) use ($request) {
                $q->where('price', '<=', $request->max_price);
            });
        }

        // Filter by Experience
        if ($request->has('min_experience')) {
            $query->whereHas('tutorProfile', function($q) use ($request) {
                $q->where('experience', '>=', $request->min_experience);
            });
        }

        // Filter by Demo Class
        if ($request->has('demo_class')) {
            $query->whereHas('tutorProfile', function($q) use ($request) {
                $q->where('demo_class_type', $request->demo_class);
            });
        }

        // Filter by Tutor Type (home/online)
        if ($request->has('tutor_type')) {
            $query->whereHas('tutorProfile', function($q) use ($request) {
                $q->whereIn('tutor_type', [$request->tutor_type, 'both']);
            });
        }

        // Location Logic
        // If searching for home tutor, restrict to specific city/state if provided
        if ($request->tutor_type === 'home' || $request->has('city')) {
            $query->whereHas('location', function($q) use ($request) {
                if ($request->has('city')) {
                    $q->where('city', $request->city);
                }
                if ($request->has('state')) {
                    $q->where('state', $request->state);
                }
            });
        }

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
}
