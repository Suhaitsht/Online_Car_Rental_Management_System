<?php
include "../Admin Dashbord\db.php";
session_start();

if (isset($_SESSION['auth'])) {
   
    $v_id = $_POST['v_id'];
    $orderId = $_POST['orderId'];
    $Pickup_location = $_POST['Pickup_location'];
    $Drop_location = $_POST['Drop_location'];
    $pickup_date = $_POST['pickup_date'];
    $drop_date = $_POST['drop_date'];
    $time_pick = $_POST['pic_time'];
    $user_id = $_SESSION['auth_user']['U_id'];
    
    
    $vehicle_detail = "SELECT * FROM `v_details` WHERE `v_id` = '".$v_id."'";
    $Result = mysqli_query($con,$vehicle_detail);
    $row = mysqli_num_rows($Result);
    
    if ($row >= 0) {
        
        // Get vehicle details from the database
        $v_data = $Result->fetch_assoc();
        $v_price = $v_data['v_price'];
    }
    
    $sql = "INSERT INTO `car_booking`(`v_id`, `u_id`, `Pick_location`, `Drop_loaction`, `pick_date`, `drop_date`, `pick_time`, `order_id`, `v_price`)
            VALUES ('$v_id', '$user_id', '$Pickup_location', '$Drop_location', '$pickup_date', '$drop_date', '$time_pick', '$orderId', '$v_price')";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        echo "1";
    }
    
else {
    echo "Login to  continue"; 
}

}
?>