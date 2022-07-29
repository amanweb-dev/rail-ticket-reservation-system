<?php require 'include/header.php'; ?>

<!-- Sidebar -->
<?php require 'include/sidebar.php'; ?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h1>DMRT<small></small></h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="icon-dashboard"></i> Dashboard</a></li>
				<li class="active"><i class="icon-file-alt"></i> View All Request</li>
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
					$select_query = "SELECT * FROM booked_seat WHERE status='pending' LIMIT $page_no, $Showing_item ";
					$rslts = $db->select($select_query);

					if ($rslts) {?>
						<h1>Request  list</h1>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped tablesorter">
								<thead>
									<tr>
										<th>Ticket No</th>
										<th>Coach No</th>
										<th>Seat</th>
										<th>Name</th>
										<th>Method</th>
										<th>Contact</th>
										<th>Fare</th>
										<th>payment Number</th>
										<th>Cancel</th>
										
									</tr>
								</thead>
								<tbody>
									<?php while ($row = $rslts->fetch_assoc()) { ?>
										<tr>
											<td><?php echo $row['booking_id']; ?></td>
											<td><?php echo $row['coach_name']; ?></td>
											<td>
											 <?php 
								              $pass_book_seat_array = explode("|",$row['total_seat_no']);
								              $pass_book_seat_array =array_filter($pass_book_seat_array);
								              $pass_book_seat_array = array_values($pass_book_seat_array);

								              for ($i=0; $i <count($pass_book_seat_array) ; $i++) { 
								                echo $pass_book_seat_array[$i]." ";
								              }


								               ?>
												

											</td>
											<td><?php echo $row['psngr_name']; ?></td>
											<td><?php echo $row['psngr_pay_method']; ?></td>
											<td><?php echo $row['psngr_mobile']; ?></td>
											<td><?php echo $row['total_fare']; ?></td>
											<td><?php echo $row['psngr_payment_number']; ?></td>
											
						
											<td>
												<a href="?cancel=<?php echo $row['booking_id']; ?>"onClick="confirm('Are you sure to cancel')"><button class="btn btn-warning">Cancel</button></a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

						<?php 

						$select_query1 = "SELECT * FROM booked_seat WHERE status='pending' ";
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

	if (isset($_GET['cancel'])) {
		$bking_id = $_GET['cancel'];

		$up_qry = "UPDATE booked_seat SET status='canceled' WHERE booking_id = $bking_id ";
		$up_result = $db->update($up_qry);
		if ($up_result) {
			echo '<script type="text/javascript">Swal.fire({
					icon: "success",
					title: "Canceled!",
					text: "Ticket has been canceled successfully.",
					})
					setTimeout(function(){
						window.location.href = "can_req.php";
						}, 2000);
						</script>';
		}else{
			echo '<script type="text/javascript">Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "Something Went wrong.Try again later",
							})
							setTimeout(function(){
								window.location.href = "can_req.php";
								}, 4000);
								</script>';
		}
	}





 ?>

