@extends('layouts.teacher')

@section('title', 'Manage Availability Slots')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div class="row align-items-center mb-4">
        <div class="col-lg-8">
            <h1 class="display-6 mb-2">Manage Availability Slots</h1>
            <p class="text-muted lead">Set your available time slots for students to book.</p>
        </div>
        <div class="col-lg-4 text-lg-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSlotModal">
                <i class="fas fa-plus me-2"></i>Add New Slot
            </button>
        </div>
    </div>

    <!-- Slots Grid -->
    <div class="row g-4">
        @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-bold text-capitalize">{{ $day }}</h5>
                </div>
                <div class="card-body">
                    @php
                        $daySlots = $slots->where('day_of_week', $day)->where('is_active', true);
                    @endphp
                    @if($daySlots->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($daySlots as $slot)
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <span class="fw-bold">{{ $slot->start_time }}</span>
                                    <span class="text-muted mx-2">-</span>
                                    <span class="fw-bold">{{ $slot->end_time }}</span>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteSlot({{ $slot->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-calendar-times fa-2x mb-2"></i>
                            <p class="mb-0">No slots available</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Add Slot Modal -->
<div class="modal fade" id="addSlotModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add New Slot</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addSlotForm" method="POST" action="{{ route('teacher.slots.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="day_of_week" class="form-label fw-semibold">Day</label>
                        <select class="form-select" id="day_of_week" name="day_of_week" required>
                            <option value="">Select Day</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_time" class="form-label fw-semibold">Start Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="end_time" class="form-label fw-semibold">End Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Slot</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function deleteSlot(slotId) {
    if (confirm('Are you sure you want to delete this slot?')) {
        fetch(`/teacher/slots/${slotId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                location.reload();
            } else {
                alert('Error deleting slot');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting slot');
        });
    }
}
</script>
@endsection
