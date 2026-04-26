<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('student_id', Auth::id())->with('tutor.tutorProfile')->get();
        return response()->json(['status' => 'success', 'favorites' => $favorites]);
    }

    public function toggle(Request $request)
    {
        $request->validate(['tutor_id' => 'required|exists:users,id']);

        $favorite = Favorite::where('student_id', Auth::id())->where('tutor_id', $request->tutor_id)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'success', 'message' => 'Removed from favorites', 'is_favorite' => false]);
        }

        Favorite::create([
            'student_id' => Auth::id(),
            'tutor_id' => $request->tutor_id
        ]);

        return response()->json(['status' => 'success', 'message' => 'Added to favorites', 'is_favorite' => true]);
    }
}
