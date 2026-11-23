<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>View Staff</title> 
    <link rel="stylesheet" href="style.css" /> 
</head> 
<body> 
    <?php include("NavBar.php"); require_once("functions.php"); ?> 
    <div> 
        <h2 class="centered-header">List of Staff</h2> 
    </div> 
    <div class="main"> 
        <form method="GET"> 
            <input type="text" name="search" placeholder="Search staff by ID or name..."> 
            <button type="submit">Search</button> 
        </form> 
        <?php 
            $db = new SQLite3('hospital_management_2.db'); 
            $searchTerm = $_GET['search'] ?? ''; 
            if ($searchTerm) { 
                if (is_numeric($searchTerm)) { 
                    $select_query = "SELECT * FROM STAFF WHERE staffID = :search"; 
                } else { 
                    $select_query = "SELECT * FROM STAFF WHERE firstName LIKE :search OR lastName LIKE :search"; 
                } 
                $stmt = $db->prepare($select_query); 
                if (is_numeric($searchTerm)) { 
                    $stmt->bindValue(':search', $searchTerm, SQLITE3_INTEGER); 
                } else { 
                    $stmt->bindValue(':search', '%' . $searchTerm . '%', SQLITE3_TEXT); 
                } 
                $result = $stmt->execute(); 
            } else { 
                $select_query = "SELECT * FROM STAFF"; 
                $result = $db->query($select_query); 
            } 
            echo "<table>"; 
            echo " <thead> <tr> 
                <td>Staff ID</td> 
                <td>First Name</td> 
                <td>Middle Name</td> 
                <td>Last Name</td> 
                <td>User Type</td> 
                <td>Username</td> 
                <td>Password</td> 
                <td>Phone Number</td> 
                <td>Email</td> 
                <td>Home Address</td> 
                <td>City</td> 
                <td>Postcode</td> 
                <td style ='text-align: center' colspan='2'> Action </td> 
            </tr> </thead>"; 
            echo "<tbody>"; 
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) { 
                $id = $row['staffID']; 
                $fname = $row['firstName']; 
                $mname = $row['middleName']; 
                $lname = $row['lastName']; 
                $userType = $row['userType']; 
                $username = $row['username']; 
                $password = $row['password']; 
                $phoneNo = $row['phoneNumber']; 
                $emailaddress = $row['email']; 
                $homeaddress = $row['homeAddress']; 
                $city = $row['city']; 
                $postcode = $row['postcode']; 
                echo "<tr> 
                    <td>$id</td> 
                    <td>$fname</td> 
                    <td>$mname</td> 
                    <td>$lname</td> 
                    <td>$userType</td> 
                    <td>$username</td> 
                    <td>$password</td> 
                    <td>$phoneNo</td> 
                    <td>$emailaddress</td> 
                    <td>$homeaddress</td> 
                    <td>$city</td> 
                    <td>$postcode</td> 
                    <td><a href='updateStaff.php?id=$id'><button>Update</button></a></td> 
                    <td><a href='deleteStaff.php?id=$id' onclick='return confirm(\"Are you sure you want to delete this staff?\")'><button>Delete</button></a></td> 
                </tr>"; 
            } 
            echo "</tbody></table>"; 
            $db->close(); 
        ?> 
    </div> 
    <footer> 
        <div class=footer style="text-align: center;"> &copy; 2026 Alex Hospital Management System. All rights reserved. </div> 
    </footer> 
</body> 
</html>