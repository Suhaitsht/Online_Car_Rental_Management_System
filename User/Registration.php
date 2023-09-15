
<!-- Registration -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-circle fs-3 me-2"></i>User Registration</h5>
        <button type="button" class="btn-close" id="close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Form -->
      <!-- <form id="frm"> -->
        <form id="frm">
          <div class="mb-3 mx-3">
                <label for="Username">Username</label>
                <input type="text" name="username" class="form-control" id="Uname" placeholder="Enter Username">
                <span id="nameMsg"></span>
            </div>
                 <div class="mb-3  mx-3">
                 <label for="Password">Password</label>
                <input type="password" name="password" class="form-control" id="Pass" placeholder="Enter Password">
                <span id="PassMsg"></span>
            </div>
        <div class="mb-3 mx-3">
                <label for="Email">Email</label>
                <input type="email" name="Email" class="form-control" id="email" placeholder="Enter Email">
                <span id="emailMsg"></span>
        </div>
        <div class="mb-3 mx-3">
               <label for="Mobile">Mobile</label>
                <input type="number" name="mnum" class="form-control" id="phone" placeholder="Enter Mobile">
                <span id="phoneMsg"></span>
        </div>
      <div class="modal-footer">
        <button type="submit"class="btn btn-dark mx-auto w-100">Submit</button>
      </div>
      </form>
      <!-- </form> -->
    </div>
  </div>
</div>


<!-- Registration -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

 <script>
    $(document).ready(function () {
            // alert("hi");
         $('#Uname').keyup(function () {
        if(validateName())
        {
          $('#Uname').css("border","2px solid green");
          $('#nameMsg').html("<p class='text-success'>Valid Name </p>")
        }
        else{
          $('#Uname').css("border","2px solid red");
          $('#nameMsg').html("<p class='text-danger'>Name must be Characteristic and space not allowed </p>");
        }
      });

      function validateName(){

      var name = $('#Uname').val();
      var reg = /^[a-zA-Z\-]+$/;

      if(reg.test(name))
      {
        return true;
      }
      else{
        return false;
      }

      }

      $('#Pass').keyup(function () {
        if(validatePassword())
        {
          $('#Pass').css("border","2px solid green");
          $('#PassMsg').html("<p class='text-success'>valid password</p>");
        }
        else{
          $('#Pass').css("border","2px solid red");
          $('#PassMsg').html("<p class='text-danger'>password should contain atleast one number and one special character </p>");
        }
      });

      function validatePassword(){

      var password = $('#Pass').val();
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

        $('#email').keyup(function () {
          if(validateEmail())
        {
          $('#email').css("border","2px solid green");
          $('#emailMsg').html("<p class='text-success'>Valid Email </p>");
        }
        else{
          $('#email').css("border","2px solid red");
          $('#emailMsg').html("<p class='text-danger'>Enter the valid email </p>");
        }
      });

        function validateEmail(){

        var email = $('#email').val();
        var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;

        if(reg.test(email))
        {
            return true;
        }
        else{
            return false;
        }

        }


        $('#phone').keyup(function () {
        if(validatePhone())
        {
          $('#phone').css("border","2px solid green");
          $('#phoneMsg').html("<p class='text-success'>valid Mobile Number</p>")
        }
        else{
          $('#phone').css("border","2px solid red");
          $('#phoneMsg').html("<p class='text-danger'>Enter your valid Mobile Number </p>");
        }
      });

      function validatePhone(){

            var mobile = $('#phone').val();
            var reg = /^\d{10}$/;


        if(reg.test(mobile))
        {
            return true;
        }
        else
        {
            return false;
        }

        }

      });

      $('#frm').click(function (e) {
        e.preventDefault();
        //   alert("hi");
          namereg = /^[a-zA-Z\-]+$/;
          passwordreg= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
          emailreg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;
          phonereg = /^\d{10}$/;

         let name=$('#Uname').val();
         if(name=="")
         {
          $('#Uname').css("border","2px solid red");
          $('#nameMsg').html("<p class='text-danger'>Name Field is required </p>");
          return false;
         }
         else if(!namereg.test(name))
         {
          return false;
         }
        //  alert(name);

         let password=$('#Pass').val();
         if(password=="")
         {
          $('#PassMsg').html("<p class='text-danger'>password Field is required </p>");
          return false;
         }
         else if(!passwordreg.test(password))
         {
            return false;
         }
        //  alert(password);

         let email=$('#email').val();
         if(email=="")
         {
          $('#emailMsg').html("<p class='text-danger'>Email Field is required </p>");
          return false;
         }
         else if(!emailreg.test(email))
         {
            return false;
         }
        //  alert(email);

         let phone=$('#phone').val();
         if(phone=="")
         {
          $('#phoneMsg').html("<p class='text-danger'>phone Field is required </p>");
          return false;
         }
         else if(!phonereg.test(phone))
         {
            return false;
         }
        //  alert(phone);

        // alert(`${name}${email}${phone}${password}`);

          $.ajax({
            url:'./User/Insert.php',
            type:'POST',
            data:{
              name:name,
              password:password,
              email:email,
              phone:phone,
            },
            success:function (data,status) {
              // function to display data
              $('#registerModal').modal('hide');
              $('#frm').trigger("reset");
              $("#nameMsg").empty();
              $("#emailMsg").empty();
              $("#phoneMsg").empty();
              $("#PassMsg").empty();
              $("#Uname").css("border","");
              $("#Pass").css("border","");
              $("#email").css("border","");
              $("#phone").css("border","");
              // close button
              alertify.set('notifier','position', 'top-right');
               alertify.success('Registration Done Successfully');
              //  window.location.replace("index.php");

            }
      });
      });


      $('#close').click(function () {
             $('#frm').trigger("reset");
              $('#nameMsg').empty();
              $('#PassMsg').empty();
              $('#emailMsg').empty();
              $('#phoneMsg').empty();
              $('#Uname').css("border","");
              $('#email').css("border","");
              $('#phone').css("border","");
              $('#Pass').css("border","");

      });
 </script>
