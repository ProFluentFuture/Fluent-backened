<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Login - English LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background: #f8fafc; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .auth-card { width: 100%; max-width: 450px; background: white; border-radius: 2rem; border: 1px solid #e2e8f0; box-shadow: 0 20px 40px -15px rgba(0,0,0,0.05); padding: 3rem; }
        .logo-box { width: 60px; height: 60px; background: #4f46e5; border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.75rem; margin-bottom: 2rem; box-shadow: 0 8px 16px rgba(79, 70, 229, 0.3); }
        .btn-primary { background: #4f46e5; border: none; padding: 0.85rem; border-radius: 1rem; font-weight: 600; font-size: 1.1rem; }
        .form-control { padding: 0.85rem 1.25rem; border-radius: 1rem; border: 1px solid #e2e8f0; font-weight: 500; }
        .form-control:focus { box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1); border-color: #4f46e5; }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="logo-box mx-auto"><i class="fas fa-graduation-cap"></i></div>
        <h2 class="text-center fw-bold mb-1">Tutor Login</h2>
        <p class="text-center text-muted mb-4 small">Welcome back! Please enter your details.</p>

        @if($errors->any())
            <div class="alert alert-danger border-0 rounded-4 mb-4 small">
                @foreach($errors->all() as $error)
                    <div><i class="fas fa-exclamation-circle me-2"></i> {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('tutor.login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="john@example.com" required autofocus>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Sign In</button>
        </form>

        <p class="text-center text-muted mb-0 small">Don't have an account? <a href="{{ route('tutor.register') }}" class="text-primary text-decoration-none fw-bold">Sign Up as Tutor</a></p>
    </div>
</body>
</html>
