<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Test Result</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include("NavBar.php"); require_once("functions.php"); ?>
  <?php
  if (isset($_POST['updateTestResult'])) {
    $id = $_POST['testID'];
    $appId = $_POST['appointmentID'];
    $testDate = $_POST['testDate'];
    $testTime = $_POST['testTime'];
    $resultValue = $_POST['resultValue'];
    $unit = $_POST['unit'];
    $status = $_POST['status'];
    updateTestResult($id, $appId, $testDate, $testTime, $resultValue, $unit, $status);
    header("Location: viewTestResult.php");
  }
  $id = $_GET['id'];
  $test_result = viewTest_Result($id);
  ?>
  <div>
    <h2 class="centered-header">Update Test Result Details?</h2>
  </div>
  <div class="main">
    <form method="post">
      <input type="hidden" name="testID" value="<?php echo $test_result[0]['testID']; ?>">
      <label for="appointmentID">Appointment ID:</label>
      <input type="text" name="appointmentID" value="<?php echo $test_result[0]['appointmentID']; ?>">
      <label for="testDate">Test Date:</label>
      <input type="date" name="testDate" value="<?php echo $test_result[0]['testDate']; ?>">
      <label for="testTime">Test Time:</label>
      <input type="time" name="testTime" value="<?php echo $test_result[0]['testTime']; ?>">
      <label for="resultValue">Result Value:</label>
      <input type="text" name="resultValue" value="<?php echo $test_result[0]['resultValue']; ?>">
      <label for="unit">Unit:</label>
      <input type="text" name="unit" value="<?php echo $test_result[0]['unit']; ?>">
      <label for="status">Status:</label>
      <input type="text" name="status" value="<?php echo $test_result[0]['status']; ?>">
      <input type="submit" name="updateTestResult" value="Update Test Result">
    </form>
  </div>
  <footer>
    <div class="firstfooter" style="text-align: center;">
      &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
  </footer>
</body>
</html>