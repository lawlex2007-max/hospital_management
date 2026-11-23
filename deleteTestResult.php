
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Test Result</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include("NavBar.php"); require_once("functions.php"); ?>
  <?php
  if (isset($_POST['deleteTestResult'])) {
    $id = $_POST['testID'];
    deleteTest_Result($id);
    header("Location: viewTestResult.php");
    exit;
  }
  $id = $_GET['id'];
  $test_result = viewTest_Result($id);
  ?>
  <div>
    <h2 class="centered-header">Delete Test Result ID: <?php echo $test_result[0]['testID']; ?>?</h2>
  </div>
  <div class="main">
    <form method="post">
      <input type="hidden" name="testID" value="<?php echo $test_result[0]['testID']; ?>">
      <label for="appointmentID">Appointment ID:</label>
      <input type="text" name="appointmentID" value="<?php echo $test_result[0]['appointmentID']; ?>" disabled>
      <label for="testDate">Test Date:</label>
      <input type="date" name="testDate" value="<?php echo $test_result[0]['testDate']; ?>" disabled>
      <label for="testTime">Test Time:</label>
      <input type="time" name="testTime" value="<?php echo $test_result[0]['testTime']; ?>" disabled>
      <label for="resultValue">Result Value:</label>
      <input type="text" name="resultValue" value="<?php echo $test_result[0]['resultValue']; ?>" disabled>
      <label for="unit">Unit:</label>
      <input type="text" name="unit" value="<?php echo $test_result[0]['unit']; ?>" disabled>
      <label for="status">Status:</label>
      <input type="text" name="status" value="<?php echo $test_result[0]['status']; ?>" disabled>
      <input type="submit" name="deleteTestResult" value="Delete Test Result">
      <a href="viewTestResult.php">Cancel</a>
    </form>
  </div>
  <footer>
    <div class="firstfooter" style="text-align: center;">
      &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
  </footer>
</body>
</html>