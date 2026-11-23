<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Staff</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include("NavBar.php"); require_once("functions.php"); ?>
  <?php
  if (isset($_POST['updateStaff'])) {
    $id = $_POST['staffID'];
    $fname = $_POST['firstName'];
    $mname = $_POST['middleName'];
    $lname = $_POST['lastName'];
    $userType = "Staff";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phoneNo = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $homeaddress = $_POST['homeAddress'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    updateStaff($id, $fname, $mname, $lname, $userType, $username, $password, $phoneNo, $email, $homeaddress, $city, $postcode);
    header("Location: viewStaff.php");
  }
  $id = $_GET['id'];
  $staff = viewStaff($id);
  ?>
  <div>
    <h2 class="centered-header">Update <?php echo $staff[0]['firstName']; ?>'s Details?</h2>
  </div>
  <div class="main">
    <form method="post">
      <input type="hidden" name="staffID" value="<?php echo $staff[0]['staffID']; ?>">
      <label for="firstName">First Name:</label>
      <input type="text" name="firstName" value="<?php echo $staff[0]['firstName']; ?>">
      <label for="middleName">Middle Name:</label>
      <input type="text" name="middleName" value="<?php echo $staff[0]['middleName']; ?>">
      <label for="lastName">Last Name:</label>
      <input type="text" name="lastName" value="<?php echo $staff[0]['lastName']; ?>">
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php echo $staff[0]['username']; ?>">
      <label for="password">Password:</label>
      <input type="password" name="password" value="<?php echo $staff[0]['password']; ?>">
      <label for="phoneNumber">Phone Number:</label>
      <input type="text" name="phoneNumber" value="<?php echo $staff[0]['phoneNumber']; ?>">
      <label for="email">Email:</label>
      <input type="email" name="email" value="<?php echo $staff[0]['email']; ?>">
      <label for="homeAddress">Home Address:</label>
      <input type="text" name="homeAddress" value="<?php echo $staff[0]['homeAddress']; ?>">
      <label for="city">City:</label>
      <input type="text" name="city" value="<?php echo $staff[0]['city']; ?>">
      <label for="postcode">Postcode:</label>
      <input type="text" name="postcode" value="<?php echo $staff[0]['postcode']; ?>">
      <input type="submit" name="updateStaff" value="Update Staff">
    </form>
  </div>
  <footer>
    <div class="firstfooter" style="text-align: center;">
      &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
  </footer>
</body>
</html>