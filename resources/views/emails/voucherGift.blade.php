<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher Discount Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .voucher-details {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .voucher-label {
            font-weight: bold;
        }

        .voucher-code {
            font-size: 24px;
            margin-top: 10px;
            margin-bottom: 20px;
            text-align: center;
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Gift voucher Code</h1>
        <div id="voucher-details" class="voucher-details">
            @if ($activity)
                <img src="{{ $activity->imagePath }}" alt="null" style="width:50%">
                <p><span class="voucher-label">Activity ID:</span> {{ $voucher->activity_id }}</p>
                <p><span class="voucher-label">Activity Name:</span> {{ $activity->name }}</p>
                <p><span class="voucher-label">Activity Cancellation Duration:</span>
                    {{ $activity->cancellation_duration }}
                </p>
                <p><span class="voucher-label">Activity Duration:</span> {{ $activity->duration }}</p>
                <p><span class="voucher-label">Activity What's Not Included:</span> <span
                        id="whats-not-included">{!! $activity->whats_not_included !!}</span></p>
                <p><span class="voucher-label">Activity What's Included:</span> <span
                        id="whats-included">{!! $activity->whats_included !!}</span></p>
                <p><span class="voucher-label">Activity Highlights:</span> <span
                        id="highlights">{!! $activity->highlights !!}</span></p>
                <p><span class="voucher-label">Activity Itinerary:</span> <span
                        id="itinerary">{!! $activity->itinerary !!}</span></p>
            @endif
            <p><span class="voucher-label">Recipient Email:</span> {{ $voucher->recipient_email }}</p>
            <p><span class="voucher-label">Discount Price:</span> {{ $voucher->discount_price }}</p>
            <p><span class="voucher-label">Valid Date:</span> {{ $voucher->valid_date }}</p>
            @if ($voucher->description != null)
                <p><span class="voucher-label">Description:</span> {{ $voucher->description }}</p>
            @endif
            <p class="voucher-code"><span style="color:black">VOUCHER CODE:</span> {{ $voucher->code }}</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('whats-not-included').textContent = document.getElementById(
                'whats-not-included').innerText;
            document.getElementById('whats-included').textContent = document.getElementById('whats-included')
                .innerText;
            document.getElementById('highlights').textContent = document.getElementById('highlights').innerText;
            document.getElementById('itinerary').textContent = document.getElementById('itinerary').innerText;
        });
    </script>
</body>

</html>
