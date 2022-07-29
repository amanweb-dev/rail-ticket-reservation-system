<?php 
session_start();
$con = mysqli_connect("localhost","root","","metro");

if (!$con) {
	echo "Database connection error";
}


extract($_POST);

 ?>
<?php if (isset($_POST['readuser']) && isset($_POST['boardingpoint'])): ?>
    
    	<?php 

    	$select_query ="SELECT rd_dropping_point FROM route_details WHERE rd_boarding_point = '$boardingpoint' GROUP BY rd_dropping_point ";
    	$select_result = mysqli_query($con,$select_query);
    	if (mysqli_num_rows($select_result)>0) {  while ($rows = mysqli_fetch_assoc($select_result)) { ?>

		        <option value="<?php echo $rows['rd_dropping_point']; ?>"><?php echo $rows['rd_dropping_point']; ?></option>
    			
    		<?php }
    	}

    	 ?>


  <?php endif ?>

<?php if (isset($_POST['bkashnumber']) && isset($_POST['transactionid'])): ?>

<?php 
if (!empty($_POST['bkashnumber']) && !empty($_POST['transactionid'])) { ?>

 <input type="hidden" name="paymentnmbr" value="<?php echo $bkashnumber; ?>">
<input type="hidden" name="transaction" value="<?php echo $transactionid; ?>">
<button type="submit" name="confirm_ticket" class="btn btn-danger btn-block">Confirm Ticket</button>
<?php }else{ ?>

  <button type="button" data-toggle="modal" data-target="#myModal<?php echo $vvv ?>" name="" class="btn btn-success btn-block">Confirm Ticket</button>

<?php }


 ?>
  
<?php endif ?>

