<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Your Password — Grimore</title>
    <style>
        
        
        * {
            font-family: 'DM Sans', Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            background-color: #0d0d0f;
            font-family: 'DM Sans', Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }


        .email-wrapper {
            background-color: #0d0d0f;
            padding: 48px 16px;
        }


        .email-container {
            max-width: 560px;
            margin: 0 auto;
        }


        /* Header */
        .header {
            text-align: center;
            padding-bottom: 40px;
        }


        .brand {
            font-family: 'DM Sans', Arial, sans-serif;
            font-size: 28px;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #c9a96e;
        }


        .brand-tagline {
            font-size: 11px;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: #5a5a6e;
            margin-top: 4px;
        }


        /* Card */
        .card {
            background: linear-gradient(160deg, #18181f 0%, #13131a 100%);
            border: 1px solid #2a2a38;
            border-radius: 16px;
            overflow: hidden;
        }


        /* Card top accent */
        .card-accent {
            height: 3px;
            background: linear-gradient(90deg, #c9a96e 0%, #e8c98a 50%, #c9a96e 100%);
        }


        .card-body {
            padding: 48px 48px 40px;
        }


        /* Icon */
        .icon-wrap {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background: rgba(201, 169, 110, 0.08);
            border: 1px solid rgba(201, 169, 110, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 28px;
        }
        
        
        .icon-wrap img {
            width: 64px;
            height: 64px;
            border-radius: 16px;
        }


        /* Heading */
        .heading {
            font-family: 'DM Sans', Arial, sans-serif;
            font-size: 30px;
            font-weight: 600;
            color: #f0ece4;
            line-height: 1.2;
            margin-bottom: 16px;
        }


        /* Description */
        .description {
            font-size: 15px;
            line-height: 1.7;
            color: #8a8a9e;
            margin-bottom: 12px;
        }


        .description:last-of-type {
            margin-bottom: 36px;
        }


        /* Divider */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #2a2a38 30%, #2a2a38 70%, transparent);
            margin-bottom: 36px;
        }


        /* Button */
        .btn-wrap {
            text-align: center;
            margin-bottom: 36px;
        }


        .reset-btn {
            display: inline-block;
            background: linear-gradient(135deg, #c9a96e 0%, #e8c98a 100%);
            color: #0d0d0f;
            text-decoration: none;
            font-family: 'DM Sans', Arial, sans-serif;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 15px 40px;
            border-radius: 8px;
        }


        /* Expiry note */
        .expiry-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: rgba(201, 169, 110, 0.05);
            border: 1px solid rgba(201, 169, 110, 0.12);
            border-radius: 8px;
            padding: 14px 16px;
            margin-bottom: 32px;
        }


        .expiry-note svg {
            flex-shrink: 0;
            margin-top: 1px;
            width: 15px;
            height: 15px;
        }


        .expiry-text {
            font-size: 13px;
            color: #7a7a8e;
            line-height: 1.5;
        }


        .expiry-text strong {
            color: #c9a96e;
            font-weight: 500;
        }


        /* Footer divider */
        .footer-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #2a2a38 30%, #2a2a38 70%, transparent);
            margin-bottom: 24px;
        }


        /* Safety notice */
        .safety-notice {
            font-size: 13px;
            color: #5a5a6e;
            line-height: 1.6;
            text-align: center;
        }


        /* Footer */
        .footer {
            text-align: center;
            padding-top: 32px;
        }


        .footer-brand {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #3a3a4a;
            margin-bottom: 8px;
        }


        .footer-text {
            font-size: 12px;
            color: #3a3a4a;
            line-height: 1.6;
        }


        .footer-text a {
            color: #5a5a6e;
            text-decoration: none;
        }


        /* ── Mobile ── */
        @media (max-width: 560px) {
            
            .card-body {
                padding: 36px 28px 32px;
            }

            .heading {
                font-size: 26px;
            }

        }


    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">

            <!-- Header -->
            <div class="header">
                <div class="brand">Grimore</div>
                <div class="brand-tagline">Your secure workspace</div>
            </div>

            <!-- Card -->
            <div class="card">
                <div class="card-accent"></div>

                <div class="card-body">

                    <!-- Icon -->
                    <div class="icon-wrap">
                        <img src="https://c8.alamy.com/comp/2AC5AD9/login-icon-in-flat-style-password-access-vector-illustration-on-white-isolated-background-padlock-entry-business-concept-2AC5AD9.jpg"  style="display:block;">
                    </div>

                    <!-- Heading -->
                    <h1 class="heading">Forgot your<br>password?</h1>

                    <!-- Body copy -->
                    <p class="description">
                        No problem. We received a request to reset the password for your Grimore account. Click the button below and you'll be back in within moments.
                    </p>
                    <p class="description">
                        If you didn't make this request, you can safely ignore this email — your password will not change.
                    </p>

                    <div class="divider"></div>

                    <!-- CTA Button -->
                    <div class="btn-wrap">
                        <a href="{{ route('password.reset.form', ['token' => $token]) }}" class="reset-btn">
                            Reset Password
                        </a>
                    </div>

                    <!-- Expiry Warning -->
                    <div class="expiry-note">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="9" stroke="#c9a96e" stroke-width="1.5"/>
                            <path d="M12 7v5l3 3" stroke="#c9a96e" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <p class="expiry-text">
                            This link will expire in <strong>60 minutes</strong>. After that, you'll need to request a new one.
                        </p>
                    </div>

                    <div class="footer-divider"></div>

                    <!-- Safety notice -->
                    <p class="safety-notice">
                        For security, this link can only be used once and is tied to your account. Never share this email with anyone.
                    </p>

                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="footer-brand">Grimore</div>
                <p class="footer-text">
                    You're receiving this because a password reset was requested for your account.<br>
                    Questions? <a href="mailto:support@grimore.com">support@grimore.com</a>
                </p>
            </div>

        </div>
    </div>
</body>
</html>