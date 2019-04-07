<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="AD GRAPHICS HUB">
    <title>On line Packing</title>
    
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
        <!-- Start header -->
        <header id="header" class="site-header header-style-4">
            <div class="topbar topbar-style-2">
                <div class="container">
                    <div class="row">
                        <div class="col col-sm-7">
                            <div class="topbar-contact-info-wrapper">
                                <div class="topbar-contact-info">
                                    <div>
                                        <i class="fa fa-location-arrow"></i>
                                        <div class="details">
                                            <?php
                                                $address = explode(',', $appContent->address);
                                            ?>
                                            <p>{{ $address[0] }}</p>
                                            <span>{{ isset($address[1]) ? $address[1] : '' }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <i class="fa fa-phone"></i>
                                        <div class="details">
                                            <p>{{ $appContent->support_mobile }}</p>
                                            <span>{{ $appContent->support_email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-5">
                            <div class="social">
                                <span>Follow: </span>
                                <ul class="social-links">
                                    <li><a href="{{ ($appContent->fb_link) ? $appContent->fb_link  : 'javascript:void(0);' }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ ($appContent->twitter_link) ? $appContent->twitter_link  : 'javascript:void(0);' }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ ($appContent->instagram_link) ? $appContent->instagram_link  : 'javascript:void(0);' }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="{{ ($appContent->google_link) ? $appContent->google_link  : 'javascript:void(0);' }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="get-quote">
                                <a href="javascript:void(0);" id="" class="theme-btn inquiry">Inquiry</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div> <!-- end topbar -->

            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="site-logo">
                            <a href="javascript:void(0);"><img src="/front/images/logo.png" class="img-responsive"></a>
                        </div>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                        <button class="close-navbar"><i class="fa fa-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about-us">About</a></li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Products</a>
                                <ul class="sub-menu">
                                    @foreach($categories as $category)
                                        <li><a href="{{ route('user.products', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                                    @endforeach    
                                </ul>
                            </li>
                            <li><a href="{{ route('user.contactUs') }}">Contact</a></li>
                            @if(!\Auth::check())
                                <li><a href="{{ route('user.loginForm') }}">Login</a></li>
                            @else
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">{{ \Auth::user()->first_name }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('user.myProfile') }}">Profile</a></li>
                                        <li><a href="{{ route('user.myAccount') }}">Orders</a></li>
                                        <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div><!-- end of nav-collapse -->

                    <div class="cart-contact">
                        <div class="mini-cart">
                            <a href="javascript:void(0);" class="" id="cart-list">
                                <i class="fi flaticon-shopping-cart"></i>
                                <div class="total">
                                    <span id="backetItem" class="backetItem">{{ ((\Session::get('cart') =="") ? 0 : count(\Session::get('cart'))) }}</span>
                                </div>
                            </a>
                            <div class="top-cart-content">
                                <div class="top-cart-title">
                                    <p>Shopping Cart</p>
                                </div>
                                <div class="top-cart-items">
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="javascript:void(0);"><img src="/front/images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt"></a>
                                        </div>
                                        <div class="top-cart-item-des">
                                            <a href="javascript:void(0);">Blue Round-Neck Tshirt</a>
                                            <span class="top-cart-item-price">$19.99</span>
                                            <span class="top-cart-item-quantity">x 2</span>
                                        </div>
                                    </div>
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="javascript:void(0);"><img src="/front/images/shop/small/6.jpg" alt="Light Blue Denim Dress"></a>
                                        </div>
                                        <div class="top-cart-item-des">
                                            <a href="javascript:void(0);">Light Blue Denim Dress</a>
                                            <span class="top-cart-item-price">$24.99</span>
                                            <span class="top-cart-item-quantity">x 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-cart-action clearfix">
                                    <span class="fleft top-checkout-price">$114.95</span>
                                    <a href="javascript:void(0);" class="theme-btn">View Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end of container -->
            </nav> <!-- end navigation -->
        </header>
        <!-- end of header -->
        <!-- start of hero -->   
        <section class="hero hero-slider-wrapper hero-slider-style-2">
            <div class="hero-slider">
                @foreach($banners as $banner)
                <div class="slide">
                    <img src="{{ \Cloudder::secureShow($banner->image) }}" alt="{{ $banner->name }}" class="slider-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-8 col-md-offset-2 slide-caption">
                                <h2>{{ $banner->name }}</h2>
                                <p>{{ $banner->description }}</p>
                                <!-- <div class="btns">
                                    <a href="{{ $banner->url }}" class="theme-btn">Click</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <!-- end of hero slider -->
    

        <!-- start offer -->
        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-5">
                        <div class="section-title-s3">
                            <h2>Get full range of premium Industrial services for your business</h2>
                        </div>                        
                        <div class="offer-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do eiusmod tempor inci didunt ut labore et dolore magna.</p>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur</p>
                        </div>
                    </div>
                    <div class="col col-md-7">
                        <div class="offer-grids">
                            <div class="grid">
                                <div class="details">
                                    <div class="icon">
                                        <i class="fi flaticon-construction"></i> 
                                    </div>
                                    <h3>Latest Technology</h3>
                                    <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="details">
                                    <div class="icon">
                                        <i class="fi flaticon-people"></i> 
                                    </div>
                                    <h3>Expert Engineers</h3>
                                    <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="details">
                                    <div class="icon">
                                        <i class="fi flaticon-support"></i> 
                                    </div>
                                    <h3>Customer Support</h3>
                                    <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="details">
                                    <div class="icon">
                                        <i class="fi flaticon-time-passing"></i> 
                                    </div>
                                    <h3>Delivery On time</h3>
                                    <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end offer -->  


        <!-- start cta -->
        <section class="cta section-padding parallax" data-bg-image="/front/images/cta-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Our one and only priority is the <span>customer satisfaction</span></h2>
                        <a href="javascript:void(0);" class="theme-btn-s5 inquiry">Get a quote</a>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end cta -->

        <!-- start services-s3 -->
        <section class="services-s3 section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-8 col-md-offset-2">
                        <div class="section-title-s6">
                            <h2>Our Products</h2>
                        </div>
                    </div>
                </div> <!-- end row -->
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="services-s3-grids">
                            @foreach($products as $product)
                            <div class="grid">
                                <div class="inner">
                                    <div class="img-holder">
                                        <img src="{{ \Cloudder::secureShow($product->image, []) }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="details">
                                        <h3><a href="{{ route('user.product.detail', ['productSlug' => $product->slug]) }}">{{ substr($product->name, 0, 30).'...' }}</a></h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end services-s3 -->

        <!-- start contact-section -->
        <section id="contact-section" class="contact-section section-padding parallax" data-bg-image="/front/images/contact-section-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col col-md-4 col-md-offset-1 col-md-5">
                        <div class="contact-section-contact-box">
                            <div class="section-title-white">
                                <h2>Contact</h2>
                            </div>
                            <div class="details">
                                <p>For any kind of query, contact us with the details below.</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i> {{ $appContent->support_mobile }}</li>
                                    <li><i class="fa fa-envelope"></i> {{ $appContent->support_email }}</li>
                                    <li><i class="fa fa-home"></i> {{ $appContent->address }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col col-lg-6 col-lg-offset-1 col-md-7">
                        <div class="section-title-white">
                            <h2>Request a quote</h2>
                        </div>   
                        <p>Thanks for your interest. Please fill out the request form below and one of our box & packaging specialists will contact you back within 48 hours.</p>

                        <div class="contact-form-s1 form">
                            <form method="post" id="contact-form" class="wpcf7-form contact-validation-active" method="post" action="{{ route('user.inquiry') }}">
                                {{ csrf_field() }}
                                <div>
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" name="name" autocomplete="off">
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" autocomplete="off">
                                </div>
                                <div>
                                    <label for="phone">Phone Number</label>
                                    <input type="text" id="phone" name="phone" autocomplete="off">
                                </div>
                                <div>
                                    <label>Business Type</label>
                                    <input type="text" id="business_type" name="business_type" autocomplete="off">
                                </div>
                                <div class="submit-btn-wrap">
                                    <input value="Submit" class="theme-btn wpcf7-submit" type="submit">
                                    <div id="loader">
                                        <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                                    </div>
                                </div>
                                <div class="error-handling-messages">
                                    <div id="success">Thank you</div>
                                    <div id="error"> Error occurred while sending email. Please try again later. </div>
                                </div>
                            </form>
                        </div>                     
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
            <div class="contact-women wow fadeInLeft">
                <img src="/front/images/contact-women.png" alt>
            </div>
        </section>
        <!-- end contact-section -->

        <!-- start site-footer -->
<footer class="site-footer">
    <div class="upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-md-3 col-sm-6">
                    <div class="widget about-widget">
                        <div class="footer-logo"><img src="/front/images/logo.png" alt class="img-responsive"></div>
                        <ul class="contact-info">
                            <li><i class="fa fa-home"></i> {{ $appContent->address }}</li>
                            <li><i class="fa fa-phone"></i> {{ $appContent->support_mobile }}</li>
                            <li><i class="fa fa-home"></i> Working Hours: <br>Mon-Sat (10 am - 7 pm)</li>
                        </ul>
                    </div>
                </div>

                <div class="col col-md-3 col-sm-6">
                    <div class="widget service-links-widget">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="javascript:void(0);">Corrugated Box</a></li>
                            <li><a href="javascript:void(0);">Courier Bags</a></li>
                            <li><a href="javascript:void(0);">Stretch Film</a></li>
                            <li><a href="javascript:void(0);">BOPP Tape</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col col-md-3 col-sm-6">
                    <div class="widget quick-links-widget">
                        <h3>Navigation</h3>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('user.aboutUs') }}">About Us</a></li>
                            <li><a href="{{ route('user.contactUs') }}">Contact Us</a></li>
                            <li><a href="{{ route('user.faq') }}">FAQ</a></li>
                            <li><a href="{{ route('user.termsCondition') }}">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col col-md-3 col-sm-6">
                    <div class="widget twitter-feed-widget">
                        <h3>Twitter Feed</h3>
                        <ul>
                            <li>
                                <div class="text">
                                    <p>We don't want to push our ideas on to customers, we simply want to make what they want.</p>
                                </div>
                                <div class="info-box">
                                    <i class="fa fa-twitter"></i>
                                    <strong><a href="javascript:void(0);">@Laura Ashley</a></strong>
                                </div>
                            </li>
                            <li>
                                <div class="text">
                                    <p>A brand for a company is like a reputation for a person. You earn reputation by trying to do hard things well.</p>
                                </div>
                                <div class="info-box">
                                    <i class="fa fa-twitter"></i>
                                    <strong><a href="javascript:void(0);">@Jeff Bezos</a></strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end upper-footer -->
    <div class="copyright-info">
        <div class="container">
            <p>2018-{{ date('Y') }} &copy; All Rights Reserved by <a href="http://adgraphicshub.com" target="_blank">Ad Graphics Hub</a></p>
        </div>
    </div>
</footer>
        <!-- end site-footer -->
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("body").on("click", ".inquiry", function() {
                $('html, body').animate({
                    scrollTop: $("#contact-section").offset().top
                }, 2000);
            });

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
