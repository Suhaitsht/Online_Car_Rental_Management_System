<?php
include "../Admin Dashbord\db.php";
session_start();



if (isset($_SESSION['auth'])) {

        $v_id = $_GET['v_id'];
        $user_id = $_SESSION['auth_user']['U_id'];
        $array;
        $vehicle_detail = "SELECT * FROM v_details WHERE `v_id` = '".$v_id."' ";
       $result = $con->query( $vehicle_detail);
       $row =  $result->num_rows;

       if($row >=0)
       {
        // !get vehicle details from database
         $v_data = $result->fetch_assoc();
         $V_name = $v_data['vname'];
         $v_price = $v_data['v_price'];
      
       }

        $user_name = $_SESSION['auth_user']['U_name'];
        $User_Details = "SELECT * FROM `users` WHERE `U_id`='".$user_id."' ";
        $result = $con->query( $User_Details);
        $rows =  $result->num_rows;
        if($rows >= 0)
        {
            $user_data = $result->fetch_assoc();
            $user_Mobile =$user_data['U_mobile'];
            $user_email =$user_data['U_email'];
        
        }




        $amount = $v_price;
        $merchant_id ="1223196";
        $order_id = uniqid();
        $merchant_secret="MjI2Njk1NzA4MzM5MzA0ODI3MDIzNzMxMjM1MTQ5MzM5MTQ5NzM3";
        $currency ='LKR';
        $hash = strtoupper(
            md5 (
                $merchant_id .
                $order_id .
                number_format($amount,2,'.','') .
                $currency.
                strtoupper(md5($merchant_secret)) 
            ) 
            );
 
      $array['V_name'] = $V_name;
      $array['v_price'] = $amount;
      $array['user_name'] = $user_name;
      $array['user_Mobile'] = $user_Mobile;
      $array['user_email'] = $user_email;
      $array['merchant_id'] = $merchant_id;
      $array['order_id'] = $order_id;
      $array['currency'] = $currency;
      $array['hash'] = $hash;

      $JSONobj = json_encode($array);
      echo $JSONobj ;
     


} else {
    echo "1";
    // header("Location: ./index.php");
}


?>
