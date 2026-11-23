<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Test Results</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php
    include("NavBar.php");
    require_once("functions.php");
    ?>
    <div>
        <h2 class="centered-header">List of Test Results</h2>
    </div>
    <div class="main">
        <?php
        $db = new SQLite3('hospital_management_2.db');
        $select_query = "SELECT * FROM TEST_RESULT";
        $result = $db->query($select_query);
        if (!$result) 
        {
            echo "An error occurred while retrieving test result data.";
            exit();
        }
        echo "<table>";
        echo "
        <thead>
            <tr> 
                <td>Test ID</td> 
                <td>Appointment ID</td> 
                <td>Test Date</td> 
                <td>Test Time </td>
                <td>Result Value</td>
                <td>Unit</td>
                <td>Status</td>
                <td style ='text-align: center' colspan='2'> Action </td> 
            </tr>
        </thead>";
        echo "<tbody>";
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) 
        {
            $id = $row['testID'];
            $appId = $row['appointmentID'];
            $testDate = $row['testDate'];
            $testTime = $row['testTime'];
            $resultValue = $row['resultValue'];
            $unit = $row['unit'];
            $status = $row['status'];
            echo "<tr> 
                  <td>$id</td> 
                  <td>$appId</td>
                  <td>$testDate</td>
                  <td>$testTime</td>
                  <td>$resultValue</td>
                    <td>$unit</td>
                    <td>$status</td>
                  <td><a href='updateTestResult.php?id=$id'><button>Update</button></a></td>
                  <td><a href='deleteTestResult.php?id=$id' onclick='return confirm(\"Are you sure you want to delete this test result?\")'><button>Delete</button></a></td>
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