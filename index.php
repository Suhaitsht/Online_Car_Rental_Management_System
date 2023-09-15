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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./Checkavailability.js"></script>
  </head>
  <body>
    
    <!-- login Form -->
     <?php
        include "./includes/login.php";
     ?>
     <!-- Registration  -->
     <?php
        include "./User/Registration.php";
     ?>
     <!-- Registration  -->
<!-- Navbar -->
      <?php
      include './includes/navbar.php';
      ?>
    <!-- END nav -->
    
   
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
   
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
          
   
	            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
	            <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
	            <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div>
   
	            	<div class="heading-title ml-5">
		            	<span>Easy steps for renting a car</span>
	            	</div>
	            </a>
            </div>
          </div>
        </div>
      </div>
    </div>

     <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center">
	  						<form  id="form4" class="request-form ftco-animate bg-primary" autocomplete="off">
		          		<h2>Make your trip</h2>
			    				<div class="form-group">
			    					<label for="" class="label">Pick-up location</label>
			    					<input type="text" class="form-control" id ="pick_location" placeholder="City, Airport, Station, etc">
                    <span id="picMsg"></span>
			    				</div>

			    				<div class="form-group">
			    					<label for="" class="label">Drop-off location</label>
			    					<input type="text" class="form-control" id ="Drop_up_location" placeholder="City, Airport, Station, etc">
                    <span id="DMsg"></span>
                  </div>
			    				<div class="d-flex">
			    					<div class="form-group mr-2">
			                <label for="" class="label">Pick-up date</label>
			                <input type="text" class="form-control" id="book_pick_date" placeholder="Date">
                      <span id="PMsg"></span>
                    </div>
			              <div class="form-group ml-2">
			                <label for="" class="label">Drop-off date</label>
			                <input type="text" class="form-control" id="book_off_date" placeholder="Date">
                      <span id="BMsg"></span>
                    </div>
		              </div>
		              <div class="form-group">
		                <label for="" class="label">Pick-up time</label>
		                <input type="text" class="form-control" id="time_pick" placeholder="Time">
                    <span id="TMsg"></span>
		              </div>
			            <div class="form-group">
			              <input type="button" value="Rent A Car Now" onClick="CheckAvailability()"class="btn btn-secondary py-3 px-4">
			            </div>
			    			</form>
	  					</div>
	  					<div class="col-md-8 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Pickup Location</h3>
				                </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Select the Best Deal</h3>
					              </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Reserve Your Rental Car</h3>
					              </div>
					            </div>      
					          </div>
					        </div>
					        <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
	  						</div>
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>

    <?php
  include "./Admin Dashbord/db.php";
  ?>

<section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Feeatured Vehicles</h2>
          </div>
        </div>
       
        <div class="row">
        <div class="col-md-12">
    				<div class="carousel-car owl-carousel">
        <?php
      $sql = "SELECT v_details.vname, v_details.v_id, v_details.v_price, v_details.v_image, vbrand.B_name 
              FROM v_details 
              JOIN vbrand ON vbrand.B_id = v_details.vbrand 
              WHERE v_Feeature = '1'";

      $result_run= mysqli_query($con, $sql);

      $check_query = mysqli_num_rows($result_run) > 0;

      if ($check_query) 
      {
        while ($row = mysqli_fetch_assoc($result_run)) 
        {
          ?>
    			
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
		    					<div class="img rounded d-flex align-items-end" >
                  <img src="./Admin Dashbord/<?php echo $row['v_image'];?>" class="w-100 h-100" >
		    					</div>
		    					<div class="text">
		    						<h2 class="mb-0"><?= $row['vname']; ?></h2>
		    						<div class="d-flex mb-3">
			    						<span class="cat"><?php echo $row['B_name']; ?></span>
			    						<p class="price ml-auto"><?= $row['v_price']; ?> <span>/day</span></p>
		    						</div>
		    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p>
                    </div>
		    				  </div>
                	</div>

          <?php

          }

}
?>  

  	</div>
    	</div>  
</section>
  
   
    
    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">About us</span>
	            <h2 class="mb-4">Welcome To MALKEYRENT-A-CAR</h2>

	            <p>With over 30 years of experience in the industry, we strive to offer the highest levels of customer service and a highly personalised service to all our customers who are on the lookout for Sri Lanka car rental opportunities. With one of the largest and most modern and varied fleets in Sri Lanka, our service is backed by a networked front office, fully-fledged mechanical servicing and valet servicing onsite.</p>
	            
	          </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Services</span>
            <h2 class="mb-3">Our Latest Services</h2>
          </div>
        </div>
				<div class="row">
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Wedding Ceremony</h3>
                <p>A fleet of luxury wedding cars in Sri Lanka, we are well geared for weddings and special occasions</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">City Transfer</h3>
                <p>We offer city and airport transfers in Sri Lanka from the Colombo International Airport to any location in the island.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">TOURS / CHAUFFEUR DRIVEN</h3>
                <p>A unique range of chauffeur driven cars that exceedingly surpass the norm.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">ROAD SIDE ASSISTANCE</h3>
                <p>We offer 24/7/365 roadside assistance islandwide with a team ready for action.</p>
              </div>
            </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section heading-section-white ftco-animate">
            <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
            <a href="#" class="btn btn-primary btn-lg">Become A Driver</a>
          </div>
				</div>
			</div>
		</section>


    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Testimonial</span>
            <h2 class="mb-3">Happy Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_2.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_3.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>	

    <section class="ftco-counter ftco-section img bg-light" id="section-counter">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="60">0</strong>
                <span>Year <br>Experienced</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="1090">0</strong>
                <span>Total <br>Cars</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="2590">0</strong>
                <span>Happy <br>Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="67">0</strong>
                <span>Total <br>Branches</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>	

    <?php
     include "./includes/footer.php";
    ?>
  
 
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  
  <!-- <script src="js/jquery.min.js"></> -->
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
  <!-- Alertyfy -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

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
    

    <script>

    

      </script>
  </body>
</html>