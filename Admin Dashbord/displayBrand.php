<?php
session_start();
include '../includes/admincase.php';
include 'db.php';

?>

<?php

if(isset($_POST['displaysend'])){
    $sql = "SELECT * FROM `vbrand`";
    $result = mysqli_query($con, $sql);
    $data = array();
    $count = 1;

    // Fetch the data from the database and store it in an array
    while($row = mysqli_fetch_assoc($result)){
      $data[] = array(
        'id' => $count,
        'Brand' => $row['B_name'],
        'action' => '<button type="button" class="btn btn-sm btn-success " onclick="GetCategory('.$row['B_id'].')">Edit</button>
                     <button type="button" class="btn btn-sm btn-danger " onclick="DeleteBrand('.$row['B_id'].')">Delete</button>'
      );
      $count++;
    }

    // Convert the data array to JSON format
    $json_data = json_encode($data);

    // Print the JSON data to be used by the DataTables library
    echo "<script>
            $(document).ready(function() {
              $('#Brand_display').DataTable({
                'data': ".$json_data.",
                'columns': [
                  {'data': 'id'},
                  {'data': 'Brand'},
                  {'data': 'action'}
                ]
              });
            });
          </script>";

    // Display the table HTML code
    echo '<table id="Brand_display" class="table table-striped table-dark" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Brand</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>';
  }
?>
<?php
if(isset($_POST['Delete_send']))
{
    $Delete_send =$_POST['Delete_send'];

    $sql = "DELETE FROM `vbrand` WHERE 	B_id = $Delete_send";
    $result = mysqli_query($con,$sql);
}
?>

<?php


if(isset($_POST['B_id']))
{
    $brand_id=$_POST['B_id'];

    $sql = "SELECT * FROM `vbrand` WHERE  `B_id`='$brand_id'";
    $result = mysqli_query($con,$sql);
    $response = array();
    while($row=mysqli_fetch_assoc($result)){
        $response = $row;
    }
    echo json_encode($response);
}else{
    $response['status']=200;
    $response['message']="invalid or data not found";
}


?>

<?php
if(isset($_POST['update_Bid']))
{
    $Hideen_id=$_POST['update_Bid'];
    $update_Bname=$_POST['update_Bname'];

    $sql = "UPDATE `vbrand` SET `B_name`='$update_Bname' WHERE `B_id`=$Hideen_id";
    $result = mysqli_query($con,$sql);

    if($result)
    {
      echo "Brand Update Successfully";
    }
}
?>