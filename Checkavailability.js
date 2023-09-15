function CheckAvailability()
{
  var pick_Location = $("#pick_location").val();
  var Drop_location = $("#Drop_up_location").val();
  var Book_pick_date = $("#book_pick_date").val();
  var book_off_date = $("#book_off_date").val();
  var time_pick = $("#time_pick").val();
    console.log(pick_Location,Drop_location,Book_pick_date,book_off_date,time_pick)
  if(pick_Location == "")
  {
    $("#picMsg").html("<p class='text-danger'>This Field Is Required </p>");
    return false
  }
  else{
    $("#picMsg").empty();
  }

  if(Drop_location == "")
  {
    $("#DMsg").html("<p class='text-danger'>This Field Is Required </p>");
    return false
  }
  else{
    $("#DMsg").empty();
  }

  if(Book_pick_date == "")
  {
    $("#PMsg").html("<p class='text-danger'>This Field Is Required </p>");
    return false
  }
  else{
    $("#PMsg").empty();
  }

  if(book_off_date  == "")
  {
    $("#BMsg").html("<p class='text-danger'>This Field Is Required </p>");
    return false
  }
  else{
    $("#BMsg").empty();
  }

  if(time_pick == "")
  {
    $("#TMsg").html("<p class='text-danger'>This Field Is Required </p>");
    return false
  }
  else{
    $("#TMsg").empty();
  }
 

console.log(pick_Location,Drop_location,Book_pick_date,book_off_date,time_pick)
var form = new FormData();
form.append("Pick_Location", pick_Location);
form.append("Drop_location", Drop_location);
form.append("Book_pick_date", Book_pick_date);
form.append("book_off_date", book_off_date);
form.append("time_pick", time_pick);

$.ajax({
  type: "POST",
  url: "checkavailability.php",
  data: form,
  contentType: false,
  processData: false,
  success: function (Data,status) {
    if(Data == 1)
    {
      alertify.set("notifier", "position", "top-right");
      alertify.error("You cannot Book These days");
      // $('#Book_frm').trigger("reset");
    }
    else{
      window.location.replace("http://localhost/carbook-master/car.php");
    }
  }
});
}