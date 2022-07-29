<?php session_start(); ?>
<?php include "includes/header.php"; ?>
<?php unset($_SESSION['bookingId']); ?>
<div class="container">
	<div class="total-body">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-md bg-dark navbar-dark">
					<!-- Brand -->
					<a class="navbar-brand" href="index.php">Ticket Point</a>

					<!-- Toggler/collapsibe Button -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Navbar links -->
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="admin/index.php">Admin</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="passenger/passenger_login.php">User Account</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="passenger/passenger_signup.php">Registration</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="passenger/passenger_login.php">Cancel Ticket</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="col-md-12 text-center">
				<div class="marqe" style="background-color:green;padding: 0 50px;">
					<marquee direction="left">
						<p style="color: #ddd;margin-top: 10px;margin-bottom: 0;"><span style="font-size: 20px;color: #ddd;"><b>Routes : </b></span>Uttora >> Pallabi >> Mirpur >> Motijheel</p>
					</marquee>
				</div>
			</div>
		</div>
		<div class="main-home">
			<div class="row">
				<div class="col-md-4 my-4" style="margin-left: 4%;">
					<div class="slctr">
						<h2 class="text-center">Buy Ticket</h2>
						<form action="search_result.php" method="post">
							<div class="form-group">
								<label for="sel1">Leaving From : </label>
								<select class="form-control" id="sel1" name="boarding">


									<?php 

									$select_query_source = "SELECT rd_boarding_point FROM route_details GROUP BY rd_boarding_point";
									$select_query_source_rslt = $db->select($select_query_source);
									$count = mysqli_num_rows($select_query_source_rslt);

									if ($count>0) {

										while ($rows = $select_query_source_rslt->fetch_assoc()) { ?>
											<option value="<?php echo $rows['rd_boarding_point']; ?>"><?php echo $rows['rd_boarding_point']; ?></option>
											
										<?php }
										
									 }

									 ?>
								</select>
								<br>
								<label for="sel2">Destination : </label>
								<select class="form-control" id="sel2" name="dropping" disabled>
					                	
								</select>

								<label for="timing">Time : </label>
								<select class="form-control" id="timing" name="timing" disabled>
					                	
								</select>

								<label for="date">Date : </label>
								<input type="date" class="form-control" id="date"  name="dates" disabled>
							</div>
							<div class="text-center">
								<button type="submit" name="search" class="btn btn-primary">Search Train</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-7 my-4">
					<div class="slides">
						<div id="demo" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
								<li data-target="#demo" data-slide-to="3"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="assets/img/slide_index_1.jpg" alt="bus-1" width="600" height="410">
								</div>
								<div class="carousel-item">
									<img src="assets/img/slide_index_2.jpg" alt="bus-2" width="600" height="410">
								</div>
							
								<div class="carousel-item">
									<img src="assets/img/slide_index_3.jpg" alt="bus-4" width="600" height="410">
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include "includes/bottom_content.php"; ?>
	</div>
</div>
<?php include "includes/footer.php"; ?>
<script>
	var today = new Date().toISOString().split('T')[0];
	document.getElementsByName("dates")[0].setAttribute('min', today);

	function readopt1value(){
		var readuser = 'readuser'
		var boardingpoint = $("#sel1").val()
		$.ajax({
			url:"db.php",
			type:"POST",
			data:{readuser:readuser,boardingpoint:boardingpoint},
			success:function(data,status){
				$('#sel2').html(data);
			}

		});

	}

	function readopt2value(){
		var readusertwo = 'readusertwo'
		var boardingpoint = $("#sel1").val()
		var droapingpoint = $("#sel2").val()
		$.ajax({
			url:"db.php",
			type:"POST",
			data:{readusertwo:readusertwo,boardingpoint:boardingpoint,droapingpoint:droapingpoint},
			success:function(data,status){
				$('#timing').html(data);
			}

		});

	}


	$(document).ready(function(){
	  $("#sel1").click(function(){

	  	readopt1value();
	    $("#sel2").removeAttr('disabled');
	    // alert("Value: " + $("#sel1").val());
	  });

	  $("#sel2").click(function(){

	  	readopt2value();

	    $("#timing").removeAttr('disabled');

	    // alert("Value: " + $("#sel2").val());
	  });
	  
	  $("#timing").click(function(){
	  	$("#date").removeAttr('disabled');
	  	// alert("Value: " + $("#date").val());
	  });
	});

</script>