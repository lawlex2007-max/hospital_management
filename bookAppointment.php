<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Book Appointment</title> 
    <link rel="stylesheet" href="style.css" /> 
</head> 
<body> 
    <?php include("NavBar.php"); require_once("functions.php"); ?> 
    <div class="header"> 
        <h2>Book Appointment</h2> 
    </div> 
    <div class="main"> 
        <?php if(isset($_POST['bookAppointment'])) { 
            $patientID = $_POST['patientID']; 
            $staffID = $_POST['staffID']; 
            $appointmentDate = $_POST['appointmentDate']; 
            $appointmentTime = $_POST['appointmentTime']; 
            if(bookAppointment($patientID, $staffID, $appointmentDate, $appointmentTime)){ 
                echo "<p class='success'>Appointment booked successfully.</p>"; 
            } else{ 
                echo "<p class='error'>Failed to book appointment. Please try again.</p>"; 
            } 
        } ?> 
        <form method="post"> 
            <label for="patientID">Patient ID:</label> 
            <input type="number" name="patientID" required> 
            <label for="staffID">Staff ID:</label> 
            <input type="number" name="staffID" required>
            <label for="appointmentDate">Appointment Date:</label> 
            <input type="date" name="appointmentDate" required> 
            <label for="appointmentTime">Appointment Time:</label> 
            <input type="time" name="appointmentTime" required> 
            <input type="submit" name="bookAppointment" value="Book Appointment"> 
        </form> 
    </div> 
    <div class="footer"> &copy; 2026 Alex Hospital Management System. All rights reserved. </div> 
</body> 
</html>