<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Patient</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include("NavBar.php"); require_once("functions.php"); ?>
  <?php
  if (isset($_POST['deletePatient'])) {
    $id = $_POST['patientID'];
    deletePatient($id);
    header("Location: viewPatient.php");
    exit;
  }
  $id = $_GET['id'];
  $patient = viewPatient($id);
  ?>
  <div>
    <h2 class="centered-header">Delete Patient ID: <?php echo $patient[0]['patientID']; ?>?</h2>
  </div>
  <div class="main">
    <form method="post">
      <input type="hidden" name="patientID" value="<?php echo $patient[0]['patientID']; ?>">
      <label for="firstName">First Name:</label>
      <input type="text" name="firstName" value="<?php echo $patient[0]['firstName']; ?>" disabled>
      <label for="middleName">Middle Name:</label>
      <input type="text" name="middleName" value="<?php echo $patient[0]['middleName']; ?>" disabled>
      <label for="lastName">Last Name:</label>
      <input type="text" name="lastName" value="<?php echo $patient[0]['lastName']; ?>" disabled>
      <label for="userType">User Type:</label>
      <input type="text" name="userType" value="<?php echo $patient[0]['userType']; ?>" disabled>
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php echo $patient[0]['username']; ?>" disabled>
      <label for="password">Password:</label>
      <input type="password" name="password" value="<?php echo $patient[0]['password']; ?>" disabled>
      <label for="homeAddress">Home Address:</label>
      <input type="text" name="homeAddress" value="<?php echo $patient[0]['homeAddress']; ?>" disabled>
      <label for="city">City:</label>
      <input type="text" name="city" value="<?php echo $patient[0]['city']; ?>" disabled>
      <label for="postcode">Postcode:</label>
      <input type="text" name="postcode" value="<?php echo $patient[0]['postcode']; ?>" disabled>
      <label for="email">Email:</label>
      <input type="email" name="email" value="<?php echo $patient[0]['email']; ?>" disabled>
      <label for="phoneNumber">Phone Number:</label>
      <input type="text" name="phoneNumber" value="<?php echo $patient[0]['phoneNumber']; ?>" disabled>
      <input type="submit" name="deletePatient" value="Delete Patient">
      <a href="viewPatient.php">Cancel</a>
    </form>
  </div>
  <footer>
    <div class="firstfooter" style="text-align: center;">
    </div>
  </footer>
</body>
</html>