<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Appointment</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include("NavBar.php"); require_once("functions.php"); ?>
  <?php
  if (isset($_POST['updateAppointment'])) {
    $id = $_POST['appointmentID'];
    $patientId = $_POST['patientID'];
    $staffId = $_POST['staffID'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    updateAppointment($id, $patientId, $staffId, $appointmentDate, $appointmentTime);
    header("Location: viewAppointment.php");
  }
  $id = $_GET['id'];
  $appointment = viewAppointment($id);
  ?>
  <div>
    <h2 class="centered-header">Update Appointment Details?</h2>
  </div>
  <div class="main">
    <form method="post">
      <input type="hidden" name="appointmentID" value="<?php echo $appointment[0]['appointmentID']; ?>">
      <label for="patientID">Patient ID:</label>
      <input type="text" name="patientID" value="<?php echo $appointment[0]['patientID']; ?>">
      <label for="staffID">Staff ID:</label>
      <input type="text" name="staffID" value="<?php echo $appointment[0]['staffID']; ?>">
      <label for="appointmentDate">Appointment Date:</label>
      <input type="date" name="appointmentDate" value="<?php echo $appointment[0]['appointmentDate']; ?>">
      <label for="appointmentTime">Appointment Time:</label>
      <input type="time" name="appointmentTime" value="<?php echo $appointment[0]['appointmentTime']; ?>">
      <input type="submit" name="updateAppointment" value="Update Appointment">
    </form>
  </div>
  <footer>
    <div class="firstfooter" style="text-align: center;">
      &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
  </footer>
</body>
</html>