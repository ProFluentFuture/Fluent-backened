@extends('layouts.admin')

@section('title', 'Platform Settings')

@section('content')
<div class="fade-in">
    <div class="card border-0 shadow-sm p-4">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <div class="row g-4">
                <div class="col-12 border-bottom pb-2 mb-3">
                    <h5 class="fw-bold mb-0">General Rules</h5>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">Platform Commission (%)</label>
                    <input type="number" name="settings[platform_commission]" class="form-control" value="{{ $settings->get('general')?->where('key', 'platform_commission')->first()?->value ?? 10 }}">
                    <div class="form-text x-small">Percentage deducted from each tutor booking.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">Max Auto-Accept Distance (KM)</label>
                    <input type="number" name="settings[max_distance_rule]" class="form-control" value="{{ $settings->get('general')?->where('key', 'max_distance_rule')->first()?->value ?? 5 }}">
                    <div class="form-text x-small">Default distance for smart auto-accept.</div>
                </div>

                <div class="col-12 border-bottom pb-2 mb-3 mt-5">
                    <h5 class="fw-bold mb-0">Cancellation & Policies</h5>
                </div>

                <div class="col-md-12">
                    <label class="form-label small fw-bold text-muted">Cancellation Policy Text</label>
                    <textarea name="settings[cancellation_policy]" class="form-control" rows="4">{{ $settings->get('policy')?->where('key', 'cancellation_policy')->first()?->value }}</textarea>
                </div>

                <div class="col-12 mt-5">
                    <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm border-0">Save Platform Settings</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .x-small { font-size: 0.75rem; }
    .form-control { border: 1px solid #e2e8f0; padding: 0.75rem 1rem; border-radius: 0.75rem; }
</style>
@endsection
