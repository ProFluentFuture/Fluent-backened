@extends('layouts.teacher')

@section('title', 'Manage Bookings')

@section('content')
<div class="fade-in">
    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3 text-muted small fw-bold text-uppercase tracking-wider">Student</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase tracking-wider">Schedule</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase tracking-wider">Mode</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-muted small fw-bold text-uppercase tracking-wider text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($bookings as $booking)
                        <tr>
                            <td class="px-4 py-4">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center fw-bold me-3" style="width: 40px; height: 40px;">
                                        {{ substr($booking->student->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $booking->student->name }}</div>
                                        <div class="text-muted small">{{ $booking->student->phone }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4">
                                <div class="small fw-semibold text-dark">{{ \Carbon\Carbon::parse($booking->start_time)->format('D, M d, Y') }}</div>
                                <div class="text-muted x-small">{{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}</div>
                            </td>
                            <td class="py-4">
                                <span class="badge {{ $booking->mode === 'home' ? 'bg-info-subtle text-info' : 'bg-primary-subtle text-primary' }} px-3 py-2 rounded-3 small">
                                    {{ ucfirst($booking->mode) }}
                                </span>
                            </td>
                            <td class="py-4">
                                @if($booking->status === 'accepted')
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-3 small">Accepted</span>
                                @elseif($booking->status === 'pending')
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3 py-2 rounded-3 small">Pending</span>
                                @elseif($booking->status === 'completed')
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-3 py-2 rounded-3 small">Completed</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-3 small">{{ ucfirst($booking->status) }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-end">
                                @if($booking->status === 'pending')
                                    <div class="d-flex justify-content-end gap-2">
                                        <form action="{{ route('teacher.bookings.status', [$booking->id, 'accepted']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success rounded-3 px-3 shadow-sm border-0">Accept</button>
                                        </form>
                                        <form action="{{ route('teacher.bookings.status', [$booking->id, 'rejected']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-3 px-3">Reject</button>
                                        </form>
                                    </div>
                                @elseif($booking->status === 'accepted' && \Carbon\Carbon::parse($booking->start_time)->isToday())
                                    <a href="#" class="btn btn-sm btn-primary rounded-3 px-3 shadow-sm border-0">Start Class</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">No bookings found.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-top bg-light">
            {{ $bookings->links() }}
        </div>
    </div>
</div>

<style>
    .x-small { font-size: 0.75rem; }
    .bg-success-subtle { background-color: rgba(25, 135, 84, 0.1); }
    .bg-warning-subtle { background-color: rgba(255, 193, 7, 0.1); }
    .bg-danger-subtle { background-color: rgba(220, 53, 69, 0.1); }
    .bg-primary-subtle { background-color: rgba(79, 70, 229, 0.1); }
    .bg-info-subtle { background-color: rgba(13, 202, 240, 0.1); }
    .bg-secondary-subtle { background-color: rgba(108, 117, 125, 0.1); }
</style>
@endsection
