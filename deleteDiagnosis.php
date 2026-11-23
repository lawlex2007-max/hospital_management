<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Diagnosis</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include("NavBar.php"); require_once("functions.php"); ?>
  <?php
  if (isset($_POST['deleteDiagnosis'])) {
    $id = $_POST['diagnosisID'];
    deleteDiagnosis($id);
    header("Location: viewDiagnosis.php");
    exit;
  }
  $id = $_GET['id'];
  $diagnosis = viewDiagnosis($id);
  ?>
  <div>
    <h2 class="centered-header">Delete Diagnosis ID: <?php echo $diagnosis[0]['diagnosisID']; ?>?</h2>
  </div>
  <div class="main">
    <form method="post">
      <input type="hidden" name="diagnosisID" value="<?php echo $diagnosis[0]['diagnosisID']; ?>">
      <label for="appointmentID">Appointment ID:</label>
      <input type="text" name="appointmentID" value="<?php echo $diagnosis[0]['appointmentID']; ?>" disabled>
      <label for="diagnosisDate">Diagnosis Date:</label>
      <input type="date" name="diagnosisDate" value="<?php echo $diagnosis[0]['diagnosisDate']; ?>" disabled>
      <label for="diagnosisTime">Diagnosis Time:</label>
      <input type="time" name="diagnosisTime" value="<?php echo $diagnosis[0]['diagnosisTime']; ?>" disabled>
      <label for="illness">Illness:</label>
      <input type="text" name="illness" value="<?php echo $diagnosis[0]['illness']; ?>" disabled>
      <input type="submit" name="deleteDiagnosis" value="Delete Diagnosis">
      <a href="viewDiagnosis.php">Cancel</a>
    </form>
  </div>
  <footer>
    <div class="firstfooter" style="text-align: center;">
      &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
  </footer>
</body>
</html>
