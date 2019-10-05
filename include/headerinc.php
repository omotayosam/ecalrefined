<?php include 'session.php'; ?>
<?php
// Text to be displayed in Browser Title Bar
$title = 'E-KAL';
if ((($currentURL) == "http://localhost/ecal/") !== false) {
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
	<link rel="icon" type="img/png" href="./wwwroot/img/fav-icon.jpg"/>

	<!--[ Stylesheets ]-->
	<!-- Icon CSS Link (Font Awesome) -->
	<link rel="stylesheet" type="text/css" href="./wwwroot/css/fontawesome.min.css"/>

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="./wwwroot/bootstrap/css/bootstrap.min.css"/>

	<!-- Owl Carousel -->
	<link rel="stylesheet" type="text/css" href="./wwwroot/owlcarousel/assets/style.css"/>
	<link rel="stylesheet" type="text/css" href="./wwwroot/owlcarousel/assets/owl.carousel.min.css"/>
	<link rel="stylesheet" type="text/css" href="./wwwroot/owlcarousel/assets/owl.theme.default.min.css"/>

	<!-- Slider -->
	<link rel="stylesheet" type="text/css" href="./wwwroot/slider/css/demo.css"/>
	<link rel="stylesheet" type="text/css" href="./wwwroot/slider/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="./wwwroot/slider/css/custom.css"/>
	<noscript>
		<link rel="stylesheet" type="text/css" href="./wwwroot/slider/css/styleNoJS.css"/>
	</noscript>

	<!-- Extra Styling -->
	<link rel="stylesheet" type="text/css" href="./wwwroot/css/w3.css"/>
	<link rel="stylesheet" type="text/css" href="./wwwroot/css/site.css"/>
	<link rel="stylesheet" type="text/css" href="./wwwroot/css/animate.css"/>

	<!--[ JScripts ]-->
	<!-- JQuery -->
	<script type="text/javascript" src="./wwwroot/jquery/popper.min.js"></script>
	<script type="text/javascript" src="./wwwroot/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="./wwwroot/jquery/jquery.form.js"></script>

	<!-- Owl-Carousel -->
	<script src="./wwwroot/owlcarousel/owl.carousel.min.js"></script>
	<script src="./wwwroot/owlcarousel/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="./wwwroot/owlcarousel/owl.carousel.min.js"></script>

	<!-- Bootstrap -->
	<script type="text/javascript" src="./wwwroot/bootstrap/js/bootstrap.min.js"></script>

	<!-- sl-Slider -->
	<script type="text/javascript" src="./wwwroot/slider/js/modernizr.custom.79639.js"></script>

	<!-- Extra -->
	<script type="text/javascript" src="./wwwroot/js/site.js"></script>
</head>

<header>
	<?php
	$s_query = @$_POST['q'];
	if ($s_query) {
		header("location: search.php?q=$s_query");
	}
	?>

	<!--================ Side-Nav Area ================-->
	<?php include_once "sidenav.php"; ?>

	<!-- To be put in Js file -->
	<script type="text/javascript">

	</script>

	<!--================ End of Side-Nav Area ================-->

	<!--================ Overlay Area ================-->
	<div class="sidenav-overlay"></div>
	<!--================ End of Overlay Area ================-->

	<!--================ Search Input Area ================-->
	<div class="container-fluid">
		<div class="search fixed-top" style="display:none;padding:0">
			<div class="row search-bg p-0">
				<div class="offset-1 col-10 shadow">
					<form action="search.php?q=<?php echo $s_query; ?>" method="POST" class="bg-transparent shadow" id="form">
						<div class="input-group-md input-group-append">
							<input id="in" type="search" class="search_input form-control h-auto" name="q" placeholder="Search..."/>&nbsp;&nbsp;
							<a class="search_clear btn btn-lg h4" style="position:absolute;right:30px;bottom:-6px">&times;</a>
							<a href="javascript:void(0)" onclick="search_close()" class="display-5 search-closenav">&times;</a>
						</div>
					</form>
				</div>
			</div>
			<div class="mt-2 container-fluid pr-5 pl-3">
				<div class="row">
					<div class="offset-1 shadow-lg col-10 p-2 search_result bg-light col" style="display:none;border-radius:4px">
						<div id="search_result" class="bg-light px-2">...</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================ End of Search Input Area ================-->

	<!--================ Navbar Area ================-->
	<?php
	//If any of the following links is true do nothing
	if (strpos($currentURL, "/signup") !== false ||
	    strpos($currentURL, "/login") !== false ||
	    strpos($currentURL, "/myaccount") !== false ||
	    strpos($currentURL, "/men") !== false ||
	    strpos($currentURL, "/women") !== false) {

	} //Else if the below link is true
	elseif (($currentURL) == "http://localhost/ecal/" ||
	        strpos($currentURL, "/index") !== false ||
	        strpos($currentURL, "/saved") !== false ||
	        strpos($currentURL, "/cart") !== false ||
	        strpos($currentURL, "/search") !== false ||
	        strpos($currentURL, "/recent_search") !== false ||
	        strpos($currentURL, "/preview") !== false) {
		?>

		<script src="./assets/onScrollIndex.js"></script>
		<script src="./assets/searchIndex.js"></script>

		<style>
			.body {
				width: 100% !important;
				margin-top: 50px;
				background-color: #ffffff !important
			}

			.nav1.fixed-top {
				z-index: 2100 !important
			}

			.nav1 {
				transition: top 0.5s;
			}

			#indexbody {
				transition: margin-top 1.0s;
			}

			.nav-link {
				color: white
			}

			@media only screen and (max-width: 400px) {
				.nav-link {
					font-size: 12.3px;
					font-weight: 200;
					line-height: 1.2;
				}
			}

			@media only screen and (max-width: 310px) {
				.nav-link {
					font-size: 9.9px;
					font-weight: 200;
					line-height: 1.2;
				}
			}
		</style>

		<!-- ## Top nav for index page ## -->
		<!-- Nav1; Top Nav-fixed: Toggler & Brand, Search Icon, User Icon, Ellipsis-v Menu -->
		<nav class="nav1 navbar navbar-expand navbar-light bg-light fixed-top" id="indexnavbar">
			<h4 class="mt-auto navbar-brand">
				<a href="index"><i class="fa fa-home"></i> E-KAL</a>
			</h4>
			<ul class="ml-auto navbar-nav justify-content-end">
				<a href="javascript:void(0)" class="nav-link search-opennav" onclick="search_open()">
					<button class="btn btn-dark"><i class="fa fa-search"></i></button>
				</a>
				<a class="nav-link" href="myaccount?page=main">
					<button class="btn btn-dark"><i class="fa fa-user"></i></button>
				</a>

				<!-- Dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
						<button class="btn btn-dark"><i class="fa fa-ellipsis-v"></i></button>
					</a>
					<div class="dropdown-menu dropdown-menu-right py-0">
						<?php
						if ($user == "Guest") {
							?>
							<a class="dropdown-item p-2" href="index"><i class="ml-2 mr-3 fa fa-home"></i> Home</a>
							<hr class="m-0 p-0"/>
							<?php
							if (strpos($currentURL, "/cart") !== false) {
								?>
								<a class="dropdown-item p-3" href="login?prev=cart"><i class="mr-3 fa fa-lock"></i> Sign in</a>
								<hr class="m-0 p-0"/>
								<?php

							} elseif (strpos($currentURL, "/saved") !== false) {
								?>
								<a class="dropdown-item p-3" href="login?prev=saved"><i class="mr-3 fa fa-lock"></i> Sign in</a>
								<hr class="m-0 p-0"/>
								<?php

							} else {
								?>
								<a class="dropdown-item p-3" href="login"><i class="mr-3 fa fa-lock"></i> Sign in</a>
								<hr class="m-0 p-0"/>
								<?php
							}
							?>
							<a class="dropdown-item p-3" href="saved"><i class="mr-3 far fa-heart"></i> Saved</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="myaccount?page=main"><i class="mr-3 far fa-user"></i> My Account</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="recent_search"><i class="mr-3 far fa-clock"></i> Recent Searches</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
							<?php

						} elseif ($user !== "Guest") {
							?>
							<a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="recent_search"><i class="mr-3 far fa-clock"></i> Recent Searches</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
							<?php
						}
						?>
					</div>
				</li>
			</ul>

			<!-- Navbar Properties -->
			<div class="body fixed-top bg-light pt-2 pb-0" id="indexbody">

				<!-- Navbar links -->
				<div class="container-fluid nav-bottom-links">
					<div class="row">
						<div class="py-3 px-3">
							<button class="btn btn-sm btn-primary" type="button" id="sidenav-open">
								<i class="fa fa-bars"></i>
							</button>
						</div>

						<div class="nav-item text-center col px-2">
							<a class="nav-link text-center" href="index">
								<i class="fa fa-home"></i>
								<br/>
								<span class="home">Home</span>
							</a>
						</div>
						<div class="nav-item text-center col px-2">
							<a class="nav-link text-center wish-text" href="saved">

								<?php if (($nWish) < 1) { ?>
									<i id="fa" class="far fa-heart"></i>
								<?php } ?>

								<?php if (($nWish) > 0) { ?>
									<i id="fa" class="fa fa-heart"></i>
								<?php } ?>

								<span class="badge bg-danger"><i><?php echo $nWish; ?></i></span>
								<br/>
								<span class="saved">Saved</span>
							</a>
						</div>
						<div class="nav-item text-center col px-2">
							<a class="nav-link text-center cart-text" href="cart">
								<i class="fa fa-shopping-cart"></i>
								<span class="badge bg-danger"><i><?php echo $nCart; ?></i></span>
								<br/>
								<span class="cart">Cart</span>
							</a>
						</div>
					</div>
				</div>

			</div>

		</nav>
	<br/><br/>
	<?php

	} else {
	//Else use the below top nav for other unspecified pages in this script
	?>
		<script src="./assets/searchIndex.js"></script>

		<!-- Nav1; Top Nav-fixed: Toggler & Brand, Search Icon, User Icon, Ellipsis-v Menu -->
		<nav class="nav1 navbar navbar-expand navbar-dark fixed-top p-5" id="indexnavbar">
			<h4 class="navbar-brand mt-3">
				<a href="index"><img class="img-fluid img-thumbnail" src="./wwwroot/img/icon.png"/></a>
				E-CAL
			</h4>
			<ul class="ml-auto navbar-nav justify-content-end">
				<a href="javascript:void(0)" class="nav-link search-opennav" onclick="search_open()">
					<i class="btn btn-md btn-dark fa fa-search"></i>
				</a>
				<a class="nav-link" href="">
					<i class="btn btn-dark fa fa-user"></i>
				</a>

				<!-- Dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
						<i class="btn btn-dark fa fa-ellipsis-v"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right py-0">
						<?php
						if ($user !== "Guest") {
							?>
							<a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="recent_search"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
							<?php

						} elseif ($user == "Guest") {
							?>
							<a class="dropdown-item p-2" href="index"><i class="ml-2 mr-3 fa fa-home"></i> Home</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="login"><i class="mr-3 fa fa-lock"></i> Sign in</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="saved"><i class="mr-3 fa fa-heart-o"></i> Saved</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="myaccount?page=main"><i class="mr-3 fa fa-user-o"></i> My Account</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="recent_search"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
							<hr class="m-0 p-0"/>
							<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
							<?php
						}
						?>
					</div>
				</li>
			</ul>
		</nav><br/>
		<?php
	}

	// 1. If any of the following links is true perform the tasks belows
	if (strpos($currentURL, "/signup") !== false ||
	    strpos($currentURL, "/login") !== false ||
	    strpos($currentURL, "/men") !== false ||
	    strpos($currentURL, "/women") !== false ||
	    strpos($currentURL, "/myaccount") !== false) {
		?>
		<script src="./assets/searchGeneral.js"></script>
		<!-- 1.1  Nav with Page links for the above listed pages -->
		<!--  Nav: Page links -->
		<nav class="pt-3 nav2 navbar navbar-expand navbar-dark" id="general-navbar"> <!-- Navbar Properties -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Navbar links -->
			<div class="collapse navbar-collapse" id="general-navbar-body">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<?php
						if (strpos($currentURL, "/signup") !== false) {
							if ($user == 'Guest') {
								?>
								<!-- ## nav for signup page ## -->
								<span class="nav-link ml-sm-5 mr-auto">
												<a href="login"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
												<font size="5px">Create Account</font>
											</span>
								<?php
							}

						} elseif (strpos($currentURL, "/login") !== false) {
							$prev = "";
							//If 'prev' is set in the url
							if (isset($_GET['prev'])) {
								# code...
								//Set $prev for the value of 'prev'
								$prev = @$_GET['prev'];
							} else {
								# code...
								$prev = 'index';
							}

							// //If $prev = men
							// if ($prev == "men") {
							// 	//$prev_men = men.php
							// 	$prev_link = "men";

							// //ElseIf $prev = women
							// } elseif ($prev == "women") {
							// 	//$prev_men = women.php
							// 	$prev_link = "women";

							// //ElseIf $prev = cart
							// } elseif ($prev == "cart") {
							// 	//$prev_men = women.php
							// 	$prev_link = "cart";

							// //ElseIf $prev = saved
							// } elseif ($prev == "saved") {
							// 	//$prev_men = women.php
							// 	$prev_link = "saved";

							// } else {
							// 	//else $prev_link = index.php
							// 	$prev_link = "index";
							// }

							?>

							<!-- ## nav for login page ## -->
							<span class="nav-link ml-sm-5 mr-auto">
											<a href="<?php echo $prev; ?>"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
											<font size="5px">Login</font>
										</span>
							<?php

						} elseif (strpos($currentURL, "/men") !== false) {
							?>
							<style>
								.fixed-top {
									z-index: 98 !important
								}

								@media only screen and (max-width: 480px) {
									.info {
										font-size: 15px
									}
								}

								@media only screen and (max-width: 400px) {
									.info {
										font-size: 14px
									}
								}

								@media only screen and (max-width: 330px) {
									.info {
										font-size: 12px
									}
								}
							</style>

							<!-- ## Top nav for men page ## -->
							<!-- Nav1; Top Nav-fixed: Toggler & Brand, Search Icon, User Icon, Ellipsis-v Menu -->
							<nav class="nav1 navbar navbar-expand navbar-dark fixed-top  pt-5 pb-5" id="navbar">
								<h4 class="mt-1">
									<a href="#" data-target="#sidebar" data-toggle="collapse" aria-expanded="false"><i class="fa fa-navicon"></i></a>
								</h4>
								<span class="nav-link mt-3 ml-sm-5 mr-auto">
												<a href="index"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
												<font size="5px" class="info">Men's Sandals</font>
												<br/><br/>
											</span>
								<ul class="ml-auto navbar-nav justify-content-end">
									<a href="javascript:void(0)" class="nav-link search-opennav" onclick="search_open()">
										<i class="btn btn-md btn-dark fa fa-search"></i>
									</a>
									<a class="nav-link" href="">
										<i class="btn btn-dark fa fa-user"></i>
									</a>

									<!-- Dropdown -->
									<li class="nav-item dropdown">
										<a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
											<i class="btn btn-dark fa fa-ellipsis-v"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right py-0">
											<?php
											//If user isn't signed in display the following options
											if ($user == "Guest") {
												?>
												<a class="dropdown-item p-2" href="index"><i class="ml-2 mr-3 fa fa-home"></i> Home</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="login?prev=men"><i class="mr-3 fa fa-lock"></i> Sign in</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="saved"><i class="mr-3 fa fa-heart-o"></i> Saved</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-user-o"></i> My Account</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="recent_search"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
												<?php

											} else//If user is loggedin display the following options
												if ($user !== "Guest") {
													?>
													<a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a>
													<hr class="m-0 p-0"/>
													<a class="dropdown-item p-3" href="recent_search"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a>
													<hr class="m-0 p-0"/>
													<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
													<hr class="m-0 p-0"/>
													<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
													<?php
												}
											?>
										</div>
									</li>
								</ul>
							</nav>
							<?php

						} elseif (strpos($currentURL, "/women") !== false) {
							?>
							<style>
								.fixed-top {
									z-index: 98 !important
								}

								@media only screen and (max-width: 480px) {
									.info {
										font-size: 15px
									}
								}

								@media only screen and (max-width: 400px) {
									.info {
										font-size: 9px
									}
								}
							</style>

							<!-- ## Top nav for women page ## -->
							<!-- Nav1; Top Nav-fixed: Toggler & Brand, Search Icon, User Icon, Ellipsis-v Menu -->
							<nav class="nav1 navbar navbar-expand navbar-dark fixed-top  pt-5 pb-5" id="navbar">
								<h4 class="mt-1">
									<a href="#" data-target="#sidebar" data-toggle="collapse" aria-expanded="false"><i class="fa fa-navicon"></i></a>
								</h4>
								<span class="nav-link ml-sm-5 mr-auto">
												<a href="index"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
												<font size="5px" class="info">Women's Sandals</font>
											</span>
								<ul class="ml-auto navbar-nav justify-content-end">
									<a href="javascript:void(0)" class="nav-link search-opennav" onclick="search_open()">
										<button class="btn btn-dark"><i class="fa fa-search"></i></button>
									</a>
									<a class="nav-link" href="">
										<button class="btn btn-dark"><i class="fa fa-user"></i></button>
									</a>

									<!-- Dropdown -->
									<li class="nav-item dropdown">
										<a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
											<button class="btn btn-dark"><i class="fa fa-ellipsis-v"></i></button>
										</a>
										<div class="dropdown-menu dropdown-menu-right py-0">
											<?php
											//If user isn't signed in display the following options
											if ($user == "Guest") {
												?>
												<a class="dropdown-item p-2" href="index"><i class="ml-2 mr-3 fa fa-home"></i> Home</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="login?prev=women"><i class="mr-3 fa fa-lock"></i> Sign in</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="saved"><i class="mr-3 fa fa-heart-o"></i> Saved</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="myaccount?page=main"><i class="mr-3 fa fa-user-o"></i> My Account</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="recent_search"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
												<?php

											} else//If user is loggedin display the following options
												if ($user !== "Guest") {
													?>
													<a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a>
													<hr class="m-0 p-0"/>
													<a class="dropdown-item p-3" href="recent_search"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a>
													<hr class="m-0 p-0"/>
													<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
													<hr class="m-0 p-0"/>
													<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
													<?php
												}
											?>
										</div>
									</li>
								</ul>
							</nav>
							<?php

						} elseif (strpos($currentURL, "/myaccount") !== false) {
							?>
							<style>
								.nav1 {
									transition: margin-top 0.5s !important;
								}

								@media only screen and (max-width: 480px) {
									.info {
										font-size: 15px
									}
								}

								@media only screen and (max-width: 400px) {
									.info {
										font-size: 9px
									}
								}
							</style>

							<!-- ## Top nav for women page ## -->
							<!-- Nav1; Top Nav-fixed: Toggler & Brand, Search Icon, User Icon, Ellipsis-v Menu -->
							<nav class="nav1 navbar navbar-expand navbar-dark bg-light fixed-top pt-5 pb-5" id="navbar">
											<span class="nav-link ml-sm-5 pt-0 mr-auto">
												<?php
												if (strpos($currentURL, "/myaccount?page=main") !== false) {
													?>
													<a href="index"><font size="5px"><i class="fa fa-arrow-left mr-3"></i></font></a>
													<font size="5px" class="info">My Account</font>
													<?php

												} elseif (strpos($currentURL, "/myaccount?page=profile") !== false) {
													?>
													<a href="myaccount?page=main"><font size="5px"><i class="fa fa-arrow-left mr-3"></i></font></a>
													<font size="5px" class="info">Profile</font>
													<?php

												} elseif (strpos($currentURL, "/myaccount?page=address") !== false) {
													?>
													<a href="myaccount?page=main"><font size="5px"><i class="fa fa-arrow-left mr-3"></i></font></a>
													<font size="5px" class="info">Address(s)</font>
													<?php

												} elseif (strpos($currentURL, "/myaccount?page=ratings") !== false) {
													?>
													<a href="myaccount?page=main"><font size="5px"><i class="fa fa-arrow-left mr-3"></i></font></a>
													<font size="5px" class="info">Rating(s)</font>
													<?php

												} elseif (strpos($currentURL, "/myaccount?page=country") !== false) {
													?>
													<a href="myaccount?page=main"><font size="5px"><i class="fa fa-arrow-left mr-3"></i></font></a>
													<font size="5px" class="info">Country</font>
													<?php
												}
												?>
											</span>
								<ul class="mlvhjhgjgjzf-auto navbar-nav justify-content-end">
									<!-- <form action="#" method="POST" class="ml-auto form-inline"> -->
									<a href="javascatsegsgript:void(0)" class="nav-link search-opennav" onclick="search_open()">
										<button class="btn btn-dark"><i class="fa fa-search"></i></button>
									</a>
									<!-- </form> -->
									<a class="nav-link" href="cart">
										<button class="btn btn-dark">
											<i class="fa fa-shopping-cart"></i> <span class="badge bg-danger"><?php echo $nCart; ?></span>
										</button>
									</a>

									<!-- Dropdown -->
									<li class="nav-item dropdown">
										<a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
											<button class="btn btn-dark"><i class="fa fa-ellipsis-v"></i></button>
										</a>
										<div class="dropdown-menu dropdown-menu-right py-0">
											<?php
											//If user isn't signed in display the following options
											if ($user == "Guest") {
												?>
												<a class="dropdown-item p-2" href="index"><i class="ml-2 mr-3 fa fa-home"></i> Home</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="login"><i class="mr-3 fa fa-lock"></i> Sign in</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="saved"><i class="mr-3 far fa-heart"></i> Saved</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="recent_search"><i class="mr-3 far fa-clock"></i> Recent Searches</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
												<hr class="m-0 p-0"/>
												<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
												<?php

											} else//If user is loggedin display the following options
												if ($user !== "Guest") {
													?>
													<a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a>
													<hr class="m-0 p-0"/>
													<a class="dropdown-item p-3" href="recent_search"><i class="mr-3 far fa-clock"></i> Recent Searches</a>
													<hr class="m-0 p-0"/>
													<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
													<hr class="m-0 p-0"/>
													<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
													<?php
												}
											?>
										</div>
									</li>
								</ul>
							</nav>
							<br/>
							<?php
						}
						?>
					</li>
				</ul>
			</div>
		</nav>
	<?php

	} else {
	// Display red border below the active link; Current page: Home, saved or cart
	?>
	<?php if (strpos($currentURL, "/index") !== false) { ?>
		<style>
			.home {
				color: rgb(7, 7, 7) !important;
				border-bottom: 2px solid red !important
			}
		</style>

	<?php } elseif (strpos($currentURL, "/saved") !== false) { ?>
		<style>
			.saved {
				color: rgb(7, 7, 7) !important;
				border-bottom: 2px solid red !important
			}

			.nav-item .wish-text a:hover > .badge i {
				color: white !important
			}
		</style>

	<?php } elseif (($currentURL) == 'http://localhost/ecal/') { ?>
		<style>
			.home {
				color: rgb(7, 7, 7) !important;
				border-bottom: 2px solid red !important
			}
		</style>
	<?php } ?>

		<?php if (strpos($currentURL, "/cart") !== false) { ?>
		<style>
			.cart {
				color: rgb(7, 7, 7) !important;
				border-bottom: 2px solid red !important
			}

			.nav-item .cart-text .badge i {
				color: white !important
			}
		</style>
	<?php } ?>
		<!-- Display the following bottom nav if page not any mentioned in 1. above -->
		<!--  Nav2; Bottom Nav: Page links
			<button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Navbar links
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav m-auto">
					<li class="nav-item">
						<a class="nav-link mr-4  mr-sm-5 text-center" href="index.php">
							<i class="fa fa-home"></i>
							<br />
							<span class="home">Home</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mr-4 mr-sm-5 text-center" href="wish.php">
							<i class="fa fa-heart"></i>
							<span class="badge bg-danger">100</span>
							<br />
							<span class="saved">Saved</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-center" href="cart.php">
							<i class="fa fa-shopping-cart"></i>
							<span class="badge bg-danger">100</span>
							<br />
							<span class="cart">Cart</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>-->
		<?php
	}
	?>
</header>
<body>
<br/>