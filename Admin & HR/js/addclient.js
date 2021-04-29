$("button#submit").click( function() {
 
  if( $("#name").val() == "" || $("#email").val() == "" || $("#phn").val() == ""|| $("#ads").val() == "" )
    $("div#ack").html("Please enter your name,email,phone number and address");
  else
    $.post( $("#add").attr("action"),
        $("#add :input").serializeArray(),
function(data) {
  $("div#ack").html(data);
});
 
$("#add").submit( function() {
   return false;
});
 
});