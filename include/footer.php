<!-- ========[ Footer ]======== -->
<!-- <footer class="bg-white" style="padding-top:5px;padding-bottom:5px;"><!-- Footer
    <div class="d-flex justify-content-center mb-3"><!-- Puts all the list items on a straight line and center it 
        <div class="p-2" style="font-size:25px"><a href="http://www.twitter.com/"><i class="fab fa-twitter"></i></a></div>
        <div class="p-2" style="font-size:25px"><a href="http://www.facebook.com/"><small class="fab fa-facebook-f"></small></a></div>
        <div class="p-2" style="font-size:25px"><a href="http://www.youtube.com/"><small class="fab fa-youtube"></small></a></div>
    </div>
    <div class="mt-0 text-center">
        <b class="text-dark">&copy; EKAL <?php echo $year; ?></b>
        <br />
        <span class="text-dark">Crafted With <i class="heart text-danger far fa-heart"></i> By SAMBOLT Inc.</span>        
    </div><!-- End Container
</footer> -->

<!-- newsletter -->
<div class="newsletter">
	<div class="container">
		<div class="w3agile_newsletter_left">
			<h3>sign up for our newsletter</h3>
		</div>
		<div class="w3agile_newsletter_right">
			<form action="#" method="post">
				<input type="email" name="Email" value="Email" onfocus="this.value= '';" onblur="if (this.value == '') {this.value= 'Email';}" required="">
				<input type="submit" value="subscribe now">
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //newsletter -->
<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="col-md-3 w3_footer_grid">
			<h3>information</h3>
			<ul class="w3_footer_grid_list">
				<li><a href="./events.php">Events</a></li>
				<li><a href="./about.php">About Us</a></li>
				<li><a href="./products.php">Best Deals</a></li>
				<li><a href="./services.php">Services</a></li>
				<li><a href="./short-codes.php">Short Codes</a></li>
			</ul>
		</div>
		<div class="col-md-3 w3_footer_grid">
			<h3>policy info</h3>
			<ul class="w3_footer_grid_list">
				<li><a href="./faqs.php">FAQ</a></li>
				<li><a href="./privacy.php">privacy policy</a></li>
				<li><a href="./privacy.php">terms of use</a></li>
			</ul>
		</div>
		<div class="col-md-3 w3_footer_grid">
			<h3>what in stores</h3>
			<ul class="w3_footer_grid_list">
				<li><a href="./pet.php">Pet Food</a></li>
				<li><a href="./frozen.php">Frozen Snacks</a></li>
				<li><a href="./kitchen.php">Kitchen</a></li>
				<li><a href="./products.php">Branded Foods</a></li>
				<li><a href="./household.php">Households</a></li>
			</ul>
		</div>
		<div class="col-md-3 w3_footer_grid">
			<h3>twitter posts</h3>
			<ul class="w3_footer_grid_list1">
				<li><label class="fa fa-twitter" aria-hidden="true"></label><i>01 day ago</i><span>Non
                        numquam <a href="#">http://sd.ds/13jklf#</a>
                        eius modi tempora incidunt ut labore et
                        <a href="#">http://sd.ds/1389kjklf#</a>quo nulla.</span></li>
				<li><label class="fa fa-twitter" aria-hidden="true"></label><i>02 day ago</i><span>Con
                        numquam <a href="#">http://fd.uf/56hfg#</a>
                        eius modi tempora incidunt ut labore et
                        <a href="#">http://fd.uf/56hfg#</a>quo nulla.</span></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="agile_footer_grids">
			<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
				<div class="w3_footer_grid_bottom">
					<h4>100% secure payments</h4>
					<img src="./images/card.png" alt="" class="img-responsive"/>
				</div>
			</div>
			<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
				<div class="w3_footer_grid_bottom">
					<h5>connect with us</h5>
					<ul class="agileits_social_icons">
						<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="wthree_footer_copy">
			<p>© 2016 Grocery Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
	</div>
</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="./js/bootstrap.min.js"></script>
<script>
	$(document).ready(function () {
		$(".dropdown").hover(
			function () {
				$('.dropdown-menu', this).stop(true, true).slideDown("slow");
				$(this).toggleClass('open');
			},
			function () {
				$('.dropdown-menu', this).stop(true, true).slideUp("slow");
				$(this).toggleClass('open');
			}
		);
	});
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
	$(document).ready(function () {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear'
			};
		*/

		$().UItoTop({
			easingType: 'easeOutQuart'
		});

	});
</script>
<!-- //here ends scrolling icon -->

