<?php
include "db.php"
?>
<?php
if(isset($_POST['Vname']) && isset($_POST['Vprice']) &&isset($_POST['Brands'])  &&isset($_POST['Vdescription']) &&isset($_POST['Seat_Capacity']) &&
isset($_POST['Fueltype']) && isset($_POST['Transmission']) && isset($_POST['Milage']) && isset($_POST['luggage']) && isset($_POST['Ac']) &&
isset($_POST['seatBeld']) && isset($_POST['Audio']) && isset($_POST['PassengerBage']) && isset($_POST['AutoDoor']) && isset($_POST['climateControl']) &&
isset($_POST['Luggage'])  && isset($_POST['GPS']) && isset($_POST['Break']) && isset($_POST['Feature'])&& isset($_FILES['vimage'])
) 
{
$Vname = $_POST['Vname'];
$Vprice = $_POST['Vprice'];
$Brands = $_POST['Brands'];
$Vdescription = $_POST['Vdescription'];
$Seat_Capacity = $_POST['Seat_Capacity'];
$Fueltype = $_POST['Fueltype'];
$Transmission = $_POST['Transmission'];
$Milage = $_POST['Milage'];
$luggage = $_POST['luggage'];
$Ac = $_POST['Ac'];
$seat = $_POST['seatBeld'];
$Audio = $_POST['Audio'];
$PassengerBage = $_POST['PassengerBage'];
$AutoDoor = $_POST['AutoDoor'];
$climateControl = $_POST['climateControl'];
$Carkit = $_POST['Carkit'];
$Rcontrolloking = $_POST['Rcontrolloking'];
$Luggage = $_POST['Luggage'];
$GPS = $_POST['GPS'];
$Bluetooth = $_POST['Bluetooth'];
$Break = $_POST['Break'];
$Feature= $_POST['Feature'];
$target_dir="upload/";
$target_file=$target_dir.basename($_FILES["vimage"]["name"]);
if(move_uploaded_file($_FILES["vimage"]["tmp_name"],$target_file))
{

$Post_vehicle ="INSERT INTO `v_details`( `vbrand`, `vname`, `v_price`, `v_description`, `v_seat_capacity`, `v_Fueltype`, `v_Transmission`, `v_Milage`, `v_luggage`, `v_image`, `v_Airconditions`, `v_Seat_Belt`, `v_Audio_input`, `v_Passenger_Air_Bags`, `v_AutoDoor`, `v_Climatecontrol`, `v_Car_Kit`, `v_Remote_controllocking`, `vLuggage`, `v_GPS`, `v_Bluetooth`, `v_ABS_Break`,`v_Feeature`)
 VALUES ('$Brands','$Vname','$Vprice','$Vdescription','$Seat_Capacity','$Fueltype','$Transmission','$Milage','$luggage ','$target_file','$Ac','$seat','$Audio','$PassengerBage','$AutoDoor','$climateControl','$Carkit','$Rcontrolloking','$Luggage','$GPS','$Bluetooth','$Break','$Feature')";
$query_run =mysqli_query($con,$Post_vehicle);

if($query_run)
{
    echo " Vehicle Post Successfully";

}
}

else{
    echo "Vehicle Not Post Successfully";
}
}

?>