<?php include 'session.php'; ?>
<?php
// Text to be displayed in Browser Title Bar
$title = 'E-KAL';
if ((strpos($currentURL, "/ecalrefined/")) !== false) {
	$title = 'Home';
}
if ((strpos($currentURL, "/index")) !== false) {
	$title = 'Home';
}
if ((strpos($currentURL, "/saved")) !== false) {
	$title = 'Wishlist';
}
if ((strpos($currentURL, "/search")) !== false) {
	$title = 'Search';
}
if ((strpos($currentURL, "/recent_search")) !== false) {
	$title = 'Recent-Search';
}
if ((strpos($currentURL, "/cart")) !== false) {
	$title = 'Shopping Cart';
}
?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<!--[ Meta, Title, Stylesheets & Scripts ]-->
<head>
	<!-- Meta -->
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, chrome=1"/>
	<meta name="description" content="Shop with style online on the best online shop in Calabar"/>
	<meta name="keywords" content="calabar, kal, ekal, e-kal, ecommerce, e-commerce, shop, online shop, shoes, electronics, fashion, food, drink, automobile"/>
	<meta name="author" content="SAMBOLT"/>

	<!-- Title Bar Text -->
	<title><?php echo 'E-Kal - ' . $title; ?></title>

	<!-- Title Bar Icon -->
	<!--	<link rel="icon" type="img/png" href="./wwwroot/img/fav-icon.jpg"/>-->
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->

	<!--[ Stylesheets ]-->
	<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="./css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="./css/w3.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="./css/site.css" rel="stylesheet" type="text/css" media="all"/>
	<!-- font-awesome icons -->
	<link href="./css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>
	<!-- //font-awesome icons -->

	<!-- js -->
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/jquery.form.js"></script>
	<script src="./js/jquery.validate.min.js"></script>
	<!-- //js -->

	<!--	<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>-->
	<!--	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>-->

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="./js/move-top.js"></script>
	<script type="text/javascript" src="./js/easing.js"></script>
	<script type="text/javascript">
		$(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
<div class="agileits_header">
	<div class="w3l_offers">
		<a href="./products">Today's special Offers !</a>
	</div>
	<div class="w3l_search">
		<form action="#" method="post">
			<input type="text" name="Product" value="Search a product.." onfocus="this.value= '';" onblur="if (this.value == '') {this.value=
						'Search a product..';}" required="">
			<input type="submit" value="">
		</form>
	</div>
	<div class="product_list_header">
		<form action="" method="post" id="view_cart" class="last">
			<fieldset>
				<input type="hidden" name="cmd" value="_cart"/>
				<input type="hidden" name="display" value="1"/>
				<input type="submit" name="submit" value="View your cart" class="button"/>
			</fieldset>
		</form>
	</div>
	<div class="w3l_header_right">
		<ul>
			<li class="dropdown profile_details_drop">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
				<div class="mega-dropdown-menu">
					<div class="w3ls_vegetables">
						<ul class="dropdown-menu drp-mnu">
							<li><a href="./login">Login</a></li>
							<li><a href="./login">Sign Up</a></li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<div class="w3l_header_right1">
		<h2><a href="./mail">Contact Us</a></h2>
	</div>
	<div class="clearfix"></div>
</div>
<!-- script-for sticky-nav -->
<script>
	$(document).ready(function () {
		var navoffeset = $(".agileits_header").offset().top;
		$(window).scroll(function () {
			var scrollpos = $(window).scrollTop();
			if (scrollpos >= navoffeset) {
				$(".agileits_header").addClass("fixed");
			} else {
				$(".agileits_header").removeClass("fixed");
			}
		});

	});
</script>
<!-- //script-for sticky-nav -->
<div class="logo_products">
	<div class="container">
		<div class="w3ls_logo_products_left">
			<h1><a href="./"><span>Grocery</span> Store</a></h1>
		</div>
		<div class="w3ls_logo_products_left1">
			<ul class="special_items">
				<li><a href="./events">Events</a><i>/</i></li>
				<li><a href="./about">About Us</a><i>/</i></li>
				<li><a href="./products">Best Deals</a><i>/</i></li>
				<li><a href="./services">Services</a></li>
			</ul>
		</div>
		<div class="w3ls_logo_products_left1">
			<ul class="phone_email">
				<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header -->

<!-- banner -->
<div class="banner">
	<div class="w3l_banner_nav_left">
		<nav class="navbar nav_bottom">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header nav_2">
				<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
				<ul class="nav navbar-nav nav_1">
					<li><a href="./products">Branded Foods</a></li>
					<li><a href="./household">Households</a></li>
					<li class="dropdown mega-dropdown active">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Veggies &
							Fruits<span class="caret"></span></a>
						<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
							<div class="w3ls_vegetables">
								<ul>
									<li><a href="./vegetables">Vegetables</a></li>
									<li><a href="./vegetables">Fruits</a></li>
								</ul>
							</div>
						</div>
					</li>
					<li><a href="./kitchen">Kitchen</a></li>
					<li><a href="./short-codes">Short Codes</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<span class="caret"></span></a>
						<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
							<div class="w3ls_vegetables">
								<ul>
									<li><a href="./drinks">Soft Drinks</a></li>
									<li><a href="./drinks">Juices</a></li>
								</ul>
							</div>
						</div>
					</li>
					<li><a href="./pet">Pet Food</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Frozen Foods<span class="caret"></span></a>
						<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
							<div class="w3ls_vegetables">
								<ul>
									<li><a href="./frozen">Frozen Snacks</a></li>
									<li><a href="./frozen">Frozen Nonveg</a></li>
								</ul>
							</div>
						</div>
					</li>
					<li><a href="./bread">Bread & Bakery</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>
	</div>
</div>
<script src="./js/minicart.js"></script>