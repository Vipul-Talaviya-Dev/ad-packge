@extends('user.layouts.main')

@section('title', 'Order Shipping')

@section('css')
<style type="text/css">
.nav-tabs {
     border-bottom: none; 
}
</style>
@endsection
@section('content')
<section class="section-padding offer-section">
	<div class="container">
		<div class="col-md-9 col-md-offset-3">
			<nav>
				<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active btn theme-btn" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-login" aria-selected="true">Sign in</a>
					<a class="nav-item nav-link btn theme-btn" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register" aria-selected="false">Sign up</a>
				</div>
			</nav>
			<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
				<div class="tab-pane fade active in" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
					<!-- <h1>Sign in</h1> -->
					<input type="hidden" name="redirect" class="redirect" value="{{ \Session::get('redirect') }}">	
					<div id="message" class="text-center"></div>
					<div class="register">
						<p></p>
						<div class="row">
							<div class="col col-sm-6">
	                            <label for="f-name">Email</label>
								<input type="email" name="email" class="keyup-email email form-control" placeholder="Email Address"  required="" autocomplete="off">
	                        </div>
						</div>
						<p></p>
						<div class="row">
	                        <div class="col col-sm-6">
	                            <label for="f-name">Password</label>
								<input type="password" class="password form-control" name="password" placeholder="Password" required="" autocomplete="off">
	                        </div>
	                    </div><p></p>
						<div class="sign-up">
							<button type="button" class="theme-btn-s2 request-quote" id="userLogin">Sign in</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
					<div class="registrationCheck">
						<p></p>
						<div class="row">
							<div class="col col-sm-6">
	                            <label for="f-name">First Name</label>
								<input placeholder="First Name" name="name" type="text" class="fName form-control" required autocomplete="off">
	                        </div>
						</div><p></p>
						<div class="row">
							<div class="col col-sm-6">
	                            <label for="f-name">Last Name</label>
								<input placeholder="Last Name" name="name" type="text" class="lName form-control" required autocomplete="off">
	                        </div>
						</div><p></p>
						<div class="row">
							<div class="col col-sm-6">
	                            <label for="f-name">Mobile</label>
								<input placeholder="Mobile" name="mobile" type="text" class="signupMobile form-control" required onkeydown="return max_length(this,event,10)" onkeypress="return isNumberKey(event)" autocomplete="off">
	                        </div>
						</div><p></p>
						<div class="row">
							<div class="col col-sm-6">
	                            <label for="f-name">Email</label>
								<input type="email" name="email" class="keyup-email signupEmail form-control" placeholder="Email Address"  required="" autocomplete="off">
	                        </div>
						</div><p></p>
						<div class="row">
	                        <div class="col col-sm-6">
	                            <label for="f-name">Password</label>
								<input type="password" class="signupPassword form-control" name="password" placeholder="Password" required="" autocomplete="off">
	                        </div>
	                    </div><p></p>
	                    <div class="row">
	                        <div class="col col-sm-6">
	                            <label for="f-name">Confirm Password</label>
								<input placeholder="Confirm Password" name="confirmPassword" class="confirmPassword form-control" type="password" required autocomplete="off">
	                        </div>
	                    </div><p></p>
						<div class="sign-up">
							<input type="button" class="theme-btn-s2 request-quote" id="signUp" value="Create Account"/>
						</div>
					</div>
					<div id="otpDiv" style="display: none;">
						<p>Don't Share OTP. Your Otp is = <span id="otp"></span></p>
						<div class="row">
	                        <div class="col col-sm-6">
								<input placeholder="Otp" name="otp" type="text" class="otp form-control" required>
							</div>
						</div><p></p>
						<div class="sign-up">
							<input type="button" class="theme-btn-s2 request-quote" id="otpBtn" value="Submit"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
