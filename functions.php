<?php
require_once("conn.php");


function addAPPOINTMENT($appointmentID, $patientID, $staffID, $appointmentDate, $AppointmentTime) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("INSERT INTO APPOINTMENT (appointmentID, patientID, staffID, appointmentDate, appointmentTime)
                                 VALUES (:id, :patientID, :staffID, :appointmentDate, :appointmentTime)");
      $stmt->bindValue(':id', $appointmentID, SQLITE3_INTEGER);
      $stmt->bindValue(':patientID', $patientID, SQLITE3_INTEGER);
      $stmt->bindValue(':staffID', $staffID, SQLITE3_INTEGER);
      $stmt->bindValue(':appointmentDate', $appointmentDate, SQLITE3_TEXT);
      $stmt->bindValue(':appointmentTime', $AppointmentTime, SQLITE3_TEXT);

      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
      
}


function dropdownAPPOINTMENT() :void
{
    $db = db_connect();

 $query = "SELECT appointmentID, patientID, staffID, appointmentDate, appointmentTime FROM APPOINTMENT";
    $result = $db->query($query);

    
    echo '<select name="appointment">';
    echo '<option value="">List of Appointments</option>'; 

    
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<option value="' . $row['appointmentID'] . '">' . $row['patientID'] . ', ' . $row['staffID'] . ', ' . $row['appointmentDate'] . ', ' . $row['appointmentTime']. '</option>';
    }
    
    echo '</select>';
    $db->close();

}

function viewAPPOINTMENT($id) :array
{
    $db = db_connect();
    $query = "SELECT * FROM APPOINTMENT WHERE appointmentID = $id ORDER BY appointmentID";
    $result = $db->query($query);
    $appointment_detail = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $appointment_detail[] = $row;
    }
    $db->close();
    return $appointment_detail;
}

function updateAPPOINTMENT($id, $patientID, $staffID, $appointmentDate, $appointmentTime) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("UPDATE APPOINTMENT SET patientID = :patientID, staffID = :staffID, appointmentDate = :appointmentDate, appointmentTime = :appointmentTime WHERE appointmentID = :id");
    $stmt->bindValue(":id", $id, SQLITE3_INTEGER);
    $stmt->bindValue(":patientID", $patientID, SQLITE3_INTEGER);
    $stmt->bindValue(":staffID", $staffID, SQLITE3_INTEGER);
    $stmt->bindValue(":appointmentDate", $appointmentDate, SQLITE3_TEXT);
    $stmt->bindValue(":appointmentTime", $appointmentTime, SQLITE3_TEXT);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}


function deleteAPPOINTMENT($id) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("DELETE FROM APPOINTMENT WHERE appointmentID = :id");
    $stmt->bindValue(":id", $id, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}












function addDIAGNOSIS($diagnosisID, $appointmentID, $diagnosisDate, $diagnosisTime, $illness) :bool
{
    $db = db_connect();
    $stmt = $db->prepare( "INSERT INTO DIAGNOSIS (diagnosisID, appointmentID, diagnosisDate, diagnosisTime, illness)
                                 VALUES (:id, :appointmentID, :diagnosisDate, :diagnosisTime, :illness)");
      $stmt->bindValue(":id", $diagnosisID, SQLITE3_INTEGER);
      $stmt->bindValue(":appointmentID", $appointmentID, SQLITE3_INTEGER);
      $stmt->bindValue(":diagnosisDate", $diagnosisDate, SQLITE3_TEXT);
      $stmt->bindValue(":diagnosisTime", $diagnosisTime, SQLITE3_TEXT);
      $stmt->bindValue(":illness", $illness, SQLITE3_TEXT);

      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
}


function dropdownDIAGNOSIS() :void
{
    $db = db_connect();

 $query = "SELECT diagnosisID, appointmentID, diagnosisDate, diagnosisTime, illness FROM DIAGNOSIS";
    $result = $db->query($query);

    
    echo '<select name="diagnosis">';
    echo '<option value="">List of Diagnoses</option>'; 

    
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<option value="' . $row['diagnosisID'] . '">' . $row['appointmentID'] . ', ' . $row['diagnosisDate'] . ', ' . $row['diagnosisTime'] . ', ' . $row['illness'] . '</option>';
    }
    
    echo '</select>';
    $db->close();

}

function viewDIAGNOSIS($diagnosisid) :array
{
    $db = db_connect();
    $query = "SELECT * FROM DIAGNOSIS WHERE diagnosisID = $diagnosisid";
    $result = $db->query($query);
    $diagnosis_detail = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $diagnosis_detail[] = $row;
    }
    $db->close();
    return $diagnosis_detail;
}

