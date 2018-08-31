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

  $events = $_REQUEST['event'];
  $tickets = false;
  $setup = false;
  $cleanup = false;
  $advertising = false;
  $other = false;
  $eventsValid = false;
  if(is_array($events)){
    foreach($events as $event){
      if($event == 'Tickets'){
        $tickets = true;
      }
      if($event == 'Setup'){
        $setup = true;
      }
      if($event == 'Cleanup'){
        $cleanup = true;
      }
      if($event == 'Advertising'){
        $advertising = true;
      }
      if($event == 'Other'){
        $other = true;
      }
    }
  }else{
    if($events == 'Tickets'){
      $tickets = true;
    }
    if($events == 'Setup'){
      $setup = true;
    }
    if($events == 'Cleanup'){
      $cleanup = true;
    }
    if($events == 'Advertising'){
      $advertising = true;
    }
    if($events == 'Other'){
      $other = true;
    }
  }
  if($tickets || $setup || $cleanup || $advertising || $other){
    $eventsValid = true;
  }

  $formValid = $fnameValid && $commentValid && $emailValid && $phoneValid && $eventsValid;
  // if valid, allow submission
  if ($formValid) {
    // redirect to formSubmitted.php
    session_start();
    $_SESSION['fname'] = $firstName;
    $_SESSION['comment'] = $comment;
    $_SESSION['phone'] = $phoneNumber;
    $_SESSION['event'] = $events;
    $_SESSION['email'] = $email;
    header("Location: volunteerredirect.php");
    return;
  }
} else {
  // no form submitted
  // put default behavior here
  $fnameValid = true;
  $commentValid = true;
  $phoneValid = true;
  $eventsValid = true;
  $emailValid = true;
}
?>
<!DOCTYPE html>
<html>
<?php include("includes/navigation.php"); ?>
<head>
  <meta charset="UTF-8">
  <title>Volunteer</title>
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="scripts/volunteerValidation.js" type="text/javascript"></script>
</head>

<body>
  <h1 class="Title"> Volunteer at BRT 2018! </h1>

  <h2>Who are Dance Marathon Volunteers?</h2>

<p>Dance Marathon Volunteers are Rutgers students who are interested in helping the Marathon run, but with a smaller time commitment than a Captain position.</p>

<h2>What do Volunteers do?</h2>

<p>Students who register as Volunteers raise $100 to participate, and Volunteers are selected based on when they raise their minimums, either by the deadline, or until all 200 spots are filled.</p>

<p>Volunteers will be assigned one shift during DM weekend and will mainly assist the Event Logistics team.</p>

<h2>When do Volunteers help out?</h2>

<p>Dance Marathon Volunteers only assist during Marathon Weekend for set-up, clean-up, and during either session.</p>

  <!--Button linking to team application form-->
  <h3> If you're interested in volunteering for the next BRT, please fill out the information below! </h3>
  <form method="post" action="/Volunteer.php" id="mainForm" novalidate>
    All form elements are required. <br><br>

    Name:<br>
    <div class="inputHolder">
      <input type="text" name="firstname" id="firstName" value="<?php echo($firstName);?>" required><br>
    </div>
    <span class="errorContainer <?php if ($fnameValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="fnameError">
    Name is required.
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

    <p> What would you like to help with?: </p>
      <div class="checkHolder">
        <input type="checkbox" name="event[]" id="checkbox1" value="Tickets"
        <?php if ($tickets) { echo ("checked"); }?>> Tickets<br>
        <input type="checkbox" name="event[]" id="checkbox2" value="Setup"
        <?php if ($setup) { echo ("checked"); }?>> Set up<br>
        <input type="checkbox" name="event[]" id="checkbox3" value="Cleanup"
        <?php if ($cleanup) { echo ("checked"); }?>> Clean up<br>
        <input type="checkbox" name="event[]" id="checkbox4" value="Advertising"
        <?php if ($advertising) { echo ("checked"); }?>> Advertising<br>
        <input type="checkbox" name="event[]" id="checkbox5" value="Other"
        <?php if ($other) { echo ("checked"); }?>> Other<br>
      </div>
      <span class="errorContainer <?php if ($eventsValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="eventError">
        An action is required.
      </span>

    <p> Please list your time preferences: </p>
    <div class="checkHolder">
      <textarea name="message" rows="10" cols="30" id="commentBox" value="<?php echo($comment);?>" required><?php echo($comment);?></textarea>
    </div>
    <span class="errorContainer <?php if ($commentValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="commentError">
      A description is required.
    </span>

    <br>
    <input name="submitButton" type="submit" class="submit" value="Submit">
  </form>

</body>

</html>
