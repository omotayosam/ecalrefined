<?php include "../include/session.php";?>

<?php
	if (isset($_POST) && !empty($_POST)) {
		# code...
		if (isset($_POST['address_id'])) {
			#code...
			$add_id = @$_POST['address_id'];

			$update_add_id = $connect->query("UPDATE `users` SET `address_id` = '{$add_id}' WHERE `email` = '{$user}'");
			if ($update_add_id) {
				# code...
				echo '
                <div class="alert alert-success">
                    <i class="fa fa-check-circle"></i> Delivery Address has been successfully changed!!!
                </div>
            ';

			} else {
				# code...
				echo '
                <div class="alert alert-danger">
                    <i class="fa fa-exclamation-triangle"></i> Selection Failed, please try again...
                </div>
            ';
			}

		} else {
			# code...
			$add_id = null;

			echo '
            <div class="alert alert-danger">
                <i class="fa fa-exclamation-triangle"></i> There has been an error, please try again...
            </div>
        ';
		}
	}

	if (isset($_GET) && !empty($_GET)) {
		if (isset($_GET['address_id'])) {
			# code...
			$add_id = @$_GET['address_id'];

			$check_add = $connect->query("SELECT * FROM `address` WHERE (`id` = '{$add_id}') AND (`user_id` = '{$u_id}') LIMIT 1");
			$count_add = $check_add->num_rows;

			$get_prev_add = $connect->query("SELECT * FROM `address` WHERE (`id` > '{$add_id}' OR `id` < '{$add_id}') AND (`user_id` = '{$u_id}') LIMIT 1");
			$count_prev_add = $get_prev_add->num_rows;

			if ($count_prev_add > 0) {
				# code...
				$next_add = $get_prev_add->fetch_array();

				$next_add_id = $next_add['id'];
				$delete_add_id = $add_id;

				$update_add_id = $connect->query("UPDATE `users` SET `address_id` = '{$next_add_id}' WHERE `email` = '{$user}'");

				if ($update_add_id) {
					# code...
					$delete_add = $connect->query("DELETE FROM `address` WHERE (`id` = '{$delete_add_id}' AND `user_id` = '{$u_id}')");

					if ($delete_add) {
						# code...
						echo '
                        <div class="alert alert-info">
                            <i class="fa fa-check-circle"></i> Delivery Address has been successfully removed!!!
                        </div>
                    ';

					} else {
						# code...
						echo '
                        <div class="alert alert-danger">
                            <i class="fa fa-exclamation-triangle"></i> Removing Failed, please try again...
                        </div>
                    ';
					}

				} else {
					# code...
					echo '
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-triangle"></i> Removing Failed, please try again...
                    </div>
                ';
				}

			} else {
				# code...
				if ($count_add > 0) {
					# code...
					$update_add_id = $connect->query("UPDATE `users` SET `address_id` = '' WHERE `email` = '{$user}'");

					if ($update_add_id) {
						# code...
						$delete_add = $connect->query("DELETE FROM `address` WHERE (`id` = '{$delete_add_id}' AND `user_id` = '{$u_id}')");

						if ($delete_add) {
							# code...
							echo '
                            <div class="alert alert-info">
                                <i class="fa fa-check-circle"></i> Delivery Address has been successfully removed!!!
                            </div>
                        ';

						} else {
							# code...
							echo '
                            <div class="alert alert-danger">
                                <i class="fa fa-exclamation-triangle"></i> Removing Failed, please try again...
                            </div>
                        ';
						}

					} else {
						# code...
						echo '
                        <div class="alert alert-danger">
                            <i class="fa fa-exclamation-triangle"></i> Removing Failed, please try again...
                        </div>
                    ';
					}

				} else {
					# code...
					echo '
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-triangle"></i> Removing Failed, No address selected...
                    </div>
                ';
				}
			}

		} else {
			# code...
			$add_id = null;

			echo '
            <div class="alert alert-danger">
                <i class="fa fa-exclamation-triangle"></i> There has been an error, please try again...
            </div>
        ';
		}
	}
?>