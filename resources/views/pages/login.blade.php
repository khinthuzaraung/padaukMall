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
				<li><a href="/padaukmall/public/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Login Form</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.</p>

			
				     <div class="form-bottom clearfix">
            @if (Session::has('message-login'))
                <div class="alert alert-danger alert-dismissible " style="font-size:15px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{ Session::get('message-login') }}
                </div>
            @endif
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="login" method="post">
				 <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
				    <div class="form-gruop {{ $errors->has('customer_email') ? 'has-error' : ''}}">
					<input type="email" name="customer_email" placeholder="Email Address">
					<span class="text-danger">{{ $errors->first('customer_email')}}</span></div>
					<div class="form-gruop {{ $errors->has('customer_password') ? 'has-error' : ''}}">
					<input type="password" name="customer_password" placeholder="Password">
					<span class="text-danger">{{ $errors->first('customer_password')}}</span></div>
					<div class="forgot">
						<a href="forgot">Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
			<h4 class="animated wow slideInUp" data-wow-delay=".5s">For New People</h4>
			<p class="animated wow slideInUp" data-wow-delay=".5s"><a href="register">Register Here</a> (Or) go back to <a href="/padauktest/public/">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
<!-- footer -->
	<div class="footer">
		@include('includes.footer')
	</div>
<!-- //footer -->
</body>
</html>