<?php

	/**
	 * @param mysqli $link Link identifier returned by mysqli connection
	 */
	class Store
	{
		public $link;

		/**
		 * @param mysqli $link
		 * @return mixed
		 */
		public function __construct($link)
		{
			$this->link = $link;
		}

		public function getAllItems()
		{
			$get_items = $this->link->query("SELECT * FROM `items`");
			$count_items = $get_items->num_rows;

			if ($count_items > 0) {
				# code...
			}
		}

		public function getNewArrivals()
		{
			$get_items = $this->link->query("SELECT * FROM `items` ORDER BY `id` DESC LIMIT 8");
			$count_items = $get_items->num_rows;

			if ($count_items > 0) {
				# code...
				$return = [];
				$discount = 10;

				while ($item = $get_items->fetch_array()) {
					$item_id = $item['id'];
					$item_name = $item['item_name'];
					$currency = $item['currency'];
					$item_pic = $item['item_pic'];
					$item_price = $item['price'];

					$calc_price = ($item_price * $discount) / 100;
					$d_price = $item_price - $calc_price;

					$discounted = number_format($calc_price, 2);
					$price = number_format($item_price, 2);
					$discount_price = number_format($d_price, 2);

					$cart_discounted = sprintf('%0.2f', $calc_price);
					$cart_price = sprintf('%0.2f', $item_price);
					$cart_discount_price = sprintf('%0.2f', $d_price);


					$items = '
					<div class="col-md-3 top_brand_left">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid" style="margin: 10px 0px 10px 0px;">
								<div class="agile_top_brand_left_grid_pos">
									<img src="images/offer.png" alt="" class="img-responsive" />
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb w3-small">
												<a href="single?act=preview&item_id=' . $item_id . '"><img src="' . $item_pic . '" alt="" class="img-fluid" style="height: 200px"/></a>
												<p>' . $item_name . '</p>
												<h4>' . $currency . $discount_price . ' <span>' . $currency . $price . '</span></h4>
											</div>
											<div class="snipcart-details top_brand_home_details">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart" />
		                                                <input type="hidden" name="add" value="1" />
		                                                <input type="hidden" name="business" value=" " />
		                                                <input type="hidden" name="item_name" value="' . $item_name . '" />
		                                                <input type="hidden" name="item_id" value="' . $item_id . '" />
		                                                <input type="hidden" name="amount" value="' . $cart_price . '" />
		                                                <input type="hidden" name="discount_amount" value="' . $cart_discounted . '" />
		                                                <input type="hidden" name="currency_code" value="NGN" />
		                                                <input type="hidden" name="return" value=" " />
		                                                <input type="hidden" name="cancel_return" value=" " />
		                                                <input type="submit" name="submit" value="Add to cart" class="button" />
													</fieldset>
												</form>
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>
				';

					array_push($return, $items);
				}

				$item = implode($return);

				return ['no_items' => $count_items, 'items' => $item];
			}
		}

		public function getItemById($item_id)
		{
			$return = [];
			$discount = 10;

			if (!empty($item_id)) {
				# code...
				$get_item = $this->link->query("SELECT * FROM `items` WHERE `id` = '{$item_id}'");
				$no_rows = $get_item->num_rows;

				if ($no_rows == 1) {
					# code...
					$item = $get_item->fetch_array();

					$return['name'] = $item['item_name'];
					$return['pic'] = $item['item_pic'];
					$return['details'] = $item['item_details'];
					$return['currency'] = $item['currency'];
					$return['price'] = $item['price'];
					$return['no_left'] = $item['no_item_left'];

					$calc_price = ($return['price'] * $discount) / 100;
					$d_price = $return['price'] - $calc_price;

					$return['discounted'] = number_format($calc_price, 2);
					$return['m_price'] = number_format($return['price'], 2);
					$return['discount_price'] = number_format($d_price, 2);

					$return['cart_discounted'] = sprintf('%0.2f', $calc_price);
					$return['cart_price'] = sprintf('%0.2f', $return['price']);
					$return['cart_discount_price'] = sprintf('%0.2f', $d_price);
				}
			}

			return $return;
		}

		public function getCartUserItems($user_id)
		{
			$array = [];

			$check_cart = $this->link->query("SELECT * FROM `cart` WHERE `user_id` = '{$user_id}'");
			$no_rows = $check_cart->num_rows;

			if ($no_rows > 0) {
				while ($cart_item = $check_cart->fetch_array()) {
					$cart_id = $cart_item['id'];
					$item_id = $cart_item['item_id'];
					$quantity = $cart_item['item_count'];
					$sub_total = $cart_item['subtotal'];
					$total_price = $cart_item['total_price'];

					$item = $this->getItemById($item_id);

					$item_name = $item['name'];
					$item_pic = $item['pic'];
					$item_currency = $item['currency'];

					$items = '
					<tr class="rem-item">
						<td id="item-no" class="invert"></td>
						<td class="invert-image"><a href="single.php"><img src="' . $item_pic . '" alt=" " class="img-responsive" style="width: 80px;"></a></td>
						<td class="invert">
							<div class="quantity">
								<div class="quantity-select">
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">' . $item_name . '</td>

						<td class="invert">' . $item_currency . $total_price . '</td>
						<td class="invert">
							<div class="rem">
								<div class="close-item"></div>
							</div>
						</td>
					</tr>
					
					<script>
						$(document).ready(function() {
						    $(\'.rem-item\').each(function(index, value) {
						        var i = index + 1;
						    
						        $(\'#item-no\', this).text(i);
						    });
						});
					</script>
				';

					array_push($array, $items);
				}

				$return = implode('', $array);

			} else {
				$return = 'Cart is Empty!!!';
			}

			return $return;
		}

		public function getUserAddress($u_id, $u_name, $email)
		{
			$array = [];

			$get_current_address = $this->link->query("SELECT `address_id` FROM `users` WHERE `email` = '{$email}'");
			$curr_add = $get_current_address->fetch_array();
			$curr_add_id = $curr_add['address_id'];

			$get_address = $this->link->query("SELECT * FROM `address` WHERE `user_id` = '$u_id'");
			$address_num_rows = $get_address->num_rows;

			if ($get_address) {
				# code...
				if ($address_num_rows > 0) {
					# code...
					while ($address = $get_address->fetch_array()) {
						# code...
						$add_id = $address['id'];
						$pnum = $address['phone_number'];
						$state = $address['state'];
						$lga = $address['lga'];
						$r_address = $address['resident_address'];

						$addresses = '
			                <div class="col-lg-6 px-md-4 mb-5">
			                    <div class="row h-100">
			                        <div class="well address-card h-100 w-100 shadow">
			                            <span class="address-select border w3-border-blue h-100" title="Click to use this address" data-aid="' . $curr_add_id . '">
			                                <div class="card-header">
			                                    <div class="row">
			                                        <div class="col text-left">
			                                            <input id="' . $add_id . '" class="address custom-radio" type="radio" name="address" />
			                                            <span id="add-no" class="ml-3"></span>
			                                        </div>
			                                        <div class="text-right"><a href="" id="remove-address" class="w3-hover-text-red p-4" data-rid="' . $add_id . '" title="Remove this address"><i class="fa fa-times"></i></a></div>
			                                    </div>
			                                </div>
			                                <div class="card-body pb-0">
			                                    <table class="table table-responsivbe table-hover w-100">
			                                        <tbody>
			                                            <tr>
			                                                <td><i class="fa fa-user"></i></td>
			                                                <td class="info">
			                                                    <div>' . $u_name . '</div>
			                                                </td>
			                                            </tr>
			                                            <tr>
			                                                <td>
			                                                    <div style="line-height: 1.0"><i class="fa fa-phone"></i></div>
			                                                </td>
			                                                <td class="info">
			                                                    <div style="line-height: 1.0;max-width:100%">' . $pnum . '</div>
			                                                </td>
			                                            </tr>
			                                            <tr>
			                                                <td>
			                                                    <div style="line-height: 1.0"><i class="fa fa-home"></i></div>
			                                                </td>
			                                                <td class="info">
			                                                    <div style="line-height: 1.0;max-width:100%">' . $r_address . '</div>
			                                                </td>
			                                            </tr>
			                                            <tr>
			                                                <td><i class="fa fa-map-marker"></i></td>
			                                                <td>
			                                                    <div style="line-height: 1.0;max-width:100%">' . $lga . '</div>
			                                                    <div style="line-height: 1.0;max-width:100%">' . $state . '</div>
			                                                </td>
			                                            </tr>
			                                        </tbody>
			                                    </table>
			                                </div>
			                            </span>
			                            <div class="card-footer w3-hover-grey" data-id="' . $add_id . '" title="Click to Edit Address">
			                                <div class="text-right"><a href="">Edit Address</a></div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            ';
						array_push($array, $addresses);
					}

					$addresses = '
						<script>
							$(document).ready(function() {
								// Function to check if am element is hovered upon
								jQuery.fn.mouseIsOver = function () {
									return $(this[0]).is(\':hover\');
								};
							    $(\'.address-select\').each(function(index, value) {
							        var i = index + 1;
							
							        $(\'#add-no\', this).text(i);
							    });
							
							    var curr_add = $(\'.address-card .address-select\').data(\'aid\');
							
							    $(\'.address.custom-radio[id="\' + curr_add + \'"]\').prop(\'checked\', \'checked \');
							
							    $(\'.address-card #remove-address\').click(function(e) {
							        e.preventDefault();
							        var add_id = $(this).data(\'rid\');
							
							        $.get(\'./profile_actions/select_address.php?address_id=\' + add_id + \'\', function(result) {
							            $(\'#address-mess\').html(result);
							
							            $(\'#address-overlay\').fadeIn(1500, function() {
							                $(\'.load-address-mess\').fadeIn(1500, function() {
							                    $(\'.load-address-mess\').delay(2000).fadeOut(2000, function() {
							                        $(\'#address-overlay\').fadeOut(1000, function() {
							                            $(window).scrollTop(0);
							                            $(\'#address-mess\').slideDown(900, function() {
							                                $(\'#address-row\').load("./load_page/user_addresses.php", function() {
							                                    $(\'#address-mess\').delay(3000).slideUp(2000);
							                                });
							                            });
							                        });
							                    });
							                });
							            });
							
							        });
							    });
							
							    $(\'.address-card .address-select\').click(function(e) {
							        //e.preventDefault();
							
							        if (($(\'#remove-address\', this).mouseIsOver()) === false) {
							            $(\'.address.custom-radio\', this).prop(\'checked\', \'checked \');
							            var add_id = $(\'input[name="address"]\', this).attr(\'id\');
							
							            $.post(\'./profile_actions/select_address.php\', {
							                address_id: add_id
							            }, function(result) {
							                $(\'#address-mess\').html(result);
							
							                $(\'#address-overlay\').fadeIn(1000, function() {
							                    $(\'.load-address-mess\').fadeIn(1000, function() {
							                        $(\'.load-address-mess\').delay(1000).fadeOut(1000, function() {
							                            $(\'#address-overlay\').fadeOut(1000, function() {
							                                $(window).scrollTop(0);
							                                $(\'#address-mess\').slideDown(900, function() {
							                                    $(\'#address-mess\').delay(3000).slideUp(2000);
							                                });
							                            });
							                        });
							                    });
							                });
							
							            });
							        }
							    });
							
							    $(\'.address-card .card-footer\').click(function(e) {
							        e.preventDefault();
							        $(\'#add-submit\').text(\'Update Address\');
							
							        var id = $(this).data(\'id\');
							
							        $(\'#address-overlay\').fadeIn(1500, function() {
							            $(\'#edit-address-form\').fadeIn(200, function() {
							                $(\'#close-edit-address\').click(function(e) {
							                    e.preventDefault();
							
							                    $(\'#edit-address-form\').fadeOut(200, function() {
							                        $(\'#address-row\').load("./load_page/user_addresses.php", function() {
							                            $(\'#address-overlay\').fadeOut();
							                        });
							                    });
							                });
							
							                $(\'#edit-address-form\').submit(function(e) {
							                    e.preventDefault();
							
							                    $(\'#edit-address-mess\').html(\'<span class="text-primary"><i class="text-danger fa fa-exclamation"></i> Please Wait...</span>\');
							                    $(\'#edit-address-mess\').show();
							
							                    var action = $(this).attr(\'action\');
							
							                    $(this).ajaxSubmit({
							                        url: action,
							                        method: \'POST\',
							                        data: {
							                            id: id
							                        },
							                        success: function(result) {
							                            if (result.includes(\'Error\')) {
							                                setTimeout(() => {
							                                    $(\'#address-row\').load("./load_page/user_addresses.php", function() {
							                                        $(\'#edit-address-mess\').html(result)
							                                    });
							                                }, 2500)
							
							                            } else {
							                                setTimeout(() => {
							                                    $(\'#edit-address-mess\').fadeOut(function() {
							                                        $(\'#address-mess\').html(result);
							
							                                        $(\'#edit-address-form\').fadeOut(1500, function() {
							                                            $(\'#address-overlay\').fadeOut(800, function() {
							                                                $(window).scrollTop(0);
							                                                $(\'#address-mess\').slideDown(900, function() {
							                                                    $(\'#address-row\').load("./load_page/user_addresses.php", function() {
							                                                        $(\'#address-mess\').delay(3000).slideUp(2000);
							                                                    });
							                                                });
							                                            });
							                                        });
							                                    });
							                                }, 2500);
							                            }
							                        }
							                    });
							                });
							            });
							        });
							    });
							
							    $(\'#state-sel\').on({
							        change: function() {
							            var state_id = $(this).children(":selected").attr("id")
							            // $(this.options[this.selectedIndex]).attr(\'id\');
							
							            $.post("profile_actions/lga.php?state_id=" + state_id, function(data) {
							                $("#lga-sel").html(data);
							                $("#lga-sel").removeAttr(\'disabled\');
							            });
							        }
							    });
							});
						</script>
					';
					array_push($array, $addresses);

				} else {
					$return = 'DB error!!!';
				}
				$return = implode('', $array);

			} else {
				$return = 'Oops that was from us!!!';
			}

			return $return;
		}
	}

	$store = new Store($connect);
?>