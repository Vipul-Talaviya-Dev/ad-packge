@extends('user.layouts.main')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'About Us')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <h2>About us</h2>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>About us</li>
                </ol>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>        
@endsection

@section('content')
        <!-- Start header -->
        <header id="header" class="site-header header-style-5">
            <div class="topbar topbar-style-2">
                <div class="container">
                    <div class="row">
                        <div class="col col-sm-7">
                            <div class="topbar-contact-info-wrapper">
                                <div class="topbar-contact-info">
                                    <div>
                                        <i class="fa fa-location-arrow"></i>
                                        <div class="details">
                                            <p>5523 Research Park Drive, Suite 110</p>
                                        </div>
                                    </div>
                                    <div>
                                        <i class="fa fa-phone"></i>
                                        <div class="details">
                                            <p>+012 (3546) 547</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-5">
                            <div class="social">
                                <span>Follow: </span>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div> <!-- end topbar -->

            <div class="lower-topbar">
                <div class="container">
                    <div class="row">
                        <div class="col col-sm-3">
                            <div class="site-logo">
                                <a href="index.html"><img src="/front/images/logo-2.png" alt></a>
                            </div>
                        </div>
                        <div class="col col-sm-9">
                            <div class="awards">
                                <div>
                                    <div class="icon"><i class="fi flaticon-title"></i></div>
                                    <div class="award-info">
                                        <h4>Global Certified</h4>
                                        <p>ISO 9001:2016</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="icon"><i class="fi flaticon-medal"></i></div>
                                    <div class="award-info">
                                        <h4>Winner</h4>
                                        <p>Construction award 2016</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end lower-topbar -->

            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navigation-holder">
                        <button class="close-navbar"><i class="fa fa-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about-us">About</a></li>
                            <li><a href="javascript:void(0);">Services</a></li>
                            <li><a href="javascript:void(0);">Projects</a></li>
                            <li><a href="javascript:void(0);">Contact</a></li>
                        </ul>
                    </div><!-- end of nav-collapse -->

                    <div class="cart-contact">
                        <div class="mini-cart">
                            <button class="cart-toggle-btn"> <i class="fi flaticon-shopping-cart"></i> Cart (2) </button>

                            <div class="top-cart-content">
                                <div class="top-cart-title">
                                    <p>Shopping Cart</p>
                                </div>
                                <div class="top-cart-items">
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="#"><img src="/front/images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt"></a>
                                        </div>
                                        <div class="top-cart-item-des">
                                            <a href="#">Blue Round-Neck Tshirt</a>
                                            <span class="top-cart-item-price">$19.99</span>
                                            <span class="top-cart-item-quantity">x 2</span>
                                        </div>
                                    </div>
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="#"><img src="/front/images/shop/small/6.jpg" alt="Light Blue Denim Dress"></a>
                                        </div>
                                        <div class="top-cart-item-des">
                                            <a href="#">Light Blue Denim Dress</a>
                                            <span class="top-cart-item-price">$24.99</span>
                                            <span class="top-cart-item-quantity">x 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-cart-action clearfix">
                                    <span class="fleft top-checkout-price">$114.95</span>
                                    <a href="#" class="theme-btn">View Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="theme-btn-s2 request-quote">Request Quote</a>
                </div><!-- end of container -->
            </nav> <!-- end navigation -->
        </header>
        <!-- end of header -->


        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>About us</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>About us</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->


        <!-- start offer -->
        <section class="section-padding offer-section">
            <div class="container">
                <div class="row">
                    <div class="col col-md-5">
                        <div class="section-title-s3">
                            <h2>Get full range of premium Industrial services for your business</h2>
                        </div>                        
                        <div class="offer-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do eiusmod tempor inci didunt ut labore et dolore magna.</p>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur</p>
                            <a href="#" class="theme-btn read-more">Read More</a>
                            <a href="#" class="theme-btn-s2 read-more">Company history</a>
                        </div>
                    </div>
                    <div class="col col-md-7">
                        <div class="offer-pic">
                            <img src="/front/images/offer-pic.jpg" alt>
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
                        <a href="#" class="theme-btn-s5">Get a quote</a>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end cta -->


        <!-- start features --> 
        <section class="features section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-3">
                        <div class="features-title">
                            <h2>Why we are best</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adi piscing elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-4">
                        <div class="feature-grid">
                            <div class="icon">
                                <i class="fi flaticon-people"></i>
                            </div>
                            <div class="details">
                                <h3>Expert Engineers</h3>
                                <p>Sed quia non numquam eius modi tempo ra incidunt ut labore et dolore magnam aliq uam quaera.</p>
                                <a href="#" class="more">Details <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-4">
                        <div class="feature-grid">
                            <div class="icon">
                                <i class="fi flaticon-support"></i>
                            </div>
                            <div class="details">
                                <h3>Customer Support</h3>
                                <p>Sed quia non numquam eius modi tempo ra incidunt ut labore et dolore magnam aliq uam quaera.</p>
                                <a href="#" class="more">Details <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-4">
                        <div class="feature-grid">
                            <div class="icon">
                                <i class="fi flaticon-time-passing"></i>
                            </div>
                            <div class="details">
                                <h3>Delivery On time</h3>
                                <p>Sed quia non numquam eius modi tempo ra incidunt ut labore et dolore magnam aliq uam quaera.</p>
                                <a href="#" class="more">Details <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section> 
        <!-- end features -->


        <!-- start our-team -->
        <section class="our-team our-team-bg section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-8 col-md-offset-2">
                        <div class="section-title-s5">
                            <h2>Our team</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
                        </div>
                    </div>
                </div> <!-- end row -->

                <div class="row">
                    <div class="col col-lg-10 col-lg-offset-1">
                        <div class="team-slider team-grids">
                            <div class="team-grid">
                                <div class="member-pic-social square-hover-effect-parent">
                                    <div class="square-hover-effect">
                                        <span class="hover-1"></span>
                                        <span class="hover-2"></span>
                                        <span class="hover-3"></span>
                                        <span class="hover-4"></span>
                                    </div>
                                    <div class="member-pic">
                                        <img src="/front/images/team/img-1.jpg" alt>
                                    </div>
                                    <div class="social">
                                        <ul class="social-links">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h3>Malcolm Marshall</h3>
                                    <p>Director of the board</p>
                                </div>
                            </div>
                            <div class="team-grid">
                                <div class="member-pic-social square-hover-effect-parent">
                                    <div class="square-hover-effect">
                                        <span class="hover-1"></span>
                                        <span class="hover-2"></span>
                                        <span class="hover-3"></span>
                                        <span class="hover-4"></span>
                                    </div>
                                    <div class="member-pic">
                                        <img src="/front/images/team/img-2.jpg" alt>
                                    </div>
                                    <div class="social">
                                        <ul class="social-links">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h3>Stephen King</h3>
                                    <p>Director of the board</p>
                                </div>
                            </div>
                            <div class="team-grid">
                                <div class="member-pic-social square-hover-effect-parent">
                                    <div class="square-hover-effect">
                                        <span class="hover-1"></span>
                                        <span class="hover-2"></span>
                                        <span class="hover-3"></span>
                                        <span class="hover-4"></span>
                                    </div>
                                    <div class="member-pic">
                                        <img src="/front/images/team/img-3.jpg" alt>
                                    </div>
                                    <div class="social">
                                        <ul class="social-links">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h3>Michelle Conroy</h3>
                                    <p>Director of the board</p>
                                </div>
                            </div>
                            <div class="team-grid">
                                <div class="member-pic-social square-hover-effect-parent">
                                    <div class="square-hover-effect">
                                        <span class="hover-1"></span>
                                        <span class="hover-2"></span>
                                        <span class="hover-3"></span>
                                        <span class="hover-4"></span>
                                    </div>
                                    <div class="member-pic">
                                        <img src="/front/images/team/img-1.jpg" alt>
                                    </div>
                                    <div class="social">
                                        <ul class="social-links">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h3>Malcolm Marshall</h3>
                                    <p>Director of the board</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div> <!-- end container -->
        </section>
        <!-- end our-team -->


        <!-- start fun-fact -->
        <section class="fun-fact">
            <div class="container">
                <div class="row start-count">
                    <div class="col col-sm-4">
                        <div class="grid">
                            <h3><span class="counter" data-count="1200">00</span><span>+</span></h3>
                            <span class="fact-title">Projects</span>
                            <p>inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam</p>
                        </div>
                    </div>
                    <div class="col col-sm-4">
                        <div class="grid">
                            <h3><span class="counter" data-count="800">00</span><span>+</span></h3>
                            <span class="fact-title">Clients</span>
                            <p>inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam</p>
                        </div>
                    </div>
                    <div class="col col-sm-4">
                        <div class="grid">
                            <h3><span class="counter" data-count="99.5">00</span><span>%</span></h3>
                            <span class="fact-title">satisfaction</span>
                            <p>inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam</p>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end fun-fact -->


        <!-- start partners -->
        <section class="section-padding partners partners-bg">
            <h2 class="hidden">Partners</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="partners-slider">
                            <div class="grid">
                                <img src="/front/images/partners/img-1.png" alt>
                            </div>
                            <div class="grid">
                                <img src="/front/images/partners/img-2.png" alt>
                            </div>
                            <div class="grid">
                                <img src="/front/images/partners/img-3.png" alt>
                            </div>
                            <div class="grid">
                                <img src="/front/images/partners/img-4.png" alt>
                            </div>
                            <div class="grid">
                                <img src="/front/images/partners/img-2.png" alt>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end partners -->
@endsection