<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Terms & Conditions | FluentFuture - AI Language Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ---------- RESET & GLOBAL (Light Theme - Matching Main Website) ---------- */
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
            --border-light: #e2e8f0;
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

        /* ---------- TERMS CONTAINER (Light Theme) ---------- */
        .terms-wrapper {
            padding: 40px 20px 60px;
            position: relative;
        }

        .bg-glow {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.08) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%;
            z-index: 0;
            filter: blur(60px);
        }

        .terms-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 2rem;
            box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid var(--border-light);
            position: relative;
            z-index: 1;
        }

        /* Header area with accent gradient */
        .terms-header {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            padding: 2rem 2rem 1.5rem 2rem;
            border-bottom: 2px solid var(--primary);
            position: relative;
        }

        .terms-header h1 {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(120deg, var(--primary), var(--accent));
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
            margin-bottom: 0.5rem;
        }

        .last-updated {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: inline-block;
            background: var(--surface);
            padding: 0.25rem 0.8rem;
            border-radius: 30px;
        }

        /* content inner padding */
        .terms-content {
            padding: 2rem 2rem 1.5rem 2rem;
        }

        /* section styling */
        .terms-section {
            margin-bottom: 2rem;
            scroll-margin-top: 1rem;
        }

        .terms-section h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.75rem;
            display: inline-block;
            background: linear-gradient(90deg, rgba(99, 102, 241, 0.08), transparent);
            padding-right: 1rem;
            border-left: 4px solid var(--primary);
            padding-left: 0.9rem;
            border-radius: 0 8px 8px 0;
        }

        .terms-section h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-main);
            margin: 1rem 0 0.5rem 0;
        }

        .terms-section p, .terms-section li {
            color: var(--text-muted);
            font-size: 1rem;
            margin-bottom: 0.6rem;
        }

        .terms-section ul, .terms-section ol {
            margin: 0.75rem 0 0.75rem 1.8rem;
        }

        .terms-section li {
            margin-bottom: 0.4rem;
        }

        strong, .accent-text {
            color: var(--primary);
            font-weight: 600;
        }

        .highlight-cyan {
            color: var(--accent);
        }

        .info-badge {
            background: var(--surface);
            border-left: 3px solid #f59e0b;
            padding: 1rem 1.2rem;
            border-radius: 16px;
            margin: 1rem 0;
            font-size: 0.95rem;
        }

        .warning-badge {
            background: #fef2f2;
            border-left: 3px solid #ef4444;
            padding: 1rem 1.2rem;
            border-radius: 16px;
            margin: 1rem 0;
            font-size: 0.95rem;
        }

        .warning-badge strong {
            color: #ef4444;
        }

        hr {
            border: none;
            height: 1px;
            background: var(--border-light);
            margin: 1.5rem 0;
        }

        .contact-card {
            background: var(--surface);
            border-radius: 24px;
            padding: 1.3rem 1.5rem;
            margin-top: 1rem;
            border: 1px solid var(--border-light);
            transition: all 0.2s ease;
        }

        .contact-email {
            font-family: monospace;
            font-size: 1.05rem;
            background: white;
            padding: 0.4rem 1rem;
            border-radius: 40px;
            display: inline-block;
            color: var(--primary);
            border: 1px solid var(--border-light);
            font-weight: 500;
        }

        a {
            color: var(--primary);
            text-decoration: none;
            border-bottom: 1px dotted rgba(99, 102, 241, 0.3);
            transition: color 0.2s;
        }

        a:hover {
            color: var(--primary-dark);
            border-bottom-color: var(--primary);
        }

        /* Table styling for subscription details */
        .subscription-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
            background: var(--surface);
            border-radius: 16px;
            overflow: hidden;
        }

        .subscription-table th,
        .subscription-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid var(--border-light);
        }

        .subscription-table th {
            background: #eef2ff;
            font-weight: 600;
            color: var(--text-main);
        }

        .subscription-table tr:last-child td {
            border-bottom: none;
        }

        /* ---------- FOOTER (Light Theme Matching Main Page) ---------- */
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
            font-size: 1.8rem;
            font-weight: 800;
            color: white;
            margin-bottom: 20px;
        }

        .footer-links h4 {
            color: white;
            margin-bottom: 24px;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .footer-links a {
            display: block;
            color: #94a3b8;
            text-decoration: none;
            margin-bottom: 12px;
            transition: 0.3s;
            border-bottom: none;
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
            color: #94a3b8;
        }

        .social-icons i:hover {
            color: var(--primary);
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 992px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
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
            
            .terms-header h1 {
                font-size: 1.8rem;
            }
            
            .terms-content {
                padding: 1.5rem;
            }
            
            .terms-section h2 {
                font-size: 1.3rem;
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
            
            .subscription-table {
                display: block;
                overflow-x: auto;
            }
        }

        @media (max-width: 480px) {
            .terms-header {
                padding: 1.5rem;
            }
            
            .terms-section h2 {
                font-size: 1.2rem;
            }
            
            .info-badge, .warning-badge {
                padding: 0.8rem 1rem;
            }
        }

        ::selection {
            background: rgba(99, 102, 241, 0.2);
            color: var(--primary-dark);
        }
    </style>
</head>
<body>
    <!-- Background Glow Effects (Light) -->
    <div class="bg-glow" style="top: 0; left: -100px;"></div>
    <div class="bg-glow" style="top: 30%; right: -100px; background: radial-gradient(circle, rgba(236, 72, 153, 0.05) 0%, transparent 70%);"></div>

    <!-- Navigation (Light Theme) -->
    <nav>
        <div class="nav-inner">
            <div class="logo">FluentFuture</div>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/features">Features</a>
                <a href="/how">How it Works</a>
                <a href="/pricing">Pricing</a>
                <a href="/testimonials">Success</a>
                <a href="/resources">Resources</a>
            </div>
            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <!-- Terms & Conditions Content (Light Theme) -->
    <div class="terms-wrapper">
        <div class="terms-container">
            <div class="terms-header">
                <h1>Terms & Conditions</h1>
                <div class="last-updated">Last Updated: March 27, 2026</div>
                <p style="color: #64748b; margin-top: 1rem; max-width: 85%;">Please read these terms carefully before using FluentFuture. By accessing or using our platform, you agree to be bound by these Terms & Conditions.</p>
            </div>

            <div class="terms-content">
                <!-- 1. Acceptance of Terms -->
                <div class="terms-section">
                    <h2>1. Acceptance of Terms</h2>
                    <p>By accessing or using FluentFuture's website, mobile application, or any related services (collectively, the "Service"), you agree to comply with and be bound by these Terms & Conditions. If you do not agree to these terms, please do not use our Service.</p>
                    <p>FluentFuture reserves the right to modify these terms at any time. Your continued use of the Service after any changes constitutes acceptance of the modified terms.</p>
                </div>

                <!-- 2. Eligibility -->
                <div class="terms-section">
                    <h2>2. Eligibility</h2>
                    <p>To use FluentFuture, you must:</p>
                    <ul>
                        <li>Be at least 13 years of age (or the age of digital consent in your country).</li>
                        <li>If you are under 18, you must have parental or guardian consent to use the Service.</li>
                        <li>Provide accurate, current, and complete information during registration.</li>
                        <li>Maintain the security of your account credentials.</li>
                    </ul>
                    <div class="info-badge">
                        <p><strong class="highlight-mint">✓ Educational Platform</strong> — FluentFuture is designed for learners of all ages. We take special care to protect younger users in compliance with COPPA and GDPR-K.</p>
                    </div>
                </div>

                <!-- 3. Account Registration -->
                <div class="terms-section">
                    <h2>3. Account Registration</h2>
                    <p>To access certain features, you must create an account. You agree to:</p>
                    <ul>
                        <li>Provide accurate and truthful information.</li>
                        <li>Keep your login credentials confidential.</li>
                        <li>Notify us immediately of any unauthorized use of your account.</li>
                        <li>Be responsible for all activities that occur under your account.</li>
                    </ul>
                    <p>FluentFuture reserves the right to suspend or terminate accounts that violate these terms or provide false information.</p>
                </div>

                <!-- 4. Subscription Plans & Payments -->
                <div class="terms-section">
                    <h2>4. Subscription Plans & Payments</h2>
                    <p>FluentFuture offers both free and paid subscription plans. By purchasing a subscription, you agree to the following:</p>
                    
                    <table class="subscription-table">
                        <thead>
                            <tr><th>Plan</th><th>Duration</th><th>Price</th><th>Features</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>Free Trial</td><td>7 Days</td><td>₹0</td><td>Full platform access, limited practice sessions</td></tr>
                            <tr><td>Pro Plan</td><td>90 Days</td><td>₹1299</td><td>Unlimited AI tutors, advanced practice, progress tracking</td></tr>
                            <tr><td>Premium Plan</td><td>180 Days</td><td>₹1999</td><td>Everything in Pro + 1:1 mentorship, priority support</td></tr>
                        </tbody>
                    </table>

                    <ul>
                        <li><strong>Billing:</strong> Payments are processed securely through third-party payment providers. You authorize us to charge the applicable fees to your selected payment method.</li>
                        <li><strong>Auto-Renewal:</strong> Subscriptions automatically renew at the end of each billing cycle unless canceled at least 24 hours before renewal.</li>
                        <li><strong>Cancellation:</strong> You may cancel your subscription at any time from your account settings. Upon cancellation, you will retain access until the end of your current billing period.</li>
                        <li><strong>Refunds:</strong> We offer a 30-day money-back guarantee for annual plans. For monthly plans, refunds are considered on a case-by-case basis.</li>
                    </ul>
                </div>

                <!-- 5. Free Trial -->
                <div class="terms-section">
                    <h2>5. Free Trial</h2>
                    <p>New users may be eligible for a 7-day free trial. The trial period begins at registration and provides full access to platform features. To avoid charges, you must cancel before the trial ends. If you do not cancel, your subscription will automatically convert to a paid plan.</p>
                    <div class="warning-badge">
                        <p><strong>⚠️ Important:</strong> We do not require credit card information for the free trial. You can enjoy the trial without any financial commitment.</p>
                    </div>
                </div>

                <!-- 6. User Conduct -->
                <div class="terms-section">
                    <h2>6. User Conduct</h2>
                    <p>You agree not to misuse the Service. Prohibited activities include:</p>
                    <ul>
                        <li>Attempting to bypass, reverse engineer, or disrupt the Service.</li>
                        <li>Using the Service for any illegal purpose or in violation of any laws.</li>
                        <li>Harassing, threatening, or harming other users.</li>
                        <li>Impersonating any person or entity.</li>
                        <li>Uploading malicious code or content that infringes on intellectual property rights.</li>
                        <li>Sharing account credentials with unauthorized users.</li>
                    </ul>
                    <p>Violation of these rules may result in immediate account termination without refund.</p>
                </div>

                <!-- 7. Intellectual Property -->
                <div class="terms-section">
                    <h2>7. Intellectual Property</h2>
                    <p>All content on FluentFuture, including but not limited to lessons, exercises, audio recordings, graphics, logos, and software, is the property of FluentFuture or its licensors and is protected by copyright, trademark, and other intellectual property laws.</p>
                    <p>You are granted a limited, non-exclusive, non-transferable license to access and use the Service for personal, non-commercial purposes. You may not:</p>
                    <ul>
                        <li>Copy, modify, or distribute any content without written permission.</li>
                        <li>Sell, resell, or commercially exploit the Service.</li>
                        <li>Use the Service for any purpose other than personal language learning.</li>
                    </ul>
                </div>

                <!-- 8. AI-Generated Content -->
                <div class="terms-section">
                    <h2>8. AI-Generated Content</h2>
                    <p>FluentFuture uses artificial intelligence to provide personalized learning experiences, feedback, and conversation simulations. While we strive for accuracy, AI-generated content may contain errors. You acknowledge that:</p>
                    <ul>
                        <li>AI responses are generated based on algorithms and may not always be perfect.</li>
                        <li>You should not rely solely on AI feedback for critical decisions.</li>
                        <li>We continuously improve our AI models but do not guarantee specific outcomes.</li>
                    </ul>
                </div>

                <!-- 9. Privacy & Data Protection -->
                <div class="terms-section">
                    <h2>9. Privacy & Data Protection</h2>
                    <p>Your privacy is important to us. Our <a href="/privacy">Privacy Policy</a> explains how we collect, use, and protect your personal information. By using FluentFuture, you consent to the data practices described in the Privacy Policy.</p>
                    <p>We implement industry-standard security measures to protect your data, including encryption and secure servers.</p>
                </div>

                <!-- 10. Third-Party Services -->
                <div class="terms-section">
                    <h2>10. Third-Party Services</h2>
                    <p>FluentFuture integrates with third-party services such as Firebase, Google Analytics, and payment processors. These services have their own terms and privacy policies. We are not responsible for the practices of third-party providers.</p>
                </div>

                <!-- 11. Limitation of Liability -->
                <div class="terms-section">
                    <h2>11. Limitation of Liability</h2>
                    <p>To the maximum extent permitted by law, FluentFuture and its affiliates shall not be liable for any indirect, incidental, special, consequential, or punitive damages, including but not limited to loss of profits, data, or use, arising from:</p>
                    <ul>
                        <li>Your use or inability to use the Service.</li>
                        <li>Any conduct or content of third parties.</li>
                        <li>Unauthorized access to your data.</li>
                    </ul>
                    <p>Our total liability shall not exceed the amount you paid us during the twelve months preceding the claim.</p>
                </div>

                <!-- 12. Disclaimer of Warranties -->
                <div class="terms-section">
                    <h2>12. Disclaimer of Warranties</h2>
                    <p>The Service is provided "as is" and "as available" without warranties of any kind, either express or implied. We do not warrant that:</p>
                    <ul>
                        <li>The Service will be uninterrupted, secure, or error-free.</li>
                        <li>Results obtained from the Service will be accurate or reliable.</li>
                        <li>Any errors in the Service will be corrected.</li>
                    </ul>
                </div>

                <!-- 13. Termination -->
                <div class="terms-section">
                    <h2>13. Termination</h2>
                    <p>We may terminate or suspend your account immediately, without prior notice, for conduct that violates these terms or is harmful to other users. Upon termination:</p>
                    <ul>
                        <li>Your right to use the Service will cease immediately.</li>
                        <li>We may delete your account and associated data.</li>
                        <li>No refunds will be provided for unused subscription periods.</li>
                    </ul>
                    <p>You may terminate your account at any time by contacting support or using the account deletion feature.</p>
                </div>

                <!-- 14. Governing Law -->
                <div class="terms-section">
                    <h2>14. Governing Law</h2>
                    <p>These Terms shall be governed by and construed in accordance with the laws of India and the United States, without regard to conflict of law principles. Any disputes arising from these terms shall be resolved in the courts of Bangalore, India.</p>
                </div>

                <!-- 15. Contact Information -->
                <div class="terms-section">
                    <h2>15. Contact Us</h2>
                    <div class="contact-card">
                        <p>If you have any questions about these Terms & Conditions, please contact us:</p>
                        <p style="margin-top: 12px;"><strong>Email:</strong> <span class="contact-email">legal@fluentfuture.com</span></p>
                        <p><strong>Support:</strong> <span class="contact-email">support@fluentfuture.com</span></p>
                        <p><strong>Address:</strong> FluentFuture Inc., 548 Market Street, Suite 84993, San Francisco, CA 94104, USA</p>
                        <p><strong>Phone:</strong> +1 (555) 123-4567</p>
                    </div>
                </div>

                <hr />

                <p style="font-size: 0.9rem; color: #64748b; text-align: center;">By using FluentFuture, you acknowledge that you have read, understood, and agree to be bound by these Terms & Conditions. Thank you for choosing FluentFuture as your language learning partner!</p>
            </div>
        </div>
    </div>

    <!-- Footer (Matching Main Page Light Theme) -->
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
        // Mobile menu toggle
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
                    navLinks.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1)';
                    navLinks.style.zIndex = '999';
                    navLinks.style.border = '1px solid #e2e8f0';
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
                navLinks.style.border = 'none';
            } else if (window.innerWidth <= 768 && navLinks && navLinks.style.display === 'flex') {
                navLinks.style.display = 'none';
            }
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navInner = document.querySelector('.nav-inner');
            if (window.scrollY > 50) navInner.style.padding = "8px 24px";
            else navInner.style.padding = "12px 32px";
        });
    </script>
</body>
</html>