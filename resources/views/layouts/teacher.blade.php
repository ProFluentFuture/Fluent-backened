<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Teacher Dashboard') - English LMS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-soft: #eef2ff;
            --secondary: #10b981;
            --secondary-soft: #ecfdf5;
            --warning: #f59e0b;
            --warning-soft: #fffbeb;
            --danger: #ef4444;
            --danger-soft: #fef2f2;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --sidebar-width: 280px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, .font-outfit {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
        }

        #wrapper { display: flex; width: 100%; }

        #sidebar {
            min-width: var(--sidebar-width);
            max-width: var(--sidebar-width);
            background: var(--bg-card);
            border-right: 1px solid var(--border-color);
            min-height: 100vh;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        #sidebar .sidebar-header { padding: 2.5rem 1.5rem; display: flex; align-items: center; }
        #sidebar .logo-box {
            width: 40px; height: 40px; background: var(--primary); border-radius: 10px;
            display: flex; align-items: center; justify-content: center; color: white;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        #sidebar ul.components { padding: 0 1rem; }
        #sidebar ul li a {
            color: var(--text-muted); text-decoration: none; display: flex; align-items: center;
            padding: 0.85rem 1rem; border-radius: 0.75rem; font-weight: 500; transition: all 0.2s;
        }
        #sidebar ul li a i { width: 24px; margin-right: 12px; }
        #sidebar ul li a:hover { background: var(--primary-soft); color: var(--primary); }
        #sidebar ul li.active a { background: var(--primary); color: white; box-shadow: 0 8px 16px rgba(79, 70, 229, 0.2); }

        #content { flex: 1; padding: 2rem 3rem; max-width: 1400px; margin: 0 auto; }
        .top-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem; }
        .user-profile { display: flex; align-items: center; background: white; padding: 0.5rem 1rem; border-radius: 3rem; border: 1px solid var(--border-color); }
        
        .card { border-radius: 1.25rem; border: 1px solid var(--border-color); transition: all 0.3s; }
        .card:hover { transform: translateY(-4px); box-shadow: 0 12px 24px -8px rgba(0,0,0,0.1); }

        .fade-in { animation: fadeIn 0.5s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }
    </style>
    @yield('styles')
</head>
<body>
    <div id="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="logo-box"><i class="fas fa-chalkboard-teacher"></i></div>
                <div class="logo-text fw-bold ms-2">Teacher Panel</div>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->routeIs('teacher.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('teacher.dashboard') }}"><i class="fas fa-chart-line"></i> Dashboard</a>
                </li>
                <li class="{{ request()->routeIs('teacher.bookings') ? 'active' : '' }}">
                    <a href="{{ route('teacher.bookings') }}"><i class="fas fa-calendar-check"></i> My Bookings</a>
                </li>
                <li class="{{ request()->routeIs('teacher.earnings') ? 'active' : '' }}">
                    <a href="{{ route('teacher.earnings') }}"><i class="fas fa-wallet"></i> Earnings</a>
                </li>
                <li class="{{ request()->routeIs('teacher.profile') ? 'active' : '' }}">
                    <a href="{{ route('teacher.profile') }}"><i class="fas fa-user-circle"></i> My Profile</a>
                </li>
                <li class="mt-5 pt-5 border-top" style="opacity: 0.6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-danger">
                            <i class="fas fa-sign-out-alt"></i> Sign Out
                        </a>
                    </form>
                </li>
            </ul>
        </nav>

        <div id="content">
            <div class="top-header">
                <div class="h4 mb-0">@yield('title')</div>
                <div class="user-profile shadow-sm">
                    <img src="{{ Auth::user()->photo_url }}" class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover;">
                    <span class="fw-semibold small">{{ Auth::user()->name }}</span>
                    <span class="badge {{ Auth::user()->status === 'active' ? 'bg-success' : 'bg-warning' }} ms-3 text-uppercase" style="font-size: 0.6rem;">{{ Auth::user()->status }}</span>
                </div>
            </div>

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
