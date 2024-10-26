<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset("admin/assets/vendors/mdi/css/materialdesignicons.min.css")}}">
    <link rel="stylesheet" href="{{asset("admin/assets/vendors/css/vendor.bundle.base.css")}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset("admin/assets/vendors/jvectormap/jquery-jvectormap.css")}}">
    <link rel="stylesheet" href="{{asset("admin/assets/vendors/flag-icon-css/css/flag-icon.min.css")}}">
    <link rel="stylesheet" href="{{asset("admin/assets/vendors/owl-carousel-2/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css")}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset("admin/assets/css/style.css")}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset("admin/assets/images/favicon.png")}}"/>
    <style type="text/css">
        .small-input {
            width: 50%;
            margin: 0 auto;
        }

        .div_center {
            text-align: center;
            margin-top: 50px;
        }

        .h2_font {
            font-size: 40px;
        }

        .input_color {
            color: black;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="h2_font div_center" >Send Email To {{ $order->email }}</h1>
                <form action="{{ url('send_user_email' , $order->id) }}" method="post">
                    @csrf
                    <div style="margin-bottom: 20px;">
                        <label> Email Greeting</label>
                        <input type="text" class="form-control text-black" name="email_greeting" id="email_greeting"
                               value="Hello,">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label> Email Subject</label>
                        <input type="text" class="form-control text-black" name="email_subject" id="email_subject"
                               value="Order Confirmation">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label> Email button name</label>
                        <input type="text" class="form-control text-black" name="email_button_name" id="email_button_name"
                               value="View Order">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label> Email url</label>
                        <input type="text" class="form-control text-black" name="email_url" id="email_url"
                               value="">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label> Email Body</label>
                        <textarea class="form-control text-white" name="email_body" id="email_body" rows="10" cols="50">Thank you for your order. Your order number is {{ $order->order_number }}. We will send you another email when your order has shipped.</textarea>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <button type="submit" class="btn btn-primary">Send Email</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset("admin/assets/vendors/js/vendor.bundle.base.js")}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset("admin/assets/vendors/chart.js/Chart.min.js")}}"></script>
<script src="{{asset("admin/assets/vendors/progressbar.js/progressbar.min.js")}}"></script>
<script src="{{asset("admin/assets/vendors/jvectormap/jquery-jvectormap.min.js")}}"></script>
<script src="{{asset("admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
<script src="{{asset("admin/assets/vendors/owl-carousel-2/owl.carousel.min.js")}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset("admin/assets/js/off-canvas.js")}}"></script>
<script src="{{asset("admin/assets/js/hoverable-collapse.js")}}"></script>
<script src="{{asset("admin/assets/js/misc.js")}}"></script>
<script src="{{asset("admin/assets/js/settings.js")}}"></script>
<script src="{{asset("admin/assets/js/todolist.js")}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset("admin/assets/js/dashboard.js")}}"></script>
<!-- End custom js for this page -->
<!-- jQuery (required for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (needed for collapse, dropdown, etc.) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>
