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
@endsection