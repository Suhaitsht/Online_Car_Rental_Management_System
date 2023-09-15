<?php
session_start();
include '../includes/admincase.php';
include 'db.php';
?>

<?php

if(isset($_POST['Displaycar']))
{
    $sql ="SELECT v_details.vname,v_details.v_id,v_details.v_price,v_details.v_Fueltype,v_details.v_seat_capacity,v_details.v_Milage,v_details.v_Transmission,v_details.v_image,vbrand.B_name from v_details join vbrand on vbrand.B_id=v_details.vbrand";
    $result = mysqli_query($con, $sql);
    $data = array();
    $count = 1;

    while($row = mysqli_fetch_assoc($result)){
        $data[] = array(
          'id' => $count,
          'vname' => $row['vname'],
          'B_name' => $row['B_name'],
          'v_price' => $row['v_price'],
          'v_Fueltype' => $row['v_Fueltype'],
          'v_seat_capacity' => $row['v_seat_capacity'],
          'v_Transmission' => $row['v_Transmission'],
          'v_Milage' => $row['v_Milage'],
          'v_image' =>  '<img src="'.$row['v_image'].'" width="50">',
          'action' => '<button type="button" class="btn btn-sm btn-success " onclick="GetCarDetails('.$row['v_id'].')">Edit</button>
                       <button type="button" class="btn btn-sm btn-danger " onclick="DeleteCar('.$row['v_id'].')">Delete</button>'
        );
        $count++;
      }
      $json_data = json_encode($data);

echo "<script>
   
    $(document).ready( function () {
    $('#carDetails_tables').DataTable({
      'data': ".$json_data.",
      'columns': [
        {'data': 'id'},
        {'data': 'vname'},
        {'data': 'B_name'},
        {'data': 'v_price'},
        {'data': 'v_Fueltype'},
        {'data': 'v_seat_capacity'},
        {'data': 'v_Transmission'},
        {'data': 'v_Milage'},
        {'data': 'v_image'},
        {'data': 'action'},
      ]
    });
  });
  </script>";

   echo '
   <table id="carDetails_tables" class="table table-striped table-dark" style="width:100%">
   <thead>
   <tr>
     <th>#</th>
     <th>vehicle Name</th>
     <th>vehicle Brand</th>
     <th>Prise Details</th>
     <th>Fuel Type</th>
     <th>Seating capacity</th>
     <th>Transmission</th>
     <th>Mileage</th>
     <th>vehicle image</th>
     <th>Action</th>
  </tr>
   </thead>
   <tbody></tbody>
   </table>';
   $count++;
}

?>

<?php
if(isset($_POST['Delete_v_id']))
{
    $Delete_v_id =$_POST['Delete_v_id'];

    $sql = "DELETE FROM `v_details` WHERE 	v_id =$Delete_v_id";
    $result = mysqli_query($con,$sql);
    if($result)
    {
      echo "Image Deleted Successfully";
      }
}
?>
<?php
if(isset($_POST['V_id']))
{
  $V_id = $_POST['V_id'];

  $sql = "SELECT * FROM `v_details` WHERE `v_id`='$V_id'";
  $result = mysqli_query($con, $sql);
  $response = array();
  foreach($result as $row)
  {
    $response['vid'] = $row['v_id'];
    $response['vbrand'] = $row['vbrand'];
    $response['vname'] = $row['vname'];
    $response['v_price'] = $row['v_price'];
    $response['v_description'] = $row['v_description'];
    $response['v_seat_capacity'] = $row['v_seat_capacity'];
    $response['v_Fueltype'] = $row['v_Fueltype'];
    $response['v_Transmission'] = $row['v_Transmission'];
    $response['v_Milage'] = $row['v_Milage'];
    $response['v_luggage'] = $row['v_luggage'];
    $response['v_Airconditions'] = $row['v_Airconditions'];
    $response['v_SeatBelt'] = $row['v_Seat_Belt'];
    $response['v_Audioinput'] = $row['v_Audio_input'];
    $response['v_PassengerAirBags'] = $row['v_Passenger_Air_Bags'];
    $response['v_AutoDoor'] = $row['v_AutoDoor'];
    $response['v_Climatecontrol'] = $row['v_Climatecontrol'];
    $response['v_Remotecontrollocking'] = $row['v_Remote_controllocking'];
    $response['v_CarKit'] = $row['v_Car_Kit'];
    $response['vLuggage'] = $row['vLuggage'];
    $response['v_GPS'] = $row['v_GPS'];
    $response['v_Bluetooth'] = $row['v_Bluetooth'];
    $response['v_ABSBreak'] = $row['v_ABS_Break'];
    $response['v_Feeature'] = $row['v_Feeature'];
    if($row['v_image'] != '') {
      $response['v_image'] = '<img src="'.$row["v_image"].'"width="100" height="100"/>';
      $response['hidden_user_image'] = $row['v_image'];
  } else {
      $response['v_image'] = '';
      $response['hidden_user_image'] = '';
  }
  echo json_encode($response);
}
  
}


