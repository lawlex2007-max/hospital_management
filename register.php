<?php
session_start();
$db1 = "hospital_management_2.db";
$db = new SQLite3($db1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'], $_POST['password'], $_POST['confirm_password'], $_POST['firstName'], $_POST['lastName'], $_POST['homeAddress'], $_POST['city'], $_POST['postcode'], $_POST['email'], $_POST['phoneNumber'])) {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $fname = trim($_POST['firstName'] ?? '');
        $mname = trim($_POST['middleName'] ?? '');
        $lname = trim($_POST['lastName'] ?? '');
        $homeAddress = trim($_POST['homeAddress'] ?? '');
        $city = trim($_POST['city'] ?? '');
        $postcode = trim($_POST['postcode'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phoneNumber = trim($_POST['phoneNumber'] ?? '');

        if ($password != $confirmPassword) {
            $error = "Passwords do not match.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email address.";
        } else {
            $stmt = $db->prepare("SELECT * FROM PATIENT WHERE username = :username");
            $stmt->bindValue(':username', $username, SQLITE3_TEXT);
            $result = $stmt->execute();
            $row = $result->fetchArray(SQLITE3_ASSOC);

            if ($row) {
                $error = "Username already exists.";
            } else {
                $stmt = $db->prepare("INSERT INTO PATIENT (username, password, firstName, middleName, lastName, homeAddress, city, postcode, email, phoneNumber, userType) VALUES (:username, :password, :firstName, :middleName, :lastName, :homeAddress, :city, :postcode, :email, :phoneNumber, :userType)");
                $stmt->bindValue(':username', $username, SQLITE3_TEXT);
                $stmt->bindValue(':password', $password, SQLITE3_TEXT); // plaintext
                $stmt->bindValue(':firstName', $fname, SQLITE3_TEXT);
                $stmt->bindValue(':middleName', $mname, SQLITE3_TEXT);
                $stmt->bindValue(':lastName', $lname, SQLITE3_TEXT);
                $stmt->bindValue(':homeAddress', $homeAddress, SQLITE3_TEXT);
                $stmt->bindValue(':city', $city, SQLITE3_TEXT);
                $stmt->bindValue(':postcode', $postcode, SQLITE3_TEXT);
                $stmt->bindValue(':email', $email, SQLITE3_TEXT);
                $stmt->bindValue(':phoneNumber', $phoneNumber, SQLITE3_TEXT);
                $stmt->bindValue(':userType', 'Patient', SQLITE3_TEXT);

                if ($stmt->execute()) {
                    $_SESSION['registration_success'] = true;
                    header("Location: login.php");
                    exit;
                } else {
                    $error = "Registration failed: " . $db->lastErrorMsg();
                }
            }
        }
    } else {
        $error = "Please fill in all the fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Registration</title>
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
        .register-box {
            background: rgba(106, 232, 239, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px #adb5b3, 0 0 40px #adb5d3;
            text-align: center;
            width: 320px;
        }
        .register-box img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
            box-shadow: 0 0 15px #80e3ec;
        }
        .register-box h2 {
            color: #98e0f0;
            text-shadow: 0 0 10px #0f1212;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"], input[type="email"] {
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
    <div class="register-box">
        <img src="https://static.vecteezy.com/system/resources/previews/009/362/747/original/simple-medical-icon-symbol-sign-design-free-png.png" alt="Hospital Logo">
        <h2>Patient Registration</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
            <input type="text" name="firstName" placeholder="First Name" required><br>
            <input type="text" name="middleName" placeholder="Middle Name"><br>
            <input type="text" name="lastName" placeholder="Last Name" required><br>
            <input type="text" name="homeAddress" placeholder="Home Address" required><br>
            <input type="text" name="city" placeholder="City" required><br>
            <input type="text" name="postcode" placeholder="Postcode" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="phoneNumber" placeholder="Phone Number" required><br>
            <input type="submit" value="Register">
        </form>
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>