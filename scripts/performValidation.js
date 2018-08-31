// On load
$(document).ready(function () {
  $("#mainForm").on("submit", function() {
    formValid = true;
    firstNameIsValid = $("#firstName").prop("validity").valid;
    if(firstNameIsValid) {
      $("#fnameError").hide();
    } else {
      $("#fnameError").show();
      formValid = false;
    }
    groupNameIsValid = $("#groupName").prop("validity").valid;
    if(groupNameIsValid) {
      $("#groupnameError").hide();
    } else {
      $("#groupnameError").show();
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

    commentIsValid = $("#commentBox").prop("validity").valid;
    if(commentIsValid) {
      $("#commentError").hide();
    } else {
      $("#commentError").show();
      formValid = false;
    }

    urlIsValid = $("#urlLink").prop("validity").valid;
    if(groupNameIsValid) {
      $("#urlError").hide();
    } else {
      $("#urlError").show();
      formValid = false;
    }
    return formValid;
  });
});
