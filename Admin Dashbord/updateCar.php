<?php
session_start();
include '../includes/admincase.php';
include 'db.php';
?>



<?php
extract ($_POST);

if(isset($_POST['car_id'])&&isset($_POST['car_name'])&&isset($_POST['car_price'])&&isset($_POST['car_Description'])&&isset($_POST['car_brand'])&&isset($_POST['car_SeatCap'])&&isset($_POST['car_Milage']) && isset($_POST['car_FuelType'])&&isset($_POST['car_luggage'])&&isset($_POST['car_Transmission'])&&
isset($_POST['car_Airconditions'])&&isset($_POST['car_AutoDoor'])&&isset($_POST['car_Luggage'])&&isset($_POST['car_SeatBelt'])&&isset($_POST['car_Climate_control'])&&
isset($_POST['car_GPS'])&&isset($_POST['car_Audio'])&&isset($_POST['car_Kit'])&&isset($_POST['car_Bluetooth'])&&isset($_POST['car_AirBag'])&&isset($_POST['car_RemoteControl_locking'])&&isset($_POST['car_ABSBreak'])&&isset($_FILES['car_pic']))

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
  $target_dir = 'Upload/';
  $target_file = $target_dir.basename($_FILES["car_pic"]["name"]);
  print_r($update_id);
  
    $update="UPDATE `v_details` SET`vbrand`='$car_brand',`vname`='$car_name',`v_price`='$car_price',`v_description`='$car_Description',`v_seat_capacity`='$car_SeatCap',`v_Fueltype`='$car_FuelType',`v_Transmission`='$car_Transmission',`v_Milage`='$car_Milage',`v_luggage`='$car_luggage',`v_image`='$target_file',`v_Airconditions`='$car_Airconditions',`v_Seat Belt`='$car_SeatBelt',`v_Audio input`='$car_Audio',`v_Passenger Air Bags`='$car_AirBag',`v_AutoDoor`='$car_AutoDoor',`v_Climatecontrol`='$car_Climate_control',`v_Car Kit`='$car_Kit',`v_Remote control locking`='$car_RemoteControl_locking',`vLuggage`='$car_Luggage',`v_GPS`='$car_GPS',`v_Bluetooth`='$car_Bluetooth',`v_ABS Break`='$car_ABSBreak'WHERE `v_id`='$update_id'";
    $result = mysqli_query($con,$update);
    if ($result) {
        // Record updated successfully
        if(move_uploaded_file($_FILES["car_pic"]["tmp_name"], $target_file)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    } else {
        // Error updating record
        echo "Error updating record: " . mysqli_error($con);
    }
}    




?>