<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .otp-box {
            text-align: center;
            font-size: 24px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .otp-text {
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your OTP</h1>
        <div class="otp-box">
            <p class="otp-text">{{ $otp }}</p>
        </div>
        <p>Please use this OTP to complete your verification process.</p>
    </div>
</body>
</html>
