<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sri Lanka Car Rental | Malkey Rent A Car Colombo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php
include "./includes/link.php";
?>

  
  </head>
  <body>

        <?php
include "./includes/navbar.php";
?>
    <!-- END nav -->
<section>
    <?php
include "./includes/login.php";
?>
    <!-- Login form -->
 <!-- Registration  -->

       <?php
include "./user/Registration.php";
?>

     <!-- Registration  -->
</section>


    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span></p>
            <h1 class="mb-3 bread">My Booking History</h1>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container mt-4">
      <div class="table-responsive">
      <table class="table table-hover">
  <thead class="table-dark">
 <tr?>
      <th scope="col">Vehicle_Name</th>
      <th scope="col">Vehicle_price</th>
      <th scope="col">PickUp_location</th>
      <th scope="col">DropUp_location</th>
      <th scope="col">PickUp_Date</th>
      <th scope="col">PickUp_Time</th>
      <th scope="col">Payment_Id</th>
</tr>
  </thead>
  <tbody>
    <?php
     include "./Admin Dashbord/db.php";
     $user_id = $_SESSION['auth_user']['U_id'];
     $sql = "SELECT v_details.vname,v_details.v_price,Pick_location,Drop_loaction,pick_date,drop_date,pick_time,order_id FROM users JOIN car_booking ON users.u_id = car_booking.u_id && users.U_id=$user_id JOIN v_details ON v_details.v_id = car_booking.v_id WHERE 1";
     $query_run= mysqli_query($con,$sql);
     if(mysqli_num_rows($query_run)>0)
     {
       foreach($query_run as $booking)
       {
        // echo $booking['v_price'];
        ?>
      <tr>
            
            <td><?= $booking['vname'];?></td>
            <td>Rs.<?= $booking['v_price'];?></td>
            <td><?= $booking['Pick_location'];?></td>
            <td><?= $booking['Drop_loaction'];?></td>
            <td><?= $booking['pick_date'];?></td>
            <td><?= $booking['pick_time'];?></td>
            <td><?= $booking['order_id'];?></td>
          </tr>
        <?php
       }
     }
    ?>
 
  </tbody>
</table>
                    
  		</div>
  		</div>
    </section>







    <?php
include "./includes/footer.php";
?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="booking.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
 
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  <!-- <script src="js/google-map.js"></script> -->
  <script src="js/main.js"></script>
  <!-- Alertyfy -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  
<!-- Custom js -->  
  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

 
  <script><?php
if(isset($_SESSION['message']))
{
    ?>
     alertify.set('notifier','position', 'top-right');
     alertify.success('<?=$_SESSION['message'];?>');
   
    <?php
    unset($_SESSION['message']);
}

?>

</script>

  </body>
</html>