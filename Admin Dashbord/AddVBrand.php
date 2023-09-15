<?php
session_start();
include 'db.php';
extract($_POST);

    $carBrand = $_POST['carBrand'];

    $Category_Car = "INSERT INTO `vbrand`(`B_name`) VALUES (' $carBrand')";
    $Query_run = mysqli_query($con, $Category_Car);
    
    if($Query_run)
    {    exit(0);
        echo"Brand Added successfully";
    
}














?>