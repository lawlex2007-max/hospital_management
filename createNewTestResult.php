<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New Test Result</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include("NavBar.php"); require_once("functions.php"); ?>
  <div>
    <h2 class="centered-header">Create New Test Result</h2>
  </div>
  <div class="main">
    <?php if(isset($_POST['createTestResult'])) { 
      $id = $_POST['testID'];
      $appId = $_POST['appointmentID'];
      $testDate = $_POST['testDate'];
      $testTime = $_POST['testTime'];
      $resultValue = $_POST['resultValue'];
      $unit = $_POST['unit'];
      $status = $_POST['status'];
      if(addTest_Result($id,$appId,$testDate,$testTime,$resultValue,$unit,$status)){
        echo "<p style='color: green; text-align: center;'>Test Result created successfully.</p>";
      } else{
        echo "<p style='color: red; text-align: center;'>Failed to create Test Result. Please try again.</p>";
      }
    } ?>
    <form method="post">
      <label for="testID">Test ID:</label>
      <input type="number" name="testID" required>
      <label for="appointmentID">Appointment ID:</label>
      <input type="number" name="appointmentID" required>
      <label for="testDate">Test Date:</label>
      <input type="date" name="testDate" required>
      <label for="testTime">Test Time:</label>
      <input type="time" name="testTime" required>
      <label for="resultValue">Result Value (e.g. 120):</label>
      <input type="text" name="resultValue" required>
      <label for="unit">Unit (e.g. mg/dL):</label>
      <input type="text" name="unit" required>
      <label for="status">Status:</label>
      <select name="status" required>
        <option value="Ongoing">Ongoing</option>
        <option value="Done">Done</option>
        <option value="Pending">Pending</option>
      </select>
      <input type="submit" name="createTestResult" value="Create Test Result">
    </form>
  </div>
  <div class="footer" style="text-align: center">
    &copy; 2026 Alex Hospital Management System. All rights reserved.
  </div>
</body>
</html>