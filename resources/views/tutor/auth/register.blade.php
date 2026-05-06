<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Registration - English LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background: #f8fafc; min-height: 100vh; padding: 4rem 0; }
        .auth-card { width: 100%; max-width: 800px; background: white; border-radius: 2rem; border: 1px solid #e2e8f0; box-shadow: 0 20px 40px -15px rgba(0,0,0,0.05); padding: 4rem; margin: 0 auto; }
        .logo-box { width: 60px; height: 60px; background: #4f46e5; border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.75rem; margin-bottom: 2rem; box-shadow: 0 8px 16px rgba(79, 70, 229, 0.3); }
        .btn-primary { background: #4f46e5; border: none; padding: 1rem; border-radius: 1rem; font-weight: 600; font-size: 1.1rem; }
        .form-control, .form-select { padding: 0.85rem 1.25rem; border-radius: 1rem; border: 1px solid #e2e8f0; font-weight: 500; font-size: 0.95rem; }
        .form-control:focus, .form-select:focus { box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1); border-color: #4f46e5; }
        .section-title { font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; color: #4f46e5; margin-bottom: 1.5rem; display: block; }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="logo-box mx-auto"><i class="fas fa-chalkboard-teacher"></i></div>
        <h2 class="text-center fw-bold mb-1">Become a Tutor</h2>
        <p class="text-center text-muted mb-5">Fill in your details and start your teaching journey.</p>

        @if($errors->any())
            <div class="alert alert-danger border-0 rounded-4 mb-4 small">
                @foreach($errors->all() as $error)
                    <div><i class="fas fa-exclamation-circle me-2"></i> {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('tutor.register.submit') }}" method="POST">
            @csrf
            <div class="row g-4">
                <div class="col-12"><span class="section-title">Personal Information</span></div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="+1 234 567 890" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                </div>

                <div class="col-12 mt-5"><span class="section-title">Teaching Details</span></div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">Tutor Type</label>
                    <select name="tutor_type" class="form-select" required>
                        <option value="online">Online Only</option>
                        <option value="home">Home Only</option>
                        <option value="both">Both</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">Subjects (Multiple)</label>
                    <select name="subject_ids[]" class="form-select" multiple required style="height: 100px;">
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $subject->name == 'English' ? 'selected' : '' }}>
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Hold Ctrl/Cmd to select multiple</small>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">City</label>
                    <input type="text" name="city" class="form-control" placeholder="New York" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">State</label>
                    <input type="text" name="state" class="form-control" placeholder="NY" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">Area</label>
                    <input type="text" name="area" class="form-control" placeholder="Manhattan" required>
                </div>

                <div class="col-12 mt-5">
                    <button type="submit" class="btn btn-primary w-100 mb-3">Register & Submit for Approval</button>
                    <p class="text-center text-muted mb-0 small">Already have a tutor account? <a href="{{ route('tutor.login') }}" class="text-primary text-decoration-none fw-bold">Sign In</a></p>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
