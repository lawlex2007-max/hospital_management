<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Appointment</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include("NavBar.php"); require_once("functions.php"); ?>
  <?php
  if (isset($_POST['deleteAppointment'])) {
    $id = $_POST['appointmentID'];
    deleteAppointment($id);
    header("Location: viewAppointment.php");
    exit;
  }
  $id = $_GET['id'];
  $appointment = viewAppointment($id);
  ?>
  <div>
    <h2 class="centered-header">Delete Appointment ID: <?php echo $appointment[0]['appointmentID']; ?>?</h2>
  </div>
  <div class="main">
    <form method="post">
      <input type="hidden" name="appointmentID" value="<?php echo $appointment[0]['appointmentID']; ?>">
      <label for="patientID">Patient ID:</label>
      <input type="text" name="patientID" value="<?php echo $appointment[0]['patientID']; ?>" disabled>
      <label for="staffID">Staff ID:</label>
      <input type="text" name="staffID" value="<?php echo $appointment[0]['staffID']; ?>" disabled>
      <label for="appointmentDate">Appointment Date:</label>
      <input type="date" name="appointmentDate" value="<?php echo $appointment[0]['appointmentDate']; ?>" disabled>
      <label for="appointmentTime">Appointment Time:</label>
      <input type="time" name="appointmentTime" value="<?php echo $appointment[0]['appointmentTime']; ?>" disabled>
      <input type="submit" name="deleteAppointment" value="Delete Appointment">
      <a href="viewAppointment.php">Cancel</a>
    </form>
  </div>
  <footer>
    <div class="firstfooter" style="text-align: center;">
      &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
  </footer>
</body>
</html>