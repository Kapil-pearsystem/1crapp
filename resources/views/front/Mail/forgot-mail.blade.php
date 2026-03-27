<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel='stylesheet' href="{{ url('') }}/css/stylenew.css">
</head>

<body style="font-family: Helvetica, Arial, sans-serif; margin: 0px; padding: 0px; background-color: #ffffff;">
    <table role="presentation"
      style="width: 100%; border-collapse: collapse; border: 0px; border-spacing: 0px; font-family: Arial, Helvetica, sans-serif; background-color: rgb(239, 239, 239);">
      <tbody>
        <tr>
          <td align="center" style="padding: 1rem 2rem; vertical-align: top; width: 100%;">
            <table role="presentation" style="max-width: 600px; border-collapse: collapse; border: 0px; border-spacing: 0px; text-align: left;">
              <tbody>
                <tr>
                  <td style="padding: 40px 0px 0px;">
                    <div style="text-align: left;">
                      <div style="padding-bottom: 20px;">
                        <img src="{{url('')}}/img/logo 1.png" alt="Company" style="width: 56px;">
                    </div>
                    </div>
                    <div style="padding: 20px; background-color: rgb(255, 255, 255);">
                      <div style="color: rgb(0, 0, 0); text-align: left;">
                        <h1 style="margin: 1rem 0">Forgot Your Password?</h1>
                        <p style="padding-bottom: 16px">We received a request to reset your password. Use the OTP below to verify your identity and proceed with resetting your password.</p>
                        <p style="padding-bottom: 16px"><strong style="font-size: 130%">{{ $data['otp'] }}</strong></p>
                        <p style="padding-bottom: 16px">If you didn’t request a password reset, please ignore this email.</p>
                        <p style="padding-bottom: 16px">Thanks,<br>The 1CR Team</p>
                      </div>
                    </div>
                    <div style="padding-top: 20px; color: rgb(153, 153, 153); text-align: center;">
                      {{-- <p style="padding-bottom: 16px">Made with ♥ in Paris</p> --}}
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>

</html>
