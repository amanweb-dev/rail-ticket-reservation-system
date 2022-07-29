<?php 
include "../admin/lib/session.php";
Session::check_session();
 ?>

<?php include "../admin/config/config.php" ?>
<?php include "../admin/lib/database.php" ?>
<?php include "../admin/helpers/formate.php" ?>

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

    <title>Ticket Point</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

<div id="wrapper">