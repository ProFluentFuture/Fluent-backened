<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Privacy Policy | FluentFuture - AI Language Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ---------- RESET & GLOBAL (Light Theme - Matching Main Website) ---------- */
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
        /* ---------- PRIVACY POLICY CONTAINER (Light Theme) ---------- */
        .privacy-wrapper {
            padding: 40px 20px 60px;
            position: relative;
        }

       

        .privacy-container {
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
        .policy-header {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            padding: 2rem 2rem 1.5rem 2rem;
            border-bottom: 2px solid var(--primary);
            position: relative;
        }

        .policy-header h1 {
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
        .policy-content {
            padding: 2rem 2rem 1.5rem 2rem;
        }

        /* section styling */
        .policy-section {
            margin-bottom: 2rem;
            scroll-margin-top: 1rem;
        }

        .policy-section h2 {
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

        .policy-section p, .policy-section li {
            color: var(--text-muted);
            font-size: 1rem;
            margin-bottom: 0.6rem;
        }

        .policy-section ul, .policy-section ol {
            margin: 0.75rem 0 0.75rem 1.8rem;
        }

        .policy-section li {
            margin-bottom: 0.4rem;
        }

        strong, .accent-text {
            color: var(--primary);
            font-weight: 600;
        }

        .highlight-cyan {
            color: var(--accent);
        }

        .highlight-mint {
            color: #10b981;
        }

        .info-badge {
            background: var(--surface);
            border-left: 3px solid #f59e0b;
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
            
            .policy-header h1 {
                font-size: 1.8rem;
            }
            
            .policy-content {
                padding: 1.5rem;
            }
            
            .policy-section h2 {
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
        }

        @media (max-width: 480px) {
            .policy-header {
                padding: 1.5rem;
            }
            
            .policy-section h2 {
                font-size: 1.2rem;
            }
            
            .info-badge {
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
                 <a href="/" style="color: var(--primary);">Home</a>
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

    <!-- Privacy Policy Content (Light Theme) -->
    <div class="privacy-wrapper">
        <div class="privacy-container">
            <div class="policy-header">
                <h1>Privacy Policy</h1>
                <div class="last-updated">Last Updated: March 25, 2026</div>
                <p style="color: #64748b; margin-top: 1rem; max-width: 85%;">Your privacy matters at <strong class="accent-text">FluentFuture</strong>. This policy describes how we handle your data in compliance with Google Play Store requirements, including data safety, transparency, and user rights.</p>
            </div>

            <div class="policy-content">
                <!-- 1. Information Collection -->
                <div class="policy-section" id="info-collect">
                    <h2>1. Information We Collect</h2>
                    <p>To provide you with a personalized English learning experience, FluentFuture collects only essential data with your consent. The categories are:</p>
                    <ul>
                        <li><strong>Account & Profile Data</strong> – Name, email address (if you sign up via email, Google, or Apple), profile picture (optional) and language preferences.</li>
                        <li><strong>Learning Progress & Usage Data</strong> – Quiz results, vocabulary mastery, lesson completion, time spent, preferred topics, and in-app interactions to personalize your learning path.</li>
                        <li><strong>Device & Technical Information</strong> – Device model, operating system version, app version, unique installation ID (resettable), and crash logs to improve stability.</li>
                        <li><strong>Optional Permissions</strong> – Microphone (for pronunciation exercises) and notifications (for learning reminders). These can be revoked anytime in system settings.</li>
                        <li><strong>No Sensitive Data</strong> – We do not collect financial data, precise geolocation, health info, or personal communications beyond app usage.</li>
                    </ul>
                    <div class="info-badge">
                        <p><strong class="highlight-mint">✓ Play Store Data Safety</strong> — Our app follows Google's "data safety" section guidelines. We only share anonymized analytics to improve features and never sell personal information.</p>
                    </div>
                </div>

                <!-- 2. How we use data -->
                <div class="policy-section">
                    <h2>2. How We Use Your Information</h2>
                    <p>We process your data only for legitimate educational and operational purposes, including:</p>
                    <ul>
                        <li>Delivering personalized English lessons and tracking your fluency progress.</li>
                        <li>Improving app performance, fixing bugs, and optimizing user experience.</li>
                        <li>Sending occasional reminders or motivational messages (optional, can be disabled).</li>
                        <li>Ensuring security, preventing fraud, and complying with legal obligations.</li>
                        <li>Providing customer support and responding to your inquiries.</li>
                    </ul>
                    <p>We do <strong>not</strong> use your data for any automated decision-making that significantly affects you, nor do we engage in cross-context behavioral advertising without consent.</p>
                </div>

                <!-- 3. Data Sharing & Third-Party Services -->
                <div class="policy-section">
                    <h2>3. Data Sharing & Third-Party Services</h2>
                    <p>FluentFuture integrates with trusted third-party services to enhance functionality. All partners comply with strict confidentiality and data protection standards:</p>
                    <ul>
                        <li><strong>Analytics:</strong> Firebase Analytics / Google Analytics for Firebase – collects aggregated usage data to understand feature engagement. Data is anonymized and never tied to advertising profiles.</li>
                        <li><strong>Crash Reporting:</strong> Firebase Crashlytics – helps us fix technical issues. May collect stack traces and device info, but no personally identifiable information.</li>
                        <li><strong>Cloud Storage & Authentication:</strong> Firebase Auth & Firestore – to securely store user progress and sync across devices.</li>
                        <li><strong>AdMob (optional ads):</strong> If you use the free version, limited advertising ID may be used for non-personalized ads, respecting child-directed treatment. You may opt out of ad personalization anytime.</li>
                    </ul>
                    <p>We never sell, rent, or trade your personal information. Any sharing is solely to operate the app or as required by law.</p>
                </div>

                <!-- 4. Data Security & Storage -->
                <div class="policy-section">
                    <h2>4. Data Security & Retention</h2>
                    <p>We implement robust security measures including encryption in transit (TLS 1.3), encrypted database storage, and restricted access controls. Your data is retained as long as your account is active or as needed to provide services. You may request deletion of your account and associated data at any time, after which we delete or anonymize personal information within 30 days, unless retention is required for legal compliance.</p>
                </div>

                <!-- 5. Children's Privacy -->
                <div class="policy-section">
                    <h2>5. Children's Privacy</h2>
                    <p>FluentFuture is designed for learners of all ages, but we take special care to comply with COPPA, GDPR-K, and Google Play's Families Policy. We do not knowingly collect personal information from children under 13 without verified parental consent. If we discover that a child under 13 has provided personal information without consent, we will delete it immediately. Parents/guardians may contact us to review or delete their child's data. Our app does not include behavioral advertising directed to children, and all third-party services are configured with child-appropriate settings.</p>
                </div>

                <!-- 6. Your Rights & Control -->
                <div class="policy-section">
                    <h2>6. Your Privacy Rights</h2>
                    <p>Depending on your location (EEA, UK, Brazil, California, etc.), you may have the following rights:</p>
                    <ul>
                        <li><strong>Right to Access:</strong> Request a copy of your personal data.</li>
                        <li><strong>Right to Rectification:</strong> Correct inaccurate or incomplete information.</li>
                        <li><strong>Right to Deletion:</strong> Request deletion of your account and data.</li>
                        <li><strong>Right to Data Portability:</strong> Receive your data in a structured format.</li>
                        <li><strong>Right to Opt-Out:</strong> Disable analytics or marketing communications anytime.</li>
                    </ul>
                    <p>To exercise your rights, use the contact details below. We will respond within 30 days. You may also manage your in-app privacy settings directly from the app's Settings → Privacy Center.</p>
                </div>

                <!-- 7. International Transfers -->
                <div class="policy-section">
                    <h2>7. International Data Transfers</h2>
                    <p>FluentFuture operates globally. Your data may be stored and processed in servers located in the United States or other countries where our service providers operate. We ensure appropriate safeguards such as Standard Contractual Clauses (SCCs) for data transfers from the EU/UK, in compliance with applicable data protection laws.</p>
                </div>

                <!-- 8. Updates to Privacy Policy -->
                <div class="policy-section">
                    <h2>8. Changes to This Privacy Policy</h2>
                    <p>We may update this policy occasionally to reflect new features, legal changes, or Play Store requirements. We will notify you of significant changes via in-app notice or email (if available) at least 30 days before the effective date. The latest version will always be available within the app and on this page. Continued use of FluentFuture after changes constitutes acceptance of the updated policy.</p>
                </div>

                <!-- 9. Contact Us -->
                <div class="policy-section">
                    <h2>9. Contact Us</h2>
                    <div class="contact-card">
                        <p>If you have any questions about this Privacy Policy or your data, please reach out to our Data Protection Officer:</p>
                        <p style="margin-top: 12px;"><strong>Email:</strong> <span class="contact-email">privacy@fluentfuture.com</span></p>
                        <p><strong>Address:</strong> FluentFuture Inc., 548 Market Street, Suite 84993, San Francisco, CA 94104, USA</p>
                        <p><strong>Support:</strong> <a href="#">help@fluentfuture.com</a></p>
                    </div>
                </div>

                <!-- 10. Account Deletion -->
                <div class="policy-section">
                    <h2>10. Account Deletion & Data Removal</h2>
                    <p>You can request complete deletion of your FluentFuture account and all associated data by emailing <strong>privacy@fluentfuture.com</strong> or using the "Delete Account" option in the app profile settings. Upon verification, we will permanently remove your personal data within 30 days, except for anonymized usage statistics that cannot identify you.</p>
                    <div class="info-badge">
                        <p><strong class="highlight-cyan">✓ Google Play Store Compliance:</strong> This Privacy Policy explicitly covers data collection purposes, third-party sharing, security practices, children's privacy, and user data deletion — meeting the requirements for "Data safety section" and "User Data Policy."</p>
                    </div>
                </div>

                <hr />

                <p style="font-size: 0.9rem; color: #64748b; text-align: center;">By using FluentFuture, you acknowledge that you have read and understood this Privacy Policy. Your trust is our top priority — we design every feature with privacy by default.</p>
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
                    <a href="/">Help Center</a>
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