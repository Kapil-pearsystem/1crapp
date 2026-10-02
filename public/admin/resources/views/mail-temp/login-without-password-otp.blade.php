<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>1CRAPP OTP Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }
        .email-container {
            width: 100%;
            padding: 30px 0;
            background: #f5f5f5;
        }
        .email-content {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #01508f 0%, #003b6f 100%);
            padding: 30px;
            text-align: center;
        }
        .email-header img {
            width: 80px;
        }
        .email-header h1 {
            color: #fff;
            margin-top: 10px;
            font-size: 26px;
        }
        .email-body {
            padding: 30px;
            color: #333;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.7;
        }
        .otp-box {
            background: #f4f4f4;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin: 25px 0;
        }
        .otp-box h2 {
            margin: 0;
            color: #01508f;
            font-size: 32px;
            letter-spacing: 5px;
        }
        .email-footer {
            background: #f7f7f7;
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-content">
            <div class="email-header">
                <img src="{{ asset('admin/images/logo.png') }}" alt="1CRAPP">
                <h1>1CRAPP</h1>
            </div>
            <div class="email-body">
                <p>Hello {{ $data['name'] ?? 'User' }},</p>
                <p>
                    We received a request to log in to your account using OTP verification.
                    Please use the following One Time Password (OTP) to continue.
                </p>
                <div class="otp-box">
                    <h2>{{ $data['otp'] }}</h2>
                </div>
                <p>
                    This OTP is valid for 10 minutes. Please do not share this code with anyone.
                </p>
                <p>
                    If you did not request this OTP, please ignore this email.
                </p>
                <p>
                    Regards,<br>
                    <strong>1CRAPP Team</strong>
                </p>
            </div>
            <div class="email-footer">
                © {{ date('Y') }} 1CRAPP. All Rights Reserved.<br>
                Designed & Developed By Digitalramjee.
            </div>
        </div>
    </div>
</body>
</html>