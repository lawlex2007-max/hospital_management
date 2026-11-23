<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Staff</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php
    include("NavBar.php");
    require_once("functions.php");
    ?>
    <div>
        <h2 class="centered-header">Create New Staff</h2>
    </div>
    <div class="main">
    <?php

    if(isset($_POST['createStaff']))
    {   
        $id = $_POST['staffID'];
        $fname = $_POST['firstName'];
        $mname = $_POST['middleName'];
        $lname = $_POST['lastName'];
        $userType = "Staff";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phoneNo = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $homeaddress = $_POST['homeAddress'];
        $city = $_POST['city'];
        $postcode = $_POST['homePostcode'];
       if(addStaff($id,$fname,$mname,$lname,$phoneNo,$email,$homeaddress,$postcode,$city,$userType,$username,$password)){
            echo "<p style='color: green; text-align: center;'>Staff created successfully.</p>";
        }
        else{
            echo "<p style='color: red; text-align: center;'>Failed to create Staff. Please try again.</p>";
        }
    }
    ?>
        <form method="post">
            <input type="number" name="staffID" placeholder="Staff ID" required>
            <input type="text" name="firstName" placeholder="First Name" required>
            <input type="text" name="middleName" placeholder="Middle Name" required>
            <input type="text" name="lastName" placeholder="Last Name" required>
            <input type="text" name="userType" placeholder="User Type (e.g. Staff)" required>
            <input type="text" name="username" placeholder="Username" required>
             <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="phoneNumber" placeholder="Phone Number" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="homeAddress" placeholder="Home Address" required>
            <input type="text" name="city" placeholder="Staff City (e.g. London)" required>
            <input type="text" name="homePostcode" placeholder="Home Postcode" required>
            <input type="submit" name = "createStaff" value="Create Staff">
            
        
        </form>
    </div>
    <div class="footer" style="text-align: center">
        &copy; 2026 Alex Hospital Management System. All rights reserved.
    </div>
</body>
</html>