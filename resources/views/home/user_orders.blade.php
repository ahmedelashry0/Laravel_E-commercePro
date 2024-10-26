<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <base href="/public">
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="shortcut icon" href="{{asset("images/favicon.png")}}" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset("home/css/bootstrap.css")}}"/>
    <!-- font awesome style -->
    <link href="{{ asset("home/css/font-awesome.min.css") }}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href=" {{ asset("home/css/style.css") }}" rel="stylesheet"/>
    <!-- responsive style -->
    <link href=" {{asset("home/css/responsive.css")}}" rel="stylesheet"/>
</head>
<body>
@if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif

<div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->


    <div class="table-responsive text-center" style="margin-top: 50px; width: 100%; padding: 30px">
        <table class="table  mx-auto" style="width: 100%;">
            <thead>
            <tr>
                <th>Product Title</th>
                <th>Qty</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td><img src="/product/{{ $order->image }}" alt="" style="width: 100px; height: 100px"></td>
                    <td>
                        @if($order->delivery_status == 'cancelled')
                            <p class="text-muted">Cancelled</p>
                        @else
                            <a href="{{ url('/cancel_order' , $order->id) }}" class="btn btn-danger"> Cancel Order</a>
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>
<!-- jQery -->
<script src="{{ asset("home/js/jquery-3.4.1.min.js") }}"></script>
<!-- popper js -->
<script src="{{ asset("home/js/popper.min.js") }}"></script>
<!-- bootstrap js -->
<script src="{{ asset("home/js/bootstrap.js") }}"></script>
<!-- custom js -->
<script src="{{ asset("home/js/custom.js") }}"></script>
</body>
</html>
