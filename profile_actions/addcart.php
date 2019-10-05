<?php include '../include/session.php'; ?>
<?php
if (isset($_POST)) {
	$items_info = $_POST['data'];
	foreach ($items_info as $items) {
		$item_id = $items['id'];
		$item_name = $items['name'];
		$item_sub_total = $items['amount'];
		$item_quantity = $items['quantity'];

		$item_total = $item_sub_total * $item_quantity;
		$item = $store->getItemById($item_id);

		$item_name = $item['name'];
		$item_left = $item['no_left'];

		echo $item_name . ' :- ' . $item_id . ', ' . $item_quantity . ', ' . $item_sub_total . ', ' . $item_total . ' ' . $item_left . '<br />';

		$check_cart = $connect->query("SELECT * FROM `cart` WHERE `item_id` = '{$item_id}' AND `user_id` = '{$u_id}'");
		$no_row = $check_cart->num_rows;

		if ($no_row > 0) {
			$update_cart = $connect->query("UPDATE `cart` SET `item_count` = '{$item_quantity}', `total_price` = '$item_total' WHERE `item_id` = '{$item_id}' AND `user_id` = '{$u_id}'");

		} else {
			$add_cart = $connect->query("INSERT INTO `cart`(`id`, `item_id`, `user_id`, `item_count`, `total_price`, `subtotal`) VALUES(NULL, '{$item_id}', '{$u_id}', '{$item_quantity}', '{$item_total}', '{$item_sub_total}')");
		}
	};
}