?>






<?php
extract ($_POST);

if(isset($_POST['car_id'])&&isset($_POST['car_name'])&&isset($_POST['car_price'])&&isset($_POST['car_Description'])&&isset($_POST['car_brand'])&&isset($_POST['car_SeatCap'])&&isset($_POST['car_Milage']) && isset($_POST['car_FuelType'])&&isset($_POST['car_luggage'])&&isset($_POST['car_Transmission'])&&
isset($_POST['car_Airconditions'])&&isset($_POST['car_AutoDoor'])&&isset($_POST['car_Luggage'])&&isset($_POST['car_SeatBelt'])&&isset($_POST['car_Climate_control'])&&
isset($_POST['car_GPS'])&&isset($_POST['car_Audio'])&&isset($_POST['car_Kit'])&&isset($_POST['car_Bluetooth'])&&isset($_POST['car_AirBag'])&&isset($_POST['car_RemoteControl_locking'])&&isset($_POST['car_ABSBreak'])&&isset($_POST['car_Feature'])&&isset($_FILES['car_pic']))

{
  $update_id= $_POST['car_id'];
  $car_name= $_POST['car_name'];
  $car_Description= $_POST['car_Description'];
  $car_brand= $_POST['car_brand'];
  $car_price= $_POST['car_price'];
  $car_SeatCap= $_POST['car_SeatCap'];
  $car_Milage= $_POST['car_Milage'];
  $car_FuelType= $_POST['car_FuelType'];
  $car_Transmission= $_POST['car_Transmission'];
  $car_luggage= $_POST['car_luggage'];
  $car_Airconditions= $_POST['car_Airconditions'];
  $car_AutoDoor= $_POST['car_AutoDoor'];
  $car_Luggage= $_POST['car_Luggage'];
  $car_SeatBelt= $_POST['car_SeatBelt'];
  $car_Climate_control= $_POST['car_Climate_control'];
  $car_GPS= $_POST['car_GPS'];
  $car_Audio= $_POST['car_Audio'];
  $car_Kit= $_POST['car_Kit'];
  $car_Bluetooth= $_POST['car_Bluetooth'];
  $car_AirBag= $_POST['car_AirBag'];
  $car_RemoteControl_locking= $_POST['car_RemoteControl_locking'];
  $car_ABSBreak= $_POST['car_ABSBreak'];
  $car_Feature= $_POST['car_Feature'];
  $target_dir = 'Upload/';
  $target_file = $target_dir.basename($_FILES["car_pic"]["name"]);
  
    $update="UPDATE `v_details` SET`vbrand`='$car_brand',`vname`='$car_name',`v_price`='$car_price',`v_description`='$car_Description',`v_seat_capacity`='$car_SeatCap',`v_Fueltype`='$car_FuelType',`v_Transmission`='$car_Transmission',`v_Milage`='$car_Milage',`v_luggage`='$car_luggage',`v_image`='$target_file',`v_Airconditions`='$car_Airconditions',`v_Seat_Belt`='$car_SeatBelt',`v_Audio_input`='$car_Audio',`v_Passenger_Air_Bags`='$car_AirBag',`v_AutoDoor`='$car_AutoDoor',`v_Climatecontrol`='$car_Climate_control',`v_Car_Kit`='$car_Kit',`v_Remote_controllocking`='$car_RemoteControl_locking',`vLuggage`='$car_Luggage',`v_GPS`='$car_GPS',`v_Bluetooth`='$car_Bluetooth',`v_ABS_Break`='$car_ABSBreak',`v_Feeature`='$car_Feature'WHERE `v_id`='$update_id'";
    $result = mysqli_query($con,$update);
    if ($result) {
        // Record updated successfully
        if(move_uploaded_file($_FILES["car_pic"]["tmp_name"], $target_file)) {
            echo "Updated successfully.";
        } else {
            echo "Error uploading file.";
        }
    } else {
        // Error updating record
        echo "Error updating record: " . mysqli_error($con);
    }
}    




?>
