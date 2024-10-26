<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
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
                        Add product
                    </h2>
                    <form action="{{ url('/add_product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-center ">
                            <input type="text" class="form-control input_color small-input" name="title" placeholder="Write Product name" required>
                        </div>
                        <div class="form-group text-center">
                            <input type="text" class="form-control input_color small-input" name="description" placeholder="Write Product description" >
                        </div>
                        <div class="form-group text-center">
                            <input type="text" class="form-control input_color small-input" name="price" placeholder="Write Product price" required>
                        </div>
                        <div class="form-group text-center">
                            <input type="text" class="form-control input_color small-input" name="quantity" placeholder="Write Product quantity" required>
                        </div>
                        <div class="form-group text-center">
                            <select name="category_id" class="form-control input_color small-input" required>
                                <option value="">Select Category</option>
                                 @foreach($categories as $category)
                                 <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <input type="number" class="form-control input_color small-input" name="discount_price" placeholder="Discount price">
                        </div>
                        <div class="form-group text-center">
                            <input type="file" class="form-control input_color small-input" name="image" required>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary" name="submit" value="Add Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
<script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="admin/assets/js/off-canvas.js"></script>
<script src="admin/assets/js/hoverable-collapse.js"></script>
<script src="admin/assets/js/misc.js"></script>
<script src="admin/assets/js/settings.js"></script>
<script src="admin/assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="admin/assets/js/dashboard.js"></script>
<!-- End custom js for this page -->
<!-- jQuery (required for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (needed for collapse, dropdown, etc.) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>
