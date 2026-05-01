<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FluentFuture</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ---------- RESET & GLOBAL ---------- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #000000;
            color: #ffffff;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #ec4899;
            --surface: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --radius-lg: 24px;
            --radius-md: 16px;
            --shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* ---------- NAVIGATION ---------- */
        nav { position: sticky; top: 20px; z-index: 1000; margin: 0 20px; }
        .nav-inner {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 100px;
            padding: 12px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow);
        }
        .logo { font-size: 1.5rem; font-weight: 800; color: var(--primary); text-decoration: none; }

        /* ---------- LOGIN FORM CARD ---------- */
        .auth-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background: radial-gradient(circle at top right, rgba(99, 102, 241, 0.05), transparent);
        }

        .auth-card {
            background: white;
            width: 100%;
            max-width: 450px;
            padding: 40px;
            border-radius: var(--radius-lg);
            border: 1px solid #e2e8f0;
            box-shadow: var(--shadow);
        }

        .auth-header { text-align: center; margin-bottom: 32px; }
        .auth-header h2 { font-size: 1.8rem; font-weight: 800; letter-spacing: -0.5px; }
        .auth-header p { color: var(--text-muted); font-size: 0.95rem; }

        .form-group { margin-bottom: 20px; }
        .form-label {
            display: block;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 8px;
            color: var(--text-main);
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            font-family: inherit;
            transition: 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        /* Error Styles */
        .error-message {
            color: #ef4444;
            font-size: 0.8rem;
            margin-top: 5px;
            font-weight: 500;
        }

        .status-message {
            background: #f0fdf4;
            color: #166534;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            border: 1px solid #bbf7d0;
        }

        .flex-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .checkbox-group { display: flex; align-items: center; gap: 8px; font-size: 0.9rem; }
        .checkbox-group input { accent-color: var(--primary); cursor: pointer; }

        .btn-cta {
            background: var(--primary);
            color: white;
            width: 100%;
            padding: 14px;
            border-radius: 100px;
            border: none;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 24px;
        }

        .btn-cta:hover { background: var(--primary-dark); transform: scale(0.99); }

        .link-muted {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: 0.3s;
        }

        .link-muted:hover { color: var(--primary); }

        footer {
            text-align: center;
            padding: 24px;
            font-size: 0.8rem;
            color: var(--text-muted);
        }
    </style>
</head>
<body>



    <main class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Welcome Back</h2>
                <p>Log in to continue your journey</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="name@example.com">
                    @if ($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                    @if ($errors->has('password'))
                        <div class="error-message">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="flex-row">
                    <!-- Remember Me -->
                    <label for="remember_me" class="checkbox-group">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="link-muted" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn-cta">
                    Log in
                </button>
            </form>
        </div>
    </main>

  

</body>
</html>