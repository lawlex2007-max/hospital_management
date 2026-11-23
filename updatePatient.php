<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Patient</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include("NavBar.php"); require_once("functions.php"); ?>
  <?php
  if (isset($_POST['updatePatient'])) {
    $id = $_POST['patientID'];
    $fname = $_POST['firstName'];
    $mname = $_POST['middleName'];
    $lname = $_POST['lastName'];
    $userType = "Patient";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $homeaddress = $_POST['homeAddress'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $email = $_POST['email'];
    $phoneNo = $_POST['phoneNumber'];
    updatePatient($id, $fname, $mname, $lname, $userType, $username, $password, $homeaddress, $city, $postcode, $email, $phoneNo);
    header("Location: viewPatient.php");
  }
  $id = $_GET['id'];
  $patient = viewPatient($id);
  ?>
  <div>
    <h2 class="centered-header">Update <?php echo $patient[0]['firstName']; ?>'s Details?</h2>
  </div>
  <div class="main">
    <form method="post">
      <input type="hidden" name="patientID" value="<?php echo $patient[0]['patientID']; ?>">
      <label for="firstName">First Name:</label>
      <input type="text" name="firstName" value="<?php echo $patient[0]['firstName']; ?>">
      <label for="middleName">Middle Name:</label>
      <input type="text" name="middleName" value="<?php echo $patient[0]['middleName']; ?>">
      <label for="lastName">Last Name:</label>
      <input type="text" name="lastName" value="<?php echo $patient[0]['lastName']; ?>">
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php echo $patient[0]['username']; ?>">
      <label for="password">Password:</label>
      <input type="password" name="password" value="<?php echo $patient[0]['password']; ?>">
      <label for="homeAddress">Home Address:</label>
      <input type="text" name="homeAddress" value="<?php echo $patient[0]['homeAddress']; ?>">
      <label for="city">City:</label>
      <input type="text" name="city" value="<?php echo $patient[0]['city']; ?>">
      <label for="postcode">Postcode:</label>
      <input type="text" name="postcode" value="<?php echo $patient[0]['postcode']; ?>">
      <label for="email">Email:</label>
      <input type="email" name="email" value="<?php echo $patient[0]['email']; ?>">
      <label for="phoneNumber">Phone Number:</label>
      <input type="text" name="phoneNumber" value="<?php echo $patient[0]['phoneNumber']; ?>">
      <input type="submit" name="updatePatient" value="Update Patient">
    </form>
  </div>
  <footer>
    <div class="firstfooter" style="text-align: center;">
      &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
  </footer>
</body>
</html>