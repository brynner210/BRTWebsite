<?php
session_start();
$firstname = $_SESSION['fname'];
$groupname = $_SESSION['gname'];
$comments = $_SESSION['comment'];
$phoneNumber = $_SESSION['phone'];
$link = $_SESSION['url'];
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
  <h1> Form Submitted!</h1>
  <p> Thanks for reaching out, <span class="echo"><?php echo($firstname); ?></span>. </p>
    <p> We will contact you shortly about your request for <span class="echo">
      <?php echo($groupname); ?></span> to perform at BRT via your phone <span class="echo"><?php echo($phoneNumber); ?></span>
      or email <span class="echo"><?php echo($email); ?></span>.</p>
    <p> You gave us the following link to a previous performance: <span class="echo"><?php echo($link); ?></span>.</p>
    <p> For a description of your act, you answered:</p>
    <p> <span class="echo"><?php echo($comments); ?></span></p>

</div>
</body>
</html>
