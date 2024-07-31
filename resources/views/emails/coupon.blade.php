<!DOCTYPE html>
<html>
<head>
    <title>Coupon Code</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: red;
        }
        h2 {
            color: red;
        }
        .coupon-details {
            display: inline-block;
            text-align: left;
            margin: 0 auto;
        }
        .coupon-details p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Congratulations</h1>
    <div class="coupon-details">
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Message:</strong> {{ $description }}</p>
        <p><strong>Amount:</strong> {{ $amount }}</p>
        <h2>Voucher Code: {{ $voucherCode }}</h2>
    </div>
</body>
</html>
