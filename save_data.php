  <?php 

  session_start();

  if (isset($_SESSION['bookingId'])) { ?>

    <?php include "includes/header.php"; ?>

  <?php $booking_id =  $_SESSION['bookingId'];

     $select_ticket_query = "SELECT * FROM booked_seat WHERE booking_id = $booking_id";
     $ticket_query_result = $db->select($select_ticket_query);
            if ($ticket_query_result) {
              $count = mysqli_num_rows($ticket_query_result);
              if ($count>0 && $count <2) {
                $tckt_row = $ticket_query_result->fetch_assoc();

                $booking_id  = $tckt_row['booking_id'];
                $rd_id  = $tckt_row['rd_id'];

                $select_route_query = "SELECT * FROM route_details WHERE rd_id  = $rd_id";
                $route_query_result = $db->select($select_route_query);

                if ($route_query_result) {
                 $count_route = mysqli_num_rows($route_query_result);
                if ($count>0 && $count <2) {
                  $route_row = $route_query_result->fetch_assoc();

                  $rd_boarding_point = $route_row['rd_boarding_point'];
                  $rd_dropping_point = $route_row['rd_dropping_point'];
                  $rd_start_timing = $route_row['rd_start_timing'];
                  $rd_end_timing = $route_row['rd_end_timing'];
                  $rd_fare_per_km = $route_row['rd_fare_per_km'];
                  $rd_distance = $route_row['rd_distance'];
                  $rd_total_fare = $route_row['rd_total_fare'];
                }
                $coach_name  = $tckt_row['coach_name'];
                $total_seat_no  = $tckt_row['total_seat_no'];
                $psngr_name  = $tckt_row['psngr_name'];
                $psngr_email  = $tckt_row['psngr_email'];
                $psngr_gender  = $tckt_row['psngr_gender'];
                $psngr_address  = $tckt_row['psngr_address'];
                $psngr_pay_method  = $tckt_row['psngr_pay_method'];
                $psngr_mobile  = $tckt_row['psngr_mobile'];
                $psngr_age  = $tckt_row['psngr_age'];
                $psngr_nid  = $tckt_row['psngr_nid'];
                $psngr_nationality  = $tckt_row['psngr_nationality'];
                $booking_date  = $tckt_row['booking_date'];
                $journey_date  = $tckt_row['journey_date'];
                $total_fare  = $tckt_row['total_fare'];
                $psngr_payment_number  = $tckt_row['psngr_payment_number'];
                $transaction_id  = $tckt_row['transaction_id'];     
                
              }
              
            }
          }

  ?>

 
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
        <div class="print_ticket" id="printableArea">

          <div class="row">
            <h2 class="text-center tc">Ticket Point</h2>

          </div>
          <hr>

          <div class="row px-4 mx-4">
           <div class="col-md-4">
            <p>Ticket No: <?php echo $booking_id; ?></p>
            <p>Coach Name: <?php echo $coach_name; ?></p>
            <p>Journey Date: <?php echo $journey_date; ?></p>
            <p>Boarding Time: <?php echo $rd_start_timing; ?></p>
            <p>Seat Fare(Tk): <?php echo $rd_total_fare." tk"; ?></p>
            <p>Total Fare(Tk): <?php echo $total_fare." tk"; ?></p>
            <p>SeatNo: 
              <?php 
              $pass_book_seat_array = explode("|",$total_seat_no);
              $pass_book_seat_array =array_filter($pass_book_seat_array);
              $pass_book_seat_array = array_values($pass_book_seat_array);

              for ($i=0; $i <count($pass_book_seat_array) ; $i++) { 
                echo $pass_book_seat_array[$i]." ";
              }


               ?>
                
              </p>
              <p>Payment Method: <?php echo $psngr_pay_method; ?></p>
          </div>
          <div class="col-md-4">
            <p>Passenger Name: <?php echo $psngr_name; ?></p>
            <p>Address: <?php echo $psngr_address; ?></p>
            <p>Phone: <?php echo $psngr_mobile; ?></p>
            <p>NID: <?php echo $psngr_nid; ?></p>
            <p>Boarding place: <?php echo $rd_boarding_point; ?></p>
            <p>Journey Date: <?php echo $journey_date; ?></p>
            <p>Issue Date: <?php echo $booking_date; ?></p>
            <p>To: <?php echo $rd_dropping_point; ?></p>
             <p>SeatNo: 
              <?php 
              $pass_book_seat_array = explode("|",$total_seat_no);
              $pass_book_seat_array =array_filter($pass_book_seat_array);
              $pass_book_seat_array = array_values($pass_book_seat_array);

              for ($i=0; $i <count($pass_book_seat_array) ; $i++) { 
                echo $pass_book_seat_array[$i]." ";
              }


               ?>
                
              </p>


          </div>
          <div class="col-md-4">
            <p>Ticket No: <?php echo $booking_id; ?></p>
            <p>Coach Name: <?php echo $coach_name; ?></p>
            <p>Payment Number: <?php echo $psngr_payment_number; ?></p>
            <p>Transaction Id : <?php echo $transaction_id; ?></p>
            <p>Boarding Time: <?php echo $rd_start_timing; ?></p>
            <p>Seat Fare(Tk): <?php echo $rd_total_fare." tk"; ?></p>
            <p>Total Fare(Tk): <?php echo $total_fare." tk"; ?></p>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-4 offset-md-5">
          <input type="button" class="btn btn-success prnt-btn" onclick="printDiv('printableArea')" value="print Ticket" />
        </div>
      </div>
    </div>
    <?php include "includes/bottom_content.php"; ?>
  </div>
</div>
<?php include "includes/footer.php"; ?>
<script>

  function printDiv(printableArea) {
     var printContents = document.getElementById(printableArea).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

</script>


<?php }else{

  echo "<p style=' width: 100%;
    text-align: center;
    font-size: 70px;
    color: red;
    margin-top: 15%;' class='fourzero'>404 Not Found</P";

} ?>


