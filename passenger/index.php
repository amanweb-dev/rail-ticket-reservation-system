<?php require 'include/header.php'; ?>
<?php require 'include/sidebar.php'; ?>
<?php 
  if (isset($_GET['action']) && $_GET['action']=='logout') {
       Session::set_session("passengerLogin", false); 
       echo "<script>location.reload();</script>";
    }
?>
<?php  
          $mob_no = Session::get_session("psngrMobile");
          $select_query2 = "SELECT booking_id FROM booked_seat WHERE psngr_mobile= '$mob_no' ";
          $rslt2 = $db->select($select_query2);
          if ($rslt2) {
           $count_route = mysqli_num_rows($rslt2);
          }else{
            $count_route =0;
          }
?>

    <div id="page-wrapper">
      <div class="row">
          <div class="col-lg-4">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-hand-o-right fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $count_route; ?></p>
                    <p class="announcement-text">All Items</p>
                  </div>
                </div>
              </div>
              <a href="my_ticket.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View List
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->

    </div>


<?php require 'include/footer.php'; ?>

   
