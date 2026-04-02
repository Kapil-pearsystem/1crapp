<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Let's Connect Enquiry</title>
</head>

<body style="margin:0; padding:0; background-color:#f2f2f2; font-family:Arial, Helvetica, sans-serif;">

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f2f2f2;">
    <tr>
        <td align="center" style="padding:20px;">

            <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden;">
                
                <!-- HEADER -->
                <tr>
                    <td style="background:#01508f; padding:20px; text-align:center;">
                        <img src="{{ url('') }}/{{ $logo ?? 'img/1crlogo.png' }}" style="width:80px;">
                        <h2 style="color:#ffffff; margin:10px 0 0;">
                            {{ $title ?? 'Let`s Connect Enquiry' }}
                        </h2>
                    </td>
                </tr>

                <!-- BODY -->
                <tr>
                    <td style="padding:30px; color:#333;">
                        
                        <p style="font-size:16px;">Hello <strong>{{ $name }}</strong>,</p>

                        <p style="font-size:15px;">
                            {{ $celebration_text }}
                        </p>

                        @if(!empty($content))
                            <div style="margin:20px 0;">
                                {!! $content !!}
                            </div>
                        @endif

                        <!-- ENQUIRY DETAILS -->
                        <table width="100%" cellpadding="10" cellspacing="0" style="background:#f9f9f9; border-radius:5px; margin-top:20px;">
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>{{ $name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>{{ $email }}</td>
                            </tr>

                            @if(!empty($phone))
                            <tr>
                                <td><strong>Phone:</strong></td>
                                <td>{{ $phone }}</td>
                            </tr>
                            @endif

                            @if(!empty($user_message))
                            <tr>
                                <td><strong>Message:</strong></td>
                                <td>{{ $user_message }}</td>
                            </tr>
                            @endif
                        </table>

                        <p style="margin-top:30px;">
                            Thanks,<br>
                            <strong>1CR Team</strong>
                        </p>

                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td style="background:#f5f5f5; text-align:center; padding:15px; font-size:12px; color:#999;">
                        © {{ date('Y') }} 1CR APP. All rights reserved.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>