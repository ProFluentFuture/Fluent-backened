<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Features | FluentFuture</title>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
        /* ---------- RESET & GLOBAL ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #ffffff;
            color: #0f172a;
            line-height: 1.6;
            overflow-x: hidden;
        }

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #ec4899;
            --accent: #06b6d4;
            --surface: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --glass: rgba(255, 255, 255, 0.7);
            --radius-lg: 24px;
            --radius-md: 16px;
            --shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ---------- GLOBAL COMPONENTS ---------- */
        .badge {
            background: #e0e7ff;
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            display: inline-block;
            letter-spacing: 0.3px;
        }

        .btn-cta {
            background: var(--primary);
            color: white !important;
            padding: 12px 28px;
            border-radius: 100px;
            transition: 0.3s;
            cursor: pointer;
            border: none;
            font-weight: 600;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            font-size: 1rem;
        }

        .btn-cta:hover {
            background: var(--primary-dark);
            transform: scale(0.98);
        }

        .btn-outline {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 12px 28px;
            border-radius: 100px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-outline:hover {
            border-color: var(--primary);
            background: #f8fafc;
        }

        /* ---------- NAVIGATION ---------- */
        nav {
            position: sticky;
            top: 20px;
            z-index: 1000;
            margin: 0 20px;
        }

        .nav-inner {
            background: var(--glass);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 100px;
            padding: 12px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow);
            transition: all 0.3s;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -1px;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-main);
            font-weight: 600;
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .mobile-menu-btn {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-main);
        }

        /* ---------- HERO SECTION ---------- */
        .hero {
            padding: 100px 0 80px;
            position: relative;
        }
