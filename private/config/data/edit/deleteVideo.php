<?php


include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

$id = $_GET['id']; // get id through query string
$location = $_GET['location']; // get location through query string

$sql = "SELECT id FROM uploads";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (password_verify($row["id"], $id)) {
            $database_id = $row['id'];
            $del = mysqli_query($conn, "delete from uploads where id = '$database_id'"); // delete query

            if ($del && $location == 'video') {
                mysqli_close($conn); // Close
                logUser("deleted video from videoOverview");
                header("location:" . '/VideoBox-app/public/videosOverview.php'); // redirects to all records page
                exit;
            } else if ($del && $location == 'profile') {
                mysqli_close($conn); // Close connection
                logUser("deleted video from profile");
                header("location:" . '/VideoBox-app/public/profile.php'); // redirects to all records page
                exit;
            } else {
                echo "Error deleting record"; // display error message if not delete
                logError("SQL delete record", "Unable to delete record from database.");
            }

        }
    }
}


