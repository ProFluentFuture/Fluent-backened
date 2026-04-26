<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Earning;
use App\Models\Transaction;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    /**
     * Get tutor earnings summary
     */
    public function tutorEarnings()
    {
        $user = Auth::user();
        if ($user->role !== 'tutor') return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);

        $earnings = Earning::where('tutor_id', $user->id)->with('booking')->latest()->get();
        $totalEarned = $earnings->sum('tutor_amount');
        $pendingPledge = $earnings->where('status', 'pending')->sum('tutor_amount');

        return response()->json([
            'status' => 'success',
            'summary' => [
                'total_earned' => $totalEarned,
                'pending_payout' => $pendingPledge,
            ],
            'history' => $earnings
        ]);
    }

    /**
     * Process commission for a completed booking (Logic called from Attendance or Booking flow)
     */
    public function processBookingRevenue(Booking $booking)
    {
        if ($booking->status !== 'completed') return;

        $commissionPercent = Setting::get('platform_commission', 10); // Default 10%
        $totalAmount = $booking->tutor->tutorProfile->price; // Monthly price logic
        
        $commissionAmount = ($totalAmount * $commissionPercent) / 100;
        $tutorAmount = $totalAmount - $commissionAmount;

        Earning::create([
            'tutor_id' => $booking->tutor_id,
            'booking_id' => $booking->id,
            'total_amount' => $totalAmount,
            'commission_amount' => $commissionAmount,
            'tutor_amount' => $tutorAmount,
            'status' => 'pending'
        ]);

        Transaction::create([
            'user_id' => $booking->tutor_id,
            'amount' => $tutorAmount,
            'type' => 'credit',
            'description' => "Earnings for Booking #{$booking->id}"
        ]);
    }

    /**
     * Get user transactions
     */
    public function transactions()
    {
        $transactions = Transaction::where('user_id', Auth::id())->latest()->paginate(20);
        return response()->json(['status' => 'success', 'transactions' => $transactions]);
    }
}
