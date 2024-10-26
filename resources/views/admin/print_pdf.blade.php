<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<h1 class="text-center">Order Details</h1>

<table>
    <tr>
        <th>Name</th>
        <td>{{ $order->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $order->email }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $order->address }}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{ $order->phone }}</td>
    </tr>
    <tr>
        <th>Product Title</th>
        <td>{{ $order->product_title }}</td>
    </tr>
    <tr>
        <th>Quantity</th>
        <td>{{ $order->quantity }}</td>
    </tr>
    <tr>
        <th>Payment Status</th>
        <td>{{ $order->payment_status }}</td>
    </tr>
    <tr>
        <th>Delivery Status</th>
        <td>{{ $order->delivery_status }}</td>
    </tr>
    <tr>
        <th>Image</th>
        <td><img src="{{ public_path('product/'.$order->image) }}" alt="Product Image"></td>
    </tr>
    <tr>
        <th>Total Price</th>
        <td>${{ $order->price }}</td>
    </tr>
</table>
</body>
</html>
