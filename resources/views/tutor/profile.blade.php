@extends('layouts.teacher')

@section('title', 'My Profile')

@section('content')
<div class="fade-in">
    <div class="row g-4">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm p-4">
                <form action="{{ route('teacher.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-4">
                        <!-- Personal Information -->
                        <div class="col-12 border-bottom pb-2 mb-2">
                            <h5 class="fw-bold mb-0">Personal Information</h5>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Full Name</label>
                            <input type="text" name="name" class="form-control rounded-3" value="{{ $user->name }}" required>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Phone Number</label>
                            <input type="text" name="phone" class="form-control rounded-3" value="{{ $user->phone }}" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Profile Photo</label>
                            <input type="file" name="profile_photo" class="form-control rounded-3">
                        </div>

                        <!-- Professional Details -->
                        <div class="col-12 border-bottom pb-2 mb-2 mt-5">
                            <h5 class="fw-bold mb-0">Professional Details</h5>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Qualification</label>
                            <input type="text" name="qualification" class="form-control rounded-3" value="{{ $user->tutorProfile->qualification }}" placeholder="e.g. MA in English">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Experience (Years)</label>
                            <input type="number" name="experience" class="form-control rounded-3" value="{{ $user->tutorProfile->experience }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Monthly Fee (Rs.)</label>
                            <input type="number" step="1" name="price" class="form-control rounded-3" value="{{ $user->tutorProfile->price }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Tutor Type</label>
                            <select name="tutor_type" class="form-select rounded-3">
                                <option value="home" {{ $user->tutorProfile->tutor_type === 'home' ? 'selected' : '' }}>Home (Offline)</option>
                                <option value="online" {{ $user->tutorProfile->tutor_type === 'online' ? 'selected' : '' }}>Online</option>
                                <option value="both" {{ $user->tutorProfile->tutor_type === 'both' ? 'selected' : '' }}>Both</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-muted">Bio / Introduction</label>
                            <textarea name="bio" class="form-control rounded-4" rows="4">{{ $user->tutorProfile->bio }}</textarea>
                        </div>

                        <!-- Location Details -->
                        <div class="col-12 border-bottom pb-2 mb-2 mt-5">
                            <h5 class="fw-bold mb-0">Location & Availability</h5>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">City</label>
                            <input type="text" name="city" class="form-control rounded-3" value="{{ $user->location->city }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">State</label>
                            <input type="text" name="state" class="form-control rounded-3" value="{{ $user->location->state }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Area</label>
                            <input type="text" name="area" class="form-control rounded-3" value="{{ $user->location->area }}">
                        </div>

                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm">Save Profile Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control, .form-select { border: 1px solid #e2e8f0; padding: 0.75rem 1rem; }
    .form-control:focus, .form-select:focus { box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1); border-color: #4f46e5; }
</style>
@endsection
