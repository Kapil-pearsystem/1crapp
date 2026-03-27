<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $data['subject'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
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
            width: 80px;
            height: auto;
        }

        .email-header h1 {
            color: #ffffff;
            font-size: 24px;
            margin: 10px 0 0;
        }

        .email-body {
            padding: 30px;
            color: #333333;
        }

        .email-body h1 {
            color: #01508f;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
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
                <img src="{{url('')}}/profile/profile-5579462231726234610.png" alt="1CR Logo">
                <h1>{{ $data['subject'] }}</h1>
            </div>
            <div class="email-body">
             {!! $data['content'] !!}
            </div>
            <div class="email-footer">
                <p>&copy; 2024 1CR APP. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>

</html>
