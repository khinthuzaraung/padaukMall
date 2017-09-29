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
	<style type="text/css">
	.sidecategories{
		border:1px solid #999;
		margin:3em 0;
	}
	.sidecategories h3{
		font-size: 1.5em;
		color:#212121;
		padding:.5em;
		background: #f5f5f5;
		text-transform: uppercase;
		text-align:center;
		letter-spacing: 5px;
	}
	.sidecategories ul{
		padding:2em;
	}
	.sidecategories ul li{
		display: block;
		color: #999;
		font-size: 14px;
		padding-left: 2em;
		margin-bottom: 1em;
		position: block;
	}
	.sidecategories a:hover {
		color: #de5757;
	}
	
	.sidecategories li:hover ul {
		color: #de5757;
		display: block;
	}
	.sidecategories ul li ul {
		background-color: #de5757;
		position: block;
		margin-left: 100px;
		/*padding-left: 250px;*/
		width: 200px;
		display: none;
	}
	.sidecategories ul li a{
		color:#999;
		text-decoration: none;
	}
	
	</style>
</head>
	
<body>
<!-- header -->
	<div class="header">
		@include('includes.header')
	</div>
<!-- //header -->
<!-- sidebar -->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="sidecategories" data-wow-delay=".5s">
					<h3>Categories</h3>
					<ul>
						<?php foreach ($category as $category) {?>
  				        <li><a><?php echo $category->Category_name; ?></a>
    						<ul>
                				
         						<li><a href=''>Link 2</a></li>
          						<li><a href=''>Link 3</a></li>
          						<li><a href=''>Link 4</a></li>
        					</ul>
      					</li>	
  
  						<?php } ?>
					</ul>				
				</div>
			</div>			
<!-- //sidebar -->
</body>
</html>