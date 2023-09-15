
<?php
session_start();
include '../includes/admincase.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <?php
include '../includes/Adminlinks.php';
?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <?php
include '../includes/Adminnavbar.php';
?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
include '../includes/Adminsidenavbar.php';
?>
    <?php
include 'db.php';
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-3 pl-5">Add car vehicle</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <form id="myform" enctype="multipart/form-data">
                <div class="form-group" id="res">
                  <label>vehicle Name</label>
                  <input class="form-control" type="text" name="vname" placeholder="Name" id="vname">
                  <span id="Vmsg" class="res"></span>
                </div>

                <!-- /.form-group -->
                <div class="form-group"id="res">
                  <label>vehicle Description</label>
                  <textarea class="form-control" rows="5" placeholder="vehicle Description"name="vdesc" id="vdesc" ></textarea>
                  <span id="Vdes" class="res"></span>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group"id="res">
                  <label>Prise Details</label>
                  <input class="form-control" type="text" placeholder="price" name="vprice" id="vprice">
                  <span id="Vpr" class="res"></span>
                </div>
                <!-- /.form-group -->
                <div class="form-group"id="res">
                  <label>Seating capacity</label>
                  <input class="form-control" type="text" placeholder="capacity" name="seatcap" id="seatcap">
                  <span id="Vcap" class="res"></span>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group" id="res">
                <label>Fuel Type</label>
                <select class="form-control " id="ftype" name="ftype" >
                    <option value="" > select Fuel type</option>
                    <option value="Petrol" >Petrol</option>
                    <option value="Diesel" >Diesel</option>
                  </select>
                  <span id="Ferr" class="res"></span>
                </div>
                <div class="form-group"id="res">
                <label>Transmission</label>
                <select class="form-control " name="Transmission"  id="Transmission">
                    <option value="">Transmission</option>
                    <option value="Auto" >Auto</option>
                    <option value="Manual">Manual</option>
                  </select>
                  <span id="Terr" class="res"></span>
                </div>

                <div class="form-group"id="res">
                <label>Select Brands</label>
                <?php
$Brands = "SELECT * FROM `vbrand` WHERE 1";
$Brands_run = mysqli_query($con, $Brands);

if (mysqli_num_rows($Brands_run) > 0) {
    ?>

                <select class="form-control " id="brands">
                <option value="" >Brands</option>
                <?php

    foreach ($Brands_run as $Brands_name) {
        ?>

                    <option value="<?=$Brands_name['B_id']?>"><?=$Brands_name['B_name']?></option>
                   <?php
}
    ?>
                  </select>
                  <?php
}
?>
                  <span id="Berr" class="res"></span>

                </div>
              </div>

              <!-- /.col -->
              <div class="col-12 col-sm-6">
                  <div class="form-group"id="res">
                  <label>Mileage</label>
                  <input class="form-control" name="mileage" type="text" placeholder="Mileage" id="mileage">
                  <span id="Merr" class="res"></span>
                  </div>
                  <div class="form-group mt-4"id="res">
                  <div class="custom-file mt-4">
                    <label class="custom-file-label">Upload Car picture</label>
                      <input type="file" class="custom-file-input" name="carpic" id="carpic">
                      <span id="imgerr" class="res"></span>
                    </div>
                  </div>

                  <div class="form-group">
                  <label>Luggage</label>
                  <input class="form-control" type="text" name="luggage" id="luggage">
                  <span id="Lerr" class="res"></span>
                </div>
                </div>
                <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                        <input type="checkbox"  class ="Ac" name ="Ac" id="checkboxPrimary1" >
                        <label for="checkboxPrimary1">
                        Airconditions
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                        <input type="checkbox" class ="seat"  name ="seat" id="checkboxPrimary2">
                        <label for="checkboxPrimary2">
                        Seat Belt
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto">
                        <input type="checkbox"class ="Audio"  name ="Audio" id="checkboxPrimary3">
                        <label for="checkboxPrimary3">
                        Audio input
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto">
                        <input type="checkbox" class ="PassengerBage" name ="Passenger Airs Bags" id="checkboxPrimary4">
                        <label for="checkboxPrimary4">
                        Passenger Air Bags
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto">
                        <input type="checkbox"class="AutoDoor"name ="AutoDoor" id="checkboxPrimary5">
                        <label for="checkboxPrimary5">
                          AutoDoor
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto ">
                        <input type="checkbox" class ="climateControl"name ="climateControl"  id="checkboxPrimary6">
                        <label for="checkboxPrimary6">
                        Climate control
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto">
                        <input type="checkbox"class ="kit" name ="kit" id="checkboxPrimary7">
                        <label for="checkboxPrimary7">
                        Car Kit
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto ">
                        <input type="checkbox" class ="Rcontrol" name ="Rcontrol"  id="checkboxPrimary8">
                        <label for="checkboxPrimary8">
                        Remote control locking
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto ">
                        <input type="checkbox" class ="Luggage" name ="Luggage"id="checkboxPrimary10">
                        <label for="checkboxPrimary10">
                        Luggage
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto ">
                        <input type="checkbox" class ="GPS" name ="GPS" id="checkboxPrimary11">
                        <label for="checkboxPrimary11">
                        GPS
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto ">
                        <input type="checkbox" class ="Bluetooth" id="checkboxPrimary12">
                        <label for="checkboxPrimary12">
                        Bluetooth
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto ">
                        <input type="checkbox" class ="Break" name="Break"  id="checkboxPrimary13">
                        <label for="checkboxPrimary13">
                        ABS Break
                        </label>
                      </div>
                <div class="icheck-primary d-inline ml-3 col-md-3 ml-auto ">
                        <input type="checkbox" class ="Feature"  id="checkboxPrimary14">
                        <label for="checkboxPrimary14">
                        Feature
                        </label>
                      </div>
              </div>
              <div class="d-grid  col-6 mx-auto mt-4">
                  <button class="btn btn-dark w-100" id="submit" type="submit">Submit</button>
                  </div>
                </form>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script src="./Addvehical.js"></script>
</body>

</html>