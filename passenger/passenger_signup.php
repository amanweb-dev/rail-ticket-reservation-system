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
					<div class="row">
						<div class="col-md-10 col-md-offset-1 reg-sec">
							<form action="passenger_signup.php" method="post">
								<div class="reg-sec">
									<h2 class="text-center">Passenger Registration</h2>
									<div class="col-md-6">

										<div class="form-group">
											<label for="usr">Name:</label>
											<input type="text" class="form-control" name="username" required>
										</div>
										<div class="form-group">
											<label for="email">Email:</label>
											<input type="email" class="form-control" name="email" required>
										</div>
										<div class="form-group">
											<label for="gender">Gender:</label>
											<select class="form-control w-auto" name="gender">
												<option>Male</option>
												<option>Female</option>
												<option>Custom</option>
											</select>
										</div>
										<div class="form-group">
											<label for="address">Address:</label>
											<input type="text" class="form-control" name="address" required>
										</div>
										<div class="form-group">
											<label for="psngr_pass">Password:</label>
											<input type="password" class="form-control" name="psngr_pass" required>
										</div>

									</div>
									<div class="col-md-6">

										<div class="form-group">
											<label for="usr">Mobile:</label>
											<input type="text" class="form-control" name="mobile" required>
										</div>
										<div class="form-group">
											<label for="Age">Age:</label>
											<input type="text" class="form-control" name="age" required>
										</div>
										<div class="form-group">
											<label for="nid">NID:</label>
											<input type="text" class="form-control" name="nid" required>
										</div>
										<div class="form-group">
											<label for="ntlty">Nationality:</label>
											<select class="form-control" name="ntlty">
												<option>Bangladeshi</option>
												<option>Others</option>
											</select>
										</div>

										<input type="submit" name="reg" value="Register Now" class="btn btn-danger btn-block">

									</div>
									
								</div>
							</form>
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
	if (isset($_POST['reg'])) {


	  $psngr_name = $_POST['username'];
	  $psngr_email = $_POST['email'];
	  $psngr_gender = $_POST['gender'];
	  $psngr_address = $_POST['address'];
	  $psngr_mobile = $_POST['mobile'];
	  $psngr_age = $_POST['age'];
	  $psngr_nid = $_POST['nid'];
	  $psngr_nationality = $_POST['ntlty'];
	  $psngr_pass = $_POST['psngr_pass'];
	  $psngr_pass =md5($psngr_pass);



	  $chk_reg_query = "SELECT psngr_mobile FROM passenger_info WHERE psngr_mobile = '$psngr_mobile' ";
	  $chk_reg_rs = $db->select($chk_reg_query);
	  if (!$chk_reg_rs) {
	  	
	  		 $insert_psngr_info = "INSERT INTO passenger_info(psngr_name,psngr_email,psngr_gender,psngr_address,psngr_mobile,psngr_age,psngr_nid,psngr_nationality,psngr_pass) VALUES('$psngr_name','$psngr_email','$psngr_gender','$psngr_address','$psngr_mobile','$psngr_age','$psngr_nid','$psngr_nationality','$psngr_pass') ";

		    $psngr_info_result = $db->insert($insert_psngr_info);

		    if ($psngr_info_result) {

		    	 echo '<script type="text/javascript">Swal.fire({
		                           icon: "success",
								   title: "Done!",
								   text: "Your Account has been created Succesfully"
								   })
		                            setTimeout(function(){
		            window.location.href = "passenger_login.php";
		         }, 4000);
		                        </script>';

		    }else{
		        echo '<script type="text/javascript">Swal.fire({
		                            icon: "error",
		                            title: "Oops...",
		                            text: "Registration Failed"
		                            })
		                            setTimeout(function(){
		            window.location.href = "passenger_signup.php";
		         }, 2000);
		                        </script>';

		    }


	  }else{

	  	 echo '<script type="text/javascript">Swal.fire({
		                            icon: "error",
		                            title: "Oops...",
		                            text: "Registration Failed.You have already an account."
		                            })
		                            setTimeout(function(){
		            window.location.href = "passenger_signup.php";
		         }, 4000);
		                        </script>';

	  }



		





   
	}





	?>