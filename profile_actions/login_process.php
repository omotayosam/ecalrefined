<?php include '../include/session.php';?>
<?php
sleep(1);

// If $_POST associative array isset and not empty
if (isset($_POST) && !empty($_POST)) {
    # code...
    // Login Form Variables
    $user_login = $_POST['user_login']; ## Assign the inputted email or username to variable $user_login
    $password_login = $_POST['user_password']; ## Assign the inputted password to variable $password_login

    ##<!-- Script Login action -->##
    // If User inputs email or phone and password
    if (!empty($user_login) && !empty($password_login)) {
        # code...
        $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $password_login); ## Remove special characters in inputted password and assign to variable $password_login
        $password_login = md5($password_login); ## Encrypt password using md5 hash

        echo '
            <script>
                $("#user_login").removeClass("regerr");
                $("#user_login").removeAttr("data-original-title");

                $("#user_password").removeClass("regerr");
                $("#user_password").removeAttr("data-original-title");
            </script>
        ';

        /**
         * Check:
         * 1. If User is registered; Check if inputted email or username & password matches corresponding DB values
         * 2. If inputted email or username is registered on platform; If registered get Users id & email
         */
        $u_query = $connect->query("SELECT * FROM `users` WHERE (`email` = '{$user_login}' OR `phone` = '{$user_login}') AND  (`password` = '{$password_login}')");
        $ur_query = $connect->query("SELECT * FROM `users` WHERE (`email` = '{$user_login}' OR `phone` = '{$user_login}')");

        $u_check = $u_query->num_rows;
        $ur_check = $ur_query->num_rows;

        // Get id, email & activated status of User
        $curr_id = $ur_query->fetch_array();

        $user_id = $curr_id['id']; ## Assign id of User to variable $user_id
        $email = $curr_id['email']; ## Assign email of User to variable $email
        $active = $curr_id['activated']; ## Assign activated status of User to variable $active

        // If login is successful
        if ($u_check == 1) {
            # code...
            // If User's account is activated
            if (($active) !== "No") {
                # code...
                $_SESSION['user_login'] = $user_login; ## Insert value of variable $user_login into $_SESSION array as user_login

                // Display success message on login page
                echo '
                    <div class="alert alert-success">
                        <span class="fa fa-check-square"></span> Login Successful...<br />
                        <small><i class="fa fa-spinner fa-spin"></i> Please wait</small>
                    </div>
                    <script>
                        setTimeout(function() {
                            window.location = "./"
                        }, 6000);
                    </script>
                ';

                // Delete all data from table `user_check` where column `user` = inputted email or phone
                // $rem_blocked = $connect->query("DELETE FROM `user_check` WHERE `user_id` = '{$user_id}'");

            } else {
                echo '
                    <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
                        <i class="fa fa-exclamation-triangle"></i>
                        Login Failed...This account is not activated!!, Click the activation link in your email to activate!!!<br />
                        <small>click error to dismiss</small>
                    </div>
                ';
            }

            // If login failed: Email, Username or Password incorrect
        } else {
            # code...

            // If there is User duplication: Email, Username or Password duplicated
            if ($u_check > 1) {
                # code...
                // Display error message on login page
                echo '
                    <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
                        <i class="fa fa-exclamation"></i> Ooops, that was from us!!!, Please notify us at admin@ecal.com if this continues: Username/Email duplication<br />
                        <small>click error to dismiss</small>
                    </div>
                ';

                exit();

                // If User email or username registered on platform: password incorrect
            } elseif ($ur_check == 1) {
                # code...
                // Display error message on login page
                echo '
                    <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
                        <i class="fa fa-exclamation-circle"></i>
                        Given password doesn\'t match this account, Please try again...<br />
                        <small>click error to dismiss</small>
                    </div>
                ';

                // If not registered on platform
            } else {
                # code...
                // Display error message on login page
                echo '
                    <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
                        <i class="fa fa-exclamation-circle"></i>
                        The given account login: <kbd>' . $user_login . '</kbd> isn\'t registered on ecal platform!!, Please try again...<br />
                        <small>click error to dismiss</small>
                    </div>
                ';
            }
        }

    } else {
        # code...
        // Error Message
        $err = '
            <div class="alert alert-danger alert-dismissible" title="Click to dismiss">
                <i class="fa fa-exclamation-circle"></i>
                Please Fill in all fields to continue!!!<br />
                <small>click error to dismiss</small>
            </div>
        ';

        if (empty($user_login) || empty($password_login)) {
            # code...
            // Display error message on signup page
            echo $err;

            if (empty($user_login)) {
                # code...
                echo '
                    <script>
                        $("#user_login").addClass("regerr");
                        $("#user_login").attr("data-original-title","Email/Phone required");

                        $("#user_password").removeClass("regerr");
                        $("#user_password").removeAttr("data-original-title");
                    </script>
                ';
            }

            if (empty($password_login)) {
                # code...
                // Display error message on signup page
                echo '
                    <script>
                        $("#user_password").addClass("regerr");
                        $("#user_password").attr("data-original-title","Password required");

                        $("#user_login").removeClass("regerr");
                        $("#user_login").removeAttr("data-original-title");
                    </script>
                ';
            }

            if (empty($user_login) && empty($password_login)) {
                # code...
                // Display error message on signup page
                echo '
                    <script>
                        $("#user_password").addClass("regerr");
                        $("#user_login").addClass("regerr");

                        $("#user_login").attr("data-original-title","Email/Phone required");
                        $("#user_password").attr("data-original-title","Password required");
                    </script>
                ';
            }
        }
    }
    ##<!--/ End of Login script -->##

} else {
    # code...
    // Display error message on signup page
    echo '
        <link rel="stylesheet" href="../design/css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../design/css/custom/fontawesome.min.css">
        <link rel="stylesheet" href="../design/css/custom/fonts.css">
        <link rel="stylesheet" href="../design/css/custom/site.css">

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