<?php
include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');


// Escape user inputs for security
$username = $conn->real_escape_string($_REQUEST['username']);
$permission = $conn->real_escape_string($_REQUEST['permission']);

// Attempt insert query execution
$sql = "INSERT INTO users (username, permission) VALUES ('$username', '$permission')";
if($conn->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}

// Close connection
$conn->close();
?>