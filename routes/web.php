<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherWebController;
use App\Http\Controllers\TutorWebAuthController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
Route::get('/create-admin', function () {
    User::updateOrCreate(
        ['email' => 'admin@gmail.com'],
        [
            'name' => 'Admin User',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]
    );

    return 'Admin created';
});
Route::get('/', function () {
    return view('frontend');
});
Route::get('/features', function () {
    return view('features');
});

Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/refund', function () {
    return view('refund');
});
Route::get('/terms', function () {
    return view('terms');
});

Route::get('/how', function () {
    return view('how');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/testimonials', function () {
    return view('testimonials');
});

Route::get('/resources', function () {
    return view('resources');
});

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('auth.login');
})->name('login');


// Admin Specialized Entry
Route::get('/admin', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('login'); // Admin uses standard login
});

// Tutor Specialized Entry
Route::get('/tutor', function () {
    if (!auth()->check())
        return redirect()->route('tutor.login');

    $user = auth()->user();
    if ($user->role !== 'tutor')
        return redirect('/');

    if ($user->status === 'pending')
        return redirect()->route('tutor.pending');
    if ($user->status === 'active')
        return redirect()->route('teacher.dashboard');

    return redirect()->route('tutor.login');
});

// Tutor Auth
Route::get('/tutor/login', [TutorWebAuthController::class, 'showLogin'])->name('tutor.login');
Route::post('/tutor/login', [TutorWebAuthController::class, 'login'])->name('tutor.login.submit');
Route::get('/tutor/register', [TutorWebAuthController::class, 'showRegister'])->name('tutor.register');
Route::post('/tutor/register', [TutorWebAuthController::class, 'register'])->name('tutor.register.submit');
Route::get('/tutor/pending', [TutorWebAuthController::class, 'showPending'])->name('tutor.pending');

// Standard Dashboard Redirection
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'admin')
        return redirect()->route('admin.dashboard');
    if ($user->role === 'tutor') {
        if ($user->status === 'pending')
            return redirect()->route('tutor.pending');
        return redirect()->route('teacher.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('students', StudentController::class);
    Route::get('plans', [\App\Http\Controllers\SubscriptionPlanController::class, 'index'])->name('plans.index');

    // Tutor Management
    Route::get('tutors', [\App\Http\Controllers\AdminTutorController::class, 'index'])->name('admin.tutors.index');
    Route::post('tutors/{id}/approve', [\App\Http\Controllers\AdminTutorController::class, 'approve'])->name('admin.tutors.approve');
    Route::post('tutors/{id}/reject', [\App\Http\Controllers\AdminTutorController::class, 'reject'])->name('admin.tutors.reject');
    Route::delete('tutors/{id}', [\App\Http\Controllers\AdminTutorController::class, 'destroy'])->name('admin.tutors.destroy');

    // Settings & Reports
    Route::get('settings', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'index'])->name('admin.settings');
    Route::post('settings', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'update'])->name('admin.settings.update');
    Route::get('reports', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'reports'])->name('admin.reports');

    // Email Templates
    Route::get('emails', [\App\Http\Controllers\Admin\EmailTemplateController::class, 'index'])->name('admin.emails.index');
    Route::get('emails/{id}/edit', [\App\Http\Controllers\Admin\EmailTemplateController::class, 'edit'])->name('admin.emails.edit');
    Route::put('emails/{id}', [\App\Http\Controllers\Admin\EmailTemplateController::class, 'update'])->name('admin.emails.update');
});

// Teacher (Active Tutor) Routes
Route::middleware(['auth', 'role:tutor'])->prefix('teacher')->group(function () {
    Route::middleware([\App\Http\Middleware\CheckTutorStatus::class])->group(function () {
        Route::get('/dashboard', [TeacherWebController::class, 'index'])->name('teacher.dashboard');
        Route::get('/profile', [TeacherWebController::class, 'profile'])->name('teacher.profile');
        Route::put('/profile', [TeacherWebController::class, 'updateProfile'])->name('teacher.profile.update');

        Route::get('/bookings', [TeacherWebController::class, 'bookings'])->name('teacher.bookings');
        Route::post('/bookings/{id}/status/{status}', [TeacherWebController::class, 'updateBookingStatus'])->name('teacher.bookings.status');
        Route::get('/slots', [TeacherWebController::class, 'slots'])->name('teacher.slots');
        Route::post('/slots', [TeacherWebController::class, 'storeSlot'])->name('teacher.slots.store');
        Route::delete('/slots/{id}', [TeacherWebController::class, 'destroySlot'])->name('teacher.slots.destroy');
        Route::get('/earnings', [TeacherWebController::class, 'earnings'])->name('teacher.earnings');
    });
});

// Shared Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Fix Route (Dev only)
Route::get('/fix-admin', function () {
    $user = User::where('email', 'admin@gmail.com')->first();
    if (!$user)
        return 'User not found';
    $user->password = Hash::make('123456');
    $user->save();
    return 'Password Updated Successfully';
});

require __DIR__ . '/auth.php';
