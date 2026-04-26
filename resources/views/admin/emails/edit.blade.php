@extends('layouts.admin')

@section('title', 'Edit Template: ' . ucwords(str_replace('_', ' ', $template->slug)))

@section('content')
<div class="fade-in">
    <div class="card border-0 shadow-sm p-4">
        <form action="{{ route('admin.emails.update', $template->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="form-label small fw-bold text-muted">Email Subject</label>
                <input type="text" name="subject" class="form-control" value="{{ $template->subject }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label small fw-bold text-muted">Email Body</label>
                <textarea name="body" class="form-control" rows="12" required>{{ $template->body }}</textarea>
                <div class="form-text mt-2 p-3 bg-light rounded-3 small">
                    <strong class="text-primary">Available Placeholders:</strong><br>
                    @if($template->slug === 'tutor_approved')
                        <code>{name}</code>, <code>{dashboard_link}</code>
                    @elseif($template->slug === 'tutor_rejected')
                        <code>{name}</code>, <code>{reason}</code>
                    @elseif($template->slug === 'new_booking')
                        <code>{tutor_name}</code>, <code>{student_name}</code>, <code>{timing}</code>, <code>{mode}</code>, <code>{address}</code>, <code>{dashboard_link}</code>
                    @endif
                </div>
            </div>

            <div class="mt-5 d-flex gap-2">
                <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm border-0">Save Template</button>
                <a href="{{ route('admin.emails.index') }}" class="btn btn-light px-4 py-2">Cancel</a>
            </div>
        </form>
    </div>
</div>

<style>
    .form-control { border: 1px solid #e2e8f0; padding: 0.75rem 1rem; border-radius: 0.75rem; }
    code { background: #f1f5f9; padding: 2px 6px; border-radius: 4px; color: #4f46e5; font-weight: 600; }
</style>
@endsection
