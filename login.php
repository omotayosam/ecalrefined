<?php include './include/header.php'; ?>
	<div class="w3l_banner_nav_right">
		<!-- login -->
		<div class="w3_login">
			<h3>Sign In & Sign Up</h3>
			<div class="w3_login_module">
				<div class="module form-module">
					<div class="toggle"><i class="fa fa-times fa-pencil"></i>
						<div class="tooltip">Click Me</div>
					</div>
					<div class="form">
						<h2>Login to your account</h2>
						<form action="./profile_actions/login_process.php" method="POST" class="login-form">
							<input id="user_login" type="text" name="user_login" data-toggle="tooltip" placeholder="E-mail/Phone">
							<input id="user_password" type="password" name="user_password" data-toggle="tooltip" placeholder="password">
							<input type="submit" value="Login">
						</form>
					</div>
					<div class="form">
						<h2>Create an account</h2>
						<form action="./profile_actions/signup_process.php" method="POST" class="signup-form">
							<div class="form-group form-group-sm">
								<input type="text" name="fname" id="fname" data-toggle="tooltip" placeholder="Firstname">
								<div id="fnameValidate" class="regValidate" style="display:none"></div>
							</div>
							<input type="text" name="lname" id="lname" data-toggle="tooltip" placeholder="E-Lastname">

							<div class="form-group form-group-sm">
								<input type="email" name="email" id="email" data-toggle="tooltip" placeholder="E-mail">
								<div id="emailValidate" class="regValidate" style="display:none"></div>
							</div>

							<div class="form-group form-group-sm">
								<select name="gender" id="gender" data-toggle="tooltip" class="">
									<option value="" selected disabled>Select Gender...</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								<div id="genderValidate" class="regValidate" style="display:none"></div>
							</div>

							<div class="form-group form-group-sm">
								<input type="text" pattern="^[0-9]\d*$" maxlength="15" name="pnum" id="pnum" data-toggle="tooltip" placeholder="Phone"/>
								<div id="pnumValidate" class="regValidate" style="display:none"></div>
							</div>

							<div class="form-group form-group-sm">
								<input type="password" name="pword" id="pword" data-toggle="tooltip" placeholder="password">
								<div id="pwordValidate" class="regValidate" style="display:none"></div>
							</div>

							<input type="submit" value="Register">
						</form>
					</div>
					<div class="form-group" id="mess" style="padding:20px;font-size:14px;display:none"><span class="text-info"><i class="text-danger fa fa-exclamation"></i> Please wait..</span>.</div>
					<div class="cta"><a href="#">Forgot your password?</a></div>
				</div>
			</div>
		</div>
		<!-- //login -->
	</div>
	<div class="clearfix"></div>
	<!-- //banner -->

	<script>
        $(document).ready(function () {
            // Function to activate all tooltip
            function activateTooltip() {
                $('[data-toggle="tooltip"]').tooltip();
            }

            // Function to clear all form fields
            function clear() {
                let inputs = $('form input[type=text], form input[type=email], form input[type=password], form select');

                for (let index = 0; index < inputs.length; index++) {
                    $(inputs).val('');
                }
            }

            // Function to clear all errors
            function hideErrors() {
                $("#fname").removeClass("regerr");
                $("#fnameValidate").hide();
                $("#lname").removeClass("regerr");
                $("#lnameValidate").hide();
                $("#email").removeClass("regerr");
                $("#emailValidate").hide();
                $("#gender").removeClass("regerr");
                $("#genderValidate").hide();
                $("#pnum").removeClass("regerr");
                $("#pnumValidate").hide();
                $("#pword").removeClass("regerr");
                $("#pwordValidate").hide()
            }

            $('.toggle').click(function () {
                // Switches the Icon
                $(this).children('i').toggleClass('fa-pencil');
                // Switches the forms
                $('.form').animate({
                    'height': 'toggle',
                    'padding-top': 'toggle',
                    'padding-bottom': 'toggle',
                    'opacity': "toggle"
                }, 'slow');

                clear();
                hideErrors();

                $('#mess').html('<span class="text-info"><i class="text-danger fa fa-exclamation"></i> Please wait..</span>.');
                $('#mess').hide();
            });

            $('.login-form').submit(function (e) {
                e.preventDefault();

                $('#mess').html('<span class="text-info"><i class="text-danger fa fa-exclamation"></i> Please wait..</span>.');

                let action = $(this).attr('action');

                $('#mess').show();

                $(this).ajaxSubmit({
                    method: 'POST',
                    url: action,
                    success: function (result) {
                        $('#mess').html(result); // assign the returning result to div with id 'mess'
                        // $('#mess').show(); // Display result

                        /** When error message is clicked **/
                        $('.alert-dismissible').click(function () {
                            $(this).slideUp('slow'); // Hide the message

                            $('#mess').fadeOut('slow', function () {
                                $('#mess').html('<span class="text-info"><i class="text-danger fa fa-exclamation"></i> Please wait..</span>.');
                            });
                        });

                        $('.regerr').keyup(function (e) {
                            var data = $(this).val();

                            if ((data.length) > 0) {
                                $(this).removeClass('regerr');
                                $(this).removeAttr("data-original-title");

                            } else {
                                $(this).addClass('regerr');
                                $(this).attr("data-original-title", "This field is required!!!");
                            }
                        });
                    }
                });
            });

            $('.signup-form').submit(function (e) {
                e.preventDefault();

                $('#mess').html('<span class="text-info"><i class="text-danger fa fa-exclamation"></i> Please wait..</span>.');

                let action = $(this).attr('action');

                $('#mess').show();

                $(this).ajaxSubmit({
                    method: 'POST',
                    url: action,
                    success: function (result) {
                        $('#mess').html(result); // assign the returning result to div with id 'mess'
                        $('#mess').show(); // Display result

                        /** When error message is clicked **/
                        $('.alert-dismissible').click(function () {
                            $(this).slideUp('slow'); // Hide the message

                            $('#mess').fadeOut('slow', function () {
                                $('#mess').html('<span class="text-info"><i class="text-danger fa fa-exclamation"></i> Please wait..</span>.');
                            });
                        });

                        $('.regValidate').click(function () {
                            $(this).slideUp(800);
                        });

                        $('.regerr').keyup(function (e) {
                            var data = $(this).val();

                            if ((data.length) > 0) {
                                $(this).removeClass('regerr');
                                $(this).removeAttr("data-original-title");

                            } else {
                                $(this).addClass('regerr');
                                $(this).attr("data-original-title", "This field is requires!!!");
                            }
                        });
                    }
                });
            });

            activateTooltip();
        });
	</script>
<?php include './include/footer.php'; ?>