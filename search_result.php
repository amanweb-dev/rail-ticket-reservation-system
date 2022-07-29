<?php session_start(); ?>
<?php include "includes/header.php"; ?>
<?php unset($_SESSION['bookingId']); ?>

<?php 

if (isset($_SESSION['passengerLogin'])) {
	$psngr_mobile_ssn =  $_SESSION['psngrMobile'];

	$psngr_query_query = "SELECT * FROM passenger_info WHERE psngr_mobile = '$psngr_mobile_ssn' ";
	$psngr_query_rslt = $db->select($psngr_query_query);
	if ($psngr_query_rslt) {
		$psngr_rows = $psngr_query_rslt->fetch_assoc();

		$db_psngr_name = $psngr_rows['psngr_name'];
		$db_psngr_email = $psngr_rows['psngr_email'];
		$db_psngr_gender = $psngr_rows['psngr_gender'];
		$db_psngr_address = $psngr_rows['psngr_address'];
		$db_psngr_mobile = $psngr_rows['psngr_mobile'];
		$db_psngr_age = $psngr_rows['psngr_age'];
		$db_psngr_nid = $psngr_rows['psngr_nid'];
		$db_psngr_nationality = $psngr_rows['psngr_nationality'];
	}
}

 ?>

<div class="container">
	<div class="total-body">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-md bg-dark navbar-dark text-right">
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
		<div class="row">
			<div class="col-md-12">
				<div class="search-inline">
					<form action="" class="form-inline" method="post">
						<div class="form-group">
							<!-- <label for="sel1">Leaving From : </label> -->

							<select class="form-control" id="sel1" name="boarding">


								<?php 

								if (isset($_POST['search'])) {
									$boarding = $_POST['boarding'];

									?>
									<option value="<?php echo $boarding; ?>"><?php echo $boarding; ?></option>

								<?php }else if(isset($_POST['search_another'])){
									unset($_POST['search']);

									$select_query_source = "SELECT rd_boarding_point FROM route_details GROUP BY rd_boarding_point";
									$select_query_source_rslt = $db->select($select_query_source);
									$count = mysqli_num_rows($select_query_source_rslt);

									if ($count>0) {

										while ($rows = $select_query_source_rslt->fetch_assoc()) { ?>
											<option value="<?php echo $rows['rd_boarding_point']; ?>"><?php echo $rows['rd_boarding_point']; ?></option>
											
										<?php }							
									}

								}

								?>
							</select>
							<br>
							<?php 

							if (isset($_POST['search'])) {
								$dropping = $_POST['dropping'];

								?>
								<select class="form-control"  name="dropping" disabled>
									<option value="<?php echo $dropping; ?>"><?php echo $dropping; ?></option>

								</select>


							<?php }else if(isset($_POST['search_another'])){
								unset($_POST['search']); ?>
								<select class="form-control" id="sel2" name="dropping" disabled>

								</select>


							<?php } ?>

							<!-- <label for="sel2">Destination : </label> -->

							<!-- <label for="timing">Time : </label> -->
							<?php if (isset($_POST['search'])) {
								$timing = $_POST['timing'];

								?>
								<select class="form-control" name="timing" id="timing" disabled>
									<option value="<?php echo $dropping; ?>"><?php echo $timing; ?></option>

								</select>


							<?php }else if(isset($_POST['search_another'])){
								unset($_POST['search']); ?>
								<select class="form-control" id="timing" name="timing" disabled>

								</select>

							<?php } ?>


							<!-- <label for="date">Date : </label> -->
							<?php if (isset($_POST['search'])) {
								$dates = $_POST['dates'];

								?>
								<input type="date" class="form-control" value="<?php echo $dates;  ?>" name="dates" disabled>


							<?php }else if(isset($_POST['search_another'])){
								unset($_POST['search']); ?>
								<input type="date" class="form-control" id="date" name="dates" disabled>

							<?php } ?>

							<!-- <input type="date" class="form-control" id="date" name="dates" disabled> -->
						</div>
						<div class="text-center">
							<?php if (isset($_POST['search'])) {
										unset($_SESSION['seatNo']); 
										unset($_SESSION['saveSeats']); 
										// unset($_SESSION['totalfare']);

								?>
								<button type="submit" name="search_another" class="btn btn-primary">Search Another ?</button>


							<?php }else if(isset($_POST['search_another'])){
										unset($_POST['search']); 
										unset($_SESSION['seatNo']); 
										unset($_SESSION['saveSeats']); 
										unset($_SESSION['totalfare']); 
								?>

								<button type="submit" name="search" class="btn btn-primary">Search Train</button>

							<?php } ?>

						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-12">
				<table class="table table-hover table-bordered table-secondary text-center" id="myTable">
					<thead class="table-warning">
						<tr>
							<th>DEPARTING TIME</th>
							<th>COACH NO</th>
							<th>STARTING COUNTER</th>
							<th>END COUNTER</th>
							<th>FARE</th>
							<!-- <th>COACH TYPE</th> -->
							<th>ARRIVAL TIME</th>
							<th>SEATS AVAILABLE</th>
							<th>VIEW</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (isset($_POST['search'])) {
							$boarding = $_POST['boarding'];
							$dropping = $_POST['dropping'];
							$timing = $_POST['timing'];
							$psngr_jouney_dates = $_POST['dates'];

							$select_query_all = "SELECT * FROM route_details WHERE rd_boarding_point = '$boarding' AND rd_dropping_point = '$dropping' AND  rd_start_timing = '$timing' ";
							$select_query_all_rslt = $db->select($select_query_all);

							$rows = $select_query_all_rslt->fetch_assoc();

							$_SESSION['fare'] = ceil($rows['rd_total_fare']);
							$route_id = $rows['rd_id'];
							$rd_start_timing = $rows['rd_start_timing'];

							$arr  = array("A","B","C","D","E");
							for ($i=0; $i < 5; $i++) { ?>

								<?php 
								$coach = $arr[$i];

								$select_booked_query = "SELECT * FROM booked_seat WHERE rd_id = $route_id AND journey_date = '$psngr_jouney_dates' AND coach_name = '$coach' AND status != 'canceled' ";
								$booked_query_rslt = $db->select($select_booked_query);


								if ($booked_query_rslt) {
									if (mysqli_num_rows($booked_query_rslt)>0) {
										$booked_seat_id = array();
										$count_book =0;
										while ($bokked_row = $booked_query_rslt->fetch_assoc()) {

											$booked_seat_array = explode("|", $bokked_row['total_seat_no']);
											$booked_seat_array =array_filter($booked_seat_array);
											$booked_seat_array = array_values($booked_seat_array);

											for ($n=0; $n <count($booked_seat_array) ; $n++) {

												$booked_seat_id[$count_book] = $booked_seat_array[$n];

												$count_book++; 
											}

										} 

							// print_r($booked_seat_id);
										?>

										<tr id="<?php echo 'myid'.$i; ?>">
											<td><?php echo $rd_start_timing; ?></td>
											<td><?php echo $arr[$i]; ?></td>
											<td><?php echo $boarding; ?></td>
											<td><?php echo $dropping; ?></td>
											<td class="fares" id="fares"><?php echo ceil($rows['rd_total_fare']); ?></td>
											<!-- <td>AC</td> -->
											<td><?php echo $rows['rd_end_timing']; ?></td>
											<td><?php echo 44-$count_book ?></td>
											<td ><img src="assets/img/application_view_tile.gif" alt=""></td>
										</tr>


									<?php }
								}else{ ?>

									<tr id="<?php echo 'myid'.$i; ?>">
										<td><?php echo $rd_start_timing;?></td>
										<td><?php echo $arr[$i]; ?></td>
										<td><?php echo $boarding; ?></td>
										<td><?php echo $dropping; ?></td>
										<td class="fares" id="fares"><?php echo ceil($rows['rd_total_fare']); ?></td>
										<!-- <td>AC</td> -->
										<td><?php echo $rows['rd_end_timing']; ?></td>
										<td>44</td>
										<td ><img src="assets/img/application_view_tile.gif" alt=""></td>
									</tr>


								<?php }

								?>

								<tr class="seat-content" id="<?php echo 'amyid'.$i; ?>">
									<td colspan="9" style="width:100%">
										<div class="row">
											<div class="col-md-4">
												<div class="full-bogy">
													<h3 class="text-center mb-4" style="color: white ">Select Seat</h3>
													<div class="seat-pattern seat-pattern-1">
														<div class="seat-top">
															<div class="row">
																<span style="disply:inline-block;padding-bottom: 10px;">
																	<button id="<?php echo "seat_".$arr[$i] ?>01"><?php echo $arr[$i] ?>01</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>02"><?php echo $arr[$i] ?>02</button>
																	<span style="padding-right: 20px;padding-left: 20px"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>03"><?php echo $arr[$i] ?>03</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>04"><?php echo $arr[$i] ?>04</button>
																</span>
															</div>
														</div>
														<div class="seat-middle">
															<div class="row">
																<div class="inline">
																	<div class="gt"></div>
																	<span style="margin-right: 230px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>05" class=""><?php echo $arr[$i] ?>05</button>
																</div>
															</div>
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>06"><?php echo $arr[$i] ?>06</button>
																	<span style="margin-right: 167px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>07"><?php echo $arr[$i] ?>07</button>
																</div>
															</div>
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>08"><?php echo $arr[$i] ?>08</button>
																	<span style="margin-right: 167px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>09"><?php echo $arr[$i] ?>09</button>
																</div>
															</div>
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>10" class=""><?php echo $arr[$i] ?>10</button>
																	<span style="margin-right: 167px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>11"><?php echo $arr[$i] ?>11</button>
																</div>
															</div>
															<div class="row">
																<span style="padding-top: 10px;"></span>
															</div>

														</div>
														<div class="seat-bottom">
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>12"><?php echo $arr[$i] ?>12</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>13"><?php echo $arr[$i] ?>13</button>
																	<span style="margin-right: 40px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>14" class=""><?php echo $arr[$i] ?>14</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>15"><?php echo $arr[$i] ?>15</button>
																</div>
															</div>
														</div>
													</div>
													<div class="seat-pattern seat-pattern-2">
														<div class="seat-top">
															<div class="row">
																<span style="disply:inline-block;padding-bottom: 10px;">
																	<button id="<?php echo "seat_".$arr[$i] ?>16"><?php echo $arr[$i] ?>16</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>17"><?php echo $arr[$i] ?>17</button>
																	<span style="padding-right: 20px;padding-left: 20px"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>18"><?php echo $arr[$i] ?>18</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>19" class=""><?php echo $arr[$i] ?>19</button>
																</span>
															</div>
														</div>
														<div class="seat-middle">
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>20"><?php echo $arr[$i] ?>20</button>
																	<span style="margin-right: 167px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>21"><?php echo $arr[$i] ?>21</button>
																</div>
															</div>
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>22"><?php echo $arr[$i] ?>22</button>
																	<span style="margin-right: 167px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>23"><?php echo $arr[$i] ?>23</button>
																</div>
															</div>
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>24"><?php echo $arr[$i] ?>24</button>
																	<span style="margin-right: 167px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>25"><?php echo $arr[$i] ?>25</button>
																</div>
															</div>
															<div class="row">
																<span style="padding-top: 10px;"></span>
															</div>

														</div>
														<div class="seat-bottom">
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>26"><?php echo $arr[$i] ?>26</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>27"><?php echo $arr[$i] ?>27</button>
																	<span style="margin-right: 40px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>28"><?php echo $arr[$i] ?>28</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>29"><?php echo $arr[$i] ?>29</button>
																</div>
															</div>
														</div>
													</div>
													<div class="seat-pattern seat-pattern-3">
														<div class="seat-top">
															<div class="row">
																<span style="disply:inline-block;padding-bottom: 10px;">
																	<button id="<?php echo "seat_".$arr[$i] ?>30"><?php echo $arr[$i] ?>30</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>31"><?php echo $arr[$i] ?>31</button>
																	<span style="padding-right: 20px;padding-left: 20px"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>32"><?php echo $arr[$i] ?>32</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>33"><?php echo $arr[$i] ?>33</button>
																</span>
															</div>
														</div>
														<div class="seat-middle">
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>34"><?php echo $arr[$i] ?>34</button>
																	<span style="margin-right: 167px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>35"><?php echo $arr[$i] ?>35</button>
																</div>
															</div>
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>36"><?php echo $arr[$i] ?>36</button>
																	<span style="margin-right: 167px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>37"><?php echo $arr[$i] ?>37</button>
																</div>
															</div>
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>38"><?php echo $arr[$i] ?>38</button>
																	<span style="margin-right: 167px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>39"><?php echo $arr[$i] ?>39</button>
																</div>
															</div>
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>40"><?php echo $arr[$i] ?>40</button>
																	<div class="gt"></div>
																</div>
															</div>
															<div class="row">
																<span style="padding-top: 10px;"></span>
															</div>

														</div>
														<div class="seat-bottom">
															<div class="row">
																<div class="inline">
																	<button id="<?php echo "seat_".$arr[$i] ?>41"><?php echo $arr[$i] ?>41</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>42"><?php echo $arr[$i] ?>42</button>
																	<span style="margin-right: 40px;"></span>
																	<button id="<?php echo "seat_".$arr[$i] ?>43"><?php echo $arr[$i] ?>43</button>
																	<button id="<?php echo "seat_".$arr[$i] ?>44"><?php echo $arr[$i] ?>44</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-8">
												<div class="customer-info">
													<div class="row" id="forsess">
														<div id="seatval_<?php echo $arr[$i]; ?>"></div>
													</div>

													<h3 class="text-center mb-4">Passenger Info</h3>
													<div class="row"></div>
													<div class="row">

														<form action="db.php" class="form-inline" method="post">
															<div class="col-md-6">

																<input type="hidden" name="rd_id" value="<?php echo $rows['rd_id']; ?>">

																<input type="hidden" name="coach_name" value="<?php echo $arr[$i]; ?>">

																<input type="hidden" name="journey_date" value="<?php echo $_POST['dates']; ?>">


																<div class="form-group">
																	<label for="usr">Name:</label>
																	<input type="text" class="form-control" id="usr" name="username" value="<?php echo isset($_SESSION['passengerLogin'])?$db_psngr_name : ''; ?>" required>
																</div>
																<div class="form-group">
																	<label for="email">Email:</label>
																	<input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_SESSION['passengerLogin'])?$db_psngr_email : ''; ?>">
																</div>
																<div class="form-group">
																	<label for="gender">Gender:</label>
																	<select class="form-control w-auto" id="" name="gender">
																		<option>Male</option>
																		<option>Female</option>
																		<option>Custom</option>
																	</select>
																</div>
																<div class="form-group">
																	<label for="address">Address:</label>
																	<input type="text" class="form-control" id="address" name="address" value="<?php echo isset($_SESSION['passengerLogin'])?$db_psngr_address : ''; ?>">
																</div>
																<div class="form-group">
																	<label for="gender">Payment:</label>
																	<select class="form-control" id="" name="payment" required>
																		<option>Nagad</option>
																		<option>Bkash</option>
																		<option>Rocket</option>
																	</select>
																</div>

															</div>
															<div class="col-md-6">

																<div class="form-group">
																	<label for="usr">Mobile:</label>
																	<input type="text" class="form-control" name="mobile" required value="<?php echo isset($_SESSION['passengerLogin'])?$db_psngr_mobile : ''; ?>">
																</div>
																<div class="form-group">
																	<label for="Age">Age:</label>
																	<input type="text" class="form-control" id="age" name="age" required value="<?php echo isset($_SESSION['passengerLogin'])?$db_psngr_age : ''; ?>">
																</div>
																<div class="form-group">
																	<label for="nid">NID:</label>
																	<input type="text" class="form-control" id="nid" name="nid" value="<?php echo isset($_SESSION['passengerLogin'])?$db_psngr_nid : ''; ?>">
																</div>
																<div class="form-group">
																	<label for="ntlty">Nationality:</label>
																	<select class="form-control" id="" name="ntlty" required>
																		<option>Bangladeshi</option>
																		<option>Others</option>
																	</select>
																</div>
																<div id="paymntsection<?php echo $arr[$i]; ?>">
																	<?php echo $arr[$i]; ?>
																	<button type="button" data-toggle="modal" data-target="#myModal<?php echo $arr[$i]; ?>" name="" class="btn btn-success btn-block">Confirm Ticket</button>

															</div>	
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</td>

									
									<div class="modal" id="myModal<?php echo $arr[$i]; ?>">
									<div class="modal-dialog">
										<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Make Payment</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											

											<!-- Modal body -->
											<div class="modal-body">
											<div class="pay_warning">
											<p>1. Goto Your Mobile Banking And Select Send Money Option.</p>
											<p>2. Send Money to (1) 01756007000 [bkash,nagad] (2) 017560070009 [rocket]</p>
											<p>3. Fill the given input Field with correct Information.</p>
											<hr>	
											</div>
												<div class="form-group">
													<label for="bkashnumber">Your Account No</label>
													<input type="text" class="form-control" name="bkashnumber" id="bkashnumber<?php echo $arr[$i]; ?>">
												</div>
												<div class="form-group">
													<label for="transactionid">Transaction Id</label>
													<input type="text" class="form-control" name="transactionid" id="transactionid<?php echo $arr[$i]; ?>">
												</div>
											</div>

											<!-- Modal footer -->
											<div class="modal-footer">
												<button type="button" data-dismiss="modal" class="btn btn-success"  onclick="addPayment('<?php echo $arr[$i]; ?>')">Confirm</button>
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>

										</div>
									</div>
								</div>

								</tr>

								<?php 
								if (!empty($booked_seat_id)) {

									$count_for_book = count($booked_seat_id);
									for ($m=0; $m <$count_for_book ; $m++) { ?>
										<script>
											document.getElementById('<?php echo "seat_".$booked_seat_id[$m]; ?>').style.background = "#a24242";
											document.getElementById('<?php echo "seat_".$booked_seat_id[$m]; ?>').disabled = true;
										</script>

									<?php }

								}

							}

						}

						?>
					</tbody>
				</table>
			</div>
		</div>
		<?php include "includes/bottom_content.php"; ?>
	</div>
