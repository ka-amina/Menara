<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Interview Scheduled</title>
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
        .details {
            margin: 20px 0;
            padding: 15px;
            background-color: #f3f4f6;
            border-radius: 6px;
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
        .button {
            display: inline-block;
            background-color: #4f46e5;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Interview Scheduled</h1>
        </div>
        <div class="content">
            <p style="margin-top: 0;">Hello {{ $candidate->first_name }} {{ $candidate->last_name }},</p>
            <p>Congratulations! You have been scheduled for an interview for the position {{$candidate->position}}</p>
            <div class="details">
                <p><strong>Date:</strong> {{ $interviewDetails['scheduled_at'] }}</p>
                <p><strong>Time:</strong> {{ $interviewDetails['start_time'] }}</p>
                <p><strong>Duration:</strong> {{ $interviewDetails['duration'] }} minutes</p>
                <p><strong>Join URL:</strong> <a href="{{ $interviewDetails['join_url'] }}">Click here to join</a></p>
            </div>
            <a href="{{ $interviewDetails['join_url'] }}" class="button">Join Meeting</a>
        </div>
        <div class="footer">
            <p style="margin: 0;">&copy; 2025 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>