@extends('user.layouts.main')

@section('title', 'My Profile')

@section('css')
<style type="text/css">
    .section-padding {
        padding: 0;
    }
</style>
@endsection
@section('content')
<!-- start contact-pg-section -->
<section class="contact-pg-section section-padding">
    <div class="container">
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
                <form class="contact-form form contact-validation-active row" id="profile" method="post" action="{{ route('user.profileUpdate') }}">
                    {{ csrf_field() }}
                    <div class="col col-sm-6">
                        <label for="f-name">First Name</label>
                        <input type="text" class="form-control" autocomplete="off" id="f-name" name="f_name" value="{{ $user->first_name }}">
                    </div>
                    <div class="col col-sm-6">
                        <label for="l-name">Last Name</label>
                        <input type="text" class="form-control" autocomplete="off" id="l-name" name="l_name" value="{{ $user->last_name }}">
                    </div>
                    <div class="col col-sm-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" autocomplete="off" id="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="col col-sm-6">
                        <label for="phone">Mobile</label>
                        <input type="text" class="form-control" autocomplete="off" id="phone" name="phone" value="{{ $user->mobile }}">
                    </div>
                    <div class="col col-sm-12 submit-btn">
                        <button class="theme-btn">Update</button>
                        <div id="loader">
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col col-xs-12"><p><br></p></div>
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
        $("#profile").validate({
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
                phone: "Please enter your mobile",
            },

            submitHandler: function (form) {
                form.submit();
            }

        });
    });
</script>
@endsection