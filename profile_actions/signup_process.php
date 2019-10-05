<?php include '../include/session.php'; ## Include Session File?>
<?php
sleep(1);

// Error Array
$error = [];

// If $_POST associative array isset and not empty
if (isset($_POST) && !empty($_POST)) {
	# code...
	//Registration Form Variables
	$fn = @trim(strip_tags($_POST['fname']));      ## Assign inputted First Name to variable $fn
	$ln = @trim(strip_tags($_POST['lname']));      ## Assign inputted Last Name to variable $ln
	$email = @trim($_POST['email']);               ## Assign inputted email to variable $email
	$gender = @trim(strip_tags($_POST['gender'])); ## Assign inputted gender to variable $gender
	$pnum = @trim(strip_tags($_POST['pnum']));     ## Assign inputted Phone Number to variable $pnum
	$pwrd = @trim($_POST['pword']);                ## Assign inputted Password to variable $pwrd

	##<!-- Script for Registration action -->##
	// If all required fields are not empty
	if ((!empty($fn) && !empty($ln) && !empty($email) && !empty($gender) && !empty($pnum) && !empty($pwrd))) {
		# code...
		/**
		 * Check if User exists:
		 * 1. Firstname and Lastname together: name,
		 * 2. Email
		 */
		$u_query = $connect->query("SELECT * FROM `users` WHERE (`fname` = '{$fn}' AND `lname` = '{$ln}')");
		$e_query = $connect->query("SELECT * FROM `users` WHERE (`email` = '{$email}')");

		$u_check = $u_query->num_rows;
		$e_check = $e_query->num_rows;

		// If field length of Firstname & Lastname is not exceeded
		if ((strlen($fn) > 2 && strlen($fn) < 51) && (strlen($ln) > 1 && strlen($ln) < 51)) {
			# code...
			echo '
                <script>
                    $("#fname").removeClass("regerr");
                    $("#lname").removeClass("regerr");
                </script>
            ';

			if (!empty($gender)) {
				# code...
				echo '
                    <script>
                        $("#gender").removeClass("regerr");
                        $("#genderValidate").hide();
                    </script>
                ';

				// If field length of phone number not exceeded
				if (strlen($pnum) > 4 && strlen($pnum) < 16) {
					# code...
					echo '
                    <script>
                        $("#pnum").removeClass("regerr");
                        $("#pnumValidate").hide();
                    </script>
                ';

					// If field length of password not exceeded
					if (strlen($pwrd) > 7 && strlen($pwrd) < 33) {
						# code...
						echo '
	                        <script>
	                            $("#pword").removeClass("regerr");
	                            $("#pwordValidate").hide();
	                        </script>
	                    ';

						// If user not yet registered
						if (($u_check) < 1 && ($e_check) < 1) {
							# code...
							$pwrd = md5($pwrd); ## Encrypt password using md5 hash

							$chars = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfgklzxcvbnm1234567890'; ## Assign String of characters to variable $chars
							$token = str_shuffle($chars);                                            ## Randomize characters in $chars and assign to variable $token
							$token = substr($token, 0, 20);                                          ## Slice out 20 characters from randomized characters in $token

							// success message
							$success = '
	                            <div class="alert alert-success">
	                                <i class="fa fa-check-double"></i>
	                                Signup Successfully completed<br />
	                                Click the activation link from admin@ecal.com in your email to activate your account!!!<br />
	                                <small><i class="fa fa-spinner fa-spin"></i> Please wait...</small>
	                            </div>
	                            <script>
	                                setTimeout(function() {
	                                    window.location = "login"
	                                }, 8000);
	                            </script>
	                        ';

							// failure message
							$failed = '
	                            <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
	                                <i class="fa fa-exclamation-circle"></i>
	                                Something went wrong!<br />
	                                Registration aborted, please try again!!!<br />
	                                <small>click error to dismiss</small>
	                            </div>
	                        ';

							// Insert User info into DB: Add User
							$reg_query = "(`id`, `address_id`, `title`, `fname`, `lname`, `email`, `password`, `phone`, `gender`, `sign-up-date`, `activated`, `token`) ";
							$reg_query .= "VALUES(NULL, '', '', '{$fn}', '{$ln}', '{$email}', '{$pwrd}', '{$pnum}', '{$gender}', '{$datetime}', 'No', '{$token}')";

							$register = $connect->query("INSERT INTO `users` $reg_query");

							// If Add User Successful
							##<!-- Make sure user id follows numerical order -->##
							if ($register) {
								# code...
								// Get id of user
								$get_curr_id = $connect->query("SELECT `id` FROM `users` WHERE `email` = '{$email}'");
								$curr_id = $get_curr_id->fetch_array();

								$cid = $curr_id['id']; ## Assign id of User after registration to variable $cid

								// Get preceding id of User
								$check_prev_id = $connect->query("SELECT `id` FROM `users` WHERE `id` < '{$cid}' ORDER BY `id` DESC LIMIT 1");
								$check_prev_id_rows = $check_prev_id->num_rows;

								// If there is any preceding id
								if ($check_prev_id_rows > 0) {
									# code...
									// Get the preceding id
									$prev_id = $check_prev_id->fetch_array();

									$pid = $prev_id['id']; ## Assign the preceding id to variable $pid
									$pid += 1; ## Increment value of $pid by 1

									// Update Users id with value of $pid
									$update_id = $connect->query("UPDATE `users` SET `id` = '{$pid}' WHERE `email` = '{$email}'");

								} else {
									#code...
									if ($check_prev_id_rows == 0) {
										# code...
										$pid = 1; ## Set value of $pid = 1

										// Update Users id with value of $pid
										$update_id = $connect->query("UPDATE `users` SET `id` = '{$pid}' WHERE `email` = '{$email}'");
									}
								}

								// If Users id update successfully
								if ($update_id) {
									# code...
									// Email preparation
									$to = $email;
									$subject = 'Verify Ecal Account email';
									$txt = '
	                                    Click the link or Copy the link address and paste in your web browser!!!:' . "\r\n" . '
	                                    https://ecal.000webhostapp.com/user_actions/confirm?email=' . $email . '&token=' . $token . '
	                                ';

									$headers = "From: admin@ecal.com" . "\r\n" . "CC: no-reply@ecal.com";

									// Send prepared mail to Users Email
									$send = mail($to, $subject, $txt, $headers);

									// If Email sending successful
									if (!$send) {
										# code...
										// Relay success message on sign-up page
										echo $success;

										// If Email sending failed
									} else {
										# code...
										// Delete Users details from DB: Remove User
										$delete_user = $connect->query("DELETE FROM `users` WHERE `email` = '{$email}'");

										// Relay Failure message on signup page
										echo $failed;
									}

									// If Users id update fails
								} else {
									# code...
									// Delete Users details from DB: Remove User
									$delete_user = $connect->query("DELETE FROM `users` WHERE `email` = '{$email}'");

									// Display error message on signup page
									echo '
	                                    <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
	                                        <i class="fa fa-exclamation"></i> Oops, that was from us!!!, Please notify us at admin@ecal.com if this continues: unable to update id<br />
	                                        <small>click error to dismiss</small>
	                                    </div>
	                                ';
								}

								// Else if User add failed
							} else {
								# code...
								// Display error message on signup page
								echo '
	                                <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
	                                    <i class="fa fa-exclamation"></i> Oops, that was from us!!!, Please notify us at admin@ecal.com if this continues: unable to add user<br />
	                                    <small>click error to dismiss</small>
	                                </div>
	                            ';
							}
							##<!--/ End of Make sure user id follows numerical order -->##

							// If: if condition not met
						} else {
							# code...
							// If Firstname & Lastname already exists
							if ($u_check > 0) {
								# code...
								// Display error message on signup page
								echo '
	                                <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
	                                    <i class="fa fa-exclamation-circle"></i>
	                                    User with name: ' . $ln . ' ' . $fn . ' exists!!!<br />
	                                    Registration aborted, please change either last or firstname, or both and try again!!!<br />
	                                    <small>click error to dismiss</small>
	                                </div>
	                                <script>
	                                    $("#fname").addClass("regerr");
	                                    $("#lname").addClass("regerr");
	
	                                    $("#fname").attr("data-original-title", "User with name: ' . $ln . ' ' . $fn . ' exists!!!");
	                                    $("#lname").attr("data-original-title", "User with name: ' . $ln . ' ' . $fn . ' exists!!!");
	                                </script>
	                            ';

							} else {
								# code...
								echo '
	                                <script>
	                                    $("#fname").removeClass("regerr");
	                                    $("#lname").removeClass("regerr");
	                                </script>
	                            ';
							}

							// If email exists
							if ($e_check > 0) {
								# code...
								// Display error message on sign-up page
								echo '
	                                <script>
	                                    $("#email").addClass("regerr");
	                                    $("#email").attr("data-original-title","Email already exists!!!");
	                                    $("#emailValidate").html("\
	                                        <small>\
	                                            <i class=\"fa fa-exclamation-circle\"></i> User with email: ' . $email . ' exists!!!<br />\
	                                            Registration aborted, please change email and try again!!!<br />\
	                                            <small>click to dismiss</small>\
	                                        </small>\
	                                    ");
	                                    $("#emailValidate").show();
	                                </script>
	                            ';

							} else {
								# code...
								echo '
	                                <script>
	                                    $("#email").removeClass("regerr");
	                                    $("#emailValidate").hide();
	                                </script>
	                            ';
							}
						}

						// If: if condition not met
					} else {
						# code...
						// Display error message on signup page
						echo '
	                        <script>
	                            $("#pword").addClass("regerr");
	                            $("#pwordValidate").html("\
	                                <small>\
	                                    <i class="fa fa-exclamation-circle"></i> Password field length must be between 8 - 32 Chharacters!!!<br />\
	                                    <small>click error to dismiss</small>\
	                                </small>\
	                            ");
	                            $("#pwordValidate").show();
	                        </script>
	                    ';
					}

					// If: if condition not met
				} else {
					# code...
					// Display error message on signup page
					echo '
	                    <script>
	                        $("#pnum").addClass("regerr");
	                        $("#pnumValidate").html("\
	                            <small>\
	                                <i class="fa fa-exclamation-circle"></i> Phone number field length must be between 5 - 15 digits!!!<br />\
	                                <small>click error to dismiss</small>\
	                            </small>\
	                        ");
	                        $("#pnumValidate").show();
	                    </script>
	                ';
				}

			} else {
				# code...
				// Display error message on signup page
				echo '
                    <script>
                        $("#gender").addClass("regerr");
                        $("#genderValidate").html("\
                            <small>\
                                <i class="fa fa-exclamation-circle"></i> Phone number field length must be between 5 - 15 digits!!!<br />\
                                <small>click error to dismiss</small>\
                            </small>\
                        ");
                        $("#genderValidate").show();
                    </script>
                ';

				// If: if condition not met
			}

		} else {
			# code...
			// Display error message on signup page
			echo '
                <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
                    <i class="fa fa-exclamation-circle"></i>
                    First and Last Name field length must be between 2 - 50 characters!!!<br />
                    <small>click error to dismiss</small>
                </div>
                <script>
                    $("#fname").addClass("regerr");
                    $("#lname").addClass("regerr");
                </script>
            ';
		}

		// If: if condition not met
	} else {
		# code...
		// Display error message on signup page
		echo '
            <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
                <i class="fa fa-exclamation-circle"></i>
                Please Fill in all fields to continue!!!<br />
                <small>click error to dismiss</small>
            </div>
        ';

		if (empty($fname)) {
			# code...
			echo('
	            <script>
	                $("#fname").addClass("regerr");
	                $("#fname").attr("data-original-title", "This field is required!!!");
	            </script>
	        ');

		} else {
			# code...
			echo('
	            <script>
	                $("#fname").removeClass("regerr");
	                $("#fname").removeAttr("data-original-title");
	            </script>
	        ');
		}

		if (empty($lname)) {
			# code...
			echo('
	            <script>
	                $("#lname").addClass("regerr");
	                $("#lname").attr("data-original-title", "This field is required!!!");
	            </script>
	        ');

		} else {
			# code...
			echo('
	            <script>
	                $("#lname").removeClass("regerr");
	                $("#lname").removeAttr("data-original-title");
	            </script>
	        ');
		}

		if (empty($gender)) {
			# code...
			echo('
	            <script>
	                $("#gender").addClass("regerr");
	                $("#gender").attr("data-original-title", "This field is required!!!");
	            </script>
	        ');

		} else {
			# code...
			echo('
	            <script>
	                $("#gender").removeClass("regerr");
	                $("#gender").removeAttr("data-original-title");
	            </script>
	        ');
		}

		if (empty($pnum)) {
			# code...
			echo('
	            <script>
	                $("#pnum").addClass("regerr");
	                $("#pnum").attr("data-original-title", "This field is required!!!");
	            </script>
	        ');

		} else {
			# code...
			echo('
	            <script>
	                $("#pnum").removeClass("regerr");
	                $("#pnum").removeAttr("data-original-title");
	            </script>
	        ');
		}

		if (empty($email)) {
			# code...
			echo('
	            <script>
	                $("#email").addClass("regerr");
	                $("#email").attr("data-original-title", "This field is required!!!");
	            </script>
	        ');

		} else {
			# code...
			echo('
	            <script>
	                $("#email").removeClass("regerr");
	                $("#email").removeAttr("data-original-title");
	            </script>
	        ');
		}

		if (empty($pwrd)) {
			# code...
			echo('
	            <script>
	                $("#pword").addClass("regerr");
	                $("#pword").attr("data-original-title", "This field is required!!!");
	            </script>
	        ');

		} else {
			# code...
			echo('
	            <script>
	                $("#pword").removeClass("regerr");
	                $("#pword").removeAttr("data-original-title");
	            </script>
	        ');
		}
	}
	##<!--/ End of Registration script -->##

} else {
	# code...
	echo '
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/fontawesome.min.css">
        <link rel="stylesheet" href="../css/fonts.css">
        <link rel="stylesheet" href="../css/site.css">

        <div class="container-fluid">
            <div class="alert alert-danger text-center mt-5">
                <i class="fa fa-exclamation-triangle"></i>
                ecal Error 404: Sorry this page does not exist!!!<br />
                Try <a href="../login" class="">Login Page</a>
            </div>
        </div>
    ';

	exit();
}
?>