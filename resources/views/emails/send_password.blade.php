<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your New Password</title>
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
        .password {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            padding: 16px;
            margin: 20px 0;
            background-color: #f3f4f6;
            border-radius: 6px;
            color: #333;
            letter-spacing: 1px;
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
            <h1>Welcome to Menara!</h1>
        </div>
        <div class="content">
            <p style="margin-top: 0;">Hello {{ $name }},</p>
            <p>Your account has been successfully created. Below is your account password:</p>
            <div class="password">{{ $password }}</div>
            <p>Please make sure to change your password after logging in for the first time.</p>
        </div>
        <div class="footer">
            <p style="margin: 0;">&copy; 2025 Menara. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
