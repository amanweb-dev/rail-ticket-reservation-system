<?php require 'include/header.php'; ?>

<!-- Sidebar -->
<?php require 'include/sidebar.php'; ?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h1>DMRT<small></small></h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="icon-dashboard"></i> Dashboard</a></li>
				<li class="active"><i class="icon-file-alt"></i> View All List</li>
			</ol>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<?php 
					$Showing_item = 10;
					if (isset($_GET['page_no'])) {
						$page_no = $_GET['page_no'];
						$page_no = $page_no*$Showing_item;

					}else{
						$page_no = 0;
						$page_no*$Showing_item;
					}
					$select_query = "SELECT * FROM route_details ORDER BY rd_id LIMIT $page_no, $Showing_item ";
					$rslts = $db->select($select_query);

					if ($rslts) {?>
						<h1>Route  list</h1>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped tablesorter">
								<thead>
									<tr>
										<th>Id</th>
										<th>Boarding</th>
										<th>Dropping</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Fare/km</th>
										<th>Distance</th>
										<th>Total Fare</th>
										<th>Edit</th>
										<th>Delete</th>
										
									</tr>
								</thead>
								<tbody>
									<?php while ($row = $rslts->fetch_assoc()) { ?>
										<tr>
											<td><?php echo $row['rd_id']; ?></td>
											<td><?php echo $row['rd_boarding_point']; ?></td>
											<td><?php echo $row['rd_dropping_point']; ?></td>
											<td><?php echo $row['rd_start_timing']; ?></td>
											<td><?php echo $row['rd_end_timing']; ?></td>
											<td><?php echo $row['rd_fare_per_km']; ?></td>
											<td><?php echo $row['rd_distance']; ?></td>
											<td><?php echo $row['rd_total_fare']; ?></td>
											
											<td>
												<a href="edit_item.php?edit=<?php echo $row['rd_id']; ?>"><button class="btn btn-warning">Edit</button></a>
											</td>
											<td>
												<a href="?delete=<?php echo $row['rd_id']; ?>"><button class="btn btn-danger">Delete</button></a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

						<?php 

						$select_query1 = "SELECT rd_id FROM route_details ";
						$rslts1 = $db->select($select_query1);

						$count =  mysqli_num_rows($rslts1);

						$total_page = $count/$Showing_item;
						$total_page = ceil($total_page);

						if ($total_page>1) { ?>
							<span>

							<?php for ($i=0; $i < $total_page; $i++) { ?>

								<a href="?page_no=<?php echo $i; ?>"><?php echo $i+1; ?></a>

							<?php } ?>

							</span>
							
						<?php }

						





						 ?>


						
					<?php }else{

						echo "<h1 style='color:red;text-align:center;'>No Item Found</h1>";
					}



					?>



					


				</div>
			</div>
		</div>
	</div><!-- /.row -->

</div><!-- /#page-wrapper -->
<?php require 'include/footer.php'; ?>

<?php 

	if (isset($_GET['delete'])) {
		$rd_id = $_GET['delete'];

		$del_qry = "DELETE FROM route_details WHERE rd_id = $rd_id ";
		$result = $db->delete($del_qry);
		if ($result) {
			echo '<script type="text/javascript">Swal.fire({
					icon: "success",
					title: "Deleted!",
					text: "Route has been deleted successfully",
					})
					setTimeout(function(){
						window.location.href = "view_all_items.php";
						}, 2000);
						</script>';
		}else{
			echo '<script type="text/javascript">Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "Route is not deletd.Try again later",
							})
							setTimeout(function(){
								window.location.href = "view_all_items.php";
								}, 4000);
								</script>';
		}
	}





 ?>

