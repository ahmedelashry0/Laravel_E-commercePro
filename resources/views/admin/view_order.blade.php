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
    <link rel="shortcut icon" href="{{asset("admin/assets/images/favicon.png")}}" />
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
        <div class="main-panel">
            <div class="content-wrapper">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <div class="div_center">
                    <h2 class="h2_font">
                        All Orders
                    </h2>
                    <div>
                        <form action="{{ route('orders.search') }}" method="get">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="search" class="form-control small-input" placeholder="Search Orders">
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive text-center">
                        <table class="table text-white mx-auto" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
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
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->product_title}}</td>
                                    <td>{{$order->qty}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>{{$order->delivery_status}}</td>
                                    <td><img src="/product/{{ $order->image }}" alt="" style="width: 100px; height: 100px"></td>
                                    <td>
                                        @if($order->delivery_status !== 'delivered')
                                            <a href="{{ url('/delivered' , $order->id) }}" class="btn btn-primary">Deliver</a>
                                        @else
                                            <button class="btn btn-success" disabled>Delivered</button>
                                        @endif
                                        <a href="{{ url('/print_pdf' , $order->id) }}" class="btn btn-secondary"> Print PDF</a>
                                        <a href="{{ url('/send_email' , $order->id) }}" class="btn btn-info"> Send Email</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
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

<script>
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            var query = $(this).val();

            $.ajax({
                url: "{{ route('orders.search') }}",
                type: "GET",
                data: {'query': query},
                success: function (data) {

                    $('tbody').html('');


                    data.forEach(function (order) {
                        var row = '<tr>' +
                            '<td>' + order.name + '</td>' +
                            '<td>' + order.email + '</td>' +
                            '<td>' + order.address + '</td>' +
                            '<td>' + order.phone + '</td>' +
                            '<td>' + order.product_title + '</td>' +
                            '<td>' + order.qty + '</td>' +
                            '<td>' + order.payment_status + '</td>' +
                            '<td>' + order.delivery_status + '</td>' +
                            '<td><img src="/product/' + order.image + '" alt="" style="width: 100px; height: 100px"></td>' +
                            '<td>' +
                            '<a href="/delivered/' + order.id + '" class="btn btn-primary">Deliver</a> ' +
                            '<a href="/print_pdf/' + order.id + '" class="btn btn-secondary">Print PDF</a> ' +
                            '<a href="/send_email/' + order.id + '" class="btn btn-info">Send Email</a>' +
                            '</td>' +
                            '</tr>';

                        $('tbody').append(row);
                    });
                }
            });
        });
    });
</script>

</body>
</html>
