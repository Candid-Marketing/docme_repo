<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 300px;
            height: auto;
        }

        .content {
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        .otp {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            display: inline-block;
            margin: 20px 0;
            align-items: center;
        }

        .footer {
            font-size: 14px;
            text-align: center;
            color: #777;
            margin-top: 30px;
        }

        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>

     <!-- Favicons -->
  <link href="{{ asset('imgs/icon.png') }}" rel="icon">
  <link href="{{ asset('imgs/docme_logo.png') }}" rel="apple-touch-icon">

</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://doc-me.com.au/imgs/docme_logo.png" alt="Company Logo">

        </div>

        <div class="content">
            <p>Hello,</p>
            <p>We received a request to verify your account. Your OTP code is:</p>
            <div class="otp">
                {{ $otp }}
            </div>
            <p>Please use this code to complete your verification. The code is valid for 5 minutes.</p>
        </div>

        <div class="footer">
            <p>Thank you for using our services.</p>
            <p>If you did not request this, please ignore this email.</p>
            <p><a href="https://doc-me.com.au/">Visit our website</a></p>
        </div>
    </div>
</body>
</html>
