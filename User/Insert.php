<?php
include "../Admin Dashbord/db.php";

session_start();

extract($_POST);


        $name =$_POST['name'];
        $password =$_POST['password'];
        $email=$_POST['email'];
        $phone =$_POST['phone'];
        $sql = "INSERT INTO `users`( `U_name`, `U_password`, `U_email`, `U_mobile`) 
        VALUES ('$name','$password','$email','$phone')";
        $result = mysqli_query($con, $sql);
        if ($result)
         {
            $_SESSION['message'] = "Registered successfully ";
            echo"<script>window.location.replace('index.php') </script>";
            exit(0);
        }

  
?>


