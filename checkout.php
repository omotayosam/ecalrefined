<?php include './include/header.php'; ?>
<?php $items = $store->getCartUserItems($u_id); ?>
<?php $U_addresses = $store->getUserAddress($u_id, $u_name, $u_email); ?>
	<style>
		.row {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			margin-right: -15px;
			margin-left: -15px
		}

		.load-address-mess {
			position: fixed;
			top: 50%;
			left: 50%;
			right: 50%;
			/* text-align: center; */
			display: none;
			z-index: 2800
		}
	</style>

	<img class="load-address-mess" src="./wwwroot/owlcarousel/assets/ajax-loader.gif" alt="" srcset="" />
	<div id="address-overlay" class="overlay" style="display:none"></div>
	<div id="address-mess" style="display:none"></div>

	<div class="w3l_banner_nav_right">
		<!-- about -->
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>

			<div class="checkout-left">
				<div class="col-md-4 checkout-left-basket">
					<ul>
						<li>Product1 <i>-</i> <span>$15.00 </span></li>
						<li>Product2 <i>-</i> <span>$25.00 </span></li>
						<li>Product3 <i>-</i> <span>$29.00 </span></li>
						<li>Total Service Charges <i>-</i> <span>$15.00</span></li>
						<li>Total <i>-</i> <span>$84.00</span></li>
					</ul>
				</div>


				<div class="col-md-8 address_form_agile">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title asd">
								<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Existing Addresses
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<div class="row"><?php echo $U_addresses; ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<h4>Add a new Details</h4>
					<form action="payment.php" method="post" class="creditly-card-form agileinfo_form">
						<section class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row form-group">
									<div class="controls">
										<label class="control-label">Full name: </label>
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<label class="control-label">Mobile number:</label>
												<input class="form-control" type="text" placeholder="Mobile number">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right">
											<div class="controls">
												<label class="control-label">Landmark: </label>
												<input class="form-control" type="text" placeholder="Landmark">
											</div>
										</div>
										<div class="clear"></div>
									</div>
									<div class="controls">
										<label class="control-label">Town/City: </label>
										<input class="form-control" type="text" placeholder="Town/City">
									</div>
									<div class="controls">
										<label class="control-label">Address type: </label>
										<select class="form-control option-w3ls" style="padding: 0px 10px 0px 10px !important;">
											<option>Office</option>
											<option>Home</option>
											<option>Commercial</option>
										</select>
									</div>
								</div>
								<button class="submit check_out">Delivery to this Address</button>
							</div>
						</section>
					</form>
					<div class="checkout-right-basket">
						<a href="payment.php">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
					</div>
				</div>

				<div class="clearfix"></div>

			</div>

		</div>
		<!-- //about -->
	</div>
	<div class="clearfix"></div>
	<!-- //banner -->

<?php include 'include/footer.php'; ?>