@extends('user.layouts.main')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
<style type="text/css">
    .offer-pic {
        padding: 0px 0 0 135px !important;
    }
    .offer-pic:after {
        border: none; 
    }
</style>
@endsection

@section('title', 'About Us')

@section('page-title')
<section class="page-title">
    <div class="container">
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
                            <p>DAM Packs is, India based company engaged in design, printing, manufacturing & distributing wide range of packaging materials such as corrugated boxes, BOPP tapes, Bubble Wraps, Courier Bags, Strech Film, etc. We provide package design solutions to a wide array of industry and end user applications.</p>
                            <p>Our packaging and shipping supplies are manufactured with high-quality materials that can protect your contents in a safe way.</p>
                        </div>
                    </div>
                    <div class="col col-md-7">
                        <div class="offer-pic">
                            <img src="/front/images/offer-pic.png" class="img-responsive" style="background-color: #7dc3f6;">
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
                            <p>Our customers are at the heart of our organization.</p>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-4">
                        <div class="feature-grid">
                            <div class="icon">
                                <i class="fi flaticon-people"></i>
                            </div>
                            <div class="details">
                                <h3>Expert Engineers</h3>
                                <p>Our engineers are expert in quality and service.</p>
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
                                <p>Feel free to drop in an email on support@dampacks.com, you would definitely hear back from us.</p>
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
                                <p>We offer quick load and delivery dates, guaranteed to get it there fast.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section> 
        <!-- end features -->
@endsection