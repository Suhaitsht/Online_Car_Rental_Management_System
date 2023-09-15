$(document).ready(function () {


$("#vname").keyup(function () {
  if (validateName()) {
    $("#vname").css("border", "2px solid green");
    $("#Vmsg").html("<p class='text-success'>Valid Name </p>");
   
  } else {
    $("#vname").css("border", "2px solid red");
    $("#Vmsg").html(
      "<p class='text-danger'>Enter Valid Name</p>"
    );
  }
});

function validateName() {
  var name = $("#vname").val();
  var reg =/^[a-zA-Z0-9\s]+$/;

  if (reg.test(name)) {
    return true;
  } else {
    return false;
  }
}
$("#vprice").keyup(function () {
  if (validatePrise()) {
    $("#vprice").css("border", "2px solid green");
    $("#Vpr").html("<p class='text-success'>Valid </p>");
  } else {
    $("#vprice").css("border", "2px solid red");
    $("#Vpr").html("<p class='text-danger'>Enter prise </p>");
  }
});

function validatePrise() {
  var prise = $("#vprice").val();
  var reg = /^\d{1,5}(,\d{3})*(\.\d{3})?$/;

  if (reg.test(prise)) {
    return true;
  } else {
    return false;
  }
}

$("#vdesc").keyup(function () {
  if (validateDescription()) {
    $("#vdesc").css("border", "2px solid green");
    $("#Vdes").html("<p class='text-success'>Valid </p>");
  } else {
    $("#vdesc").css("border", "2px solid red");
    $("#Vdes").html("<p class='text-danger'>Enter Vehicle Description </p>");
  }
});

function validateDescription() {
  var Vdescription = $("#vdesc").val();
  var reg =/^[a-zA-Z0-9\s,()]+$/;

  if (reg.test(Vdescription)) {
    return true;
  } else {
    return false;
  }
}
$("#seatcap").keyup(function () {
  if (validateseatcapacity()) {
    $("#seatcap").css("border", "2px solid green");
    $("#Vcap").html("<p class='text-success'>Valid </p>");
  } else {
    $("#seatcap").css("border", "2px solid red");
    $("#Vcap").html("<p class='text-danger'>Enter Vehicle Description </p>");
  }
});

function validateseatcapacity() {
  var Seat_Capacity = $("#seatcap").val();
  var reg = /^[a-zA-Z0-9\s]+$/;

  if (reg.test(Seat_Capacity)) {
    return true;
  } else {
    return false;
  }
}
$("#mileage").keyup(function () {
  if (validatemileage()) {
    $("#mileage").css("border", "2px solid green");
    $("#Merr").html("<p class='text-success'>Valid </p>");
  } else {
    $("#mileage").css("border", "2px solid red");
    $("#Merr").html("<p class='text-danger'>Enter Vehicle milage </p>");
  }
});

function validatemileage() {
  var mileage = $("#mileage").val();
  var reg = /^\d{1,5}(,\d{3})*(\.\d{3})?$/;

  if (reg.test(mileage)) {
    return true;
  } else {
    return false;
  }
}
$("#luggage").keyup(function () {
  if (validateluggage()) {
    $("#luggage").css("border", "2px solid green");
    $("#Lerr").html("<p class='text-success'>Valid </p>");
  } else {
    $("#luggage").css("border", "2px solid red");
    $("#Lerr").html("<p class='text-danger'>Enter luggage </p>");
  }
});

function validateluggage() {
  var luggage = $("#luggage").val();
  var reg = /^[a-zA-Z0-9\s]+$/;

  if (reg.test(luggage)) {
    return true;
  } else {
    return false;
  }
}

$("#myform").on('submit',function (e) {
  e.preventDefault();
  let formdata = new FormData();
  // e.preventDefault();
  name_reg = /^[a-zA-Z0-9\s]+$/;  
  vdes_reg = /^[a-zA-Z0-9\s,()]+$/;
  price_reg = /^\d{1,5}(,\d{3})*(\.\d{3})?$/;
  Seat_reg = /^[a-zA-Z0-9\s]+$/;
  Milage_reg = /^\d{1,5}(,\d{3})*(\.\d{3})?$/;
  luggage_reg = /^[a-zA-Z0-9\s]+$/;

  let Vname = $("#vname").val();

  if (Vname == "") {
    $("#vname").css("border", "2px solid red");
    $("#Vmsg").html("<p class='text-danger'>Name Field is required </p>");
    return false;
  } else if (!name_reg.test(Vname)) {
    return false;
  }

  // alert(Vname);

  let Vprice = $("#vprice").val();

  if (Vprice == "") {
    $("#vprice").css("border", "2px solid red");
    $("#Vpr").html("<p class='text-danger'>This Field is required </p>");
    return false;
  } else if (!price_reg.test(Vprice)) {
    return false;
  }

  let Vdescription = $("#vdesc").val();

  if (Vdescription == "") {
    $("#vdesc").css("border", "2px solid red");
    $("#Vdes").html("<p class='text-danger'>This Field is required </p>");
    return false;
  } else if (!vdes_reg.test(Vdescription)) {
    return false;
  }

  let Seat_Capacity = $("#seatcap").val();

  if (Seat_Capacity == "") {
    $("#seatcap").css("border", "2px solid red");
    $("#Vcap").html("<p class='text-danger'>This Field is required </p>");
    return false;
  } else if (!Seat_reg.test(Seat_Capacity)) {
    return false;
  }

  let Fueltype = $("#ftype").val();

  if (Fueltype === "") {
    $("#ftype").css("border", "2px solid red");
    $("#Ferr").html("<p class='text-danger'>This Field is required </p>");
    return false;
  } else {
    $("#ftype").css("border", "2px solid green");
    $("#Ferr").html("<p class='text-success'>Valid </p>");
  }

  // alert(Filetype);

  let Transmission = $("#Transmission").val();
  if (Transmission === "") {
    $("#Transmission").css("border", "2px solid red");
    $("#Terr").html("<p class='text-danger'>This Field is required </p>");
    return false;
  } else {
    $("#Transmission").css("border", "2px solid green");
    $("#Terr").html("<p class='text-success'>Valid </p>");
  }

  let Brands = $("#brands").val();
  if (Brands === "") {
    $("#brands").css("border", "2px solid red");
    $("#Berr").html("<p class='text-danger'>This Field is required </p>");
    return false;
  } else {
    $("#brands").css("border", "2px solid green");
    $("#Berr").html("<p class='text-success'>Valid </p>");
  }

  let Milage = $("#mileage").val();

  if (Milage == "") {
    $("#mileage").css("border", "2px solid red");
    $("#Merr").html("<p class='text-danger'>Name Field is required </p>");
    return false;
  } else if (!Milage_reg.test(Milage)) {
    return false;
  }

  let luggage = $("#luggage").val();

  if (luggage == "") {
    $("#luggage").css("border", "2px solid red");
    $("#Lerr").html("<p class='text-danger'>luggage Field is required </p>");
    return false;
  } else if (!luggage_reg.test(luggage)) {
    return false;
  }
  // alert(luggage );
  var image = $("#carpic")[0].files[0];
  if (image == "") {
    $("#carpic").css("border", "2px solid red");
    $("#imgerr").html("<p class='text-danger'>filed Field is required </p>");
    return false;
  } else {
    $("#carpic").css("border", "2px solid green");
    $("#imgerr").html("<p class='text-success'>Valid </p>");
  }

  var Ac = $(".Ac");
  var AcValue;
  if (Ac.is(":checked")) {
    AcValue = 1;
  } else {
    AcValue = 0;
  }

  var seatbeld = $(".seat");
  var seatBeldValue;
  if (seatbeld.is(":checked")) {
    seatBeldValue = 1;
  } else {
    seatBeldValue = 0;
  }

  var Audio = $(".Audio");
  var AudioValue;
  if (Audio.is(":checked")) {
    AudioValue = 1;
  } else {
    AudioValue = 0;
  }

  var P_bags= $(".PassengerBage");
  // alert(P_bags);
  var PassengerBageValue;

  if (P_bags.is(":checked")) {
    PassengerBageValue = 1;
  } else {
    PassengerBageValue = 0;
  }

  var AutoDoor = $(".AutoDoor");
  var AutoDoorValue;
  if (Audio.is(":checked")) {
    AutoDoorValue = 1;
  } else {
    AutoDoorValue = 0;
  }

  var Bluetooth = $(".Bluetooth");
  var BluetoothValue;
  if (Bluetooth.is(":checked")) {
    BluetoothValue = 1;
  } else {
    BluetoothValue = 0;
  }

  var AutoDoor = $(".AutoDoor");
  var AutoDoorValue;
  if (AutoDoor.is(":checked")) {
    AutoDoorValue = 1;
  } else {
    AutoDoorValue = 0;
  }

  var climateControl = $(".climateControl");
  var climateControlValue;
  if (climateControl.is(":checked")) {
    climateControlValue = 1;
  } else {
    climateControlValue = 0;
  }

  var kit = $(".kit");
  var CarkitValue;
  if (kit.is(":checked")) {
    CarkitValue = 1;
  } else {
    CarkitValue = 0;
  }

  var Rcontrol = $(".Rcontrol");
  var RcontrolValue;
  if (Rcontrol.is(":checked")) {
    RcontrolValue = 1;
  } else {
    RcontrolValue = 0;
  }

  var Luggage = $(".Luggage");
  var LuggageValue;
  if (Luggage.is(":checked")) {
    LuggageValue = 1;
  } else {
    LuggageValue = 0;
  }

  var cGPS = $(".GPS");
  var GPSValue;
  if (cGPS.is(":checked")) {
    GPSValue = 1;
  } else {
    GPSValue = 0;
  }

  var Bluetooth = $(".Bluetooth");
  var BluetoothValue;
  if (Bluetooth.is(":checked")) {
    BluetoothValue = 1;
  } else {
    BluetoothValue = 0;
  }
  var Break = $(".Break");
  var BreakValue;
  if (Break.is(":checked")) {
    BreakValue = 1;
  } else {
    BreakValue = 0;
  }

  var Feature = $(".Feature");
  var FeatureValue;
  if (Feature.is(":checked")) {
    FeatureValue = 1;
  } else {
    FeatureValue = 0;
  }
  // alert(CarkitValue)
  formdata.append("Brands", Brands);
  formdata.append("Vname", Vname);
  formdata.append("Vprice", Vprice);
  formdata.append("Vdescription", Vdescription);
  formdata.append("Seat_Capacity", Seat_Capacity);
  formdata.append("Fueltype", Fueltype);
  formdata.append("Transmission", Transmission);
  formdata.append("Milage", Milage);
  formdata.append("luggage", luggage);
  formdata.append("vimage", image);
  formdata.append("Ac", AcValue);
  formdata.append("seatBeld", seatBeldValue);
  formdata.append("Audio", AudioValue);
  formdata.append("PassengerBage", PassengerBageValue);
  formdata.append("AutoDoor", AutoDoorValue);
  formdata.append("climateControl", climateControlValue);
  formdata.append("Carkit", CarkitValue);
  formdata.append("Rcontrolloking", RcontrolValue);
  formdata.append("Luggage", LuggageValue);
  formdata.append("GPS", GPSValue);
  formdata.append("Bluetooth", BluetoothValue);
  formdata.append("Break", BreakValue);
  formdata.append("Feature", FeatureValue);
  $.ajax({
    type: "POST",
    url: "postVehical.php",
    data: formdata,
    contentType: false,
    processData: false,
    success: function (Data, status) {
  
        $('#myform').trigger("reset");
        // $("#res").trigger("change");
        
        $(
          "#vprice, #vname, #vdesc, #seatcap, #ftype, #Transmission, #brands, #mileage, #luggage, #carpic"
        ).css("border","");
     
        $("#ftype, #Transmission, #brands").trigger("reset");
        $(
          "#Vpr, #Vmsg, #Vdes, #Vcap, #Ferr, #Terr, #Berr, #Merr, #Lerr, #imgerr"
        ).empty();
        // $("form-group").css("border","");
        $(".res").css("border","");
        $("textarea").css("border","");

      alertify.set("notifier", "position", "top-right");
      alertify.success(Data);

    },
    error: function (xhr, status, error) {
      alertify.set("notifier", "position", "top-right");
      alertify.error("There was an error submitting the form: " + error);
    },
  });
});
});