function updateDIAGNOSIS($diagnosisid, $appointmentID, $diagnosisDate, $diagnosisTime, $illness) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("UPDATE DIAGNOSIS SET appointmentID = :appointmentID, diagnosisDate = :diagnosisDate, diagnosisTime = :diagnosisTime, illness = :illness WHERE diagnosisID = :diagnosisid");
    $stmt->bindValue(":diagnosisid", $diagnosisid, SQLITE3_INTEGER);
    $stmt->bindValue(":appointmentID", $appointmentID, SQLITE3_INTEGER);
    $stmt->bindValue(":diagnosisDate", $diagnosisDate, SQLITE3_TEXT);
    $stmt->bindValue(":diagnosisTime", $diagnosisTime, SQLITE3_TEXT);
    $stmt->bindValue(":illness", $illness, SQLITE3_TEXT);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
    
}

function deleteDIAGNOSIS($diagnosisid) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("DELETE FROM DIAGNOSIS WHERE diagnosisID = :id");
    $stmt->bindValue(":id", $diagnosisid, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
    
}












function addPATIENT($patientID, $firstName, $middleName, $lastName, $userType, $username, $password, $homeAddress, $city, $postcode, $email, $phoneNumber) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("INSERT INTO PATIENT (patientID, firstName, middleName, lastName, userType, username, password, homeAddress, city, postcode, email, phoneNumber)
                                 VALUES (:patientID, :firstName, :middleName, :lastName, :userType, :username, :password, :homeAddress, :city, :postcode, :email, :phoneNumber)");
      $stmt->bindValue(":patientID", $patientID, SQLITE3_INTEGER);
      $stmt->bindValue(":firstName", $firstName, SQLITE3_TEXT);
      $stmt->bindValue(":middleName", $middleName, SQLITE3_TEXT);
      $stmt->bindValue(":lastName", $lastName, SQLITE3_TEXT);
      $stmt->bindValue(":userType", $userType, SQLITE3_TEXT);
      $stmt->bindValue(":username", $username, SQLITE3_TEXT);
      $stmt->bindValue(":password", $password, SQLITE3_TEXT);
      $stmt->bindValue(":homeAddress", $homeAddress, SQLITE3_TEXT);
      $stmt->bindValue(":city", $city, SQLITE3_TEXT);
      $stmt->bindValue(":postcode", $postcode, SQLITE3_TEXT);
      $stmt->bindValue(":email", $email, SQLITE3_TEXT);
      $stmt->bindValue(":phoneNumber", $phoneNumber, SQLITE3_TEXT);

      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
      
}


function dropdownPATIENT() :void
{
    $db = db_connect();

 $query = "SELECT patientID, firstName, middleName, lastName, userType, username, password, homeAddress, city, postcode, email, phoneNumber FROM PATIENT";
    $result = $db->query($query);

    
    echo '<select name="patient">';
    echo '<option value="">List of Patients</option>'; 

    
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<option value="' . $row['patientID'] . '">' . $row['firstName'] . ' ' . $row['middleName'] . ' ' . $row['lastName'] . '</option>';
    }
    
    echo '</select>';
    $db->close();

}

function viewPATIENT($patient_id) :array
{
    $db = db_connect();
    $query = "SELECT * FROM PATIENT WHERE patientID = $patient_id ORDER BY patientID";
    $result = $db->query($query);
    $patient_detail = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $patient_detail[] = $row;
    }
    $db->close();
    return $patient_detail;
}

function updatePATIENT($patient_id, $firstName, $middleName, $lastName, $userType, $username, $password, $homeAddress, $city, $postcode, $email, $phoneNumber) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("UPDATE PATIENT SET firstName = :firstName, middleName = :middleName, lastName = :lastName, userType = :userType, username = :username, password = :password, homeAddress = :homeAddress, city = :city, postcode = :postcode, email = :email, phoneNumber = :phoneNumber WHERE patientID = :patientID");
    $stmt->bindValue(":patientID", $patient_id, SQLITE3_INTEGER);
    $stmt->bindValue(":firstName", $firstName, SQLITE3_TEXT);
    $stmt->bindValue(":middleName", $middleName, SQLITE3_TEXT);
    $stmt->bindValue(":lastName", $lastName, SQLITE3_TEXT);
    $stmt->bindValue(":userType", $userType, SQLITE3_TEXT);
    $stmt->bindValue(":username", $username, SQLITE3_TEXT);
    $stmt->bindValue(":password", $password, SQLITE3_TEXT);
    $stmt->bindValue(":homeAddress", $homeAddress, SQLITE3_TEXT);
    $stmt->bindValue(":city", $city, SQLITE3_TEXT);
    $stmt->bindValue(":postcode", $postcode, SQLITE3_TEXT);
    $stmt->bindValue(":email", $email, SQLITE3_TEXT);
    $stmt->bindValue(":phoneNumber", $phoneNumber, SQLITE3_TEXT);

    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function deletePATIENT($patient_id) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("DELETE FROM PATIENT WHERE patientID = :id");
    $stmt->bindValue(":id", $patient_id, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}












