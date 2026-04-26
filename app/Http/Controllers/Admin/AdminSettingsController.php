<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Models\Booking;
use App\Models\Earning;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    /**
     * Get platform settings
     */
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update settings
     */
    public function update(Request $request)
    {
        foreach ($request->settings as $key => $value) {
            Setting::set($key, $value);
        }
        return back()->with('success', 'Settings updated successfully.');
    }

    /**
     * System Reports
     */
    public function reports()
    {
        $stats = [
            'total_bookings' => Booking::count(),
            'total_revenue' => Earning::sum('total_amount'),
            'platform_commission' => Earning::sum('commission_amount'),
            'active_tutors' => User::role('tutor')->where('status', 'active')->count(),
            'pending_tutors' => User::role('tutor')->where('status', 'pending')->count(),
        ];

        return view('admin.reports.index', compact('stats'));
    }
}
