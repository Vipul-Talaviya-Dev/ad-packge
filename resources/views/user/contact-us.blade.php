@extends('user.layouts.main')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Contact Us')

@section('page-title')
<!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Contact</h2>
                        <ol class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li>Contact</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->
@endsection

@section('content')
<?php
$appContent = \App\Models\AppContent::find(1);
?>
        <!-- start contact-pg-section -->
        <section class="contact-pg-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-3">
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <div class="icon"><i class="fa fa-phone"></i></div>
                                    <p><span>Hotline</span> {{ $appContent->support_mobile }}</p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                    <p><span>Email</span> {{ $appContent->support_email }}  </p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-location-arrow"></i></div>
                                    <p><span>Office</span> {{ $appContent->address }} </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-md-offset-1 col-md-8">
                        <div class="location-map" id="map"></div>
                    </div>
                </div> <!-- end row -->
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col col-xs-12">
                        <form class="contact-form form contact-validation-active row" id="contact-form-s2" method="post" action="{{ route('user.contactAdd') }}">
                            {{ csrf_field() }}
                            <div class="col col-sm-6">
                                <label for="f-name">First Name</label>
                                <input type="text" class="form-control" autocomplete="off" id="f-name" name="f_name">
                            </div>
                            <div class="col col-sm-6">
                                <label for="l-name">Last Name</label>
                                <input type="text" class="form-control" autocomplete="off" id="l-name" name="l_name">
                            </div>
                            <div class="col col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" autocomplete="off" id="email" name="email">
                            </div>
                            <div class="col col-sm-6">
                                <label for="phone">Phone No</label>
                                <input type="text" class="form-control" autocomplete="off" id="phone" name="phone">
                            </div>
                            <div class="col col-sm-12">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="note"></textarea>
                            </div>
                            <div class="col col-sm-12 submit-btn">
                                <button class="theme-btn">Submit</button>
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
            </div> <!-- end container -->
        </section>
        <!-- end contact-pg-section -->

@endsection

@section('js')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key"></script>
<script type="text/javascript">
    // Contact page form
    $(document).ready(function() {
        $("#contact-form-s2").validate({
            rules: {
                f_name: {
                    required: true,
                    minlength: 2
                },

                l_name: {
                    required: true,
                    minlength: 2
                },

                email: "required",

                phone: {
                  required: true,
                  digits: true
                },

            },

            messages: {
                f_name: "Please enter your First name",
                l_name: "Please enter your Last name",
                email: "Please enter your email",
                phone: "Please enter your phone",
            },

            submitHandler: function (form) {
                form.submit();
            }

        });
    });
</script>
@endsection