function addSTAFF($staffID, $firstName, $middleName, $lastName, $userType, $username, $password, $phoneNumber, $email, $homeAddress, $city, $postcode) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("INSERT INTO STAFF (staffID, firstName, middleName, lastName, userType, username, password, phoneNumber, email, homeAddress, city, postcode)
                                 VALUES (:id, :fname, :mname, :lname, :userType, :username, :password, :phoneNumber, :email, :homeAddress, :city, :postcode)");
    

      $stmt->bindValue(":id", $staffID, SQLITE3_INTEGER);
      $stmt->bindValue(":fname", $firstName, SQLITE3_TEXT);
      $stmt->bindValue(":mname", $middleName, SQLITE3_TEXT);
      $stmt->bindValue(":lname", $lastName, SQLITE3_TEXT);
      $stmt->bindValue(":userType", $userType, SQLITE3_TEXT);
      $stmt->bindValue(":username", $username, SQLITE3_TEXT);
      $stmt->bindValue(":password", $password, SQLITE3_TEXT);
      $stmt->bindValue(":phoneNumber", $phoneNumber, SQLITE3_TEXT);
      $stmt->bindValue(":email", $email, SQLITE3_TEXT);
      $stmt->bindValue(":homeAddress", $homeAddress, SQLITE3_TEXT);
      $stmt->bindValue(":city", $city, SQLITE3_TEXT);
      $stmt->bindValue(":postcode", $postcode, SQLITE3_TEXT);
      $stmt->bindValue(":city", $city, SQLITE3_TEXT);



      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
}


function dropdownSTAFF() :void
{
    $db = db_connect();

 $query = "SELECT staffID, firstName, middleName, lastName, userType, username, password, phoneNumber, email, homeAddress, city, postcode FROM STAFF";
    $result = $db->query($query);

    
    echo '<select name="staff">';
    echo '<option value="">List of Staff</option>'; 

    
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<option value="' . $row['staffID'] . '">' . $row['firstName'] . ', ' . $row['middleName'] . ', ' . $row['lastName'] . ', ' . $row['phoneNumber'] . ', ' . $row['email']. ', ' . $row['homeAddress'].', ' . $row['postcode'] .', ' . $row['city'] . '</option>';
    }
    
    echo '</select>';
    $db->close();

}

function viewSTAFF($staff_id) :array
{
    $db = db_connect();
    $query = "SELECT * FROM STAFF WHERE staffID = $staff_id ORDER BY staffID";
    $result = $db->query($query);
    $staff_detail = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $staff_detail[] = $row;
    }
    $db->close();
    return $staff_detail;
}

function updateSTAFF($staff_id, $firstName, $middleName, $lastName, $userType, $username, $password, $phoneNumber, $email, $homeAddress, $city, $postcode) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("UPDATE STAFF SET firstName = :fname, middleName = :mname, lastName = :lname, userType = :userType, username = :username, password = :password, phoneNumber = :phoneNumber, email = :email, homeAddress = :homeAddress, city = :city, postcode = :postcode WHERE staffID = :id");
    $stmt->bindValue(":id", $staff_id, SQLITE3_INTEGER);
    $stmt->bindValue(":fname", $firstName, SQLITE3_TEXT);
    $stmt->bindValue(":mname", $middleName, SQLITE3_TEXT);
    $stmt->bindValue(":lname", $lastName, SQLITE3_TEXT);
    $stmt->bindValue(":userType", $userType, SQLITE3_TEXT);
    $stmt->bindValue(":username", $username, SQLITE3_TEXT);
    $stmt->bindValue(":password", $password, SQLITE3_TEXT);
    $stmt->bindValue(":phoneNumber", $phoneNumber, SQLITE3_TEXT);
    $stmt->bindValue(":email", $email, SQLITE3_TEXT);
    $stmt->bindValue(":homeAddress", $homeAddress, SQLITE3_TEXT);
    $stmt->bindValue(":city", $city, SQLITE3_TEXT);
    $stmt->bindValue(":postcode", $postcode, SQLITE3_TEXT);
    $stmt->bindValue(":home_postcode", $home_postcode, SQLITE3_TEXT);
    $stmt->bindValue(":guest_city", $guest_city, SQLITE3_TEXT);
    

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function deleteSTAFF($staff_id) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("DELETE FROM STAFF WHERE staffID = :id");
    $stmt->bindValue(":id", $staff_id, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}













