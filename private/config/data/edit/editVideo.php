<?php

include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"SELECT id, username, title, description, subject, views, file FROM uploads where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $subject = $conn->real_escape_string($_POST['subject']);

    $edit = mysqli_query($conn,"update uploads set title='$title', description='$description', subject='$subject' where id='$id'");

    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:" . '/VideoBox-app/public/videosOverview.php'); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }
}
?>

<h3>Update Data</h3>

<form method="POST">
    <input type="text" name="title" value="<?php echo $data['title'] ?>" placeholder="Enter Title" Required>
    <input type="text" name="description" value="<?php echo $data['description'] ?>" placeholder="Enter Description" Required>
    <input type="text" name="subject" value="<?php echo $data['subject'] ?>" placeholder="Enter Subject" Required>
    <input type="submit" name="update" value="Update">
</form>