<script>
	// $(document).ready(function () {
	paypal.minicart.render();
	let items = paypal.minicart.cart.items(),
		len = items.length,
		total_quantity = 0,
		item,
		amount,
		arr = [],
		i;

	$.getJSON('./profile_actions/check_login.php', function (data) {
		localStorage.setItem('loggedIn', data.logged_in);
	});

	//TODO: get item_id when remove item from cart!!!
	paypal.minicart.cart.on('remove', function (idx) {
		let item = this.items(), len = items.length;
		// alert((item.length));
	})

	paypal.minicart.cart.on('checkout', function (evt) {
		items = this.items();
		len = items.length, total_quantity = 0, amount, arr = [], i;

		// Count the number of each item in the cart
		// for (i = 0; i < len; i++) {
		// 	total_quantity += items[i].get('quantity');
		// }

		for (i = 0; i < len; i++) {
			let item_id = items[i].get('item_id'),
				item_name = items[i].get("item_name"),
				item_amount = items[i].get("amount") - items[i].get("discount_amount"),
				item_quantity = items[i].get('quantity');

			item = {
				id: item_id,
				name: item_name,
				amount: item_amount,
				quantity: item_quantity
			};

			arr.push(item);
		}

		$.post('./profile_actions/addcart.php', {data: arr}, function (data) {
			console.log(data);
		});

		if (localStorage.getItem('loggedIn') == 'false') {
			let location = window.location.toString();
			alert('You must be signed in to continue!!!');
			evt.preventDefault();

			if (!location.includes('/login')) {
				window.location = './login';
			}

		} else if (total_quantity < 3) {
			alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
			evt.preventDefault();
		}
	});
	// });
</script>

<!-- checkout js -->
<!--quantity-->
<script>
	$('.value-plus').on('click', function () {
		var divUpd = $(this).parent().find('.value'),
			newVal = parseInt(divUpd.text(), 10) + 1;
		divUpd.text(newVal);
	});

	$('.value-minus').on('click', function () {
		var divUpd = $(this).parent().find('.value'),
			newVal = parseInt(divUpd.text(), 10) - 1;
		if (newVal >= 1) divUpd.text(newVal);
	});
</script>
<!--quantity-->
<script>
	$(document).ready(function (c) {
		$('.close1').on('click', function (c) {
			$('.rem1').fadeOut('slow', function (c) {
				$('.rem1').remove();
			});
		});
	});
</script>
<script>
	$(document).ready(function (c) {
		$('.close2').on('click', function (c) {
			$('.rem2').fadeOut('slow', function (c) {
				$('.rem2').remove();
			});
		});
	});
</script>
<script>
	$(document).ready(function (c) {
		$('.close3').on('click', function (c) {
			$('.rem3').fadeOut('slow', function (c) {
				$('.rem3').remove();
			});
		});
	});
</script>

<!-- //checkout js -->


<!--payment jscript -->
<!-- js -->
<!-- <script src="./js/jquery-1.11.1.min.js"></script> -->
<!-- easy-responsive-tabs -->
<link rel="stylesheet" type="text/css" href="./css/easy-responsive-tabs.css "/>
<script src="./js/easyResponsiveTabs.js"></script>
<!-- //easy-responsive-tabs -->
<script type="text/javascript">
	$(document).ready(function () {
		//Horizontal Tab
		$('#parentHorizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion
			width: 'auto', //auto or any width like 600px
			fit: true, // 100% fit in a container
			tabidentify: 'hor_1', // The tab groups identifier
			activate: function (event) { // Callback function if tab is switched
				var $tab = $(this);
				var $info = $('#nested-tabInfo');
				var $name = $('span', $info);
				$name.text($tab.text());
				$info.show();
			}
		});
	});
</script>
<!-- credit-card -->
<script type="text/javascript" src="./js/creditly.js"></script>
<link rel="stylesheet" href="./css/creditly.css" type="text/css" media="all"/>

<script type="text/javascript">
	$(function () {
		var creditly = Creditly.initialize(
			'.creditly-wrapper .expiration-month-and-year',
			'.creditly-wrapper .credit-card-number',
			'.creditly-wrapper .security-code',
			'.creditly-wrapper .card-type');

		$(".creditly-card-form .submit").click(function (e) {
			e.preventDefault();
			var output = creditly.validate();
			console.log(output);
			if (output) {
				// Your validated credit card output
				console.log(output);
			}
		});
	});
</script>
<!-- //credit-card -->

<!-- //js -->
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
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="./js/move-top.js"></script>
<script type="text/javascript" src="./js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$(".scroll").click(function (event) {
			event.preventDefault();
			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
			}, 1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</body>

</html>
<!-- ========[ End of Footer ]======== -->