<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Diagnosis</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include("NavBar.php"); require_once("functions.php"); ?>
  <?php
  if (isset($_POST['updateDiagnosis'])) {
    $id = $_POST['diagnosisID'];
    $appId = $_POST['appointmentID'];
    $diagnosisDate = $_POST['diagnosisDate'];
    $diagnosisTime = $_POST['diagnosisTime'];
    $illness = $_POST['illness'];
    updateDiagnosis($id, $appId, $diagnosisDate, $diagnosisTime, $illness);
    header("Location: viewDiagnosis.php");
  }
  $id = $_GET['id'];
  $diagnosis = viewDiagnosis($id);
  ?>
  <div>
    <h2 class="centered-header">Update Diagnosis Details?</h2>
  </div>
  <div class="main">
    <form method="post">
      <input type="hidden" name="diagnosisID" value="<?php echo $diagnosis[0]['diagnosisID']; ?>">
      <label for="appointmentID">Appointment ID:</label>
      <input type="text" name="appointmentID" value="<?php echo $diagnosis[0]['appointmentID']; ?>">
      <label for="diagnosisDate">Diagnosis Date:</label>
      <input type="date" name="diagnosisDate" value="<?php echo $diagnosis[0]['diagnosisDate']; ?>">
      <label for="diagnosisTime">Diagnosis Time:</label>
      <input type="time" name="diagnosisTime" value="<?php echo $diagnosis[0]['diagnosisTime']; ?>">
      <label for="illness">Illness:</label>
      <input type="text" name="illness" value="<?php echo $diagnosis[0]['illness']; ?>">
      <input type="submit" name="updateDiagnosis" value="Update Diagnosis">
    </form>
  </div>
  <footer>
    <div class="firstfooter" style="text-align: center;">
      &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
  </footer>
</body>
</html>