@extends('layouts.teacher')

@section('title', 'My Earnings')

@section('content')
<div class="fade-in">
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card p-4 border-0 shadow-sm">
                <div class="text-muted small fw-bold text-uppercase mb-2">Total Earnings</div>
                <div class="h3 fw-bold mb-0">Rs. {{ number_format($earnings->sum('tutor_amount'), 0) }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 border-0 shadow-sm">
                <div class="text-muted small fw-bold text-uppercase mb-2">Pending Payouts</div>
                <div class="h3 fw-bold mb-0 text-warning">Rs. {{ number_format($earnings->where('status', 'pending')->sum('tutor_amount'), 0) }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 border-0 shadow-sm">
                <div class="text-muted small fw-bold text-uppercase mb-2">Platform Commission</div>
                <div class="h3 fw-bold mb-0 text-danger">Rs. {{ number_format($earnings->sum('commission_amount'), 0) }}</div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3 text-muted small fw-bold text-uppercase tracking-wider">Date</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase tracking-wider">Booking ID</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase tracking-wider">Student</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase tracking-wider">Total Amount</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase tracking-wider">My Share</th>
                        <th class="px-4 py-3 text-muted small fw-bold text-uppercase tracking-wider text-end">Status</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($earnings as $earning)
                        <tr>
                            <td class="px-4 py-4 small">{{ $earning->created_at->format('M d, Y') }}</td>
                            <td class="py-4 small fw-bold">#{{ $earning->booking_id }}</td>
                            <td class="py-4 small">{{ $earning->booking->student->name }}</td>
                            <td class="py-4 small text-muted">Rs. {{ number_format($earning->total_amount, 0) }}</td>
                            <td class="py-4 small fw-bold text-success">Rs. {{ number_format($earning->tutor_amount, 0) }}</td>
                            <td class="px-4 py-4 text-end">
                                <span class="badge {{ $earning->status === 'paid' ? 'bg-success' : 'bg-warning' }} px-3 py-1 rounded-pill small">
                                    {{ ucfirst($earning->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">No earnings recorded yet.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
