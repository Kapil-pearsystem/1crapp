<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Inquiry</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .email-container {
            width: 100%;
            padding: 30px 0;
            background-color: #f5f5f5;
        }

        .email-content {
            max-width: 650px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        .email-header {
            background: linear-gradient(135deg, #01508f, #003b6f);
            color: #ffffff;
            text-align: center;
            padding: 10px 15px;
        }

        .email-header img {
            max-width: 80px;
            margin-bottom: 5px;
        }

        .email-header h1 {
            font-size: 20px;
            margin: 5px 0 0;
            font-weight: 600;
        }

        .email-body {
            padding: 30px;
            color: #333;
        }

        .email-body p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .lead-details {
            background-color: #eef5fb;
            border-left: 5px solid #01508f;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .lead-details p {
            margin: 5px 0;
            font-size: 15px;
        }

        .lead-details strong {
            color: #01508f;
        }

        .signature {
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 15px;
            font-size: 14px;
            color: #555;
        }

        .signature p {
            margin: 5px 0;
            line-height: 1.5;
        }

        .signature i {
            color: #01508f;
            margin-right: 10px;
        }

        .email-footer {
            background-color: #f5f5f5;
            color: #666;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }

        .email-footer a {
            color: #01508f;
            text-decoration: none;
        }
        .cta-btn {
            display: inline-block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #014a85;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            text-align: center;
        }

        .cta-btn:hover {
            background-color: #01508f;
            color: #fff;
        }

        .cta-btn-container {
            text-align: center; /* Centers the button container */
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-content">
            <!-- Header Section -->
            <div class="email-header">

                @if($data['mail_logo'])
                    <img src="{{ $data['mail_logo'] }}" alt="1CR Logo">
                @else
                    <img src="{{ WEB_BASE_URL }}img/1crlogo.png" alt="1CR Logo">
                @endif
                @if($data['mail_title'])
                    <h1>{{ $data['mail_title'] }}</h1>
                @else
                    <h1>Welcome to 1CR APP!</h1>
                @endif
            </div>

            <!-- Body Section -->
            <div class="email-body">
                <p>Hi <strong>{{ $data['name'] }},</strong></p>
                @if(!is_null($data) && !is_null($data['mail']))
                    @if($data['mail']->celebration_title)
                        <p>{{ $data['mail']->celebration_title }}</p>
                    @endif
                    <!-- <p>Thank you for reaching out to us! We have successfully received your inquiry. Below are the details you provided:</p> -->
                @endif
                <!-- <div class="lead-details">
                    <p><strong>Name:</strong> {{ $data['name'] }}</p>
                    <p><strong>Email:</strong> {{ $data['email'] }}</p>
                    <p><strong>Contact Number:</strong> +91 {{ $data['phone'] }}</p>
                    <p><strong>CDO:</strong> {{ $data['cdo'] }}</p>
                    <p><strong>Product & Service:</strong> {{ $data['ps_name'] }}</p>
                    <p><strong>Message:</strong> {{ $data['message'] }}</p>
                </div> -->

                @if(!is_null($data) && !is_null($data['mail']))
                    {!! $data['mail']->content !!}
                    @if($data['mail']->cta_visible == 1)
                        <!-- <a href="{{ $data['mail']->cta_link }}" class="cta-btn" target="_blank">{{ $data['mail']->cta_title }}</a> -->
                        <div class="cta-btn-container">
                            <a href="{{ $data['mail']->cta_link }}" class="cta-btn" target="_blank">{{ $data['mail']->cta_title }}</a>
                        </div>
                    @endif

                    @if($data['mail']->cta_text)
                        <p></p>
                        <p>{{ $data['mail']->cta_text }}</p>
                    @endif
                    @if($data['mail']->signature_visible == 1)
                    <p></p>
                    <p>Best regards,</p>
                    <!-- Signature Section -->
                    <div class="signature">
                        @if($data['mail']->sign_name)
                        <p>👤 <strong> {{ $data['mail']->sign_name }}</strong></p>
                        @endif
                        @if($data['mail']->sign_web)
                        <p>🌐 <a href="{{ $data['mail']->sign_web }}"> {{ $data['mail']->sign_web }}</a></p>
                        @endif
                        @if($data['mail']->sign_email)
                        <p>📨 {{ $data['mail']->sign_email }}</p>
                        @endif
                        @if($data['mail']->sign_phone)
                        <p>☎ +91 {{ $data['mail']->sign_phone }}</p>
                        @endif
                    </div>
                    @endif
                    <!-- PS Content -->
                     <br>
                    @if($data['mail']->ps_visible == 1)
                        <p><strong>PS:</strong> {{ $data['mail']->ps_title }} @if($data['mail']->ps_link)<a href="{{ $data['mail']->ps_link??'#' }}" target="_blank">Click Here...</a>@endif</p>
                    @endif
                @endif
            </div>

            <!-- Footer Section -->
            <div class="email-footer">
                <p>&copy; 2024 1CRAPP. All rights reserved.</p>
                <p><a href="{{ WEB_BASE_URL }}">Visit Our Website</a></p>
            </div>
        </div>
    </div>
</body>

</html>
