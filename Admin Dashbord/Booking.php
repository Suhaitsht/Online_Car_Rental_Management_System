<?php
Session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.13.4/dataTables.bootstrap5.css">
  <?php
include '../includes/Adminlinks.php';
?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <?php
    include '../includes/Adminnavbar.php';
     ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    include '../includes/Adminsidenavbar.php';
    ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 >Booking Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <div id="Book_display" class="table table-responsive"></div>
                </div>
                 
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
    </footer>

  </div>
  <!-- ./wrapper -->

  <?php
include '../includes/script.php';
?>

<script>
$(document).ready(function () {
    Display_VehicleBooking();
});
      function Display_VehicleBooking()
      {
        var Display_Vehicle = "true";
        $.ajax({
          type: "POST",
          url: "displayUser.php",
          data: "Display_Vehicle",
          success: function (data,status) {
            $("#Book_display").html(data);
          }
        });
      }

   
  </script>


</body>

</html>