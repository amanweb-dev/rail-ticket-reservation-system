<?php require 'include/header.php'; ?>

<!-- Sidebar -->
<?php require 'include/sidebar.php'; ?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h1>DMRT<small></small></h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="icon-dashboard"></i> Dashboard</a></li>
				<li class="active"><i class="icon-file-alt"></i> View All Booking</li>
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
					$mob_no = Session::get_session("psngrMobile");
					$select_query = "SELECT * FROM booked_seat WHERE psngr_mobile= '$mob_no' ORDER BY booking_id DESC LIMIT $page_no, $Showing_item ";
					$rslts = $db->select($select_query);

					if ($rslts) {?>
						<h1>Ticket  list</h1>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped tablesorter">
								<thead>
									<tr>
										<th>SI</th>
										<th>journey Date</th>

										<th>From</th>
										<th>To</th>
										<th>Time</th>
										<th>Fare/Seat</th>

										<th>Coach No</th>
										<th>Seat No</th>
										<th>Booking Date</th>
										<th>Total Fare</th>
										<th>Status</th>
										<th>Cancel</th>
										
										
									</tr>
								</thead>
								<tbody>

									<?php 

									$i = 1;


									while ($row = $rslts->fetch_assoc()) { 

										$rd_id = $row['rd_id'];

										$select_query2 = "SELECT * FROM route_details WHERE 	rd_id = $rd_id ";
										$rslts2 = $db->select($select_query2);
										if ($rslts2) {
											$row2 = $rslts2->fetch_assoc();

										}



										?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row['journey_date']; ?></td>

											

											<td><?php echo $row2['rd_boarding_point']; ?></td>
											<td><?php echo $row2['rd_dropping_point']; ?></td>
											<td><?php echo $row2['rd_start_timing']; ?></td>
											<td><?php echo $row2['rd_total_fare']; ?></td>

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
											<td><?php echo $row['booking_date']; ?></td>
											<td><?php echo $row['total_fare']; ?></td>
											<td><?php echo $row['status']; ?></td>
											
											<td>
												<?php 

												$today_date = date("Y-m-d");
												$journey_date_str = strtotime($row['journey_date']);
										
												$today_date_str = strtotime($today_date);
												$check_daate_str = $today_date_str+86400;

												
												if ($journey_date_str>=$check_daate_str) {
													
												

												if ($row['status'] !='booked') { 

													echo $row['status'];
												}else{ ?>

													<a href="?cancel=<?php echo $row['booking_id']; ?>"onClick="confirm('Are you sure to cancel')"><button class="btn btn-warning">Cancel</button></a>

												<?php }

											}else{
												echo $row['status'];
											}

												 ?>
												
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

						<?php 

						$select_query1 = "SELECT * FROM booked_seat WHERE psngr_mobile= '$mob_no' ";
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

		$up_qry = "UPDATE booked_seat SET status='pending' WHERE booking_id = $bking_id ";
		$up_result = $db->update($up_qry);
		if ($up_result) {
			echo '<script type="text/javascript">Swal.fire({
					icon: "success",
					title: "Request Sent!",
					text: "Your Cancellation Request has been Sent.Please Wait.",
					})
					setTimeout(function(){
						window.location.href = "my_ticket.php";
						}, 2000);
						</script>';
		}else{
			echo '<script type="text/javascript">Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "Something Went wrong.Try again later",
							})
							setTimeout(function(){
								window.location.href = "my_ticket.php";
								}, 4000);
								</script>';
		}
	}





 ?>

