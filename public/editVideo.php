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
            $qry = mysqli_query($conn,"SELECT id, username, title, description, subject, views, file FROM uploads where id='$database_id'"); // select query

            $data = mysqli_fetch_array($qry); // fetch data

            if(isset($_POST['update'])) // when click on Update button
            {
                $title = $conn->real_escape_string($_POST['title']);
                $description = $conn->real_escape_string($_POST['description']);
                $subject = $conn->real_escape_string($_POST['subject']);

                $edit = mysqli_query($conn,"update uploads set title='$title', description='$description', subject='$subject' where id='$database_id'");

                if($edit && $location == 'video')
                {
                    logUser("edited video from videoOverview");
                    mysqli_close($conn); // Close connection
                    header("location:" . 'videosOverview.php'); // redirects to all records page
                    exit;
                } else if($edit && $location == 'profile')
                {
                    logUser("edited video from profile");
                    mysqli_close($conn); // Close connection
                    header("location:" . 'profile.php'); // redirects to all records page
                    exit;
                } else
                {
                    logError("SQL Update", mysqli_error());
                }
            }
            ?>
            <!DOCTYPE HTML>
            <html>
            <head>
                <title>Video Box</title>
            </head>
              <body>
              <?php include '../src/components/header.php'?>

                <h3>Update Data</h3>

                <form method="POST">
                    <input type="text" class="input--field input-small" name="title" value="<?php echo $data['title'] ?>" placeholder="Enter Title" Required><br><br>
                    <input type="text" class="input--field input-small" name="description" value="<?php echo $data['description'] ?>" placeholder="Enter Description" Required><br><br>
                    <input type="text" class="input--field input-small" name="subject" value="<?php echo $data['subject'] ?>" placeholder="Enter Subject" Required><br><br>
                    <input type="submit" class="form--submit-button" name="update" value="Update">
                </form>
              </body>
            </html>

            <?php
        }
    }
}
?>


