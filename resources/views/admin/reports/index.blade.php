@extends('layouts.admin')

@section('title', 'Platform Reports')

@section('content')
<div class="fade-in">
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm h-100">
                <div class="text-muted small fw-bold text-uppercase mb-2">Total Bookings</div>
                <div class="h2 fw-bold mb-0 text-primary">{{ $stats['total_bookings'] }}</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm h-100">
                <div class="text-muted small fw-bold text-uppercase mb-2">Total GMV</div>
                <div class="h2 fw-bold mb-0">Rs. {{ number_format($stats['total_revenue'], 0) }}</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm h-100">
                <div class="text-muted small fw-bold text-uppercase mb-2">Platform Earnings</div>
                <div class="h2 fw-bold mb-0 text-success">Rs. {{ number_format($stats['platform_commission'], 0) }}</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm h-100">
                <div class="text-muted small fw-bold text-uppercase mb-2">Active Tutors</div>
                <div class="h2 fw-bold mb-0">{{ $stats['active_tutors'] }}</div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4">
        <h5 class="fw-bold mb-4">Performance Overview</h5>
        <div class="alert alert-info border-0 rounded-4 py-3">
            <i class="fas fa-info-circle me-2"></i> This data is updated in real-time based on tutor attendance and booking completions.
        </div>
        <!-- Placeholder for a chart -->
        <div class="bg-light rounded-4 d-flex align-items-center justify-content-center" style="height: 300px; border: 2px dashed #cbd5e1;">
            <div class="text-muted">Analytics Chart Placeholder</div>
        </div>
    </div>
</div>
@endsection
