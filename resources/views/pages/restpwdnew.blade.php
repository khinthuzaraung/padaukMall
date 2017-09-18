
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
	
<body>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="/padauktest/public/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Password Reset Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Password Reset</h3>
			<div class="form-bottom clearfix">
            @if (Session::has('message-login'))
                <div class="alert alert-danger alert-dismissible " style="font-size:15px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{ Session::get('message-login') }}
                </div>
            @endif
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="post">
				 <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
				    <div class="form-gruop {{ $errors->has('customer_email') ? 'has-error' : ''}}">
					<input type="password" name="customer_email" placeholder="New Password">
					<span class="text-danger">{{ $errors->first('customer_email')}}</span></div>
					<div class="form-gruop {{ $errors->has('customer_email') ? 'has-error' : ''}}">
					<input type="password" name="customer_email" placeholder="Confirm Password">
					<span class="text-danger">{{ $errors->first('customer_email')}}</span></div>			
					<input type="submit" value="Submit">
				</form>
			</div>
			<h4 class="animated wow slideInUp" data-wow-delay=".5s">For New People</h4>
			<p class="animated wow slideInUp" data-wow-delay=".5s"><a href="register">Register Here</a> (Or) go back to <a href="/padauktest/public/">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
</body>
</html>