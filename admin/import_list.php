<?php require 'include/header.php'; ?>

<!-- Sidebar -->
<?php require 'include/sidebar.php'; ?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h1>DMRT<small></small></h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="icon-dashboard"></i>Dashboard</a></li>
				<li class="active"><i class="icon-file-alt"></i> Import Route Details Via CSV</li>
			</ol>
			<div class="row">
				<div class="col-md-5">
					<!-- <h1>Add Bike</h1> -->
					<div class="row">
						<form role="form" method="post" action="import_list.php" enctype="multipart/form-data">
							<label class="control-label" for="inputSuccess">Import CSV</label>
							<input name="csvfile" type="file" class="form-control" id="inputSuccess"><br>
							<input type="submit" name="add_csv" class="btn btn-primary" value="Import CSV!"><br>
						</form>
					</div>


				</div>
			</div>
		</div>
	</div><!-- /.row -->

</div><!-- /#page-wrapper -->
<?php require 'include/footer.php'; ?>

<?php 
$rslt = false;
if (isset($_POST['add_csv'])) {

	$file = $_FILES['csvfile']['tmp_name'];
	$check_file = $_FILES['csvfile']['name'];
	if (!empty($check_file)) {
	$handle = fopen($file,"r");
	while (($rows=fgetcsv($handle,1000,",")) !==false) {

	$boarding_point =$rows[0];
	$dropping_point = $rows[1];
	$start_timing = $rows[2];
	$end_timing = $rows[3];
	$fare_per_km = $rows[4];
	$distance = $rows[5];

	$total_fare = $fare_per_km*$distance;

		if (!empty($boarding_point) && !empty($dropping_point) && !empty($start_timing) && !empty($end_timing) && !empty($fare_per_km) && !empty($distance) && !empty($total_fare)) {
			$insert_query = "INSERT INTO route_details(rd_boarding_point,rd_dropping_point,rd_start_timing,rd_end_timing,rd_fare_per_km,rd_distance,rd_total_fare) VALUES('$boarding_point','$dropping_point','$start_timing','$end_timing','$fare_per_km','$distance','$total_fare') ";
			$rslt = $db->insert($insert_query);	
		}
		

	}

	if ($rslt) {
		echo '<script type="text/javascript">Swal.fire({
			icon: "success",
			title: "Done!",
			text: "CSV has been successfully uploaded",
			})
			setTimeout(function(){
				window.location.href = "import_list.php";
				}, 3000);
				</script>';
	}else{
		echo '<script type="text/javascript">Swal.fire({
			icon: "error",
			title: "Oops...",
			text: "Something went wrong",
			})
			setTimeout(function(){
				window.location.href = "import_list.php";
				}, 4000);
				</script>';
		}

	}else{
		echo '<script type="text/javascript">Swal.fire({
			icon: "error",
			title: "Oops...",
			text: "P;ease select a csv file",
			})
			setTimeout(function(){
				window.location.href = "import_list.php";
				}, 4000);
				</script>';
		}

}


?>