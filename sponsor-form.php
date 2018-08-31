<?php
// Get parameters from HTTP request
$donationAmt = $_REQUEST["donationAmt"];
$companyName = $_REQUEST["companyName"];
$contactPerson = $_REQUEST["contactPerson"];
$title = $_REQUEST["title"];
$phone = $_REQUEST["phone"];
$email = $_REQUEST["email"];
$address = $_REQUEST["address"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zip = $_REQUEST["zip"];

if (isset($submit)) {

  //donation amt

  if ($donationAmt == '$300' || $donationAmt == '$500' || $donationAmt == '$750' || $donationAmt == '$1000' || $donationAmt == '$1500' || $donationAmt == '$2000' || $donationAmt == '$2500'){
    $isDonationAmtValid = true;
  }

  //name
  $isCompanyNameValid = !empty($companyName);

  //contact person
  $isContactPersonValid = !empty($contactPerson);

  //title
  $isTitleValid = !empty($title);

  //phone
  $isPhoneValid = !empty($phone);

  //email
  $isEmailEmpty = empty($email);
  $isEmailAddress = filter_var($email, FILTER_VALIDATE_EMAIL);
  $isEmailValid = !$isEmailEmpty && $isEmailAddress;

  //address
  $isAddressValid = !empty($address);

  //city
  $isCityValid = !empty($city);

  //state
  $isWhyValid = !empty($state);

  //zip
  $isZipValid = empty($zip);

  //ALL
  $allValid = $isDonationAmtValid && $isCompanyNameValid && $isContactPersonValid && $isTitleValid && $isPhoneValid && $isEmailValid && $isAddressValid && $isCityValid && $isStateValid && $isZipValid;

  if ($allValid) {
    // create session to pass values to redirected page
    session_start();
      $_SESSION['donationAmt'] = $donationAmt;
      $_SESSION["companyName"] = $companyName;
      $_SESSION["contactPerson"] = $contactPerson;
      $_SESSION["title"] = $title;
      $_SESSION["phone"] = $phone;
      $_SESSION["email"] = $email;
      $_SESSION["address"] = $address;
      $_SESSION["city"] = $city;
      $_SESSION["state"] = $state;
      $_SESSION["zip"] = $zip;
      $_SESSION["cardnumber"] = $cardnumber;
      $_SESSION["expiration"] = $expiration;
      $_SESSION["cvv"] = $cvv;
      $_SESSION["submit"] = $submit;

    // redirect to to submit page
    header("Location: thanks.php");
    return;
  }

} else {
  $allValid = true;
}

?>

<!DOCTYPE html>
 <html>
   <head>
     <link rel="stylesheet" type="text/css" href="style/all.css" media="all"/>
     <meta charset="UTF-8">
     <title>Home</title>
     <?php include("includes/navigation.php"); ?>
     <h1 class="header"> Become A Sponsor!</h1>
   </head>

   <body>

<!--FORM-->
     <form method="post" action="thanks.php" id="mainForm">

<h2>Donation</h2>

<!--Donation Amount-->
      <div class="form-module">
        <div class="form-label">
          <label for="donationAmt">Donation Amount: *</label>
        </div>
        <div class="form-input">
          <input type="radio" name="donationAmt" value="$300" checked> $300<br>
          <input type="radio" name="donationAmt" value="$500"> $500<br>
          <input type="radio" name="donationAmt" value="$750"> $750<br>
          <input type="radio" name="donationAmt" value="$1000"> $1000<br>
          <input type="radio" name="donationAmt" value="$1500"> $1500<br>
          <input type="radio" name="donationAmt" value="$2000"> $2000<br>
          <input type="radio" name="donationAmt" value="$2500"> $2500<br>
        </div>
      </div>

<h2>Donor information</h2>

<!--Company Name-->
      <div class="form-module">
        <div class="form-label">
          <label for="companyName">Company Name: *</label>
        </div>
        <div class="form-input">
          <input id="companyName" name="companyName" placeholder="Company Name" required>
        </div>
      </div>

<!--Contact Person-->
      <div class="form-module">
        <div class="form-label">
          <label for="contactPerson">Contact Person: *</label>
        </div>
        <div class="form-input">
          <input id="contactPerson" name="contactPerson" placeholder="Contact Person" required>
        </div>
      </div>

<!--Title-->
      <div class="form-module">
        <div class="form-label">
          <label for="title">Title: *</label>
        </div>
        <div class="form-input">
          <input id="title" name="title" placeholder="Title" required>
        </div>
      </div>

<!--Contact Phone Number-->
      <div class="form-module">
        <div class="form-label">
          <label for="phone">Contact Phone Number: *</label>
        </div>
        <div class="form-input">
          <input id="phone" name="phone" placeholder="Phone" required>
        </div>
      </div>

<!--Contact Email Address-->
      <div class="form-module">
        <div class="form-label">
          <label for="email">Contact Phone Number: *</label>
        </div>
        <div class="form-input">
          <input id="email" name="email" placeholder="Email" required>
        </div>
      </div>

<!--Mailing Address-->
      <div class="form-module">
        <div class="form-label">
          <label for="address">Mailing Address: *</label>
        </div>
        <div class="form-input">
          <input id="address" name="address" placeholder="Address" required>
        </div>
      </div>

<!--City-->
      <div class="form-module">
        <div class="form-label">
          <label for="city">City: *</label>
        </div>
        <div class="form-input">
          <input id="city" name="city" placeholder="City" required>
        </div>
      </div>

<!--State-->
      <div class="form-module">
        <div class="form-label">
          <label for="state">State: *</label>
        </div>
        <div class="form-input">
          <input id="state" name="state" placeholder="State" required>
        </div>
      </div>

<!--Zip Code-->
      <div class="form-module">
        <div class="form-label">
          <label for="zip">Zip: *</label>
        </div>
        <div class="form-input">
          <input id="zip" name="zip" placeholder="Zip" required>
        </div>
      </div>

<h2>Payment information</h2>

<!--Credit Card Number-->

      <div class="form-module">
        <div class="form-label">
          <label for="zip">Credit Card Number: *</label>
        </div>
        <div class="form-input">
          <input id="zip" name="zip" placeholder="Zip" required>
        </div>
      </div>

<!--Expiration-->

      <div class="form-module">
        <div class="form-label">
          <label for="expiration">Expiration Date (MM/YY): *</label>
        </div>
        <div class="form-input">
          <input id="expiration" name="expiration" placeholder="Expiration" required>
        </div>
      </div>

<!--CVV-->

      <div class="form-module">
        <div class="form-label">
          <label for="cvv">Credit Card Number: *</label>
        </div>
        <div class="form-input">
          <input id="cvv" name="cvv" placeholder="cvv" required>
        </div>
      </div>

<!--Submit-->
      <div>
        <div class="form-module">
          <input id="submit" name="submit" type="submit" value="Submit">
        </div>
      </div>
    </form>

   </body>
