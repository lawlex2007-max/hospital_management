<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Diagnoses</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php
    include("NavBar.php");
    require_once("functions.php");
    ?>
    <div>
        <h2 class="centered-header">List of Diagnoses</h2>
    </div>
    <div class="main">
        <?php
        $db = new SQLite3('hospital_management_2.db');
        $select_query = "SELECT * FROM DIAGNOSIS";
        $result = $db->query($select_query);
        if (!$result) 
        {
            echo "An error occurred while retrieving diagnosis data.";
            exit();
        }
        echo "<table>";
        echo "
        <thead>
            <tr> 
                <td>Diagnosis ID</td> 
                <td>Appointment ID</td> 
                <td>Diagnosis Date</td>
                <td>Diagnosis Time</td> 
                <td>Illness</td>
                <td style ='text-align: center' colspan='2'> Action </td> 
            </tr>
        </thead>";
        echo "<tbody>";
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) 
        {
            $id = $row['diagnosisID'];
            $appId = $row['appointmentID'];
            $diagnosisDate = $row['diagnosisDate'];
            $diagnosisTime = $row['diagnosisTime'];
            $illness = $row['illness'];
            echo "<tr> 
                  <td>$id</td> 
                  <td>$appId</td>
                  <td>$diagnosisDate</td>
                  <td>$diagnosisTime</td>
                  <td>$illness</td>
                  <td><a href='updateDiagnosis.php?id=$id'><button>Update</button></a></td>
                  <td><a href='deleteDiagnosis.php?id=$id' onclick='return confirm(\"Are you sure you want to delete this diagnosis?\")'><button>Delete</button></a></td>
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