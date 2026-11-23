<?php
session_start();
$db1 = new SQLite3('hospital_management_2.db');

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $userType = $_POST['userType'] ?? '';
    $_SESSION['selectedUserType'] = $userType;
    header("Location: login.php?userType");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hospital Management Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            text-align: center;
            padding-top: 100px;

            background-image: url('https://wallpaperaccess.com/full/9648319.jpg');
            background-size: cover;
        }
        h1 {
            color: #333;
        }
        .login-btn {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: white;
        }
        .doctor { background-color: #4CAF50; }
        .nurse { background-color: #2196F3; }
        .patient { background-color: #FF9800; }
        .admin { background-color: #9C27B0; }
        .login-btn:hover { opacity: 0.85; }
    </style>
</head>
<body>
    <h1>Hospital Management System</h1>
    <p>Select your role to log in:</p>
    <form method="POST">
        <button type="submit" name="userType" value="Doctor" class="login-btn doctor">Doctor</button>
        <button type="submit" name="userType" value="Nurse" class="login-btn nurse">Nurse</button>
        <button type="submit" name="userType" value="Patient" class="login-btn patient">Patient</button>
        <button type="submit" name="userType" value="System Administrator" class="login-btn admin">System Administrator</button>
    </form>
</body>
</html>
