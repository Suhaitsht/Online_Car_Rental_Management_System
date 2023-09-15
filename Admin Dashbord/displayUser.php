<?php
session_start();
include 'db.php';

if(isset($_POST['Display_data']))
{
    $sql = "SELECT * FROM `users` WHERE `role_as`=0";
    $result = mysqli_query($con, $sql);
    $data = array();
    $count = 1;

    while($row = mysqli_fetch_assoc($result)){
        $data[] = array(
          'id' => $count,
          'Use_name' => $row['U_name'],
          'U_email' => $row['U_email'],
          'U_mobile' => $row['U_mobile'],
    
        );
        $count++;
      }
      $json_data = json_encode($data);

      echo "<script>
            $(document).ready(function() {
              $('#User_display').DataTable({
                'data': ".$json_data.",
                'columns': [
                  {'data': 'id'},
                  {'data': 'Use_name'},
                  {'data': 'U_email'},
                  {'data': 'U_mobile'},

                ]
              });
            });
          </script>";

          echo '<table id="User_display" class="table table-striped table-dark" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>UserName</th>
              <th>UserEmail</th>
              <th>UserMobile</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>';

}


// ! Get a vehicle_Booking Data 

if(isset($_POST['Display_Vehicle']))
{
  $sql = "SELECT users.U_name,v_details.vname,v_details.v_price,Pick_location,Drop_loaction,pick_date,drop_date,pick_time,order_id,B_id  FROM users JOIN car_booking ON users.u_id = car_booking.u_id JOIN v_details ON v_details.v_id = car_booking.v_id WHERE 1";
  $result = mysqli_query($con, $sql);
  $data = array();
  $count = 1;

  while($row = mysqli_fetch_assoc($result)){
    $data[] = array(
      'id' => $count,
      'Use_name' => $row['U_name'],
      'V_name' => $row['vname'],
      'v_price' => $row['v_price'],
      'Pick_location' => $row['Pick_location'],
      'Drop_location' => $row['Drop_loaction'],
      'pick_date' => $row['pick_date'],
      'drop_date' => $row['drop_date'],
      'pick_time' => $row['pick_time'],
      'order_id' => $row['order_id'],
      'action' => '<button type="button" class="btn btn-danger "><a href="tracking.php?b_id='.$row['B_id'].'" class="text-light"> Tracking </a></button>'

    );
    $count++;
  }
  $json_data = json_encode($data);

  echo "<script>
        $(document).ready(function() {
          $('#Booking_display').DataTable({
            'data': ".$json_data.",
            'columns': [
              {'data': 'id'},
              {'data': 'Use_name'},
              {'data': 'V_name'},
              {'data': 'v_price'},
              {'data': 'Pick_location'},
              {'data': 'Drop_location'},
              {'data': 'pick_date'},
              {'data': 'drop_date'},
              {'data': 'pick_time'},
              {'data': 'order_id'},
              {'data': 'action'}

            ]
          });
        });
      </script>";

      echo '<table id="Booking_display" class="table table-striped table-dark" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>UserName</th>
          <th>Vehicle_Name</th>
          <th>Vehicle_price</th>
          <th>pickUp_location</th>
          <th>DropUp_location</th>
          <th>pickUp_Date</th>
          <th>DropUp_Date</th>
          <th>pickUp_Time</th>
          <th>Payment_Id</th>
          <th>Track_vehicle</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>';

}
?>