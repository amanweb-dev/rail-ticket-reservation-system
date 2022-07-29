<?php require 'include/header.php'; ?>

<!-- Sidebar -->
<?php require 'include/sidebar.php'; ?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h1>ISL<small></small></h1>
			<ol class="breadcrumb">
				<li><a href=""><i class="icon-dashboard"></i> Dashboard</a></li>
				<li class="active"><i class="icon-file-alt"></i> Edit Item</li>
			</ol>
			<div class="row">

				<?php

					if (isset($_GET['edit'])) {
						$rd_id = $_GET['edit'];

						$select_query = "SELECT * FROM route_details WHERE rd_id = $rd_id";

						$rslts = $db->select($select_query);
						if ($rslts) {
							$row = $rslts->fetch_array(); 
							?>



				<h1>Edit Bike</h1>
					
					<form role="form" method="post" action="edit_item.php" enctype="multipart/form-data">
					
					<div class="col-md-6">

							<input type="hidden" name="hidden_rd_id" value="<?php echo $row['rd_id']; ?>">

							<label class="control-label" for="inputSuccess">BOARDING POINT</label>
							<input name="boarding_point" type="text" value="<?php echo $row['rd_boarding_point'] ?>" class="form-control" id="inputSuccess"><br>

							<label class="control-label" for="inputSuccess">DROPPING POINT</label>
							<input name="dropping_point" type="text" value="<?php echo $row['rd_dropping_point'] ?>" class="form-control" id="inputSuccess"><br>

							<label class="control-label" for="inputSuccess">Start Time</label>
							<input name="start_timing" type="text" value="<?php echo $row['rd_start_timing'] ?>" class="form-control" id="inputSuccess"><br>

						</div>
						<div class="col-md-6">

							<label class="control-label" for="inputSuccess">End Time</label>
							<input name="end_timing" type="text" value="<?php echo $row['rd_end_timing'] ?>" class="form-control" id="inputSuccess"><br>

							<label class="control-label" for="inputSuccess">Fare/km (per km)</label>
							<input name="fare_per_km" type="text" value="<?php echo $row['rd_fare_per_km'] ?>" class="form-control" id="inputSuccess"><br>

							<label class="control-label" for="inputSuccess">Boarding To Dropping Distance (in km)</label>
							<input name="distance" type="text" value="<?php echo $row['rd_distance'] ?>" class="form-control" id="inputSuccess"><br>

						</div>

						<input type="submit" name="edit_item" class="cstm_save btn btn-block btn-primary" value="Update"><br>

					</form>


						<?php }
					}



					?>


				</div>
			</div>
		</div>
	</div><!-- /.row -->

</div><!-- /#page-wrapper -->
<?php require 'include/footer.php'; ?>

<?php 




if (isset($_POST['edit_item'])) {
	$hidden_rd_id =$_POST['hidden_rd_id'];
	$boarding_point =$_POST['boarding_point'];
	$dropping_point = $_POST['dropping_point'];
	$start_timing = $_POST['start_timing'];
	$end_timing = $_POST['end_timing'];
	$fare_per_km = $_POST['fare_per_km'];
	$distance = $_POST['distance'];

	$total_fare = $distance*$fare_per_km;
	

		if (!empty($boarding_point) && !empty($dropping_point) && !empty($start_timing) && !empty($end_timing) && !empty($fare_per_km) && !empty($distance) && !empty($total_fare)) {

			$update_query = "UPDATE route_details SET rd_boarding_point='$boarding_point',rd_dropping_point='$dropping_point',rd_start_timing='$start_timing',rd_end_timing='$end_timing',rd_fare_per_km='$fare_per_km',rd_distance='$distance',rd_total_fare='$total_fare' WHERE rd_id=$hidden_rd_id ";
			$rslt = $db->update($update_query);
			if ($rslt) {
				echo '<script type="text/javascript">Swal.fire({
					icon: "suitem_priceess",
					title: "Done!",
					text: "Route has been successfully updated",
					})
					setTimeout(function(){
						window.location.href = "view_all_items.php";
						}, 3000);
						</script>';
			}else{
				echo '<script type="text/javascript">Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Something went wrong",
					})
					setTimeout(function(){
						window.location.href = "view_all_items.php";
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
					window.location.href = "view_all_items.php";
					}, 4000);
					</script>';
				}
			
				}


				?>