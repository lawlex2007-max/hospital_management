<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css" /> 
    <title>Hospital Management System</title> 
</head> 
<body class="bgcolor"> 
    <header> 
        <div class="header"> 
            <div class="navbar"> 
                <a class="navbar-brand" href="dashboard.php">Hospital Management System 🏢</a> 
                <?php if (isset($userType)): ?> 
                    <?php if ($userType == 'System Administrator'): ?> 
                        <div class="dropdown"> 
                            <button class="dropbtn">Staff <i class="fa fa-caret-down"></i></button> 
                            <div class="dropdown-content"> 
                                <a href="createNewStaff.php">Create New Staff</a> 
                                <a href="viewStaff.php">View Staff</a> 
                            </div> 
                        </div> 
                    <?php endif; ?> 
                    <?php if (in_array($userType, ['System Administrator', 'Nurse', 'Doctor'])): ?> 
                        <div class="dropdown"> 
                            <button class="dropbtn">Patient <i class="fa fa-caret-down"></i></button> 
                            <div class="dropdown-content"> 
                                <a href="createNewPatient.php">Create New Patient</a> 
                                <a href="viewPatient.php">View Patient</a> 
                            </div> 
                        </div> 
                        <div class="dropdown"> 
                            <button class="dropbtn">Appointment <i class="fa fa-caret-down"></i></button> 
                            <div class="dropdown-content"> 
                                <a href="createNewAppointment.php">Create New Appointment</a> 
                                <a href="viewAppointment.php">View Appointment</a> 
                            </div> 
                        </div> 
                        <div class="dropdown"> 
                            <button class="dropbtn">Diagnosis <i class="fa fa-caret-down"></i></button> 
                            <div class="dropdown-content"> 
                                <a href="createNewDiagnosis.php">Create New Diagnosis</a> 
                                <a href="viewDiagnosis.php">View Diagnosis</a> 
                            </div> 
                        </div> 
                        <div class="dropdown"> 
                            <button class="dropbtn">Test Result <i class="fa fa-caret-down"></i></button> 
                            <div class="dropdown-content"> 
                                <a href="createNewTestResult.php">Create New Test Result</a> 
                                <a href="viewTestResult.php">View Test Result</a> 
                            </div> 
                        </div> 
                    <?php elseif ($userType == 'Patient'): ?> 
                        <div class="dropdown"> 
                            <button class="dropbtn">Appointment <i class="fa fa-caret-down"></i></button> 
                            <div class="dropdown-content"> 
                                <a href="bookAppointment.php">Book Appointment</a> 
                            </div> 
                        </div> 
                    <?php endif; ?> 
                    <a href="logout.php" class="logout-link">Logout</a> 
                <?php endif; ?> 
            </div> 
        </div> 
    </header> 
</body> 
</html>
