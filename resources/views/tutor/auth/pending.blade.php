<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Pending Approval - English LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background: #f8fafc; height: 100vh; display: flex; align-items: center; justify-content: center; text-align: center; }
        .pending-card { width: 100%; max-width: 550px; background: white; border-radius: 2rem; border: 1px solid #e2e8f0; box-shadow: 0 20px 40px -15px rgba(0,0,0,0.05); padding: 4rem; }
        .icon-box { width: 80px; height: 80px; background: #fef3c7; color: #d97706; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin-bottom: 2rem; }
        .btn-outline { border: 1px solid #e2e8f0; padding: 0.75rem 1.5rem; border-radius: 1rem; color: #64748b; text-decoration: none; font-weight: 600; transition: all 0.2s; }
        .btn-outline:hover { background: #f8fafc; color: #1e293b; }
    </style>
</head>
<body>
    <div class="pending-card">
        <div class="icon-box mx-auto"><i class="fas fa-clock"></i></div>
        <h2 class="fw-bold mb-3">Wait for Approval</h2>
        <p class="text-muted mb-4 lead">Hello {{ Auth::user()->name }}, your profile has been submitted and is currently under review by our administration team.</p>
        <p class="text-muted mb-5 small">Once approved, you will receive an email and will be able to access your full dashboard. This usually takes 24-48 hours.</p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline">Sign Out & Check Later</button>
        </form>
    </div>
</body>
</html>
