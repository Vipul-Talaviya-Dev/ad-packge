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
                            <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
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
                        <a href="/"><img src="/front/images/logo-2.png" alt></a>
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
                    <li><a href="{{ route('user.index') }}">Home</a></li>
                    <li><a href="{{ route('user.aboutUs') }}">About</a></li>
                    <li><a href="javascript:void(0);">Services</a></li>
                    <li><a href="{{ route('user.products') }}">Boxes</a></li>
                    <li><a href="javascript:void(0);">Contact</a></li>
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
                </div>
            </div>

            <a href="javascript:void(0);" class="theme-btn-s2 request-quote">Request Quote</a>
        </div><!-- end of container -->
    </nav> <!-- end navigation -->
</header>