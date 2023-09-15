<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>

	<?php
        include "./includes/link.php";
     ?>
  </head>
  <body>
    
<!-- Navbar -->
<?php
        include "./includes/navbar.php";
     	?>
    <!-- END nav -->
    <!-- login -->
	<?php
        include "./includes/login.php";
     ?>
	<!-- login -->

	   <!-- Registration  -->
   
	   <?php
        include "./user/Registration.php";
     ?>
     
     <!-- Registration  -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Car Details</h1>
          </div>
        </div>
      </div>
    </section>


		<section class="ftco-section ftco-car-details">
      <div class="container">
      	<div class="row justify-content-center">
		  <?php
  include "./Admin Dashbord/db.php";

   if(isset($_GET['v_id']))
   {
    $v_id = $_GET['v_id'];
	$sql ="SELECT v_details.v_image,v_details.v_Fueltype,v_details.v_luggage,v_details.v_seat_capacity,v_details.v_Transmission,v_details.v_Milage,v_details.v_description,v_details.vname,v_details.v_price,v_details.v_Airconditions,v_details.v_Seat_Belt,v_details.v_GPS,v_details.vLuggage,v_details.v_Passenger_Air_Bags,v_details.v_AutoDoor,v_details.v_Bluetooth,v_details.v_Audio_input,v_details.v_ABS_Break,v_details.v_Remote_controllocking,v_details.v_Car_Kit,v_details.v_Climatecontrol,vbrand.B_name from `v_details` join `vbrand` on vbrand.B_id=v_details.vbrand where v_details.v_id='$v_id'";
	$result = mysqli_query($con,$sql);
	$check_query = mysqli_num_rows($result) > 0;
	
	if($check_query)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
         		 <div class="col-md-12">
      			<div class="car-details">
      				<div class="img rounded">
					  <img src="./Admin Dashbord/<?= $row['v_image'];?>" class="w-100 h-100" >
				</div>
      				<div class="text text-center">
      					<span class="subheading"><?= $row['B_name'];?> </span>
      					<h2><?= $row['vname'];?></h2>
      				</div>
      			</div>
      		</div>
      	</div>

		  <div class="row">
      		<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Mileage
		                	<span><?= $row['v_Milage'];?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Transmission
		                	<span><?= $row['v_Transmission'];?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Seats
		                	<span><?= $row['v_seat_capacity'];?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Luggage 
		                	<span><?= $row['v_luggage'];?> Bags</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Fuel 
		                	<span><?= $row['v_Fueltype'];?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
      	</div>

		  <div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							    <li class="nav-item">
							      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							    </li>
							  </ul>
							</div>

							<div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						    	<div class="row">
						    		<div class="col-md-4">
						    			<ul class="features">
											<?php
											 if( $row['v_Airconditions']== 1)
											 {
                                                echo '<li class="check"><span class="ion-ios-checkmark"></span>Airconditions</li>';
											 }
											 else{
												echo '<li class="remove"><span class="ion-ios-close"></span>Airconditions</li>';
											 }

											 if( $row['v_Seat_Belt']== 1)
											 {
                                                echo '<li class="check"><span class="ion-ios-checkmark"></span>Seat Belt</li>';
											 }
											 else{
												echo '<li class="remove"><span class="ion-ios-close"></span>Seat Belt</li>';
											 }
											 if( $row['v_GPS']== 1)
											 {
                                                echo '<li class="check"><span class="ion-ios-checkmark"></span>GPS</li>';
											 }
											 else{
												echo '<li class="remove"><span class="ion-ios-close"></span>GPS</li>';
											 }

											 if( $row['vLuggage']== 1)
											 {
                                                echo '<li class="check"><span class="ion-ios-checkmark"></span>Luggage</li>';
											 }
											 else{
												echo '<li class="remove"><span class="ion-ios-close"></span>Luggage</li>';
											 }
                                            

											?>
						    				
						    			</ul>
						    		</div>
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<?php
											 if( $row['v_AutoDoor']== 1)
											 {
                                                echo '<li class="check"><span class="ion-ios-checkmark"></span>Passenger Air Bags</li>';
											 }
											 else{
												echo '<li class="remove"><span class="ion-ios-close"></span>Passenger Air Bags</li>';
											 }

											 if( $row['v_Passenger_Air_Bags']== 1)
											 {
                                                echo '<li class="check"><span class="ion-ios-checkmark"></span>Auto Door</li>';
											 }
											 else{
												echo '<li class="remove"><span class="ion-ios-close"></span>Auto Door</li>';
											 }
											 if( $row['v_Bluetooth']== 1)
											 {
                                                echo '<li class="check"><span class="ion-ios-checkmark"></span>Bluetooth</li>';
											 }
											 else{
												echo '<li class="remove"><span class="ion-ios-close"></span>Bluetooth</li>';
											 }
											 if( $row['v_Audio_input']== 1)
											 {
                                                echo '<li class="check"><span class="ion-ios-checkmark"></span>Audio input</li>';
											 }
											 else{
												echo '<li class="remove"><span class="ion-ios-close"></span>Audio input</li>';
											 }

											?>
						    				
						    			</ul>
						    		</div>
						    		<div class="col-md-4">
						    			<ul class="features">
										

										<?php
										if( $row['v_ABS_Break']== 1 )
										{
										   echo '<li class="check"><span class="ion-ios-checkmark"></span>ABS Break</li>';
										}
										else{
										   echo '<li class="remove"><span class="ion-ios-close"></span>ABS Break</li>';
										}
										if( $row['v_Remote_controllocking']== 1 )
										{
										   echo '<li class="check"><span class="ion-ios-checkmark"></span>Remote central locking</li>';
										}
										else{
										   echo '<li class="remove"><span class="ion-ios-close"></span>Remote central locking</li>';
										}
										if( $row['v_Car_Kit']== 1 )
										{
										   echo '<li class="check"><span class="ion-ios-checkmark"></span>Car Kit</li>';
										}
										else{
										   echo '<li class="remove"><span class="ion-ios-close"></span>Car Kit</li>';
										}
										if( $row['v_Climatecontrol']== 1 )
										{
										   echo '<li class="check"><span class="ion-ios-checkmark"></span>Climate control</li>';
										}
										else{
										   echo '<li class="remove"><span class="ion-ios-close"></span>Climate control</li>';
										}

                                         ?>
						    				
						    			</ul>
						    		</div>
						    	</div>
						    </div>

						    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						      <p><?= $row['v_description'];?></p>
							  
						    </div>
							</div>
						</div>
		<?php
		}
	}
	else
	{
	echo "Car Not Found";
	}
   }

	else
	{
	echo "Data Not found";
	}
   
?>
      	


      	


		      </div>
				</div>
				</div>

					
      
    </section>


    <section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Choose Car</span>
            <h2 class="mb-2">Related Cars</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-1.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">$500 <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-2.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html">Range Rover</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Subaru</span>
	    						<p class="price ml-auto">$500 <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-3.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">$500 <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
        </div>
    	</div>
    </section>
    

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
                <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>