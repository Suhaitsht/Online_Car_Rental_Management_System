<?php
session_start();
include '../includes/admincase.php';
include 'db.php';

?>

<?php

if(isset($_POST['displaysend']))
{

  $sql = "SELECT * FROM `vbrand`";
  $result = mysqli_query($con,$sql);
  $data = array();
  $count = 1;
  while($row = mysqli_fetch_assoc($result)){
    $data[] = array(
      'id' => $count,
      'Brand' => $row['B_name'],
      'action' => '<button type="button" class="btn btn-sm btn-success " onclick="GetCategory('.$row['B_id'].')">Edit</button>
                   <button type="button" class="btn btn-sm btn-danger " onclick="deleteCategory('.$row['B_id'].')">Delete</button>'
    );
    $count++;
  }

  // Convert the data array to JSON format
  $json_data = json_encode($data);

  // Print the JSON data to be used by the DataTables library
  echo "<script>$(document).ready( function () {
          $('#displayDataTable').DataTable({
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
  echo '<table id="displayDataTable" class="">
        <thead>
          <tr>
            <th>#</th>
            <th>Category</th>
            <th>Brand</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>';
      $count++;
}






?>