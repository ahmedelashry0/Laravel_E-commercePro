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
        <table class="table mx-auto" style="width: 80%;">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php( $totalPrice = 0)
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td><img src="/product/{{ $product->image }}" alt="{{ $product->title }}"
                             style="width: 100px; height: 100px;"></td>
                    <td>
                        <a href="{{ route('product_details' , $product->id) }}" class="btn btn-primary">
                            Product details
                        </a>
                        <a onclick="return confirm('Are You sure?')" href="{{ url('/remove_cart/'.$product->id) }}"
                           class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @php($totalPrice += (float) $product->price)
{{--                @dd($product->price)--}}
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="total-price text-center" style="margin-top: 20px;">
        <h5>Total Price: ${{ $totalPrice }}</h5>
    </div>
    <div class="text-center" style="margin-top: 20px;">
        <h4 style="font-size: 25px; padding-bottom:15px ">Proceed to order</h4>
        <a href="{{ route('cashOnDelivery') }}" class="btn btn-danger">Cash On delivery</a>
        <a href="{{ url('/stripe',$totalPrice) }}" class="btn btn-danger">Pay using cards</a>
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
