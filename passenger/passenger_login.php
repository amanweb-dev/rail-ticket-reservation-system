<?php 
include "lib/session.php";
Session::check_login();
?>

<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>
<?php include "helpers/formate.php" ?>

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

	<title>Admin Profile</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Add custom CSS here -->
	<link href="css/sb-admin.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<!-- Page Specific CSS -->
	<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
</head>

<body style="background: linear-gradient(to bottom, #669999 0%, #009900 100%);margin-top: 0;">
	<div class="container">
		<div class="total-body log-sign">
			<div class="row">
				<div class="col-md-12">

					<nav class="navbar navbar-inverse">
						<div class="container-fluid">
							<div class="navbar-header">
								<a class="navbar-brand" href="../index.php">Ticket Point</a>
							</div>
							<div class="collapse navbar-collapse" id="collapsibleNavbar">
								<ul class="navbar-nav">
									<li class="nav-item">
										<a class="nav-link" href="../admin/index.php">Admin</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="passenger_login.php">User Account</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="passenger_signup.php">Registration</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="passenger_login.php">Cancel Ticket</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>

					<div class="row">
						<div class="col-md-12 text-center">
							<div class="marqe" style="background-color:green;padding: 0 50px;">
								<marquee direction="left">
									<p style="color: #ddd;margin-top: 10px;margin-bottom: 0;"><span style="font-size: 20px;color: #ddd;"><b>Routes : </b></span>Uttora >> Pallabi >> Mirpur >> Motijheel</p>
								</marquee>
							</div>
						</div>

					</div>
					<div class="">
						<div class="row">
							
							<div class="col-md-4 col-md-offset-4">
								<div class="pas-login-area">
									<h2 class="text-center">Passenger login</h2>
								<form action="passenger_login.php" method="post">
									<div class="form-group">
										<label for="usr">Mobile Number:</label>
										<input type="text" class="form-control" name="mobile">
									</div>
									<div class="form-group">
										<label for="pwd">Password:</label>
										<input type="password" class="form-control" name="pass">
									</div>
									<input type="submit" class="btn btn-danger btn-block" name="login" value="Login">
								</form>

								</div>

							</div>
						</div>
					</div>

				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="bus-footer">
						<div class="row pt-4">
							<div class="col-md-4">
								<ul class="footer-links">
									<h4>Quick Links</h4>
									<li><a href="about_us.php">About Us</a></li>
									<li><a href="contact_us.php">Contact Us</a></li>
									<li><a href="terms_condition.php">Terms & Conditions</a></li>
									<li><a href="privecy_policy.php">Privacy & Policy</a></li>
									<!--  <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li> -->
								</ul>
							</div>
							<div class="col-md-4" style="border-right: 1px solid #ddd;border-left: 1px solid #ddd;">
								<div class="separtr">
									<h4>Hello World</h4>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								</div>
							</div>
							<div class="col-md-4">
								<ul class="social-icons">
									<h4 class="text-center">Conect With Us</h4>
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="copyright">
						<p class="copyright-text" style="color:#fff;">Copyright &copy; <?php echo date('Y'); ?> All Rights Reserved by 
							<a style="color:#;" href="index.php">ticket</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		






		<!-- JavaScript -->
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/bootstrap.js"></script>

		<!-- Page Specific Plugins -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
		<script src="js/morris/chart-data-morris.js"></script>
		<script src="js/tablesorter/jquery.tablesorter.js"></script>
		<script src="js/tablesorter/tables.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	</body>
	</html>

	<?php 
if (isset($_POST['login'])) {
    $mobile = $_POST['mobile'];
    $pass = $_POST['pass'];
    $pass = md5($pass);

    $select_query = "SELECT * FROM passenger_info WHERE psngr_mobile = '$mobile' AND psngr_pass = '$pass' ";
    $reslt = $db->select($select_query);
    if ($reslt) {
        $row = mysqli_fetch_array($reslt);

        Session::set_session("passengerLogin", true);
        Session::set_session("psngrMobile", $row['psngr_mobile']);
        Session::set_session("psngrName", $row['psngr_name']);
        echo "<script>location.reload();</script>";
    }else{
        echo '<script type="text/javascript">Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Number or Password Wrong"
                            })
                            setTimeout(function(){
            window.location.href = "passenger_login.php";
         }, 2000);
                        </script>';

    }
}





	?>