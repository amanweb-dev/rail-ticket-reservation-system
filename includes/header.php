<?php 
include "../metro/lib/session.php";
// Session::check_session();
 ?>

<?php include "../metro/config/config.php" ?>
<?php include "../metro/lib/database.php" ?>
<?php include "../metro/helpers/formate.php" ?>

<?php 
$db = new Database();
$fm = new formate();
 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ticket Point</title>
	<link rel="stylesheet" href="assets/css/bootstrap-4.5.2.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>