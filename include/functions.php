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
}

$store = new Store($connect);