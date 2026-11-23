
<!DOCTYPE html>
<html>
<head>
    <title>Confirm Logout</title>
</head>
<body>
    <script>
        if (confirm('Are you sure you want to logout?')) {
            window.location.href = 'logout.php?confirm=true';
        } else {
            window.history.back();
        }
    </script>
</body>
</html>