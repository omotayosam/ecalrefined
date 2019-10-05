<?php
include "constants.php";

//Database Connection String with $connect as the global variable
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysqli_error_list($connect));
?>