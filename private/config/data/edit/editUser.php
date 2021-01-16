<?php

include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"SELECT id, username, password, email, permission, accredited FROM users where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);
    $permission = $conn->real_escape_string($_POST['permission']);
    $accredited = $conn->real_escape_string($_POST['accredited']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $edit = mysqli_query($conn,"update users set username='$username', password='$password', email='$email', permission='$permission', accredited='$accredited' where id='$id'");

    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:" . '/VideoBox-app/public/usersOverview.php'); // redirects to all records page
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
    <input type="text" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter Username" Required>
    <input type="text" name="password" value="" placeholder="Enter Password" Required>
    <input type="text" name="email" value="<?php echo $data['email'] ?>" placeholder="Enter Email" Required>
    <input type="text" name="permission" value="<?php echo $data['permission'] ?>" placeholder="Enter Permission" Required>
    <input type="text" name="accredited" value="<?php echo $data['accredited'] ?>" placeholder="Enter Accredited" Required>
    <input type="submit" name="update" value="Update">
</form>
