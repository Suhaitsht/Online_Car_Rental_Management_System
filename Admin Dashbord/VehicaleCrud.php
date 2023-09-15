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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.13.4/dataTables.bootstrap5.css">
  <?php
include '../includes/Adminlinks.php';
?>
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> -->
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
              <div class="card-header">
                <h3 class="card-title d-flex text-center align-content-center"><strong>VehicleDetails</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div id="Cardisplay" class="table table-responsive"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- update model -->
</div>
    <footer class="main-footer">
    </footer>

  </div>
  <!-- ./wrapper -->
  <!-- update Model -->
<section>
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              
                    <div class="modal-header">
                        <h4 class="modal-title d-flex aling-items-center"> <i
                                class="bi bi-car-lines-fill fs-3 me-2 "></i>
                            Car Details</h4>
                        <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       
                    <div class="d-flex align-item-center justify-content-center">
                     
                    </div>
                       
                        <!-- <img src="upload/" id="Car_img " class="img-thumbnail" width="100" height="100"/> -->
                     
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-6 ps-0 mb-3">
                                  <form  id="updatefrm" enctype="multipart/form-data">
                                  <input type="hidden" id="car_id"/>
                                    <label class="form-label">vehicle Name</label>
                                    <input type="text"  id="Car_name"class="form-control" required>
                                </div>
                                <div class="col-md-6 ps-0">
                                    <label class="form-label">Prise Details</label>
                                    <input type="text" class="form-control" id="Car_price" required>
                                </div>

                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">vehicle Description</label>
                                    <textarea class="form-control" rows="3"  id="Car_Description" required ></textarea>
                                    
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Vehicle picture</label>
                                    <input type="file" id="car_pic" class="form-control" >
                                    <p id="Car_img" >  </p>
                                </div>
                                
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Seating Capacity</label>
                                    <input type="text" class="form-control" id ="Car_SeatCap"required>
                                    <!-- <textarea class="form-control" rows="1"></textarea> -->
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Milage</label>
                                    <input type="text" class="form-control" id="Car_Milage" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">select Fuel type</label>
                                    <select class="form-control select" id="Car_Fueltype"   required>
                                        <option value="" > select Fuel type</option>
                                        <option value="Petrol" >Petrol</option>
                                        <option value="Diesel" >Diesel</option>
                                      </select>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Transmission</label>
                                    <select class="form-control select"  id="Car_Transmission" required >
                                        <option value="">Transmission</option>
                                        <option value="Auto" >Auto</option>
                                        <option value="Manual">Manual</option>
                                    </select>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Select Brands</label>
                                  
                                    <?php
                                    include "db.php";
                                    $Brands = "SELECT * FROM `vbrand` WHERE 1";
                                    $Brands_run = mysqli_query($con, $Brands);

                                    if (mysqli_num_rows($Brands_run) > 0) {
                                        ?>

                                                  <select class="form-control select"  id="Car_brand" >
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
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Luggage</label>
                                    <input type="text" class="form-control" id="Car_luggage" required>
                                   
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_Airconditions">
                                            <label class="form-check-label" >
                                                Airconditions
                                            </label>
                                          </div>
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_AutoDoor" value="">
                                            <label class="form-check-label" >
                                                AutoDoor
                                            </label>
                                          </div>
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_Luggage" >
                                            <label class="form-check-label" >
                                                Luggage
                                            </label>
                                          </div>
                                      </div>
                                </div>
                            </div>
                              </div>
                                <div class="col-12 col-sm-3">
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_SeatBelt"value="">
                                            <label class="form-check-label" >
                                                Seat Belt
                                            </label>
                                          </div>
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_Climatecontrol" value="">
                                            <label class="form-check-label" >
                                                Climate control
                                            </label>
                                          </div>
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_GPS" value="">
                                            <label class="form-check-label" >
                                                GPS
                                            </label>
                                          </div>
                                      </div>
                                </div>
                            </div>
                              </div>
                                <div class="col-12 col-sm-3">
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_Audio"value="">
                                            <label class="form-check-label" >
                                                Audio input
                                            </label>
                                          </div>
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_Kit" value="">
                                            <label class="form-check-label" >
                                                Car Kit
                                            </label>
                                          </div>
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_Bluetooth" value="">
                                            <label class="form-check-label" >
                                                Bluetooth
                                            </label>
                                          </div>
                                      </div>
                                </div>
                            </div>
                              </div>
                                <div class="col-12 col-sm-3">
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_AirBag" value="" >
                                            <label class="form-check-label" >
                                                Passenger Air Bags
                                            </label>
                                          </div>
                                    <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Car_RemoteControl_locking" value="" >
                                            <label class="form-check-label" >
                                                Remote control locking
                                            </label>
                                          </div>
                                          <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="Car_ABSBreak" value="">
                                                  <label class="form-check-label" >
                                                      ABS Break
                                                  </label>
                                                </div>
                                          <div class="icheck-primary d-inline ml-2 col-md-3 ml-auto">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="Car_Feeature" value="">
                                                  <label class="form-check-label" >
                                                     Feature Vehicle
                                                  </label>
                                                </div>
                                        </div>
                                </div>
                            </div>
                              </div>
                        <div class="text-center my-1">
                        
                            <button type="submit" class="btn btn-dark">Update</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    </section>

  <?php
include '../includes/script.php';
?>
  <script>
      $(document).ready(function () {
        DisplayCars();
      });


      function DisplayCars()
      {
        var Displaycar = true;

        $.ajax({
          type: "POST",
          url: "carCrud.php",
          data: "Displaycar",
          success: function (data,status) {
            $('#Cardisplay').html(data);
            
          }
        });
      }

      function DeleteCar(v_id){
       
            swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm){
      if (isConfirm) {
        $.ajax({
          type: 'post',
          url: "carCrud.php",
          data:{
            Delete_v_id:v_id
          },
          success: function (data,status) {
            swal("Deleted!", data, "success");
            DisplayCars();
          }
               });
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    });

        }



        function GetCarDetails(v_id)
      {
        // alert(v_id);
           $('#v_id').val('v_id');
           $.post("carCrud.php",{V_id:v_id},function(data,status){
            var Car_details=JSON.parse(data);
            console.log(Car_details);
            $('#car_id').val(Car_details.vid);
            $('#Car_name').val(Car_details.vname);
            $('#Car_price').val(Car_details.v_price);
            $('#Car_Description').val(Car_details.v_description);
            $('#Car_SeatCap').val(Car_details.v_seat_capacity);
            $('#Car_Fueltype').val(Car_details.v_Fueltype);
            $('#Car_Transmission').val(Car_details.v_Transmission);
            $('#Car_Milage').val(Car_details.v_Milage);
            $('#Car_brand').val(Car_details.vbrand);
            $('#Car_luggage').val(Car_details.v_luggage);
            $('#Car_img').html(Car_details.v_image);
            $("#Car_Airconditions").prop("checked", Car_details.v_Airconditions == 1);
            $("#Car_Audio").prop("checked", Car_details.v_Audioinput == 1);
            $("#Car_ABSBreak").prop("checked", Car_details.v_ABSBreak == 1);
            $("#Car_SeatBelt").prop("checked", Car_details.v_SeatBelt == 1);
            $("#Car_AirBag").prop("checked", Car_details.v_PassengerAirBags == 1);
            $("#Car_Climatecontrol").prop("checked", Car_details.v_Climatecontrol == 1);
            $("#Car_RemoteControl_locking").prop("checked", Car_details.v_Remotecontrollocking == 1);
            $("#Car_AutoDoor").prop("checked", Car_details.v_AutoDoor == 1);
            $("#Car_GPS").prop("checked", Car_details.v_GPS == 1);
            $("#Car_Bluetooth").prop("checked", Car_details.v_Bluetooth == 1);
            $("#Car_Kit").prop("checked", Car_details.v_CarKit == 1);
            $("#Car_Luggage").prop("checked", Car_details.vLuggage == 1);
            $("#Car_Feeature").prop("checked", Car_details.v_Feeature == 1);
                 
          });
          
         $('#updateModal').modal('show');
      
      }

      $("#updatefrm").submit(function (e) { 
        e.preventDefault();
        let formData = new FormData();
    
        var car_id = $("#car_id").val();
        var car_name = $("#Car_name").val();
        var car_price = $("#Car_price").val();
        var car_Description = $("#Car_Description").val();
        var car_pic = $("#car_pic")[0].files[0];
        var car_brand = $("#Car_brand").val();
        var car_SeatCap = $("#Car_SeatCap").val();
        var car_Milage = $("#Car_Milage").val();
        var car_FuelType = $("#Car_Fueltype").val();
        var car_Transmission = $("#Car_Transmission").val();
        var car_luggage = $("#Car_luggage").val();


        // var Update_pic;

        // if(car_pic !="")
        // {
        //   Update_pic = car_pic;
        //   console.log(Update_pic);
        // }
        // else{
        //   Update_pic = car_pic2;
        //  console.log(Update_pic);
        // }



        var Car_Airconditions = $("#Car_Airconditions");
        var Car_AirconditionsValue;
        if (Car_Airconditions.is(":checked")) {
          Car_AirconditionsValue = 1;
        } else {
          Car_AirconditionsValue = 0;
        }

        var Car_AutoDoor = $("#Car_AutoDoor");
        var Car_AutoDoorValue;
        if (Car_AutoDoor.is(":checked")) {
          Car_AutoDoorValue = 1;
        } else {
          Car_AutoDoorValue = 0;
        }

        var Car_Luggage = $("#Car_Luggage");
        var Car_LuggageValue;
        if (Car_Luggage.is(":checked")) {
          Car_LuggageValue = 1;
        } else {
          Car_LuggageValue = 0;
        }

        var Car_SeatBelt = $("#Car_SeatBelt");
        var Car_SeatBeltValue;
        if (Car_SeatBelt.is(":checked")) {
          Car_SeatBeltValue = 1;
        } else {
          Car_SeatBeltValue = 0;
        }

        var Car_Climate_control = $("#Car_Climatecontrol");
        var Car_Climate_controlValue;
        if (Car_Climate_control.is(":checked")) {
          Car_Climate_controlValue = 1;
        } else {
          Car_Climate_controlValue = 0;
        }

        var Car_GPS = $("#Car_GPS");
        var Car_GPSValue;
        if (Car_GPS.is(":checked")) {
          Car_GPSValue = 1;
        } else {
          Car_GPSValue = 0;
        }

        var Car_Audio = $("#Car_Audio");
        var Car_AudioValue;
        if (Car_GPS.is(":checked")) {
          Car_AudioValue = 1;
        } else {
          Car_AudioValue= 0;
        }

        var Car_Kit = $("#Car_Kit");
        var Car_KitValue;
        if (Car_Kit.is(":checked")) {
          Car_KitValue = 1;
        } else {
          Car_KitValue= 0;
        }

        var Car_Bluetooth = $("#Car_Bluetooth");
        var Car_BluetoothValue;
        if (Car_Bluetooth.is(":checked")) {
          Car_BluetoothValue = 1;
        } else {
          Car_BluetoothValue= 0;
        }

        var Car_AirBag = $("#Car_AirBag");
        var Car_AirBagValue;
        if (Car_AirBag.is(":checked")) {
          Car_AirBagValue = 1;
        } else {
          Car_AirBagValue= 0;
        }

        var Car_RemoteControl_locking = $("#Car_RemoteControl_locking");
        var Car_RemoteControl_lockingValue;
        if (Car_RemoteControl_locking.is(":checked")) {
          Car_RemoteControl_lockingValue = 1;
        } else {
          Car_RemoteControl_lockingValue= 0;
        }

        var Car_ABSBreak = $("#Car_ABSBreak");
        var Car_ABSBreakValue;
        if (Car_ABSBreak.is(":checked")) {
          Car_ABSBreakValue = 1;
        } else {
          Car_ABSBreakValue= 0;
        }

        var Car_Feature = $("#Car_Feeature");
        var Car_FeatureValue;
        if (Car_Feature.is(":checked")) {
          Car_FeatureValue = 1;
        } else {
          Car_FeatureValue= 0;
        }
       
        
        formData.append('car_id',car_id);
        formData.append('car_name', car_name);
        formData.append('car_price', car_price);
        formData.append('car_brand',car_brand);
        formData.append('car_Description', car_Description);
        formData.append('car_Transmission', car_Transmission);
        formData.append('car_pic', car_pic);
        formData.append('car_SeatCap', car_SeatCap);
        formData.append('car_Milage', car_Milage);
        formData.append('car_FuelType', car_FuelType);
        formData.append('car_luggage', car_luggage);
        formData.append('car_Airconditions', Car_AirconditionsValue);
        formData.append('car_AutoDoor', Car_AutoDoorValue);
        formData.append('car_Luggage', Car_LuggageValue);
        formData.append('car_SeatBelt', Car_SeatBeltValue);
        formData.append('car_Climate_control', Car_Climate_controlValue);
        formData.append('car_GPS', Car_GPSValue);
        formData.append('car_Audio', Car_AudioValue);
        formData.append('car_Kit', Car_KitValue);
        formData.append('car_Bluetooth', Car_BluetoothValue);
        formData.append('car_AirBag', Car_AirBagValue);
        formData.append('car_RemoteControl_locking', Car_RemoteControl_lockingValue);
        formData.append('car_ABSBreak', Car_ABSBreakValue);
        formData.append('car_Feature', Car_FeatureValue);
        
        
        $.post({
        url: "carCrud.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data,status) {
  
            $('#updateModal').modal('hide');
            DisplayCars();
            
          alertify.set("notifier", "position", "top-right");
          alertify.success(data);
        }
    });
        
      });
    

  </script>
  </body>
</html>