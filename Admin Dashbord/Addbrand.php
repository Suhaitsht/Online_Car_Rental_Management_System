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
  
  
  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> -->
  <?php
include '../includes/Adminlinks.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.13.4/dataTables.bootstrap5.css">
</head>

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Brand update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <!-- Form -->
      <div class="form-group mb-3 mx-3">
    <label for="Email"class="form-label">Brand Name</label>
    <input type="email" class="form-control"  id="updatename" required>
  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <input type="hidden" id="hiddendata">
        <button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
      </div>
    </div>
  </div>
</div>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- Navbar -->
    <?php
include '../includes/Adminnavbar.php';
?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
include '../includes/Adminsidenavbar.php';
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-3 pl-5">Add Brands</h1>
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
                <form id="frmB">
                <div class="form-group">
                  <label>Add Car Brands</label>
                  <input type="text"class="form-control select2" id ="CarBrand"style="width: 100%;">
                  <span id="Berr"></span>
                </div>
                <div class="d-grid  col-6 mx-auto mt-4">
                  <button class="btn btn-dark w-100" id="button" onClick=AddBrand() type="button">Add Brand</button>
                  </div>
                </div>
                <form> 
                </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

                <div class="container pl-2" >
                <div id="Branddisplay" class="table table-responsive"></div>
                </div>

      
                <?php
include '../includes/script.php';
?>

  
  <script>
$(document).ready(function () {
  displayData();
});
   
$('#CarBrand').keyup(function () {
    if(validateCarBrand())
    {
      $('#CarBrand').css("border","2px solid green");
      $('#Berr').html("<p class='text-success'>Valid </p>")
    }
    else{
      $('#CarBrand').css("border","2px solid red");
      $('#Berr').html("<p class='text-danger'>Name must be Characteristic and space not allowed </p>");
    }
  });

  function validateCarBrand(){

  var CarBrand = $('#CarBrand').val();
  var reg = /^[a-zA-Z\-]+$/;

  if(reg.test(CarBrand))
  {
    return true;
  }
  else{
    return false;
  }

  }

function AddBrand(){
  Brand_reg = /^[a-zA-Z\-]+$/;
  let carBrand = $('#CarBrand').val();
  
  if(carBrand == "")
    {
        $('#CarBrand').css("border","2px solid red");
          $('#Berr').html("<p class='text-danger'>Name Field is required </p>");
          return false;
    }
    else if(!Brand_reg.test(carBrand))
         {
          return false;
         }
  // alert(carBrand);
         $.ajax({
          type: "POST",
          url: "AddVBrand.php",
          data:{
            carBrand : carBrand,
          },
          
          success: function (data,status) {
          console.log(status);
          $('#frmB').trigger("reset");
          $("#Berr").empty();
          $("#CarBrand").css("border",""); 
             alertify.set('notifier','position', 'top-right');
               alertify.success('Category Added successfully');
               displayData();
          }
         });
}

    function displayData(){
        var displayData = "true";
        $.ajax({
          url: 'displayBrand.php',
          type: 'POST',
          data:{
            displaysend:displayData,
          },
          success: function (data,status) {
            $('#Branddisplay').html(data);
            
          }
        });
      }


      function DeleteBrand(B_id){
            $.ajax({
              type: 'POST',
              url: "displayBrand.php",
              data:{
                Delete_send:B_id
              },
              success: function (data,status) {
                displayData();
              }
            });
        }

        function GetCategory(B_id)
        {
          $('#hiddendata').val(B_id);
          $.post("displayBrand.php",{B_id:B_id},function(data,status)
          {
            var brand=JSON.parse(data);
            $('#updatename').val(brand.B_name);

          });

          $('#updateModal').modal('show');
        }


        function updateDetails(){
            var update_Bname =$('#updatename').val();
            var update_Bid =$('#hiddendata').val();


            $.post("displayBrand.php",{
              update_Bname:update_Bname,
              update_Bid:update_Bid
            
            },function(data,status){
             $('#updateModal').modal('hide'); 
              displayData();
              console.log(data);
             
            });
         
        }





  </script>
  </body>
</html>