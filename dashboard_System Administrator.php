<?php $allowedUserType = 'System Administrator'; include 'auth.php'; ?> 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Admin Dashboard</title> 
    <link rel="stylesheet" href="style.css" /> 
    <style> 
    body { 
        background-image: url('https://static.vecteezy.com/system/resources/thumbnails/042/197/699/small_2x/ai-generated-medical-high-quality-background-free-photo.jpg'); 
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat; 
        color: #00a2ff; 
        text-align: center; 
        padding-top: 50px; 
    } 
    a { 
        color: #ff4d4d; 
        text-decoration: none; 
    } 
    </style> 
</head> 
<body class="bgcolor"> 
    <?php include 'profile_circle.php'; // moved inside body ?> 
    <?php 
    $userType = $_SESSION['userType']; 
    echo "Welcome, $userType!";  
    include 'NavBar.php'; ?> 
    <h1>WELCOME ADMIN</h1> 
    <p>MANAGE HOSPITAL STAFF, PATIENTS, AND SYSTEM SETTINGS.</p> 
    <footer> 
        <div class="firstfooter" style="text-align: center;"> &copy; 2026 Alex Hospital Management System. All rights reserved. 
        </div> 
    </footer> 
</body> 
</html>