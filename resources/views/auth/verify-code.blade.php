<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        /* Reset some basic styling */
        body, h1, p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #4CAF50;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .content {
            font-size: 16px;
            line-height: 1.8;
            text-align: center;
        }

        .content p {
            margin-bottom: 15px;
        }

        .verification-code {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            font-size: 22px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 15px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 25px;
            color: #777;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        /* Mobile responsiveness */
        @media (max-width: 600px) {
            .container {
                width: 90%;
                padding: 15px;
            }

            .header h1 {
                font-size: 26px;
            }

            .content {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Email Verification</h1>
        </div>

        <div class="content">
            <p>Hello {{ $user->name }},</p>
            <p>Thank you for signing up! To complete your registration, please enter the verification code below:</p>
            
            <div class="verification-code">
                {{ $verificationCode }}
            </div>
            
            <p>Enter this code in the app to verify your email.</p>
        </div>

        <div class="footer">
            <p>If you did not sign up for this account, please ignore this email.</p>
            <p>Need help? <a href="{{route('contact')  }} ">Contact support</a></p>
        </div>
    </div>

</body>
</html>
