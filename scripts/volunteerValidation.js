// On load
$(document).ready(function () {
  $("#mainForm").on("submit", function() {
    formValid = true;
    nameIsValid = $("#firstName").prop("validity").valid;
    if(nameIsValid) {
      $("#fnameError").hide();
    } else {
      $("#fnameError").show();
      formValid = false;
    }

    emailIsValid = $("#emailName").prop("validity").valid;
    if(emailIsValid) {
      $("#emailError").hide();
    } else {
      $("#emailError").show();
      formValid = false;
    }

    phoneIsValid = $("#phoneNumber").prop("validity").valid;
    if(phoneIsValid) {
      $("#phoneError").hide();
    } else {
      $("#phoneError").show();
      formValid = false;
    }

    if($("#checkbox1").is(":checked") || $("#checkbox2").is(":checked") || $("#checkbox3").is(":checked") || $("#checkbox4").is(":checked") || $("#checkbox5").is(":checked")) {
      $("#eventError").hide();
    } else {
      $("#eventError").show();
      formValid = false;
    }

    commentIsValid = $("#commentBox").prop("validity").valid;
    if(commentIsValid) {
      $("#commentError").hide();
    } else {
      $("#commentError").show();
      formValid = false;
    }
    return formValid;
  });
});
