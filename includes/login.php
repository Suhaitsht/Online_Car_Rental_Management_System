<?php
include "./Admin Dashbord/db.php";

if (isset($_POST['login-button'])) {
    $name = $_POST['Name'];
    $password = $_POST['Pass'];

    $sql = "SELECT * FROM `users` WHERE U_name ='$name' AND U_password='$password' ";
    $query_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($query_run) > 0) {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($query_run);
        $username = $userdata['U_name'];
        $userid = $userdata['U_id'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'U_name' => $username,
            'U_id' => $userid,
        ];

        $_SESSION['role_as'] = $role_as;

        if ($role_as == 1) {
             $_SESSION['message'] = " Welcome to dashboard";
            header('location:./Admin Dashbord/Admindashbord.php');
        } else {
            $_SESSION['message'] = " Logged Successfully";
            // header('location:index.php');
        }

    } else {
        $_SESSION['message'] = " Invalid Username or Password";
        // header('location:index.php');
    }
}
?>










<div class="modal fade" id="Loginmodel" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <!-- Login Form -->
        <form action="" method="POST" id="myfrm">
          <div class="modal-header">
            <h5 class="modal-title"><i class="bi bi-person-circle fs-3 me-2"></i>User Login</h5>
            <button type="button" class="btn-close " id="Close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <label for="Username">Username</label>
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Username">
                <span id="nMsg"></span>
            </div>

            <div class="mb-3">
                <label for="Password">Password</label>
                <input type="password"  class="form-control" id="pass"name="Pass" placeholder="Enter Password">
                <span id="pMsg"></span>
            </div>
            <div class="mb-3">
                <a href="#" onclick ="Foget_password()" class="float-end">Forgot Password</a><br>
            </div>
          </div>
          <div class="modal-footer pt-4">
            <button type="submit" class="btn btn-success mx-auto w-100" name="login-button">Login</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
<!-- <script src="./js/login.js"></script> -->


<script>

 $(document).ready(function () {


});
  //  alert("hi");
 $('#Name').keyup(function () {
if(validateName())
{
  $('#Name').css("border","2px solid green");
  $('#nMsg').html("<p class='text-success'>Valid Name </p>")
}
else{
  $('#Name').css("border","2px solid red");
  $('#nMsg').html("<p class='text-danger'>Name must be Characteristic and space not allowed </p>");
}


function validateName(){

var Uname = $('#Name').val();
var reg = /^[a-zA-Z\-]+$/;

if(reg.test(Uname))
{
return true;
}
else{
return false;
}

}

$('#pass').keyup(function () {
if(validatePassword())
{
  $('#pass').css("border","2px solid green");
  $('#pMsg').html("<p class='text-success'>valid password</p>");
}
else{
  $('#pass').css("border","2px solid red");
  $('#pMsg').html("<p class='text-danger'>password should contain atleast one number and one special character </p>");
}
});


function validatePassword(){

var password = $('#pass').val();
var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;


if(reg.test(password))
{
    return true;
}
else
{
    return false;
}

}
});




$('#myfrm').click(function () {
// // e.preventDefault();
//   // alert("hi");
//   // regular expression
  namereg = /^[a-zA-Z\-]+$/;
  passwordreg= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;

 let name=$('#Name').val();
 if(name=="")
 {
  $('#Name').css("border","2px solid red");
  $('#nMsg').html("<p class='text-danger'>Name Field is required </p>");
  return false;
 }
 else if(!namereg.test(name))
 {
  return false;
 }
//  alert(name);

 let password=$('#pass').val();
 if(password=="")
 {
  $('#pMsg').html("<p class='text-danger'>password Field is required </p>");
  return false;
 }
 else if(!passwordreg.test(password))
 {
    return false;
 }
// //  alert(password);

});

$('#Close').click(function () {
     $('#myfrm').trigger("reset");
     $('#nMsg').empty();
     $('#pMsg').empty();
     $('#Name').css("border","");
     $('#pass').css("border","");

});

function Foget_password()
{
  window.location.href = "./User/Fogotpassword.php";
  
}



</script>
