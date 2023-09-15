<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Malkey<span>Rent-A-car</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
          	   <?php
				if(isset($_SESSION['auth']))
				{
					?>
			 <li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="index.php" id="userDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 "><?=$_SESSION['auth_user']['U_name'];?></span>
			<i class="fa-solid fa-user"></i>
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="BookingHistory.php">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
             My_Booking
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>
		
					<?php
				}
				
				else
				{
					?>
					
					<li class="nav-item"><button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-5 gap-3 mt-2" data-bs-toggle="modal"
                        data-bs-target="#Loginmodel">
                        Login
                    </button>
					<li class="nav-item"> <button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-5 gap-3  mt-2" data-bs-toggle="modal"
                        data-bs-target="#registerModal">
                        Register
                    </button>

					<?php
				}
			?>
	        </ul>
          
	      
	    </div>
	  </nav>