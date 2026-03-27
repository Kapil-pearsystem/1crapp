<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agent Registration Successful</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .email-container {
            width: 100%;
            padding: 2rem 0;
            background-color: #f5f5f5;
        }

        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            padding: 20px;
            background: linear-gradient(135deg, #01508f 0%, #003b6f 100%);
            text-align: center;
        }

        .email-header img {
            width: 100px;
            height: auto;
        }

        .email-header h1 {
            color: #ffffff;
            font-size: 26px;
            margin: 10px 0 0;
        }

        .email-body {
            padding: 30px;
            color: #333333;
        }

        .email-body h2 {
            color: #01508f;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .details-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .details-box p {
            margin: 6px 0;
        }

        .login-btn {
            display: inline-block;
            padding: 10px 18px;
            background-color: #01508f;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }

        .email-footer {
            padding: 20px;
            text-align: center;
            color: #999999;
            font-size: 14px;
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
<div class="email-container">
    <div class="email-content">

        <div class="email-header">
            <img src="{{ url('') }}/img/1crlogo.png" alt="1CR Logo">
            <h1>Welcome to 1CR APP</h1>
        </div>

        <div class="email-body">
            <p>Hello <strong>{{ $data['name'] }}</strong>,</p>

            <p>
                Congratulations! You have successfully registered as an <strong>Agent</strong> on the
                <strong>1CR APP</strong>.
            </p>

            <h2>Your Subscription Details</h2>
            <div class="details-box">
                <p><strong>Plan Name:</strong> {{ $data['plan_name'] }}</p>
                <p><strong>Plan Type:</strong> {{ $data['plan_type'] }}</p>
                <p><strong>Amount Paid:</strong> ₹{{ $data['amount'] }}</p>
                <p><strong>Valid Upto:</strong> {{ $data['valid_upto'] }}</p>
            </div>

            <h2>Your Login Credentials</h2>
            <div class="details-box">
                <p><strong>Username:</strong> {{ $data['email'] }}</p>
                <p><strong>Password:</strong> {{ $data['password'] }}</p>
            </div>

            <p>
                You can now log in to your agent dashboard using the button below:
            </p>

            <a href="{{ $data['login_path'] }}" class="login-btn">Login to Your Account</a>

            <p style="margin-top:20px;">
                If you have any questions or need help, please contact our support team.
            </p>

            <p>
                Best Regards,<br>
                <strong>Team 1CR APP</strong>
            </p>
        </div>

        <div class="email-footer">
            <p>&copy; {{ date('Y') }} 1CR APP. All rights reserved.</p>
        </div>

    </div>
</div>
</body>
</html>
