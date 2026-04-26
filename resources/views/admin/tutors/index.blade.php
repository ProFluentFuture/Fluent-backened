@extends('layouts.admin')

@section('title', 'Tutor Management')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Tutor Management</h2>
            <p class="text-muted small">Approve, reject, or manage all registered tutors on the platform.</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3 text-muted small fw-bold text-uppercase tracking-wider">Tutor</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase tracking-wider">Details</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase tracking-wider">Location</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-muted small fw-bold text-uppercase tracking-wider text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($tutors as $tutor)
                        <tr>
                            <td class="px-4 py-4">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $tutor->photo_url }}" class="rounded-circle me-3" width="45" height="45">
                                    <div>
                                        <div class="fw-bold text-dark">{{ $tutor->name }}</div>
                                        <div class="text-muted small">{{ $tutor->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4">
                                <div class="small fw-semibold text-dark">{{ ucfirst($tutor->tutorProfile->tutor_type ?? 'N/A') }}</div>
                                <div class="text-muted x-small">Rs. {{ number_format($tutor->tutorProfile->price ?? 0, 0) }} / mo</div>
                            </td>
                            <td class="py-4">
                                <div class="small text-dark">{{ $tutor->location->city ?? 'N/A' }}, {{ $tutor->location->state ?? '' }}</div>
                                <div class="text-muted x-small">{{ $tutor->location->area ?? '' }}</div>
                            </td>
                            <td class="py-4">
                                @if($tutor->status === 'active')
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-3 small">Active</span>
                                @elseif($tutor->status === 'pending')
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3 py-2 rounded-3 small">Pending</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-3 small">Rejected</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    @if($tutor->status === 'pending' || $tutor->status === 'rejected')
                                        <form action="{{ route('admin.tutors.approve', $tutor->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success rounded-3 px-3 shadow-sm border-0">
                                                <i class="fas fa-check me-1"></i> Approve
                                            </button>
                                        </form>
                                    @endif
                                    @if($tutor->status === 'pending' || $tutor->status === 'active')
                                        <form action="{{ route('admin.tutors.reject', $tutor->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-warning rounded-3 px-3 shadow-sm" onclick="return confirm('Are you sure you want to reject this tutor?')">
                                                <i class="fas fa-times me-1"></i> Reject
                                            </button>
                                        </form>
                                    @endif
                                    
                                    <form action="{{ route('admin.tutors.destroy', $tutor->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-3 px-3 shadow-sm border-0" onclick="return confirm('WARNING: This will permanently delete the tutor account and all associated data. Continue?')">
                                            <i class="fas fa-trash-alt me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">No tutors found.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-top bg-light">
            {{ $tutors->links() }}
        </div>
    </div>
</div>

<style>
    .x-small { font-size: 0.75rem; }
    .bg-success-subtle { background-color: rgba(25, 135, 84, 0.1); }
    .bg-warning-subtle { background-color: rgba(255, 193, 7, 0.1); }
    .bg-danger-subtle { background-color: rgba(220, 53, 69, 0.1); }
</style>
@endsection
