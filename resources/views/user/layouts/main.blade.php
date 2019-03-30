<?php
$appContent = \App\Models\AppContent::find(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="AD GRAPHICS HUB">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <title>@yield('title') | Ad Packing</title>
    
    <!-- Icon fonts -->
    <link rel="shortcut icon" type="image/png" href="/front/images/favicon.png"/>
    <link href="/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="/front/css/flaticon.css" rel="stylesheet">
    <link href="/front/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/front/css/animate.css" rel="stylesheet" />
    <!-- Plugins -->
    <link href="/front/css/owl.carousel.css" rel="stylesheet">
    <link href="/front/css/owl.theme.css" rel="stylesheet">
    <link href="/front/css/slick.css" rel="stylesheet">
    <link href="/front/css/slick-theme.css" rel="stylesheet">
    <link href="/front/css/owl.transitions.css" rel="stylesheet">
    <link href="/front/css/jquery.fancybox.css" rel="stylesheet">
    <link href="/front/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/front/css/style.css" rel="stylesheet">
    <link href="/front/css/toast.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/front/css/color-style.css" rel="stylesheet" title="switchstyle">
    @yield('css')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <span class="your-cart"></span>
<!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="preloader-inner">
                <img src="/front/images/preloader.gif" alt="Ad Packing">
            </div>
        </div>
        <!-- end preloader -->
        <!-- Start header -->
            @include('user.layouts.header')
        <!-- end of header -->
        <!-- start page-title -->
            @yield('page-title')
        <!-- end page-title -->
        <!-- Start content -->
            @yield('content')
        <!-- End content -->
        <!-- Start Footer -->
            @include('user.layouts.footer')
        <!-- End Footer -->
    </div>
    <!-- Core JS files -->
    <script src="/front/js/jquery.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="/front/js/jquery-plugin-collection.js"></script>
    <script src="/front/js/jquery.mCustomScrollbar.js"></script>
    <script src="/front/js/toast.js" type="text/javascript"></script>
    <!-- Custom script for this template -->
    <script src="/front/js/script.js"></script>
    <script src="/front/js/custom-script.js"></script>
    @yield('js')
    <script type="text/javascript">
        $(document).ready(function() {
            @if(\Session::get('error'))
            toastr.warning("{{ \Session::get('error') }}");
            @endif

            @if(\Session::get('success'))
            toastr.success("{{ \Session::get('success') }}");
            @endif
        });
    </script>
</body>
</html>
