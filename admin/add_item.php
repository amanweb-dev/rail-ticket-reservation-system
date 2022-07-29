<?php require 'include/header.php'; ?>

<!-- Sidebar -->
<?php require 'include/sidebar.php'; ?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h1>DMRT<small></small></h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="icon-dashboard"></i> Dashboard</a></li>
				<li class="active"><i class="icon-file-alt"></i> Add Item</li>
			</ol>
			<div class="row">
				<div class="col-md-12">
					<!-- <h1>Add Bike</h1> -->

					<div class="row">
						<form role="form" method="post" action="add_item.php" enctype="multipart/form-data">
						<div class="col-md-6">
							<label class="control-label" for="inputSuccess">BOARDING POINT</label>
							<input name="boarding_point" type="text" class="form-control" id="inputSuccess"><br>
							<label class="control-label" for="inputSuccess">DROPPING POINT</label>
							<input name="dropping_point" type="text" class="form-control" id="inputSuccess"><br>
							<label class="control-label" for="inputSuccess">Start Time</label>
							<input name="start_timing" type="text" class="form-control" id="inputSuccess"><br>
						</div>
						<div class="col-md-6">
							<label class="control-label" for="inputSuccess">End Time</label>
							<input name="end_timing" type="text" class="form-control" id="inputSuccess"><br>
							<label class="control-label" for="inputSuccess">Fare/km (per km)</label>
							<input name="fare_per_km" type="text" class="form-control" id="inputSuccess"><br>
							<label class="control-label" for="inputSuccess">Boarding To Dropping Distance (in km)</label>
							<input name="distance" type="text" class="form-control" id="inputSuccess"><br>
						</div>

							<input type="submit" name="add" class="cstm_save btn btn-block btn-primary" value="Save"><br>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.row -->

</div><!-- /#page-wrapper -->
<?php require 'include/footer.php'; ?>

<?php 

if (isset($_POST['add'])) {
	$boarding_point =$_POST['boarding_point'];
	$dropping_point = $_POST['dropping_point'];
	$start_timing = $_POST['start_timing'];
	$end_timing = $_POST['end_timing'];
	$fare_per_km = $_POST['fare_per_km'];
	$distance = $_POST['distance'];

	$total_fare = $distance*$fare_per_km;


		if (!empty($boarding_point) && !empty($dropping_point) && !empty($start_timing) && !empty($end_timing) && !empty($fare_per_km) && !empty($distance) && !empty($total_fare)) {
			$insert_query = "INSERT INTO route_details(rd_boarding_point,rd_dropping_point,rd_start_timing,rd_end_timing,rd_fare_per_km,rd_distance,rd_total_fare) VALUES('$boarding_point','$dropping_point','$start_timing','$end_timing','$fare_per_km','$distance','$total_fare') ";
			$rslt = $db->insert($insert_query);
			if ($rslt) {
				echo '<script type="text/javascript">Swal.fire({
					icon: "success",
					title: "Done!",
					text: "Route has been successfully added",
					})
					setTimeout(function(){
						window.location.href = "add_item.php";
						}, 3000);
						</script>';
					}else{
						echo '<script type="text/javascript">Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "Something went wrong",
							})
							setTimeout(function(){
								window.location.href = "add_item.php";
								}, 4000);
								</script>';
							}

						}else{
							echo '<script type="text/javascript">Swal.fire({
								icon: "error",
								title: "Oops...",
								text: "field can not be empty",
								})
								setTimeout(function(){
									window.location.href = "add_item.php";
									}, 4000);
									</script>';
								}
						
								}


								?>