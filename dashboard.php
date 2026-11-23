<?php 
    session_start(); 
    if (isset($_SESSION['userType'])) { 
        $userType = $_SESSION['userType']; 
        header("Location: dashboard_$userType.php"); 
    } else { 
        header("Location: index.php"); 
    } 
?>