function addTEST_RESULT($testID, $appointmentID, $testDate, $testTime, $resultValue, $unit, $status) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("INSERT INTO TEST_RESULT (testID, appointmentID, testDate, testTime, resultValue, unit, status)
                                 VALUES (:testID, :appointmentID, :testDate, :testTime, :resultValue, :unit, :status)");
      $stmt->bindValue(":testID", $testID, SQLITE3_INTEGER);
      $stmt->bindValue(":appointmentID", $appointmentID, SQLITE3_INTEGER);
      $stmt->bindValue(":testDate", $testDate, SQLITE3_TEXT);
      $stmt->bindValue(":testTime", $testTime, SQLITE3_TEXT);
      $stmt->bindValue(":resultValue", $resultValue, SQLITE3_TEXT);
      $stmt->bindValue(":unit", $unit, SQLITE3_TEXT);
      $stmt->bindValue(":status", $status, SQLITE3_TEXT);



      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
}


function dropdownTEST_RESULT() :void
{
    $db = db_connect();

 $query = "SELECT testID, appointmentID, testDate, testTime, resultValue, unit, status FROM TEST_RESULT";
    $result = $db->query($query);

    
    echo '<select name="test_result">';
    echo '<option value="">List of Test Results</option>'; 

    
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<option value="' . $row['testID'] . '">' . $row['testDate'] . ', ' . $row['testTime'] . ', ' . $row['resultValue'] . ', ' . $row['unit'] . ', ' . $row['status'].  '</option>';
    }
    
    echo '</select>';
    $db->close();

}

function viewTEST_RESULT($test_id) :array
{
    $db = db_connect();
    $query = "SELECT * FROM TEST_RESULT WHERE testID = $test_id ORDER BY testID";
    $result = $db->query($query);
    $test_result_detail = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $test_result_detail[] = $row;
    }
    $db->close();
    return $test_result_detail;
}
    

function updateTEST_RESULT($test_id, $appointment_id, $test_date, $test_time, $result_value, $unit, $status) :bool
{
    $db = db_connect();
    $stmt = $db->prepare("UPDATE TEST_RESULT SET appointmentID = :appointment_id, testDate = :test_date, testTime = :test_time, resultValue = :result_value, unit = :unit, status = :status WHERE testID = :test_id");
    $stmt->bindValue(":test_id", $test_id, SQLITE3_INTEGER);
    $stmt->bindValue(":appointment_id", $appointment_id, SQLITE3_INTEGER);
    $stmt->bindValue(":test_date", $test_date, SQLITE3_TEXT);
    $stmt->bindValue(":test_time", $test_time, SQLITE3_TEXT);
    $stmt->bindValue(":result_value", $result_value, SQLITE3_TEXT);
    $stmt->bindValue(":unit", $unit, SQLITE3_TEXT);
    $stmt->bindValue(":status", $status, SQLITE3_TEXT);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function deleteTEST_RESULT($test_id) :bool{
    $db = db_connect();
    $stmt = $db->prepare("DELETE FROM TEST_RESULT WHERE testID = :id");
    $stmt->bindValue(":id", $test_id, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}




function bookAppointment($patientID, $staffID, $appointmentDate, $appointmentTime) { 
    global $db; 
    try { 
        $stmt = $db->prepare("INSERT INTO APPOINTMENT (patientID, staffID, appointmentDate, appointmentTime) VALUES (:patientID, :staffID, :appointmentDate, :appointmentTime)"); 
        $stmt->bindValue(':patientID', $patientID, SQLITE3_INTEGER); 
        $stmt->bindValue(':staffID', $staffID, SQLITE3_INTEGER); 
        $stmt->bindValue(':appointmentDate', $appointmentDate, SQLITE3_TEXT); 
        $stmt->bindValue(':appointmentTime', $appointmentTime, SQLITE3_TEXT); 
        if ($stmt->execute()) { 
            return true; 
        } else { 
            return false; 
        } 
    } catch (Exception $e) { 
        echo "Error: " . $e->getMessage(); 
        return false; 
    } 
}
    


?>                        