<?php if (isset($_POST['vlu'])): ?>
    
    <?php 

    if (isset($_SESSION['seatNo'])) {

      $previous_coach_no = substr($_SESSION['seatNo'], -3, 1);
      $current_coach_no = substr($vlu, -3, 1);
      if ($previous_coach_no !=$current_coach_no) {

          unset($_SESSION['seatNo']);
          unset($_SESSION['saveSeats']);?> 
          <script>
            localStorage.clear();
          </script>

          <?php 

          $_SESSION['seatNo'] = $vlu;

          $seat_array = array($_SESSION['seatNo']);

          $_SESSION['saveSeats'] = implode("|",$seat_array);

          ?>
          <span class="st-hding">Seat No :
        <?php for ($i=0; $i < count($seat_array) ; $i++) { ?>
          <span class="seat-slct"><?php echo $seat_array[$i];  ?></span> 
        <?php } ?>
         <span class="ttl-st">Total Seat: <?php echo count($seat_array); ?></span>
        <span class="ttl-st">Total Fare: 

          <?php 

          $basic =  count($seat_array)*$fare;
          $fare_with_vat = $basic+($basic*0.02);

          echo ceil($fare_with_vat). " tk";

          ?>
           
           <?php $_SESSION['totalfare'] =  ceil($fare_with_vat); ?>

        </span>
        </span>

        <?php
        
      }else{

        $_SESSION['seatNo'] .= "|".$vlu;
        $seat_array = explode("|", $_SESSION['seatNo']);
        $seat_array =array_filter($seat_array);
        $seat_array = array_values($seat_array);

        if (count($seat_array)<5) {

          if (array_diff_key($seat_array,array_unique($seat_array))) {
            $seat_array =array_diff($seat_array,array($vlu));;
            $seat_array = array_values($seat_array);?>


        <script>
document.getElementById("<?php echo 'seat_'.$vlu; ?>").style.background = "#1e7e34";
</script>

          <?php 
         }

         $_SESSION['seatNo'] = implode("|",$seat_array);
         $_SESSION['saveSeats'] = implode("|",$seat_array); 

          $_SESSION['temp'] = $_SESSION['seatNo'];

         ?>

        <span class="st-hding">Seat No :
        <?php for ($i=0; $i < count($seat_array) ; $i++) { ?>
          <span class="seat-slct"><?php  echo $seat_array[$i];  ?></span> 
        <?php } ?>
        <span class="ttl-st">Total Seat: <?php echo count($seat_array); ?></span>
       <span class="ttl-st">Total Fare: 

          <?php 

          $basic =  count($seat_array)*$fare;
          $fare_with_vat = $basic+($basic*0.02);

          echo ceil($fare_with_vat). " tk";



          ?>
           
           <?php $_SESSION['totalfare'] =  ceil($fare_with_vat); ?>

        </span>
        </span> 


     <?php

          
        }else{

           if (array_diff_key($seat_array,array_unique($seat_array))) {
            $seat_array =array_diff($seat_array,array($vlu));;
            $seat_array = array_values($seat_array);?>


        <script>
document.getElementById("<?php echo 'seat_'.$vlu; ?>").style.background = "#1e7e34";
 // document.getElementById("<?php echo 'seat_A'.$vlu; ?>").disabled = false;
</script>

          <?php 
         

         $_SESSION['seatNo'] = implode("|",$seat_array);
         $_SESSION['saveSeats'] = implode("|",$seat_array); ?>

        <span class="st-hding">Seat No :
        <?php for ($i=0; $i < count($seat_array) ; $i++) { ?>
          <span class="seat-slct"><?php  echo $seat_array[$i];  ?></span> 
        <?php } ?>
        <span class="ttl-st">Total Seat: <?php echo count($seat_array); ?></span>
        <span class="ttl-st">Total Fare: 

          <?php 

          $basic =  count($seat_array)*$fare;
          $fare_with_vat = $basic+($basic*0.02);

          echo ceil($fare_with_vat). " tk";



          ?>
           
           <?php $_SESSION['totalfare'] =  ceil($fare_with_vat); ?>

        </span>
        </span> 


     <?php

        }else{
          

        $seat_array = explode("|", $_SESSION['seatNo']);
        $seat_array =array_filter($seat_array);
        $seat_array = array_values($seat_array);
        array_pop($seat_array);

         $_SESSION['seatNo'] = implode("|",$seat_array);
         $_SESSION['saveSeats'] = implode("|",$seat_array);

         ?>

        <span class="st-hding">Seat No :
        <?php for ($i=0; $i < count($seat_array) ; $i++) { ?>
          <span class="seat-slct"><?php  echo $seat_array[$i];  ?></span> 
        <?php } ?>
        <span class="ttl-st">Total Seat: <?php echo count($seat_array); ?></span>
       <span class="ttl-st">Total Fare: 

          <?php 

          $basic =  count($seat_array)*$fare;
          $fare_with_vat = $basic+($basic*0.02);

          echo ceil($fare_with_vat). " tk";



          ?>
           
           <?php $_SESSION['totalfare'] =  ceil($fare_with_vat); ?>

        </span>
        </span>
         <p style="color:#efff00;text-align: center;font-size: 18px;padding: 20px 0;">You can not  book than 4 seats at once.</p> 
          <script>
document.getElementById("<?php echo 'seat_'.$vlu; ?>").style.background = "#1e7e34";
        </script>


     <?php
        }

        }

      }

     
    }else{

      $_SESSION['seatNo'] = $vlu;
      // $seat_array =  $_SESSION['seat_no'];
      $seat_array = array( $_SESSION['seatNo']);
      $_SESSION['saveSeats'] = implode("|",$seat_array);
           // echo $_SESSION['jjj'];
          ?>
          <span class="st-hding">Seat No :
        <?php for ($i=0; $i < count($seat_array) ; $i++) { ?>
          <span class="seat-slct"><?php echo $seat_array[$i];  ?></span> 
        <?php } ?>
         <span class="ttl-st">Total Seat: <?php echo count($seat_array); ?></span>
        <span class="ttl-st">Total Fare: 

          <?php 

          $basic =  count($seat_array)*$fare;
          $fare_with_vat = $basic+($basic*0.02);

          echo ceil($fare_with_vat). " tk";

          ?>
           
           <?php $_SESSION['totalfare'] =  ceil($fare_with_vat); ?>

        </span>
        </span>

    <?php

    }

    ?>

    <?php 

    for ($i=0; $i<count($seat_array); $i++) {  ?>
      <script>
     document.getElementById('<?php echo "seat_".$seat_array[$i]; ?>').style.background = "#a24242";
         
      </script>
          
      
    <?php 

      }

    ?>

