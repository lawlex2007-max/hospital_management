<?php 
    session_start(); 
    if (!isset($_SESSION['userType']) || $_SESSION['userType'] != $allowedUserType) {
        header("Location: index.php");
        exit;
    }
?>