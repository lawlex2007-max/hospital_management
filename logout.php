<?php 
    if (isset($_GET['confirm'])) {
        session_start(); 
        session_destroy(); 
        header("Location: index.php"); 
        exit; 
    } else {
        header("Location: confirm_logout.php");
        exit;
    }
?>