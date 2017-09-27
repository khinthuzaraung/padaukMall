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

				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Register Here</h3>
			<div class="login-form-grids">
				<h6 class="animated wow slideInUp" data-wow-delay=".5s">Login information</h6>
				<form class="animated wow slideInUp" data-wow-delay=".5s" action="register" method="post" autocomplete="on"  enctype="multipart/form-data">
				    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
				    
				    <input type="text" name="customer_name" class="form-control" placeholder="Name..." value="{{ old('customer_name') }}">
				    	<span class="text-danger">{{ $errors->first('customer_name')}}</span>
				    
				   
				    	<?php foreach ($gender as $gender) {?>
				    	<input type="radio" name="gender" value="<?php echo $gender->gender_id;?>">
				    	<?php echo $gender->name; }?>

				    <span class="text-danger">{{ $errors->first('gender')}}</span>
				    
				    
					<input type="email" name="customer_email" placeholder="Email Address" value="{{ old('customer_email') }}">
					<span class="text-danger">{{ $errors->first('customer_email')}}</span>
					
					
					<input type="password" name="customer_password" placeholder="Password " value="{{ old('customer_password') }}">
					<span class="text-danger">{{ $errors->first('customer_password')}}</span>
					
					
					<input type="password" name="customer_cpassword" placeholder="Password Confirmation" value="{{ old('customer_cpassword') }}">
					<span class="text-danger">{{ $errors->first('customer_cpassword')}}</span>
			
					
					<input type="text" name="customer_phone" placeholder="Phone Number" value="{{ old('customer_phone') }}">
					<span class="text-danger">{{ $errors->first('customer_phone')}}</span>
			 					
					
					<input type="text" name="customer_contact" placeholder="Address" value="{{ old('customer_contact') }}">

					<span class="text-danger">{{ $errors->first('customer_contact')}}</span>
					
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox" value="1"><i> </i>I accept the terms and conditions</label>
						</div>
					</div>
					<span class="text-danger">{{ $errors->first('checkbox')}}</span>
					<input type="submit" value="Register" >
				</form>
			</div>
			<div class="register-home animated wow slideInUp" data-wow-delay=".5s">
				<a href="/padaukmall/public/">Home</a>
			</div>
		</div>
	</div>
<!-- register -->
<!-- footer -->
	<div class="footer">
		@include('includes.footer')
	</div>
<!-- //footer -->
</body>
</html>