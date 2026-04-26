<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TutorController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherDashboardController;

// Public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/send-otp', [AuthController::class, 'sendOtp']);
Route::post('/register-unified', [AuthController::class, 'registerUnified']);
Route::post('/register/student', [AuthController::class, 'registerStudent']);
Route::post('/register/tutor', [AuthController::class, 'registerTutor']);

// Tutor Search (Public or Student access)
Route::get('/tutors/search', [TutorController::class, 'search']);
Route::get('/tutors/{id}', [TutorController::class, 'show']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'getProfile']);

    // Student Routes
    Route::prefix('student')->middleware('role:student')->group(function () {
        Route::post('/bookings/now', [\App\Http\Controllers\Api\BookingController::class, 'bookNow']);
        Route::post('/bookings/request', [\App\Http\Controllers\Api\BookingController::class, 'sendRequest']);
        Route::post('/attendance/{id}/confirm', [\App\Http\Controllers\Api\AttendanceController::class, 'confirmAttendance']);
        
        // Favorites & Reviews
        Route::get('/favorites', [\App\Http\Controllers\Api\FavoriteController::class, 'index']);
        Route::post('/favorites/toggle', [\App\Http\Controllers\Api\FavoriteController::class, 'toggle']);
        Route::post('/reviews', [\App\Http\Controllers\Api\ReviewController::class, 'store']);
    });

    // Teacher (Tutor) Routes
    Route::prefix('teacher')->middleware('role:tutor')->group(function () {
        // ... (existing routes)
        Route::get('/earnings', [\App\Http\Controllers\Api\RevenueController::class, 'tutorEarnings']);
        // (Booking, Slots, Attendance routes already added)
    });

    // Chat System (Shared)
    Route::prefix('chat')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\ChatController::class, 'index']);
        Route::post('/start', [\App\Http\Controllers\Api\ChatController::class, 'startChat']);
        Route::get('/{id}', [\App\Http\Controllers\Api\ChatController::class, 'show']);
        Route::post('/{id}/send', [\App\Http\Controllers\Api\ChatController::class, 'sendMessage']);
    });

    // Admin specific routes
    Route::middleware('role:admin')->group(function () {
        // Settings & Reports
        Route::get('/admin/settings', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'index']);
        Route::post('/admin/settings', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'update']);
        Route::get('/admin/reports', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'reports']);
        
        Route::get('/admin/tutors/pending', [AdminController::class, 'pendingTutors']);
        Route::post('/admin/tutors/{id}/approve', [AdminController::class, 'approveTutor']);
        Route::post('/admin/tutors/{id}/reject', [AdminController::class, 'rejectTutor']);
        Route::post('/admin/users/{id}/block', [AdminController::class, 'blockUser']);
        Route::post('/admin/tutors/{id}/featured', [AdminController::class, 'markFeatured']);
    });

    // Existing Student routes (Legacy)
    Route::get('/student/profile', [StudentController::class, 'profile']);
    Route::put('/student/update-profile', [StudentController::class, 'updateProfile']);
    
    // Transactions (Shared)
    Route::get('/transactions', [\App\Http\Controllers\Api\RevenueController::class, 'transactions']);
    
    // Plans and Progress
    Route::get('/plans', [\App\Http\Controllers\Api\PlanController::class, 'index']);
    Route::get('/progress', [\App\Http\Controllers\Api\ProgressController::class, 'index']);
});
