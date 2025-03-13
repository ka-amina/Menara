<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reset Your Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #4f46e5;
            color: white;
            padding: 24px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 32px 24px;
        }
        .token {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            padding: 16px;
            margin: 20px 0;
            background-color: #f3f4f6;
            border-radius: 6px;
            color: #4f46e5;
            letter-spacing: 2px;
        }
        .footer {
            text-align: center;
            padding: 16px;
            color: #6b7280;
            font-size: 14px;
            background-color: #f9fafb;
            border-top: 1px solid #e5e7eb;
        }
        p {
            color: #4b5563;
            font-size: 16px;
            line-height: 1.5;
            margin-top: 16px;
            margin-bottom: 16px;
        }
        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Password Reset</h1>
        </div>
        <div class="content">
            <p style="margin-top: 0;">Hello {{ $user->name }},</p>
            <p>You are receiving this email because we received a password reset request for your account.</p>
            <p>Your password reset code is:</p>
            <div class="token">{{ $token }}</div>
            <p>This password reset code will expire in <span style="font-weight: 600; color: #374151;">60 minutes</span>.</p>
            <p>If you did not request a password reset, no further action is required.</p>
        </div>
        <div class="footer">
            <p style="margin: 0;">&copy; 2025 Menara. All rights reserved.</p>
        </div>
    </div>
</body>
</html>