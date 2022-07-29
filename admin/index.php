<?php require 'include/header.php'; ?>
<?php require 'include/sidebar.php'; ?>
<?php 
  if (isset($_GET['action']) && $_GET['action']=='logout') {
       Session::set_session("admin_login", false); 
       echo "<script>location.reload();</script>";
    }
?>
<?php  
          $select_query2 = "SELECT rd_id FROM route_details";
          $rslt2 = $db->select($select_query2);
          if ($rslt2) {
           $count_route = mysqli_num_rows($rslt2);
          }else{
            $count_route =0;
          }

          $select_query3 = "SELECT booking_id  FROM booked_seat WHERE status = 'pending' ";
          $rslt3 = $db->select($select_query3);
          if ($rslt3) {
           $count_route3 = mysqli_num_rows($rslt3);
          }else{
            $count_route3 =0;
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
                    <p class="announcement-heading"><?php echo $count_route3; ?></p>
                    <p class="announcement-text">Canceled Request</p>
                  </div>
                </div>
              </div>
              <a href="can_req.php">
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
          <div class="col-lg-4">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-hand-o-right fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $count_route; ?></p>
                    <p class="announcement-text">All Routes</p>
                  </div>
                </div>
              </div>
              <a href="view_all_items.php">
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

   