<?php endif ?>

  <?php if (isset($_POST['readusertwo']) && isset($_POST['boardingpoint']) && isset($_POST['droapingpoint'])): ?>
    
        <?php 

        $select_query ="SELECT rd_start_timing FROM route_details WHERE rd_boarding_point = '$boardingpoint' AND rd_dropping_point ='$droapingpoint' GROUP BY rd_start_timing";
        $select_result = mysqli_query($con,$select_query);
        if (mysqli_num_rows($select_result)>0) {  while ($rows = mysqli_fetch_assoc($select_result)) { ?>

                <option value="<?php echo $rows['rd_start_timing']; ?>"><?php echo $rows['rd_start_timing']; ?></option>
                
            <?php }
        }

         ?>


  <?php endif ?>


   <?php if (isset($_POST['confirm_ticket'])): ?>

    <?php 

    $con = mysqli_connect("localhost","root","","metro");
    if (!$con) {
      echo "databse no connected";
    }

     ?>
    
        <?php 
        if (!empty($_POST['rd_id']) && !empty($_POST['coach_name'])  && !empty($_POST['username']) && !empty($_POST['payment']) && !empty($_POST['mobile']) && !empty($_POST['age']) && !empty($_POST['ntlty']) && !empty($_POST['journey_date']) ){

          $rd_id = $_POST['rd_id'];
          $coach_name = $_POST['coach_name'];
          $total_seat_no =$_SESSION['saveSeats'];
          $psngr_name = $_POST['username'];
          $psngr_email = $_POST['email'];
          $psngr_gender = $_POST['gender'];
          $psngr_address = $_POST['address'];
          $psngr_pay_method = $_POST['payment'];
          $psngr_mobile = $_POST['mobile'];
          $psngr_age = $_POST['age'];
          $psngr_nid = $_POST['nid'];
          $psngr_nationality = $_POST['ntlty'];
          $journey_date = $_POST['journey_date'];
          $paymentnmbr = $_POST['paymentnmbr'];
          $transaction = $_POST['transaction'];
          $total_fare = $_SESSION['totalfare'];

          $insert_psngr_info_query = "INSERT INTO booked_seat(rd_id,coach_name,total_seat_no,psngr_name,psngr_email,psngr_gender,psngr_address,psngr_pay_method,psngr_mobile,psngr_age,psngr_nid,psngr_nationality,journey_date,total_fare,psngr_payment_number,transaction_id) VALUES($rd_id,'$coach_name','$total_seat_no','$psngr_name','$psngr_email','$psngr_gender','$psngr_address','$psngr_pay_method','$psngr_mobile','$psngr_age','$psngr_nid','$psngr_nationality','$journey_date','$total_fare','$paymentnmbr','$transaction') ";

          $info_query_result = mysqli_query($con,$insert_psngr_info_query);
          if ($info_query_result) {

            $select_query = "SELECT booking_id FROM booked_seat WHERE rd_id=$rd_id AND coach_name= '$coach_name' AND total_seat_no = '$total_seat_no' AND journey_date = '$journey_date' AND psngr_payment_number= '$paymentnmbr' AND transaction_id = '$transaction' ";
            $info_query_result = mysqli_query($con,$select_query);
            if ($info_query_result) {
              $row = mysqli_fetch_assoc($info_query_result);

              $_SESSION['bookingId'] = $row['booking_id'];
            }

             unset($_SESSION['seatNo']);
             unset($_SESSION['saveSeats']);
             unset($_SESSION['totalfare']);
           header("Location:save_data.php");
          }else{
            echo "data not inserted";
          }


        }

         ?>

  <?php endif ?>

  