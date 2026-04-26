<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Refund Policy | FluentFuture - AI Language Learning</title>
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
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
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


        /* ---------- REFUND POLICY CONTAINER (Light Theme) ---------- */
        .refund-wrapper {
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

        .refund-container {
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
        .refund-header {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            padding: 2rem 2rem 1.5rem 2rem;
            border-bottom: 2px solid var(--primary);
            position: relative;
        }

        .refund-header h1 {
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
        .refund-content {
            padding: 2rem 2rem 1.5rem 2rem;
        }

        /* section styling */
        .refund-section {
            margin-bottom: 2rem;
            scroll-margin-top: 1rem;
        }

        .refund-section h2 {
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

        .refund-section h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-main);
            margin: 1rem 0 0.5rem 0;
        }

        .refund-section p, .refund-section li {
            color: var(--text-muted);
            font-size: 1rem;
            margin-bottom: 0.6rem;
        }

        .refund-section ul, .refund-section ol {
            margin: 0.75rem 0 0.75rem 1.8rem;
        }

        .refund-section li {
            margin-bottom: 0.4rem;
        }

        strong, .accent-text {
            color: var(--primary);
            font-weight: 600;
        }

        .highlight-success {
            color: var(--success);
        }

        .highlight-warning {
            color: var(--warning);
        }

        .info-badge {
            background: var(--surface);
            border-left: 3px solid var(--primary);
            padding: 1rem 1.2rem;
            border-radius: 16px;
            margin: 1rem 0;
            font-size: 0.95rem;
        }

        .success-badge {
            background: #f0fdf4;
            border-left: 3px solid var(--success);
            padding: 1rem 1.2rem;
            border-radius: 16px;
            margin: 1rem 0;
            font-size: 0.95rem;
        }

        .warning-badge {
            background: #fefce8;
            border-left: 3px solid var(--warning);
            padding: 1rem 1.2rem;
            border-radius: 16px;
            margin: 1rem 0;
            font-size: 0.95rem;
        }

        .error-badge {
            background: #fef2f2;
            border-left: 3px solid var(--error);
            padding: 1rem 1.2rem;
            border-radius: 16px;
            margin: 1rem 0;
            font-size: 0.95rem;
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

        .refund-timeline {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 1.5rem 0;
        }

        .timeline-step {
            flex: 1;
            min-width: 200px;
            background: var(--surface);
            border-radius: 20px;
            padding: 1.2rem;
            text-align: center;
            border: 1px solid var(--border-light);
            transition: 0.3s;
        }

        .timeline-step:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: var(--shadow);
        }

        .timeline-number {
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            font-weight: 700;
        }

        .timeline-step h4 {
            margin-bottom: 8px;
            color: var(--text-main);
        }

        .timeline-step p {
            font-size: 0.85rem;
            margin: 0;
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

        /* Table styling */
        .refund-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
            background: var(--surface);
            border-radius: 16px;
            overflow: hidden;
        }

        .refund-table th,
        .refund-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid var(--border-light);
        }

        .refund-table th {
            background: #eef2ff;
            font-weight: 600;
            color: var(--text-main);
        }

        .refund-table tr:last-child td {
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
            .refund-timeline {
                flex-direction: column;
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
            
            .refund-header h1 {
                font-size: 1.8rem;
            }
            
            .refund-content {
                padding: 1.5rem;
            }
            
            .refund-section h2 {
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
            
            .refund-table {
                display: block;
                overflow-x: auto;
            }
        }

        @media (max-width: 480px) {
            .refund-header {
                padding: 1.5rem;
            }
            
            .refund-section h2 {
                font-size: 1.2rem;
            }
            
            .info-badge, .success-badge, .warning-badge, .error-badge {
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

    <!-- Refund Policy Content (Light Theme) -->
    <div class="refund-wrapper">
        <div class="refund-container">
            <div class="refund-header">
                <h1>Refund Policy</h1>
                <div class="last-updated">Last Updated: March 27, 2026</div>
                <p style="color: #64748b; margin-top: 1rem; max-width: 85%;">At FluentFuture, we're committed to your satisfaction. This Refund Policy outlines the circumstances under which refunds are provided for our subscription plans and services.</p>
            </div>

            <div class="refund-content">
                <!-- 1. Our Commitment -->
                <div class="refund-section">
                    <h2>1. Our Commitment to You</h2>
                    <p>We believe in the quality of our AI-powered language learning platform. If you're not completely satisfied with your FluentFuture experience, we offer clear and fair refund options. Our goal is to ensure that every learner gets the value they deserve from their investment.</p>
                    <div class="success-badge">
                        <p><strong class="highlight-success">✓ 30-Day Money-Back Guarantee</strong> — For annual and 180-day plans, we offer a full refund within 30 days of purchase. No questions asked.</p>
                    </div>
                </div>

                <!-- 2. Refund Eligibility by Plan -->
                <div class="refund-section">
                    <h2>2. Refund Eligibility by Plan</h2>
                    <p>Different subscription plans have different refund policies. Please review the table below for your specific plan:</p>
                    
                    <table class="refund-table">
                        <thead>
                            <tr>
                                <th>Plan</th>
                                <th>Duration</th>
                                <th>Refund Window</th>
                                <th>Refund Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Free Trial</strong></td>
                                <td>7 Days</td>
                                <td>N/A</td>
                                <td>No payment required</td>
                            </tr>
                            <tr>
                                <td><strong>Pro Plan</strong></td>
                                <td>90 Days</td>
                                <td>7 days from purchase</td>
                                <td>Full refund </td>
                            </tr>
                            <tr>
                                <td><strong>Premium Plan</strong></td>
                                <td>180 Days</td>
                                <td>7 days from purchase</td>
                                <td>Full refund</td>
                            </tr>
                            
                        </tbody>
                    </table>
                    
                    <div class="info-badge">
                        <p><strong class="accent-text"> Important Note:</strong> Refund windows start from the date of purchase or renewal. For auto-renewal charges, the refund window applies to the new billing cycle.</p>
                    </div>
                </div>

                <!-- 3. 30-Day Money-Back Guarantee -->
                <div class="refund-section">
                    <h2>3. 30-Day Money-Back Guarantee</h2>
                    <p>We stand behind our Premium Plan (180-day subscription) with a comprehensive 30-day money-back guarantee. This guarantee covers:</p>
                    <ul>
                        <li>Full refund of the subscription amount if requested within 30 days of purchase.</li>
                        <li>No deductions for usage during the 30-day period.</li>
                        <li>Simple, no-questions-asked refund process.</li>
                    </ul>
                    <p>This guarantee reflects our confidence in the quality of our platform and our commitment to your success.</p>
                </div>

                <!-- 4. Free Trial Policy -->
                <div class="refund-section">
                    <h2>4. Free Trial Policy</h2>
                    <p>All new users are eligible for a 7-day free trial. During this period:</p>
                    <ul>
                        <li><strong>No credit card required</strong> to start the trial.</li>
                        <li>Full access to all platform features, including AI tutors and pronunciation labs.</li>
                        <li>If you cancel before the trial ends, you will not be charged.</li>
                        <li>If you do not cancel, your subscription will automatically convert to a paid plan.</li>
                        <li>If you are charged after the trial, the standard refund policy applies.</li>
                    </ul>
                    <div class="warning-badge">
                        <p><strong class="highlight-warning"> Reminder:</strong> Free trial users who upgrade to a paid plan during the trial period are still eligible for refunds under the plan's refund policy.</p>
                    </div>
                </div>

                <!-- 5. How to Request a Refund -->
                <div class="refund-section">
                    <h2>5. How to Request a Refund</h2>
                    <p>Requesting a refund is simple. Follow these steps:</p>
                    
                    <div class="refund-timeline">
                        <div class="timeline-step">
                            <div class="timeline-number">1</div>
                            <h4>Contact Support</h4>
                            <p>Email us at <strong>refunds@fluentfuture.com</strong> with your account email and order details.</p>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-number">2</div>
                            <h4>Provide Reason (Optional)</h4>
                            <p>Help us improve by sharing why you're requesting a refund. This is optional but appreciated.</p>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-number">3</div>
                            <h4>Verification</h4>
                            <p>Our team verifies your purchase and refund eligibility within 24-48 hours.</p>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-number">4</div>
                            <h4>Refund Processed</h4>
                            <p>Refunds are processed to your original payment method within 5-10 business days.</p>
                        </div>
                    </div>

                    <p>You can also request a refund directly from your account dashboard under <strong>Settings → Billing → Request Refund</strong>.</p>
                </div>

                <!-- 6. Non-Refundable Circumstances -->
                <div class="refund-section">
                    <h2>6. Non-Refundable Circumstances</h2>
                    <p>Refunds will not be provided in the following situations:</p>
                    <ul>
                        <li>Requests made after the refund window has expired (14 days for Pro Plan, 30 days for Premium Plan).</li>
                        <li>Partial usage of a subscription after the refund window.</li>
                        <li>Violation of our <a href="/terms">Terms & Conditions</a> leading to account termination.</li>
                        <li>Chargebacks initiated without contacting support first (we will dispute chargebacks and may suspend accounts).</li>
                        <li>Refunds for previous billing cycles that were not disputed within the refund window.</li>
                        <li>Purchases made through third-party resellers (please contact the reseller directly).</li>
                    </ul>
                    <div class="error-badge">
                        <p><strong class="highlight-warning"> Important:</strong> If you cancel your subscription but continue using the service until the end of your billing period, you are not eligible for a refund for that period.</p>
                    </div>
                </div>

                <!-- 7. Pro-Rated Refunds -->
                <div class="refund-section">
                    <h2>7. Pro-Rated Refunds</h2>
                    <p>For monthly subscriptions, we offer pro-rated refunds for unused days when cancellation occurs within the refund window. The calculation is based on:</p>
                    <ul>
                        <li>Number of unused days remaining in the billing cycle.</li>
                        <li>Daily rate (monthly subscription price ÷ days in month).</li>
                        <li>Refund amount = Daily rate × Unused days.</li>
                    </ul>
                    <p>Pro-rated refunds are processed within 7-10 business days to the original payment method.</p>
                </div>

                <!-- 8. Technical Issues & Dissatisfaction -->
                <div class="refund-section">
                    <h2>8. Technical Issues & Dissatisfaction</h2>
                    <p>If you're experiencing technical difficulties or are unsatisfied with our service:</p>
                    <ul>
                        <li><strong>First, contact our support team</strong> at <strong>support@fluentfuture.com</strong> — we often can resolve issues quickly.</li>
                        <li>If the issue cannot be resolved within 7 days, you may request a refund under the standard policy.</li>
                        <li>We document all support interactions to ensure fair resolution.</li>
                    </ul>
                    <div class="info-badge">
                        <p><strong class="accent-text"> Pro Tip:</strong> Most issues can be resolved by our support team within 24 hours. Reach out before requesting a refund — we're here to help!</p>
                    </div>
                </div>

                <!-- 9. Processing Time -->
                <div class="refund-section">
                    <h2>9. Processing Time</h2>
                    <p>Refund processing times vary by payment method:</p>
                    <ul>
                        <li><strong>Credit/Debit Cards:</strong> 5-10 business days</li>
                        <li><strong>UPI / Net Banking (India):</strong> 3-7 business days</li>
                        <li><strong>Apple Pay / Google Pay:</strong> 5-10 business days</li>
                        <li><strong>International Cards:</strong> 7-14 business days</li>
                    </ul>
                    <p>If you haven't received your refund after 15 business days, please contact your bank first, then reach out to our support team.</p>
                </div>

                <!-- 10. Cancellation vs Refund -->
                <div class="refund-section">
                    <h2>10. Cancellation vs. Refund</h2>
                    <p>It's important to understand the difference:</p>
                    <ul>
                        <li><strong>Cancellation:</strong> Stops future recurring payments. You continue to have access until the end of your current billing period.</li>
                        <li><strong>Refund:</strong> Returns money for a past payment. Your access may be revoked upon refund approval.</li>
                    </ul>
                    <p>You can cancel anytime from your account dashboard without requesting a refund if you simply don't wish to renew.</p>
                    <div class="warning-badge">
                        <p><strong class="highlight-warning">Remember:</strong> Canceling your subscription does not automatically issue a refund. You must request a refund separately if you're within the refund window.</p>
                    </div>
                </div>

                <!-- 11. Changes to This Policy -->
                <div class="refund-section">
                    <h2>11. Changes to This Refund Policy</h2>
                    <p>We may update this Refund Policy from time to time to reflect changes in our practices or for legal reasons. We will notify users of material changes via email or in-app notification. The latest version will always be available on this page.</p>
                    <p>For subscriptions purchased before a policy change, the refund policy in effect at the time of purchase applies.</p>
                </div>

                <!-- 12. Contact Information -->
                <!--<div class="refund-section">-->
                <!--    <h2>12. Contact Us</h2>-->
                <!--    <div class="contact-card">-->
                <!--        <p>If you have any questions about this Refund Policy or need assistance with a refund request, please contact us:</p>-->
                <!--        <p style="margin-top: 12px;"><strong>Refund Requests:</strong> <span class="contact-email">refunds@fluentfuture.com</span></p>-->
                <!--        <p><strong>Support:</strong> <span class="contact-email">support@fluentfuture.com</span></p>-->
                <!--        <p><strong>Billing Inquiries:</strong> <span class="contact-email">billing@fluentfuture.com</span></p>-->
                <!--        <p><strong>Address:</strong> FluentFuture Inc., 548 Market Street, Suite 84993, San Francisco, CA 94104, USA</p>-->
                <!--        <p><strong>Phone:</strong> +1 (555) 123-4567</p>-->
                <!--    </div>-->
                <!--</div>-->

                <hr />

                <p style="font-size: 0.9rem; color: #64748b; text-align: center;">We value your trust and are committed to providing exceptional value. If you have any concerns about your subscription, please reach out — we're here to help you succeed in your language learning journey!</p>
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