<?php 
include "../passenger/lib/session.php";
Session::check_session();
 ?>

<?php include "../passenger/config/config.php" ?>
<?php include "../passenger/lib/database.php" ?>
<?php include "../passenger/helpers/formate.php" ?>

<?php 
$db = new Database();
$fm = new formate();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Passenger Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
  </head>

  <body>

<div id="wrapper">