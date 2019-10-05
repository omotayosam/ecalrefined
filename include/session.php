<?php include "connect.php"; ?>
<?php include "functions.php"; ?>
<?php
// Set Default timezone to Lagos: GMT +01:00
date_default_timezone_set("Africa/Lagos");

$datetime = date("Y-m-d H:i:s"); ## Current Datetime
$date = date("Y-m-d"); ## Current Date
$year = date("Y"); ## Current Year

//Send request to server to get http or https address
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

//Set $currentURL as the http or https address
$currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];

//Initialize a new session data
session_start();

//If A user is logged-in
if (isset($_SESSION["user_login"])) {
	$user_login = $_SESSION["user_login"];

	//Get users information: title, username, lastname, firstname and email; from the database
	$user_query = $connect->query("SELECT * FROM `users` WHERE (`email` = '$user_login') LIMIT 1");
	$fetch_user = $user_query->fetch_array();

	$u_id = $fetch_user['id']; ## Get users ID
	$u_lname = $fetch_user['lname']; ## Get users last name
	$u_fname = $fetch_user['fname']; ## Get users first name
	$u_gender = $fetch_user['gender']; ## Get Users gender
	$u_email = $fetch_user['email']; ## Get users email

	$u_name = $u_lname . ' ' . $u_fname; ## Assign lastname & firstname(Full name) to variable $name
	$user = $u_email; ## Assign email to variable $user

} else {
	//If user is not logged-in
	$u_id = NULL;
	$user = NULL;
	$u_name = 'Guest'; ## Assign value 'Guest' to variable $u_name
}
?>