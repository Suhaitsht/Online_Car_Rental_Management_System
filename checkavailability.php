<?php

include "./Admin Dashbord/db.php";

$Book_pick_date = $_POST['Book_pick_date'];
$book_off_date = $_POST['book_off_date'];

$sql = "SELECT * FROM `car_booking` WHERE `pick_date` ='" . $Book_pick_date . "' AND `drop_date`='" . $book_off_date . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "1";
} else {
    echo "2";
}

?>