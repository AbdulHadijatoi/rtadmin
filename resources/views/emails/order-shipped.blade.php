<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h1 {
            color: #333;
        }

        p {
            margin: 10px 0;
        }

        .highlight {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Confirmation</h1>
        <p>Booking Details:</p>
        <p><span class="highlight">First Name:</span> {{ $order->first_name }}</p>
        <p><span class="highlight">Last Name:</span> {{ $order->last_name }}</p>
        <p><span class="highlight">Email:</span> {{ $order->email }}</p>
        <p><span class="highlight">Booking Reference Number:</span> {{ $order->reference_id }}</p>
        <p><span class="highlight">Activity Name:</span> {{ $order->activity_name }}</p>
        <p><span class="highlight">Title:</span> {{ $order->title }}</p>
        <p><span class="highlight">Nationality:</span> {{ $order->nationality }}</p>
        <p><span class="highlight">Phone Number:</span> {{ $order->phone }}</p>
        <p><span class="highlight">Date:</span> {{ $order->date }}</p>
        <p><span class="highlight">Status:</span> {{ $order->status }}</p>
        <p><span class="highlight">Total Amount:</span> {{ $order->total_amount }}</p>
        <p><span class="highlight">Pickup Location:</span> {{ $order->pickup_location }}</p>
        <p><span class="highlight">Note:</span> {{ $order->note }}</p>

        <div class="container mt-2">
            <div class="row">
                <h4 class="display-3">PACKAGES</h4>
                @forelse ($order->orderItems as $item)
                    <div class="card mb-3  shadow bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Package: {{ $item->package_title }}</h5>
                            <p class="card-text">Adults: {{ $item->adult }}</p>
                            <p class="card-text">Children: {{ $item->child }}</p>
                            <p class="card-text">Infants: {{ $item->infant }}</p>
                            <p class="card-text">Total Price: {{ $item->total_price }}</p>
                            <p class="card-text">Package Category: {{ $item->package_category }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No items found.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <p>
            <a href="{{ route('order.pdf', $order->id) }}" class="btn btn-primary">Download PDF</a>
        </p>
    </div>
