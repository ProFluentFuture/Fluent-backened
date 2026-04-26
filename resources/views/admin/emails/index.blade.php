@extends('layouts.admin')

@section('title', 'Email Templates')

@section('content')
<div class="fade-in">
    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3 text-muted small fw-bold text-uppercase">Template Name</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase">Subject</th>
                        <th class="py-3 text-muted small fw-bold text-uppercase">Description</th>
                        <th class="px-4 py-3 text-muted small fw-bold text-uppercase text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($templates as $template)
                        <tr>
                            <td class="px-4 py-4 fw-bold text-dark">{{ ucwords(str_replace('_', ' ', $template->slug)) }}</td>
                            <td class="py-4 small">{{ $template->subject }}</td>
                            <td class="py-4 x-small text-muted">{{ $template->description }}</td>
                            <td class="px-4 py-4 text-end">
                                <a href="{{ route('admin.emails.edit', $template->id) }}" class="btn btn-sm btn-outline-primary rounded-3 px-3">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
