@extends('layouts.teacher')

@section('title', 'Dashboard')

@section('content')
<div class="fade-in">
    <!-- Welcome Header -->
    <div class="row align-items-center mb-5">
        <div class="col-lg-8">
            <h1 class="display-6 mb-2">Hello, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h1>
            <p class="text-muted lead">Welcome to your teacher dashboard. Manage your profile and track your performance.</p>
        </div>
        <div class="col-lg-4 text-lg-end">
            <div class="bg-white px-4 py-2 rounded-4 border d-inline-flex align-items-center shadow-sm">
                <i class="fas fa-calendar-day text-primary me-3"></i>
                <div class="text-start">
                    <div class="small text-muted fw-semibold">Current Date</div>
                    <div class="fw-bold small">{{ date('F d, Y') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card p-4 border-0 shadow-sm h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: rgba(79, 70, 229, 0.1); color: var(--primary);">
                        <i class="fas fa-star fs-5"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-bold text-uppercase">Average Rating</div>
                        <div class="h4 fw-bold mb-0">{{ number_format($avgRating, 1) }} / 5.0</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card p-4 border-0 shadow-sm h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: rgba(16, 185, 129, 0.1); color: var(--secondary);">
                        <i class="fas fa-comment-dots fs-5"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-bold text-uppercase">Total Reviews</div>
                        <div class="h4 fw-bold mb-0">{{ $totalReviews }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card p-4 border-0 shadow-sm h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: rgba(245, 158, 11, 0.1); color: var(--warning);">
                        <i class="fas fa-user-graduate fs-5"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-bold text-uppercase">Total Students</div>
                        <div class="h4 fw-bold mb-0">{{ $totalStudents }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card p-4 border-0 shadow-sm h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: {{ $user->tutorProfile->is_available ? 'rgba(16, 185, 129, 0.1)' : 'rgba(239, 68, 68, 0.1)' }}; color: {{ $user->tutorProfile->is_available ? 'var(--secondary)' : 'var(--danger)' }};">
                        <i class="fas fa-clock fs-5"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-bold text-uppercase">Availability</div>
                        <div class="h4 fw-bold mb-0">{{ $user->tutorProfile->is_available ? 'Available' : 'Unavailable' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="mb-4 fw-bold">My Profile Details</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4 border">
                            <div class="small text-muted mb-1">Tutor Type</div>
                            <div class="fw-bold text-uppercase">{{ $user->tutorProfile->tutor_type }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4 border">
                            <div class="small text-muted mb-1">Monthly Pricing</div>
                            <div class="fw-bold">Rs. {{ number_format($user->tutorProfile->price, 0) }} / month</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="p-3 bg-light rounded-4 border">
                            <div class="small text-muted mb-1">Location</div>
                            <div class="fw-bold">{{ $user->location->area }}, {{ $user->location->city }}, {{ $user->location->state }}</div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('teacher.profile') }}" class="btn btn-primary">Edit Profile Information</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h5 class="mb-4 fw-bold">Account Status</h5>
                @if($user->status === 'pending')
                    <div class="alert alert-warning border-0 rounded-4 mb-0">
                        <i class="fas fa-clock me-2"></i> Your account is currently <strong>Pending Approval</strong> by the admin. You will appear in search results once approved.
                    </div>
                @elseif($user->status === 'active')
                    <div class="alert alert-success border-0 rounded-4 mb-0">
                        <i class="fas fa-check-circle me-2"></i> Your account is <strong>Active</strong>. You are visible to students in search results.
                    </div>
                @else
                    <div class="alert alert-danger border-0 rounded-4 mb-0">
                        <i class="fas fa-exclamation-triangle me-2"></i> Your account status is <strong>{{ $user->status }}</strong>.
                    </div>
                @endif
                
                <div class="mt-4 pt-4 border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="small fw-semibold">Public Profile Visibility</span>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" {{ $user->tutorProfile->is_available ? 'checked' : '' }} disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
