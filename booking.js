$(document).ready(function () {
  $("#Book_frm").submit(function (e) {
    e.preventDefault();
    // validation
    pic_loc_reg = /^[a-z\-]+$/;
    Drop_loc_reg = /^[a-z\-]+$/;
    pic_date_reg = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$/;
    drop_date_reg = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$/;
    pic_time_reg = /^(1[012]|[1-9]):[0-5][0-9](\\s)?[?i]|[am|pm]$/;

    var v_id = $("#vid").val();
    var Pic_location = $("#Pick-up-location").val();
    var Drop_location = $("#drop_location").val();
    var pic_date = $("#book_pick_date").val();
    var drop_date = $("#book_off_date").val();
    var pic_time = $("#time_pick").val();

    if (Pic_location == "") {
      $("#Pick-up-location").css("border", "2px solid red");
      $("#PerrMsg").html(
        "<p class='text-danger'>This Field must be Characteristic and space not allowed </p>"
      );
      return false;
    } else if (!pic_loc_reg.test(Pic_location)) {
      return false;
    } else {
      $("#PerrMsg").empty();
    }

    if (Drop_location == "") {
      $("#Drop-off location").css("border", "2px solid red");
      $("#derrMsg").html(
        "<p class='text-danger'>This Field must be Characteristic and space not allowed </p>"
      );
      return false;
    } else if (!Drop_loc_reg.test(Drop_location)) {
      return false;
    } else {
      $("#derrMsg").empty();
    }
    if (pic_date == "") {
      $("#book_pick_date").css("border", "2px solid red");
      $("#DerrMsg").html("<p class='text-danger'>This Field Is Required </p>");
      return false;
    } else {
      $("#DerrMsg").empty();
    }

    if (drop_date == "") {
      $("#book_off_date").css("border", "2px solid red");
      $("#berrMsg").html("<p class='text-danger'>This Field Is Required </p>");
      return false;
    } else {
      $("#berrMsg").empty();
    }

    if (pic_time == "") {
      $("#time_pick").css("border", "2px solid red");
      $("#terrMsg").html("<p class='text-danger'>This Field Is Required </p>");
      return false;
    } else {
      $("#terrMsg").empty();
    }

    console.log(
      v_id,
      Pic_location,
      Drop_location,
      pic_date,
      drop_date,
      pic_time
    );

    //! payment gate way

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        // console.log(xhttp.response);

        if (xhttp.response == "1") {
          alertify.set("notifier", "position", "top-right");
          alertify.error("Login To Continue");
          $('#Book_frm').trigger("reset");
        //  setInterval(window.location ="index.php",10000);
 
          
        } else {
          var obj = JSON.parse(xhttp.responseText);
          console.log(obj);

          // ! Payment completed. It can be a successful failure.
          payhere.onCompleted = function onCompleted(orderId) {
            
            alertify.set("notifier", "position", "top-right");
            alertify.success("Booking Added Successfully");
            console.log("Payment completed. OrderID:" + orderId);
            // Note: validate the payment and show success or failure page to the customer
            $('#Book_frm').trigger("reset");
            
            AddBooking(orderId,v_id,Pic_location,Drop_location,pic_date,drop_date,pic_time)
          };

          //! Payment window closed
          payhere.onDismissed = function onDismissed() {
            // Note: Prompt user to pay again or show an error page
            alertify.set("notifier", "position", "top-right");
            alertify.error("Payment dismissed");
            $('#Book_frm').trigger("reset");
          // setTimeout( window.location.href="http://localhost/carbook-master/Booking.php?v_id="+v_id, 200000 );
          };

          //! Error occurred
          payhere.onError = function onError(error) {
            // Note: show an error page
            console.log("Error:" + error);
          };

          //! Put the payment variables here
          var payment = {
            sandbox: true,
            merchant_id: "1223196", // Replace your Merchant ID
            return_url: "http://localhost/carbook-master/Booking.php?v_id="+v_id, // Important
            cancel_url: "http://localhost/carbook-master/Booking.php?v_id="+v_id, // Important
            notify_url: "http://sample.com/notify",
            order_id: obj["order_id"],
            items: obj["V_name"],
            amount: obj["v_price"],
            currency: obj["currency"],
            hash: obj["hash"], // *Replace with generated hash retrieved from backend
            first_name: obj["user_name"],
            last_name: obj["user_name"],
            email: obj["user_email"],
            phone: obj["user_Mobile"],
            address: "",
            city: "Colombo",
            country: "Sri Lanka",
            custom_1: "",
            custom_2: "",
          };

          //! Show the payhere.js popup, when "PayHere Pay" is clicked
          payhere.startPayment(payment);
        }
      }
    };

    xhttp.open("GET", "./User/UserBooking.php?v_id=" + v_id, true);
    xhttp.send();
  });




 
});

function AddBooking(orderId,v_id,Pic_location,Drop_location,pic_date,drop_date,pic_time)
{
   var form = new FormData();
   form.append("orderId",orderId);
   form.append("v_id",v_id);
   form.append("Pickup_location",Pic_location);
   form.append("Drop_location",Drop_location);
   form.append("pickup_date",pic_date);
   form.append("drop_date",drop_date);
   form.append("pic_time",pic_time);

   var xhttp = new XMLHttpRequest();

   xhttp.onreadystatechange = ()=>{
       if (xhttp.readyState == 4 && xhttp.status == 200)
       {
        // console.log(xhttp.response);

        if (xhttp.response == "1") {
          alertify.set("notifier", "position", "top-right");
          alertify.success("Booking Added Successfully");
          window.location="index.php";
        }
       }
   }
   
   xhttp.open("POST","./User/AddBooking.php",true);
   xhttp.send(form);
}