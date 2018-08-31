<?php
session_start();

$donationAmt = $_SESSION['donationAmt'];
unset($_SESSION['donationAmt']);

$companyName = $_SESSION["companyName"];
unset($_SESSION['companyName']);

$contactPerson = $_SESSION["contactPerson"];
unset($_SESSION['contactPerson']);

$title = $_SESSION["title"];
unset($_SESSION["title"]);

$phone = $_SESSION["phone"];
unset($_SESSION["phone"]);

$email = $_SESSION["email"];
unset($_SESSION["email"]);

$address = $_SESSION["address"];
unset($_SESSION["address"]);

$city = $_SESSION["city"];
unset($_SESSION["city"]);

$state = $_SESSION["state"];
unset($_SESSION["state"]);

$zip = $_SESSION["zip"];
unset($_SESSION["zip"]);

$submit = $_SESSION["submit"];
unset($_SESSION["submit"]);
?>

<!DOCTYPE html>

<html>
  <head>
    <?php include("includes/navigation.php"); ?>
  </head>

  <body>

    <p>Thank you for your generosity! We will reach out to you personally within the next 3 business days.</p>

  </body>
</html>
