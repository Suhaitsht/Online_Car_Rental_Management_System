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
            <h1 class="mb-3 bread">Booking Your Car</h1>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container mt-4">
    		<div class="row no-gutters">
    			<div class="col-md-12">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center mt-1">
	  						<form id="Book_frm" class="request-form ftco-animate bg-primary" autocomplete = "off">
		          		<h2>Make your trip</h2>
			    				<div class="form-group">
			    					<label  class="label">Pick-up location</label>
			    					<input type="text" class="form-control" id="Pick-up-location" placeholder="City, Airport, Station, etc">
									<span id="PerrMsg"></span>
			    				</div>
                  <div class="form-group">
			    					<label  class="label">Drop-off location</label>
			    					<input type="text" class="form-control" id="drop_location" placeholder="City, Airport, Station, etc">
                    <span id="derrMsg"></span>
			    				</div>
			    				<div class="d-flex">
			    			<div class="form-group mr-2">
			                <label  class="label">Pick-up date</label>
			                <input type="text"  class="form-control" id="book_pick_date" placeholder="Date">
							<span id="DerrMsg"></span>
			              </div>
			              <div class="form-group ml-2">
			                <label  class="label">Return-date</label>
			                <input type="text" class="form-control" id="book_off_date" placeholder="Date">
							<span id="berrMsg"></span>
			              </div>
		              </div>
		              <div class="form-group">
		                <label  class="label">Pick-up time</label>
		                <input type="text" class="form-control" id="time_pick" placeholder="Time">
						<span id="terrMsg"></span>
		              </div>
			            <div class="form-group">
						<?php
include "./Admin Dashbord/db.php";
if (isset($_GET['v_id'])) {
    $v_id = $_GET['v_id'];
    $sql = "SELECT v_details.v_id from v_details where v_id='$v_id'";
    $result = mysqli_query($con, $sql);
    $check_query = mysqli_num_rows($result) > 0;
    if ($check_query) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
			               <input type="submit" value="Rent A Car Now"  class="btn btn-secondary py-3 px-4">
                                 <input type="hidden" class="form-control"  id ="vid" value="<?=$row['v_id'];?> ">
										<?php
}
    }
}
?>
			            </div>
			    			</form>
	  					</div>
              <?php
include "./Admin Dashbord/db.php";

if (isset($_GET['v_id'])) {
    $v_id = $_GET['v_id'];
    $sql = "SELECT v_details.v_image,v_details.v_id,v_details.vname,v_details.v_price,vbrand.B_name from `v_details` join `vbrand` on vbrand.B_id=v_details.vbrand where v_details.v_id='$v_id'";
    $result = mysqli_query($con, $sql);
    $check_query = mysqli_num_rows($result) > 0;

    if ($check_query) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-md-4 mt-auto mb-4 ml-1">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" >
              <img src="./Admin Dashbord/<?=$row['v_image'];?>" class="w-100 h-100" >
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><?=$row['vname'];?></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?=$row['B_name'];?></span>
	    						<p class="price ml-auto"><?=$row['v_price'];?><span>/day</span></p>
    						</div>
    					</div>
    				</div>
    			</div>
	  			</div>
          <?php
}
    } else {
        echo "Car Not Found";
    }
} else {
    echo "Data Not found";
}

?>
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