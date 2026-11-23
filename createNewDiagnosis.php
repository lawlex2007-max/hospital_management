<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Diagnosis</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php
    include("NavBar.php");
    require_once("functions.php");
    ?>
    <div>
        <h2 class="centered-header">Create New Diagnosis</h2>
    </div>
    <div class="main">
    <?php

    if(isset($_POST['createDiagnosis']))
    {   
        $id = $_POST['diagnosisID'];
        $appId = $_POST['appointmentID'];
        $diagnosisDate = $_POST['diagnosisDate'];
        $diagnosisTime = $_POST['diagnosisTime']; 
        $illness = $_POST['illness'];

       if(addDiagnosis($id,$appId,$diagnosisDate,$diagnosisTime,$illness)){
            echo "<p style='color: green; text-align: center;'>Diagnosis created successfully.</p>";
        }
        else{
            echo "<p style='color: red; text-align: center;'>Failed to create Diagnosis. Please try again.</p>";
        }
    }
    ?>
        <form method="post">
            <input type="number" name="diagnosisID" placeholder="Diagnosis ID" required>
            <input type="number" name="appointmentID" placeholder="Appointment ID" required>
            <input type="date" name="diagnosisDate" placeholder="Diagnosis Date" required>
            <input type="time" name="diagnosisTime" placeholder="Diagnosis Time" required>
            <input type="text" name="illness" placeholder="Illness Description" required> 
            <input type="submit" name = "createDiagnosis" value="Create Diagnosis">
            
        
        </form>
    </div>
    <div class="footer" style="text-align: center">
        &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
</body>
</html>