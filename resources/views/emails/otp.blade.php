<!DOCTYPE html>
<html>
<head>
    <style>
        .container {
            font-family: Arial, sans-serif;
            padding: 20px;
            color: #333;
            max-width: 600px;
            margin: auto;
            border: 1px solid #eee;
            border-radius: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .otp-code {
            font-size: 32px;
            font-weight: bold;
            color: #4f46e5;
            text-align: center;
            letter-spacing: 5px;
            padding: 20px;
            background: #f3f4f6;
            border-radius: 8px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Fluent Future</h1>
            <p>Your Verification Code</p>
        </div>
        <p>Hello,</p>
        <p>Thank you for joining Fluent Future. Please use the following code to verify your email address. This code will expire in 10 minutes.</p>
        <div class="otp-code">{{ $otp }}</div>
        <p>If you did not request this code, please ignore this email.</p>
        <div class="footer">
            &copy; {{ date('Y') }} Fluent Future. All rights reserved.
        </div>
    </div>
</body>
</html>
