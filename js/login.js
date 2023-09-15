// $(document).ready(function () {
//     alert("hi");
//  $('#Name').keyup(function () {
// if(validateName())
// {
//   $('#Name').css("border","2px solid green");
//   $('#Msg').html("<p class='text-success'>Valid Name </p>")
// }
// else{
//   $('#Name').css("border","2px solid red");
//   $('#Msg').html("<p class='text-danger'>Name must be Characteristic and space not allowed </p>");
// }


// function validateName(){

// var Uname = $('#Name').val();
// var reg = /^[a-zA-Z\-]+$/;

// if(reg.test(Uname))
// {
// return true;
// }
// else{
// return false;
// }

// }

// $('#pass').keyup(function () {
// if(validatePassword())
// {
//   $('#pass').css("border","2px solid green");
//   $('#PMsg').html("<p class='text-success'>valid password</p>");
// }
// else{
//   $('#pass').css("border","2px solid red");
//   $('#PMsg').html("<p class='text-danger'>password should contain atleast one number and one special character </p>");
// }
// });


// function validatePassword(){

// var password = $('#pass').val();
// var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;


// if(reg.test(password))
// {
//     return true;
// }
// else
// {
//     return false;
// }

// }
// });
// });



// $('#myfrm').click(function (e) {

// e.preventDefault();

//   alert("hi");
//   // regular expression
//   namereg = /^[a-zA-Z\-]+$/;
//   passwordreg= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;

//  let name=$('#Name').val();
// //  if(name=="")
// //  {
// //   $('#Name').css("border","2px solid red");
// //   $('#Msg').html("<p class='text-danger'>Name Field is required </p>");
// //   return false;
// //  }
// //  else if(!namereg.test(name))
// //  {
// //   return false;
// //  }
//  alert(name);

//  let password=$('#pass').val();
//  if(password=="")
//  {
//   $('#PMsg').html("<p class='text-danger'>password Field is required </p>");
//   return false;
//  }
//  else if(!passwordreg.test(password))
//  {
//     return false;
//  }
//  alert(password);

//   $.ajax({
//     url:'./User/loginUser.php',
//     type:'POST',
//     data:{
//       name:name,
//       password:password,
//     },
//     success:function (data,status) {
//     //   // function to display data
//       $('#Loginmodel').modal('hide');
//       $('#myfrm').trigger("reset");
//       $('#Msg').empty();
//       $('#PMsg').empty();
//       $('#Name').css("border","");
//       $('#pass').css("border","");
//       console.log(status);
//       // close button
//     //   alertify.set('notifier','position', 'top-right');
//     //    alertify.success('Registration Done Successfully');
//       //  window.location.replace("index.php");

//     }
// });
// });


// $('#clse').click(function () {
//      $('#myfrm').trigger("reset");
//      $('#Name').css("border","");
//      $('#pass').css("border","");
//       $('#Msg').empty();
//       $('#PMsg').empty();

// });


