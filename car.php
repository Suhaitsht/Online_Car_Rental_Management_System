<?php
session_start();

?>
  <?php
  include "./Admin Dashbord/db.php";
  ?>
<?php
     

   
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>

    
		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			
  

<?php
  $sql ="SELECT v_details.vname,v_details.v_id ,v_details.v_price,v_details.v_image,vbrand.B_name from v_details join vbrand on vbrand.B_id=v_details.vbrand  ";
  $result = mysqli_query($con,$sql);
  $check_query = mysqli_num_rows($result) > 0;


  if($check_query)
  {
    while($row = mysqli_fetch_array($result))
    {
     ?>
     <div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div  class="img rounded d-flex align-items-end" >
              <img src="./Admin Dashbord/<?php echo $row['v_image'];?>" class="w-100 h-100" >
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html"><?= $row['vname']; ?></a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?php echo $row['B_name']; ?></span>
	    						<p class="price ml-auto"><span><?= $row['v_price']; ?>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a id="v_id" href="Booking.php?v_id=<?= $row['v_id'];?>" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.php?v_id=<?= $row['v_id'];?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
               
    					</div>
    					</div>
              </div>
     <?php } }
  else{
     echo"No Record Found";
  }
  ?>



 </div>
    		</div>
</section>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
              <?php
               $num_per_page = 2;
               $total_page =ceil($check_query/$num_per_page);
              
              


         if(isset($_GET['page']))
          {
            $page = $_GET['page'];
          }
          else{

            $page = 1;

          }
         
          $startinglimit =($page-1)*$num_per_page;
           $sql_query = "SELECT v_details.vname,v_details.v_id ,v_details.v_price,v_details.v_image,vbrand.B_name from v_details join vbrand on vbrand.B_id=v_details.vbrand  LIMIT " .$startinglimit.','.$num_per_page;
           $result = mysqli_query($con,$sql_query);

           if($page > 1)
           {
            echo "<li><a href='car.php?page=".($page-1)."'>&lt;</a></li>";
           }
            
  
           for($btn=1; $btn<=$total_page; $btn++)
           {
            echo " <li class='active '><a href='car.php?page=".$btn."'><span>$btn</span></a></li>";
           }



   if($btn > $page)

   {
    echo "<li><a href='car.php?page=".($page+1)."'>&gt;</a></li>";
   }
   
?>
               
             
              </ul>
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
  </body>
</html>