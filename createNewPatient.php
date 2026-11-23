<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Patient</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php
    include("NavBar.php");
    require_once("functions.php");
    ?>
    <div>
        <h2 class="centered-header">Create New Patient</h2>
    </div>
    <div class="main">
    <?php

    if(isset($_POST['createPatient']))
    {   
        $id = $_POST['patientID'];
        $fname = $_POST['firstName'];
        $mname = $_POST['middleName'];
        $lname = $_POST['lastName'];
        $userType = "Patient";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $homeaddress = $_POST['homeAddress'];
        $city = $_POST['city'];
         $postcode = $_POST['postcode'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNumber'];
        
    
       if(addPatient($id,$fname,$mname,$lname,$phoneNo,$email,$homeaddress,$postcode,$city,$userType,$username,$password)){
            echo "<p style='color: green; text-align: center;'>Patient created successfully.</p>";
        }
        else{
            echo "<p style='color: red; text-align: center;'>Failed to create Patient. Please try again.</p>";
        }
    }
    ?>
        <form method="post">
            <input type="number" name="patientID" placeholder="Patient ID" required>
            <input type="text" name="firstName" placeholder="First Name" required>
            <input type="text" name="middleName" placeholder="Middle Name" required>
            <input type="text" name="lastName" placeholder="Last Name" required>
            <input type="text" name="userType" placeholder="User Type (e.g. Patient)" required>
            <input type="text" name="username" placeholder="Username" required>
             <input type="password" name="password" placeholder="Password" required>
             <input type="text" name="homeAddress" placeholder="Home Address" required>
              <input type="text" name="city" placeholder="Patient City (e.g. London)" required>
              <input type="text" name="postcode" placeholder="Home Postcode" required>
              <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="phoneNumber" placeholder="Phone Number" required>
            <input type="submit" name = "createPatient" value="Create Patient">
        </form>
    </div>
    <div class="footer" style="text-align: center">
        &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
</body>
</html>