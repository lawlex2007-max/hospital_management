<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php
    include("NavBar.php");
    require_once("functions.php");
    ?>
    <div>
        <h2 class="centered-header">List of Appointments</h2>
    </div>
    <div class="main">
        <?php
        $db = new SQLite3('hospital_management_2.db');
        $select_query = "SELECT * FROM APPOINTMENT";
        $result = $db->query($select_query);
        if (!$result) 
        {
            echo "An error occurred while retrieving appointment data.";
            exit();
        }
        echo "<table>";
        echo "
        <thead>
            <tr> 
                <td>Appointment ID</td> 
                <td>Patient ID</td> 
                <td>Staff ID</td>
                <td>Appointment Date</td> 
                <td>Appointment Time </td>
                <td style ='text-align: center' colspan='2'> Action </td> 
            </tr>
        </thead>";
        echo "<tbody>";
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) 
        {
            $id = $row['appointmentID'];
            $patientId = $row['patientID'];
            $staffId = $row['staffID'];
            $appointmentDate = $row['appointmentDate'];
            $appointmentTime = $row['appointmentTime'];
            echo "<tr> 
                  <td>$id</td> 
                  <td>$patientId</td>
                  <td>$staffId</td>
                  <td>$appointmentDate</td>
                  <td>$appointmentTime</td>
                  <td><a href='updateAppointment.php?id=$id'><button>Update</button></a></td>
                  <td><a href='deleteAppointment.php?id=$id' onclick='return confirm(\"Are you sure you want to delete this appointment?\")'><button>Delete</button></a></td>
                </tr>";
        }
        echo "</tbody></table>";
        $db->close();
        ?>
    </div>
    <footer>
        <div class=footer style="text-align: center;">
            &copy; 2026 Alex Hospital Management System. All rights reserved.
        </div>
    </footer>
</body>
</html>