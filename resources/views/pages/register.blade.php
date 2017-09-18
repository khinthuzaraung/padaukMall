<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
@include('includes.head')
</head>
	
<body>
<!-- header -->
	<div class="header">
		@include('includes.header')
	</div>
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">

				<li><a href="/padauktest/public/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>

				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Register Here</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.</p>
			<div class="login-form-grids">
				<!-- <h5 class="animated wow slideInUp" data-wow-delay=".5s">profile information</h5> -->
				<!-- <form class="animated wow slideInUp" data-wow-delay=".5s" action="register">
					
				</form> -->
				<!-- <div class="register-check-box animated wow slideInUp" data-wow-delay=".5s">
					
				</div> -->
				<h6 class="animated wow slideInUp" data-wow-delay=".5s">Login information</h6>
				<form class="animated wow slideInUp" data-wow-delay=".5s" action="register" method="post" autocomplete="on">
				    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
				    <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : ''}}">

				    <input type="text" name="customer_name" class="form-control" placeholder="Name..." value="{{ old('customer_name') }}">
				    	<span class="text-danger">{{ $errors->first('customer_name')}}</span>
				    </div>
				    <div class="form-gruop {{ $errors->has('customer_email') ? 'has-error' : ''}}">
					<input type="email" name="customer_email" placeholder="Email Address" value="{{ old('customer_email') }}">
					<span class="text-danger">{{ $errors->first('customer_email')}}</span>
					</div>
					<div class="form-gruop {{ $errors->has('customer_password') ? 'has-error' : ''}}">
					<input type="password" name="customer_password" placeholder="Password " value="{{ old('customer_password') }}">
					<span class="text-danger">{{ $errors->first('customer_password')}}</span>
					</div>
					<div class="form-gruop {{ $errors->has('customer_cpassword') ? 'has-error' : ''}}">
					<input type="password" name="customer_cpassword" placeholder="Password Confirmation" value="{{ old('customer_cpassword') }}">
					<span class="text-danger">{{ $errors->first('customer_cpassword')}}</span>
					</div>
					<div class="form-gruop {{ $errors->has('customer_phone') ? 'has-error' : ''}}">
					<input type="text" name="customer_phone" placeholder="Phone Number" value="{{ old('customer_phone') }}">
					<span class="text-danger">{{ $errors->first('customer_phone')}}</span>
					</div> 					
					<div class="form-gruop {{ $errors->has('customer_contact') ? 'has-error' : ''}}">
					<input type="text" name="customer_contact" placeholder="Address" value="{{ old('customer_contact') }}">

					<span class="text-danger">{{ $errors->first('customer_contact')}}</span>
					</div>
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
						</div>
						<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>
						</div>
					</div>
					<input type="submit" value="Register" >
				</form>
			</div>
			<div class="register-home animated wow slideInUp" data-wow-delay=".5s">
				<a href="/padauktest/public/">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->
<!-- footer -->
	<div class="footer">
		@include('includes.footer')
	</div>
<!-- //footer -->
</body>
</html>