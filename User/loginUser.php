<?php
include "../Admin Dashbord/db.php";

session_start();
extract($_POST);


    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `users` WHERE U_name ='$name' AND U_password='$password'";
    
    $query_run = mysqli_query($con,$sql);

    if(mysqli_num_rows($query_run) > 0)
    {
        $_SESSION['auth_user'] =  true;

        $userdata = mysqli_fetch_array($query_run);
        $username = $userdata['U_name'];
        $userid = $userdata['U_id'];

        $_SESSION['auth_user'] = [
            'name' => $username,
            'userid' => $userid
        ];
        $_SESSION['message'] = " Logged Successfully";
        header('location:index.php');
    }
    else
    {
        $_SESSION['message'] = " Invalid Username or Password";
        header('location:index.php');
    }

?>