.bg-glow {
    pointer-events: none;
    max-width: 100%;
}
        .bg-glow {
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%;
            z-index: -1;
            filter: blur(60px);
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 60px;
            align-items: center;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 24px;
            letter-spacing: -1px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            font-size: clamp(1rem, 3vw, 1.25rem);
            color: var(--text-muted);
            margin-bottom: 40px;
        }

        /* Glass mockup UI */
        .glass-ui-mockup {
            position: relative;
            width: 100%;
            height: 400px;
            background: linear-gradient(135deg, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0.1) 100%);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow: 0 40px 80px -20px rgba(99, 102, 241, 0.3);
            display: flex;
            flex-direction: column;
            padding: 30px;
            transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .glass-ui-mockup:hover {
            transform: scale(1.02);
        }

        .ui-bar {
            height: 12px;
            background: rgba(99, 102, 241, 0.2);
            border-radius: 10px;
            margin-bottom: 15px;
            width: 60%;
        }

        .ui-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .ui-chart {
            flex-grow: 1;
            background: linear-gradient(to top, var(--primary) 20%, transparent 80%);
            border-radius: 15px;
            opacity: 0.3;
            margin-top: 20px;
            position: relative;
            overflow: hidden;
        }

        .floating-badge {
            position: absolute;
            top: -20px;
            right: -20px;
            background: white;
            padding: 12px 20px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 10px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        /* ---------- FEATURES BENTO GRID ---------- */
        #features {
            padding: 60px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            letter-spacing: -1.5px;
            margin-top: 10px;
        }

        .section-header p {
            max-width: 600px;
            margin: 15px auto 0;
            color: var(--text-muted);
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 220px;
            gap: 24px;
        }

        .bento-item {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 32px;
            padding: 28px;
            position: relative;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.2, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .bento-item:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow);
            border-color: var(--primary);
        }

        .bento-1 {
            grid-column: span 2;
            grid-row: span 2;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            color: white;
            border: none;
        }

        .bento-2 {
            grid-column: span 2;
        }

        .bento-3, .bento-4 {
            grid-row: span 2;
        }

        .bento-5 {
            grid-column: span 2;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px;
        }

        .mini-chart {
            display: flex;
            align-items: flex-end;
            gap: 4px;
            height: 40px;
            margin-top: 15px;
        }

        .chart-bar {
            background: rgba(255,255,255,0.3);
            width: 8px;
            border-radius: 4px;
            animation: grow 2s ease-in-out infinite alternate;
        }

        .waveform {
            display: flex;
            gap: 3px;
            align-items: center;
            height: 30px;
            margin-bottom: 20px;
        }

        .wave-line {
            width: 3px;
            height: 10px;
            background: var(--primary);
            border-radius: 2px;
            animation: wave 1s ease-in-out infinite;
        }

        @keyframes grow {
            from { height: 10px; }
            to { height: 40px; }
        }

        @keyframes wave {
            0%, 100% { height: 10px; }
            50% { height: 30px; }
        }

        .bento-item h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .bento-item p {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        .bento-1 p {
            color: rgba(255,255,255,0.8);
        }

        /* ---------- STATS SECTION ---------- */
        .stats-outer-light {
            background:#0f172a;
            padding: 40px 0;
            margin: 0 40px;
            position: relative;
            border-radius: 50px;
        }

        .stats-grid-light {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .stat-card-light {
            background: #ffffff;
            padding: 35px 20px;
            border-radius: 32px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid #f1f5f9;
        }

        .stat-card-light:hover {
            transform: translateY(-12px);
            box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.08);
            border-color: var(--primary);
        }

        .stat-number-light {
            font-size: clamp(2.5rem, 6vw, 3.8rem);
            font-weight: 900;
            display: block;
            color: #0f172a;
            letter-spacing: -3px;
            margin-bottom: 8px;
            line-height: 1;
        }

        .stat-label-light {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .stat-accent {
            width: 40px;
            height: 4px;
            background: var(--primary);
            margin: 20px auto 0;
            border-radius: 10px;
            opacity: 0.3;
            transition: width 0.3s ease;
        }

        .stat-card-light:hover .stat-accent {
            width: 60px;
            opacity: 1;
        }

        /* ---------- HOW IT WORKS ---------- */
        .how-it-works {
            padding: 80px 20px;
            background: #0f172a;
            color: white;
            border-radius: 60px;
            margin: 40px 20px;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .step-card {
            position: relative;
            padding: 20px;
            background: rgba(255,255,255,0.05);
            border-radius: 28px;
            backdrop-filter: blur(4px);
        }

        .step-number {
            font-size: 4rem;
            font-weight: 900;
            opacity: 0.2;
            position: absolute;
            top: -10px;
            left: 20px;
        }

        /* ---------- PRICING ---------- */
        .pricing-section {
            padding: 80px 0;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .pricing-card {
            background: white;
            padding: 40px;
            border-radius: var(--radius-lg);
            border: 1px solid #e2e8f0;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .pricing-card.featured {
            border: 2px solid var(--primary);
            transform: translateY(-10px);
        }

        .pricing-card.featured::after {
            content: "Recommended";
            position: absolute;
            top: 20px;
            right: -30px;
            background: var(--primary);
            color: white;
            padding: 5px 40px;
            transform: rotate(45deg);
            font-size: 0.7rem;
            font-weight: 800;
        }

        .pricing-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .price {
            font-size: 2.5rem;
            font-weight: 800;
            margin: 20px 0;
        }

        .price small {
            font-size: 1rem;
            font-weight: 400;
        }

        .pricing-card ul {
            list-style: none;
            margin-bottom: 30px;
        }

        .pricing-card li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pricing-card li i {
            color: var(--primary);
        }

        /* ---------- TESTIMONIALS ---------- */
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .testimonial-card {
            background: var(--surface);
            border-radius: 24px;
            padding: 30px;
            border: 1px solid #eef2ff;
            transition: all 0.3s;
        }

        .testimonial-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow);
        }

        /* ---------- BLOG / RESOURCES ---------- */
        .blog-preview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .blog-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border: 1px solid #edf2f7;
            transition: 0.3s;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .blog-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: #cbd5e1;
        }

        .blog-content {
            padding: 24px;
        }

        /* ---------- CURRICULUM & MENTORS ---------- */
        .language-list {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
            margin-top: 30px;
        }

        .lang-badge {
            background: #eef2ff;
            padding: 8px 20px;
            border-radius: 40px;
            font-weight: 500;
            color: var(--primary-dark);
            transition: 0.3s;
        }

        .lang-badge:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .curriculum-grid {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .curriculum-card {
            background: #f8fafc;
            border-radius: 24px;
            padding: 24px;
            transition: 0.3s;
        }

        .curriculum-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        /* ---------- FAQ SECTION ---------- */
        .faq-section {
            padding: 80px 24px;
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            margin-bottom: 16px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 16px;
            cursor: pointer;
        }

        .faq-question {
            font-weight: 700;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
        }

        .faq-answer {
            margin-top: 10px;
            color: var(--text-muted);
            display: none;
            padding-bottom: 8px;
        }

        /* ---------- FOOTER ---------- */
        footer {
            background: #0a0c15;
            color: #94a3b8;
            padding: 80px 0 40px;
            border-radius: 60px 60px 0 0;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 60px;
        }

        .footer-logo {
            color: white;
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .footer-links h4 {
            color: white;
            margin-bottom: 24px;
            font-size: 1.1rem;
        }

        .footer-links a {
            display: block;
            color: #94a3b8;
            text-decoration: none;
            margin-bottom: 12px;
            transition: 0.3s;
        }

        .footer-links a:hover {
            color: var(--primary);
            transform: translateX(5px);
        }

        .social-icons {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .social-icons i {
            font-size: 1.2rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .social-icons i:hover {
            color: var(--primary);
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 1024px) {
            .bento-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-auto-rows: auto;
            }
            .bento-1, .bento-2, .bento-3, .bento-4, .bento-5 {
                grid-column: span 1;
                grid-row: auto;
            }
            .bento-5 {
                flex-direction: column;
                text-align: center;
            }
            .stats-grid-light {
                grid-template-columns: repeat(2, 1fr);
            }
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }
            
            .nav-links {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 40px;
            }
            
            .hero {
                padding: 80px 0 60px;
            }
            
            .hero .btn-cta, .hero .btn-outline {
                padding: 12px 24px;
            }
            
            .bento-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid-light {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .how-it-works {
                margin: 30px 16px;
                padding: 60px 16px;
            }
            
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin: 40px auto 0;
            }
            
            .pricing-card.featured {
                transform: translateY(0);
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 30px;
            }
            
            .footer-links a {
                display: inline-block;
                margin: 0 10px 10px;
            }
            
            .social-icons {
                justify-content: center;
            }
            
            .floating-badge {
                padding: 8px 16px;
                top: -10px;
                right: -5px;
            }
            
            .floating-badge strong {
                font-size: 0.7rem;
            }
            
            .glass-ui-mockup {
                height: 350px;
                padding: 20px;
            }
            
            .step-card {
                text-align: center;
            }
            
            .step-number {
                left: 50%;
                transform: translateX(-50%);
                top: -20px;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .section-header h2 {
                font-size: 1.8rem;
            }
            
            .bento-item {
                padding: 20px;
            }
            
            .bento-item h3 {
                font-size: 1.2rem;
            }
            
            .stat-number-light {
                font-size: 2.5rem;
            }
            
            .pricing-card {
                padding: 30px;
            }
            
            .price {
                font-size: 2rem;
            }
            
            .testimonial-card {
                padding: 20px;
            }
            
            .faq-section {
                padding: 60px 16px;
            }
        }
    </style>
</head>

<body>

<!-- NAV -->
 <nav>
        <div class="nav-inner">
            <div class="logo">FluentFuture</div>
           <div class="nav-links">
    <a href="/">Home</a>
    <a href="/features">Features</a>
    <a href="/how">How it Works</a>
    <a href="/pricing">Pricing</a>
    <a href="/resources">Resources</a>
</div>
            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
   <section class="hero" style="padding: 80px 0 40px;">
  <div class="container" style="text-align:center;">
    <span class="badge">Success Stories</span>
    <h1>Real Results from <span>Real Learners</span></h1>
    <p style="max-width:600px;margin:20px auto;">
      Discover how FluentFuture is helping students, professionals, and global learners
      achieve fluency faster than ever.
    </p>

    <a href="#" class="btn-cta">Start Your Journey</a>
  </div>
</section>
<section class="stats-outer-light">
  <div class="container">
    <div class="stats-grid-light">

      <div class="stat-card-light">
        <span class="stat-number-light">127K+</span>
        <span class="stat-label-light">Learners</span>
        <div class="stat-accent"></div>
      </div>

      <div class="stat-card-light">
        <span class="stat-number-light">4.9★</span>
        <span class="stat-label-light">Avg Rating</span>
        <div class="stat-accent"></div>
      </div>

      <div class="stat-card-light">
        <span class="stat-number-light">92%</span>
        <span class="stat-label-light">Success Rate</span>
        <div class="stat-accent"></div>
      </div>

      <div class="stat-card-light">
        <span class="stat-number-light">3x</span>
        <span class="stat-label-light">Faster Learning</span>
        <div class="stat-accent"></div>
      </div>

    </div>
  </div>
</section>

 <!-- TESTIMONIALS -->
    <div id="testimonials" class="container" style="margin: 60px auto;">
        <div class="section-header">
            <h2>Trusted by Top Performers</h2>
            <p>Join a community of high-achievers who transformed their careers.</p>
        </div>
        <div class="testimonial-grid">
            <div class="testimonial-card"><i class="fas fa-quote-left" style="color: var(--primary); font-size: 1.8rem; opacity: 0.5;"></i><p style="margin: 15px 0;">"FluentFuture helped me boost my IELTS from 6.0 to 8.0 in just 3 months. The AI pronunciation coach is a game-changer!"</p><h4>— Priya S., Software Engineer</h4></div>
            <div class="testimonial-card"><i class="fas fa-quote-left" style="color: var(--primary); font-size: 1.8rem; opacity: 0.5;"></i><p>"Finally, a platform that understands my accent challenges. After 50 speaking sprints, I aced my MBA interview."</p><h4>— Carlos M., MBA Candidate</h4></div>
            <div class="testimonial-card"><i class="fas fa-quote-left" style="color: var(--primary); font-size: 1.8rem; opacity: 0.5;"></i><p>"The business English modules gave me the confidence to lead global meetings. Best ROI of any learning tool."</p><h4>— Aisha K., Marketing Director</h4></div>
        </div>
    </div>
<footer>
        <div class="container">
            <div class="footer-grid">
                <div>
                    <div class="footer-logo">FluentFuture</div>
                    <p>Empowering 127,000+ students to break language barriers and achieve global dreams since 2022.</p>
                    <div class="social-icons">
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-linkedin"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Product</h4>
                    <a href="/pricing">Pricing</a>
                    <a href="https://fluentfuture.online/#">Mobile App</a>
                </div>
                <div class="footer-links">
                    <h4>Company</h4>
                    <a href="/">About Us</a>
                    <a href="/testimonials">Success Stories</a>
                    <a href="/resources">Resources</a>
                </div>
                <div class="footer-links">
                    <h4>Support</h4>
                    <a href="https://fluentfuture.online/#">Help Center</a>
                    <a href="/privacy">Privacy Policy</a>
                    <a href="/terms">Terms of Service</a>
                    <a href="/refund">Refund Policy</a>
                   
                </div>
            </div>
            <div style="text-align: center; border-top: 1px solid #1e293b; padding-top: 30px; font-size: 0.8rem;">
                © 2026 FluentFuture LMS. All rights reserved. | AI-powered language mastery
            </div>
        </div>
    </footer>
     <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                const answer = item.querySelector('.faq-answer');
                const icon = item.querySelector('i');
                const isOpen = answer.style.display === 'block';
                document.querySelectorAll('.faq-answer').forEach(a => a.style.display = 'none');
                document.querySelectorAll('.faq-item i').forEach(i => i.className = 'fas fa-plus');
                if (!isOpen) { answer.style.display = 'block'; icon.className = 'fas fa-minus'; }
            });
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navInner = document.querySelector('.nav-inner');
            if (window.scrollY > 50) navInner.style.padding = "8px 24px";
            else navInner.style.padding = "12px 32px";
        });
        
        // Mobile menu toggle (simple)
        const mobileBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');
        if (mobileBtn) {
            mobileBtn.addEventListener('click', () => {
                if (navLinks.style.display === 'flex') {
                    navLinks.style.display = 'none';
                } else {
                    navLinks.style.display = 'flex';
                    navLinks.style.flexDirection = 'column';
                    navLinks.style.position = 'absolute';
                    navLinks.style.top = '70px';
                    navLinks.style.left = '20px';
                    navLinks.style.right = '20px';
                    navLinks.style.background = 'white';
                    navLinks.style.padding = '20px';
                    navLinks.style.borderRadius = '24px';
                    navLinks.style.boxShadow = 'var(--shadow)';
                    navLinks.style.zIndex = '999';
                }
            });
        }
        
        // Reset mobile menu on resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && navLinks) {
                navLinks.style.display = 'flex';
                navLinks.style.flexDirection = 'row';
                navLinks.style.position = 'relative';
                navLinks.style.top = 'auto';
                navLinks.style.left = 'auto';
                navLinks.style.right = 'auto';
                navLinks.style.background = 'transparent';
                navLinks.style.padding = '0';
                navLinks.style.boxShadow = 'none';
            } else if (window.innerWidth <= 768 && navLinks && navLinks.style.display === 'flex') {
                navLinks.style.display = 'none';
            }
        });
    </script>

</body>
</html>