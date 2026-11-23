<?php

function db_connect(): SQLite3 {
    return $db = new SQLite3(filename: "hospital_management_2.db");
}

$db = db_connect();
if ($db) {
    echo "Connected to Hospital Management database successfully.";
}
else {
    echo "Connection failed: " . $db->lastErrorMsg();
}
?>