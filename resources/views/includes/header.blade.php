        
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<ul>
						<?php
						 $CustomerName = Session::get('CustomerName');
					     if(isset($CustomerName)){?>
					     <h3>Welcome <?php echo $CustomerName; ?>,</h3>
					     <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="logout">Logout</a></li>
					    <?php }else{ ?>						
						<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login">Login</a></li>
						<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register">Register</a></li>
						<?php } ?>

						


					</ul>
				</div>
				<div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<ul class="social-icons">
						<li><a href="#" class="facebook"></a></li>
						<li><a href="#" class="twitter"></a></li>
						<li><a href="#" class="g"></a></li>
						<li><a href="#" class="instagram"></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
				<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
					<h1><a href="#"> Padauk Mall <span>Convenience & Smart</span></a></h1>
				</div>
				<div class="logo-nav-left1">
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class="active"><a href="/padaukmall/public" class="act">Home</a></li>	
							<!-- Mega Menu -->
							<li class="dropdown">
								<a href="/padaukmall/products" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<div class="col-sm-4">
											<ul>@if(!empty($menu))
@foreach($menu as $item)
    <li>
        <a href="{{$item->url}}">{{$item->menu_name}}</a>
        @if ($item->submenu->count()) 
            <ul class="multi-column-dropdown">
            @foreach ($item->submenu as $subitem)
                <li><a href="{{$subitem->url}}">{{$subitem->menu_name}}</a></li>
            @endforeach
            </ul>
        @endif
    </li>
@endforeach
@endif
</ul>
											<!--<ul class="multi-column-dropdown">
												<h6>Men's Wear</h6>
												<li><a href="products">Clothing</a></li>
												<li><a href="products">Wallets</a></li>
												<li><a href="products">Shoes</a></li>
												<li><a href="products">Watches</a></li>
												<li><a href="products">Accessories</a></li>
											</ul>-->
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<h6>Women's Wear</h6>
												<li><a href="products">Clothing</a></li>
												<li><a href="products">Wallets,Bags</a></li>
												<li><a href="products">Footwear</a></li>
												<li><a href="products">Watches</a></li>
												<li><a href="products">Accessories</a></li>
												<li><a href="products">Jewellery</a></li>
												<li><a href="products">Beauty & Grooming</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<h6>Kid's Wear</h6>
												<li><a href="products">Kids Home Fashion</a></li>
												<li><a href="products">Boy's Clothing</a></li>
												<li><a href="products">Girl's Clothing</a></li>
												<li><a href="products">Shoes</a></li>
												<li><a href="products">Brand Stores</a></li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Furniture <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<h6>Home Collection</h6>
												<li><a href="furniture">Cookware</a></li>
												<li><a href="furniture">Sofas</a></li>
												<li><a href="furniture">Dining Tables</a></li>
												<li><a href="furniture">Shoe Racks</a></li>
												<li><a href="furniture">Home Decor</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<h6>Office Collection</h6>
												<li><a href="furniture">Carpets</a></li>
												<li><a href="furniture">Tables</a></li>
												<li><a href="furniture">Sofas</a></li>
												<li><a href="furniture">Shoe Racks</a></li>
												<li><a href="furniture">Sockets</a></li>
												<li><a href="furniture">Electrical Machines</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<h6>Decorations</h6>
												<li><a href="furniture">Toys</a></li>
												<li><a href="furniture">Wall Clock</a></li>
												<li><a href="furniture">Lighting</a></li>
												<li><a href="furniture">Top Brands</a></li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li><a href="short-codes">Short Codes</a></li>
							<li><a href="contact">Mail Us</a></li>
						</ul>
					</div>
					</nav>
				</div>
				<div class="logo-nav-right">
					<div class="search-box">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
					</div>
						<!-- search-scripts -->
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
							<script>
								new UISearch( document.getElementById( 'sb-search' ) );
							</script>
						<!-- //search-scripts -->
				</div>
				<div class="header-right">
					<div class="cart box_1">
						<a href="checkout">
							<h3> <div class="total">
								<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
								<img src="images/bag.png" alt="" />
							</h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
