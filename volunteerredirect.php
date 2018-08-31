<?php
session_start();
$firstname = $_SESSION['fname'];
$comments = $_SESSION['comment'];
$phoneNumber = $_SESSION['phone'];
$events = $_SESSION['event'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>My Title</title>
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <?php include ("includes/navigation.php");?>
  <h1> You applied to volunteer at BRT 2018! </h1>
  <p> Thanks for reaching out, <span class="echo"><?php echo($firstname); ?></span>. </p>
  <p> We will contact you shortly about your request to volunteer at BRT via
    your phone <span class="echo"><?php echo($phoneNumber); ?></span>
    or email <span class="echo"><?php echo($email); ?></span>.</p>
    <p> You preferred the following volunteering activities: <br><span class="echo">
      <?php foreach($events as $event) {
        echo $event, '<br />';
      }?></span>
    </p>
    <p> For time preferences, you answered:</p>
    <p> <span class="echo"><?php echo($comments); ?></span></p>

  </div>
</body>
</html>