</div>

<?php include "includes/footer.php"; ?>

<script>

	var today = new Date().toISOString().split('T')[0];
	document.getElementsByName("dates")[0].setAttribute('min', today);


	function addPayment(vvv){

		var vvv = vvv
		
		var bkashnumbers = "#bkashnumber"+vvv
		var bkashnumber = $(bkashnumbers).val()

		var transactionids = "#transactionid"+vvv
		var transactionid = $(transactionids).val()

		var dynamicdiv = '#paymntsection'+vvv;

		// console.log(fname,lname,email,number)

		$.ajax({
			url:"db.php",
			type:"POST",
			data:{bkashnumber:bkashnumber,transactionid:transactionid,vvv:vvv},
			success:function(data,status){
				confirm("If Your Account Number snd Transaction Id does not match then your booked ticket will be canceled.")
				$(dynamicdiv).html(data);
				
			}

		});
	}


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

		$('tr[id^="myid"]').on('click', function() {

			var a = this.id;
			var b = '#a'+a;
			var desses = 'desses';
			
			$('.selected').toggleClass('seat-content selected');
			$(b).toggleClass("seat-content selected");
		});

		$('#myTable tr').each(function() {
			var customerId = $(this).find("td").eq(4).html(); 

		});

		$('button[id^="seat_"]').on('click', function() {  
			var aff = this.id;

			var res = aff.charAt(5);

			var dyid = '#'+'seatval_'+res

			var tmp = "#"+aff

			var vlu = $(tmp).text()

			var fare = '<?php echo $_SESSION['fare']?>';

			$.ajax({
				url: "db.php",
				method: "POST",
				data: {vlu:vlu,fare:fare},
				success:function(data,status){
					$(dyid).html(data);
				}
			})

			// console.log(aff)
			// console.log(res)			
			
		});

	});

</script>