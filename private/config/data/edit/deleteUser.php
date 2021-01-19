<?php

include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

$id = $_GET['id']; // get id through query string
$location = $_GET['location']; // get location through query string

$sql = "SELECT id FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (password_verify($row["id"], $id)) {
            $database_id = $row['id'];
            $del = mysqli_query($conn, "delete from users where id = '$database_id'"); // delete query

            if ($del) {
                mysqli_close($conn); // Close connection
                header("location:" . '/VideoBox-app/public/usersOverview.php'); // redirects to all records page
                exit;
            } else {
                echo "Error deleting record"; // display error message if not delete
            }
        } else {
            header("location:" . '/VideoBox-app/public/index.php'); // redirects to all records page
        }
    }
}