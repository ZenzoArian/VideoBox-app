<?php
include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');


$sql = "INSERT INTO users (username, permission)
VALUES ('John Doe', 'user')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>