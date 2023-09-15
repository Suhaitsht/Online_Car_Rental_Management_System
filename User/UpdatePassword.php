<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
     <link rel="stylesheet" href="../css/Updaetepass.css">
</head>
<body>
<?php
include "../Admin Dashbord/db.php";

if(isset($_GET['u_email']) && isset($_GET['reset_token']))
{
  date_default_timezone_set('Asia/colombo');
  $date =date('Y-m-d');
 
  $sql="SELECT * FROM `users` WHERE`U_email`='$_GET[u_email]'AND `reset_token`='$_GET[reset_token]' 
  AND `resettokenexpaire`='$date'";
  $result= mysqli_query($con,$sql);
  if($result)
  {
    if(mysqli_num_rows($result)==1)
    {
        echo "
        <div class='main_content'>
        <div class='container'>
            <div class='card rounded bg-white'>

                <div class='h3 text-center'>Change password</div> <br>
                <form action = '' method = 'POST'>
                    <form class='form-box px-2'>
                        <div class='row'>
                            <div class='col-md-6 mt-md-0 mt-3'>
                                <label>New password</label>
                                <input type='password' name = 'newpass' class='form-control'>
                                <input type='hidden' name = 'email' value='$_GET[u_email]'>
                            </div>
                        </div> <br>
                        <button class='btn btn--radius-2 btn-dark' name='submit' type='submit'>Update password</button>
                    </form>
                
            </div>";
            
    }
  
  else{
    echo "<script>alert('invalid or Expaire date');
    // window.location.href='';
    </script>";
  }
}
}
?>
<?php
if(isset($_POST['submit']))
{
    $pass = $_POST['newpass'];
    $update = "UPDATE `users` SET `U_password`='$pass',`reset_token`=NULL,`resettokenexpaire`=NULL WHERE `U_email`='$_POST[email]'";
    if(mysqli_query($con,$update))
    {
        echo "<script>alert('password updated successfully');
        window.location.href='../index.php';
        </script>";
    }
    else{
        echo "<script>alert('invalid or Expaire date');
        window.location.href='Fogotpassword.php';
        </script>";
    }
}

// header ("loaction:Donornew.php");
?>



</body>
</html>