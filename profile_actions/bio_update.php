<?php include "../include/session.php";

    // $save = @$_POST['save'];

    //declaring variables to prevent messors
    $mess = "";
    $fn = ""; //First Name
    $ln = ""; //Last Name
    $em = ""; //Email
    $gender = ""; //Gender
    $dCode = ""; //Dial Code
    $pnum = ""; //Phone Number
    $bday = ""; //Sign up Date
    $u_check = ""; // Check if user: Firstname and Lastname exists
    $u_check = ""; // Check if email exists

    //Registration Form
    $fn = strip_tags(@$_POST['fname']);
    $ln = strip_tags(@$_POST['lname']);
    $em = strip_tags(@$_POST['email']);
    $gender = strip_tags(@$_POST['gender']);
    $dCode = strip_tags(@$_POST['dCode']);
    $pnum = strip_tags(@$_POST['pnum']);
    $bday = strip_tags(@$_POST['bday']);

    // Check if user already exists
    $u_check = $connect->query("SELECT * FROM `users` WHERE `id` = '$uId'");
    // Count amount of rows where first & last_name  = $fn and $ln
    $u_check_rows = $u_check->num_rows;

    //If User profile data is not set doesn't exist
    if ($u_check_rows < 1) {

        //Check all required fields have been filled
        if (($fn && $ln && $em && $gender && $pnum) !== "") {

            // Check that the maximum length of first name and last name is 25 characters
            if (((strlen($fn)) > 25) || ((strlen($ln)) > 25)) {
                $mess = "
                    <div class='alert alert-warning'>
                        <span class='fa fa-exclamation-triangle'></span> Maximum Limit for First name / Lastname is 25 characters
                    </div>
                ";

            } else {

                if ((strlen($pnum)) != 10) {
                    $mess = "
                        <div class='alert alert-warning'>
                            <span class='fa fa-exclamation-triangle'></span> Your phone number must be upto 10 digits!!!
                        </div>
                    ";

                } elseif ((strlen($pnum)) > 10) {
                    # code...
                    $mess = "
                        <div class='alert alert-warning'>
                            <span class='fa fa-exclamation-triangle'></span> Your phone number must be 10 digits!!!
                        </div>
                    ";

                } else {
                    $saveQuery = $connect->query("UPDATE `users` VALUES ('', '$uId', '$fn', '$ln', '$em', '$gender', '$dCode', '$pnum', '$bday')");
                    $mess = "
                        <div class='alert alert-success'>
                            <span class='fa fa-check-double'></span> Profile details saved successfully.
                        </div>
                    ";
                }
            }

        } else {
            $mess = "
                <div class='alert alert-danger'>
                    <span class='fa fa-exclamation-triangle'></span> Please fill in all required fields!
                </div>
            ";
        }

    } else {

        if (($fn && $ln && $em && $gender && $pnum) == "") {
            $mess = "
                <div class='alert alert-danger'>
                    <span class='fa fa-exclamation-triangle'></span> Please fill in all required fields!
                </div>
            ";
        } else {
            # code...
            // $saveQuery = $connect->query("UPDATE `userprofile` SET `first_name` = '$fn', `last_name` = '$ln', `email` = '$em', `gender` = '$gender', `dial_code` = '$dCode', `phone` = '$pnum', `bday` = '$bday' WHERE `id` = '$uId'");
            $mess = "
                <div class='alert alert-success'>
                    <span class='fa fa-check-double'></span> Profile details updated successfully.
                </div>
            ";
        }
    }
    echo "$mess";
?>