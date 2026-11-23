
<?php
session_start();
$db1 = "hospital_management_2.db";
$db = new SQLite3($db1);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $selectedUserType = $_SESSION['selectedUserType'] ?? '';

    if($selectedUserType == 'Patient') {
        $stmt = $db->prepare("SELECT * FROM PATIENT WHERE username = :username AND password = :password");
    } elseif($selectedUserType == 'Doctor') {
        $stmt = $db->prepare("SELECT * FROM STAFF WHERE username = :username AND password = :password AND userType = 'Doctor'");
    } elseif($selectedUserType == 'Nurse') {
        $stmt = $db->prepare("SELECT * FROM STAFF WHERE username = :username AND password = :password AND userType = 'Nurse'");
    } elseif($selectedUserType == 'System Administrator') {
        $stmt = $db->prepare("SELECT * FROM STAFF WHERE username = :username AND password = :password AND userType = 'System Administrator'");
    } else {
        $error = "Invalid user type selected.";
    }

    if(isset($stmt)) {
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $stmt->bindValue(':password', $password, SQLITE3_TEXT);
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);

        if($row) {
            $_SESSION['userType'] = $selectedUserType;
              $_SESSION['username'] = $username;
            header("Location: dashboard_$selectedUserType.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Hospital Login</title>
    <style>
        body {
            background-color: #090a0a;
            font-family: Arial, sans-serif;
            color: #0c0b0b;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

            background: url('https://wallpaperaccess.com/full/1282794.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .login-box {
            background: rgba(106, 232, 239, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px #adb5b3, 0 0 40px #adb5d3;
            text-align: center;
            width: 320px;
        }
        .login-box img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
            box-shadow: 0 0 15px #80e3ec;
        }
        .login-box h2 {
            color: #98e0f0;
            text-shadow: 0 0 10px #0f1212;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            outline: none;
            border-radius: 5px;
            background: #f0f0f0;
            color: #333;
            box-shadow: 0 0 10px #77e2f5 inset;
        }
        input[type="submit"] {
            background: #00ffcc;
            color: #000;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #00ffaa;
            box-shadow: 0 0 20px #00ffaa;
        }
        .error {
            color: #ff4d4d;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <!-- Hospital Logo -->
        <img src="https://static.vecteezy.com/system/resources/previews/009/362/747/original/simple-medical-icon-symbol-sign-design-free-png.png" alt="Hospital Logo">
        
        <h2>Login as <?php echo htmlspecialchars($_SESSION['selectedUserType'] ?? 'Unknown'); ?></h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
        <?php if (isset($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['selectedUserType']) && $_SESSION['selectedUserType'] == 'Patient'): ?>
            <p>Don't have an account? <a href="register.php">Register</a> (Patient Registration)</p>
        <?php endif; ?>
        <p><a href="index.php" style="color: #1500ff; text-decoration: none;">⬅️ Back</ style> <a href="index.php"></a></p>
    </div>
</body>
</html>

