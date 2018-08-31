<?php
// Get information about the form
$submit = $_REQUEST["submitButton"];
// Stores the name of the class for hidden error messages
$HIDDEN_ERROR_CLASS = "hiddenError";
// when the user submits a form
if (isset($submit)) {
  $firstName = $_REQUEST['firstname'];
  // if the first name field is not empty:
  $firstName = htmlspecialchars($firstName);
  If ( !empty($firstName) ) {
    // the first name field is valid
    $fnameValid = true;
  } else {
    // the first name field is not valid
    $fnameValid = false;
  }
  $groupName = $_REQUEST['groupname'];
  $groupName = htmlspecialchars($groupName);
  // if the first name field is not empty:
  If ( !empty($groupName) ) {
    // the first name field is valid
    $groupValid = true;
  } else {
    // the first name field is not valid
    $groupValid = false;
  }
  $comment = $_REQUEST['message'];
  $comment = htmlspecialchars($comment);
  // if the first name field is not empty:
  If ( !empty($comment) ) {
    // the first name field is valid
    $commentValid = true;
  } else {
    // the first name field is not valid
    $commentValid = false;
  }

  $email = $_REQUEST['email'];
  $isEmailEmpty = empty($email);
  $isEmailAddress = filter_var($email, FILTER_VALIDATE_EMAIL);
  $emailValid = !$isEmailEmpty && $isEmailAddress;

  $phoneNumber = $_REQUEST['phone'];
  $phoneNumber = htmlspecialchars($phoneNumber);
  $phoneValid = !empty($phoneNumber);

  $link = $_REQUEST['link'];
  $isLinkEmpty = empty($link);
  $isURL = filter_var($link, FILTER_VALIDATE_URL);
  $urlValid = !$isLinkEmpty && $isURL;

  $formValid = $fnameValid && $groupValid && $commentValid && $emailValid && $phoneValid && $urlValid;
  // if valid, allow submission
  if ($formValid) {
    // redirect to formSubmitted.php
    session_start();
    $_SESSION['fname'] = $firstName;
    $_SESSION['gname'] = $groupName;
    $_SESSION['comment'] = $comment;
    $_SESSION['phone'] = $phoneNumber;
    $_SESSION['url'] = $link;
    $_SESSION['email'] = $email;
    header("Location: performerredirect.php");
    return;
  }
} else {
  // no form submitted
  // put default behavior here
  $fnameValid = true;
  $groupValid = true;
  $commentValid = true;
  $phoneValid = true;
  $urlValid = true;
  $emailValid = true;
}
?>
<!DOCTYPE html>
<html>
<?php include("includes/navigation.php"); ?>
<head>
  <meta charset="UTF-8">
  <title>Perform</title>
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="scripts/performValidation.js" type="text/javascript"></script>
</head>

<body>
  <!--Paragraph about the performing-->
  <div>
    <h1>Performing at BRT 2018</h1>

    <p>
    Dancers are the most vital part of any Dance Marathon. Dancers at Big Red Thon will help create and maintain the energy and excitement of the event, and are truly the ones who will make Big Red Thon a lasting experience for our Miracle Families from Upstate Golisano Children’s Hospital. Dancers commit to stay for the entirety of the Event, and will be expected to remain on their feet the entire time. This time will fly by, as dancers play games, enjoy entertainment, and most importantly interact with the children from the hospital who come out to the event. Being a dancer also means registering and committing to fundraise for Upstate Golisan Children's Hospital.
    </p>
  </div>

  <!--Button linking to team application form-->
  <h3> If you're interested in performing for the next BRT, please fill out the information below! </h3>
  <form method="post" action="/perform.php" id="mainForm" novalidate>
    All form elements are required. <br><br>

    Name:<br>
    <div class="inputHolder">
      <input type="text" name="firstname" id="firstName" value="<?php echo($firstName);?>" required><br>
    </div>
    <span class="errorContainer <?php if ($fnameValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="fnameError">
    Name is required.
    </span>

    <div class="labelHolder">
      Group Name:<br>
    </div>
    <div class="inputHolder">
      <input type="text" name="groupname" id="groupName" value="<?php echo($groupName);?>" required><br>
    </div>
    <span class="errorContainer <?php if ($groupValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="groupnameError">
      Group name is required.
    </span>

    <div class="labelHolder">
      Email:<br>
    </div>
    <div class="inputHolder">
      <input type="email" name="email" id="emailName" value="<?php echo($email);?>" required><br>
    </div>
    <span class="errorContainer <?php if ($emailValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="emailError">
      Valid email is required.
    </span>

    <div class="labelHolder">
      Phone Number:<br>
    </div>
    <div class="inputHolder">
      <input type="text" name="phone" id="phoneNumber" value="<?php echo($phoneNumber);?>" required><br>
    </div>
    <span class="errorContainer <?php if ($phoneValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="phoneError">
      Phone number is required.
    </span>

    <p> Please describe your act: </p>
    <div class="checkHolder">
      <textarea name="message" rows="10" cols="30" id="commentBox" value="<?php echo($comment);?>" required><?php echo($comment);?></textarea>
    </div>
    <span class="errorContainer <?php if ($commentValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="commentError">
      A description is required.
    </span>

    <p> Please provide a link to a recent performance video (Youtube / Vimeo / Google Drive preferred): </p>
    <div class="inputHolder">
      <input type="url" name="link" id="urlLink" value="<?php echo($link);?>" required><br>
    </div>
    <span class="errorContainer <?php if ($urlValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="urlError">
    A valid url is required.
    </span>

    <br>
    <input name="submitButton" type="submit" class="submit" value="Submit">
  </form>

</body>

</html>
