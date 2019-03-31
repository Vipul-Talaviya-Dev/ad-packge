<?php
    $categories = \App\Models\Category::active()->get();
?>
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
                </div>
            </div>
        </div> <!-- end container -->
    </div> <!-- end topbar -->

    <div class="lower-topbar">
        <div class="container">
            <div class="row">
                <div class="col col-sm-3">
                    <div class="site-logo">
                        <a href="/"><img src="/front/images/logo.png" class="img-responsive"></a>
                    </div>
                </div>
                @if(false)
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
                @endif
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
                        <a href="javascript:void(0);">{{ \Auth::user()->fullName() }}</a>
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
                </div>
            </div>

            <a href="{{ route('user.index') }}#contact-section" class="theme-btn-s2 request-quote">Request Quote</a>
        </div><!-- end of container -->
    </nav> <!-- end navigation -->
</header>