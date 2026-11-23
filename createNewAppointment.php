<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Appointment</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php
    include("NavBar.php");
    require_once("functions.php");
    ?>
    <div>
        <h2 class="centered-header">Create New Appointment</h2>
    </div>
    <div class="main">
    <?php

    if(isset($_POST['createAppointment']))
    {   
        $id = $_POST['appointmentID'];
        $patientId = $_POST['patientID'];
        $staffId = $_POST['staffID'];
        $appointmentDate = $_POST['appointmentDate'];
        $appointmentTime = $_POST['appointmentTime']; 

       if(addAppointment($id,$patientId,$staffId,$appointmentDate,$appointmentTime)){
            echo "<p style='color: green; text-align: center;'>Appointment created successfully.</p>";
        }
        else{
            echo "<p style='color: red; text-align: center;'>Failed to create Appointment. Please try again.</p>";
        }
    }
    ?>
        <form method="post">
            <input type="number" name="appointmentID" placeholder="Appointment ID" required>
            <input type="number" name="patientID" placeholder="Patient ID" required>
            <input type="number" name="staffID" placeholder="Staff ID (Doctor)" required>
            <input type="date" name="appointmentDate" placeholder="Appointment Date" required>
            <input type="time" name="appointmentTime" placeholder="Appointment Time" required>
            <input type="text" name="status" placeholder="Status (e.g. Ongoing, Done)" required> 
            <input type="submit" name = "createAppointment" value="Create Appointment">
            
        
        </form>
    </div>
    <div class="footer" style="text-align: center">
        &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
</body>
</html>