<?php
session_start();

if(isset($_SESSION['auth']))
{
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    unset($_SESSION['role_as']);
    $_SESSION['message'] = "Logged Out Successfully";
}
header('location:index.php');


?>
