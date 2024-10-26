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
<div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->

    <div class="col-sm-6 col-md-4 col-lg-4 mx-auto" style="padding: 30px;">
        <div class="card shadow-sm border-0">
            <div class="img-box text-center p-4">
                <img src="/product/{{ $product->image }}" alt="{{ $product->title }}" class="img-fluid rounded" style="width: 90%;">
            </div>
            <div class="card-body text-center">
                <h5 class="card-title">{{ $product->title }}</h5>

                @if($product->discount_price)
                    <h6 class="text-success">
                        Discount Price: ${{ number_format($product->discount_price, 2) }}
                    </h6>
                    <h6 class="text-muted">
                        <del>
                            Price: ${{ number_format($product->price, 2) }}
                        </del>
                    </h6>
                @else
                    <h6 class="text-primary">
                        Price: ${{ number_format($product->price, 2) }}
                    </h6>
                @endif

                <p class="card-text"><strong>Category:</strong> {{ $product->category->category_name }}</p>
                <p class="card-text"><strong>Details:</strong> {{ $product->description }}</p>
                <p class="card-text"><strong>In Stock:</strong> {{ $product->quantity }}</p>

                <form action="{{ route('add_to-cart', $product->id) }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-3">
                            <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 100%;">
                        </div>
                        <div class="col-md-6">
                            <input type="submit" value="Add to Cart" class="btn btn-primary w-100">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



<!-- footer start -->
@include('home.footer')
<!-- footer end -->
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
