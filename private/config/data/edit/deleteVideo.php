<?php


include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn, "delete from uploads where id = '$id'"); // delete query

if ($del) {
    mysqli_close($conn); // Close connection
    header("location:" . '/VideoBox-app/public/videosOverview.php'); // redirects to all records page
    exit;
} else {
    echo "Error deleting record"; // display error message if not delete
}
