<!DOCTYPE HTML>
<html>
<head>
    <title>Video Box</title>
</head>
    <body>
    <?php include '../src/components/header.php'?>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/actions/checkLoginAdmin.php'); ?>

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
            $qry = mysqli_query($conn,"SELECT id, username, password, email, permission, accredited FROM users where id='$database_id'"); // select query

            $data = mysqli_fetch_array($qry); // fetch data

            if(isset($_POST['update'])) // when click on Update button
            {
                $username = $conn->real_escape_string($_POST['username']);
                $password = $conn->real_escape_string($_POST['password']);
                $email = $conn->real_escape_string($_POST['email']);
                $permission = $conn->real_escape_string($_POST['permission']);
                $accredited = $conn->real_escape_string($_POST['accredited']);

                $password = password_hash($password, PASSWORD_DEFAULT);

                $edit = mysqli_query($conn,"update users set username='$username', password='$password', email='$email', permission='$permission', accredited='$accredited' where id='$database_id'");

                if($edit)
                {
                    logUser("edited user");
                    mysqli_close($conn); // Close connection
                    header("location:" . 'usersOverview.php'); // redirects to all records page
                    exit;
                }
                else
                {
                    logError("SQL Update", mysqli_error());
                }
            }
                    ?>

                            <h3>Update Data</h3>

                                <form method="POST">
                                    <input type="text" class="input--field input-small" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter Username" Required> <br><br>
                                    <input type="text" class="input--field input-small" name="password" value="" placeholder="Enter Password"><br><br>
                                    <input type="text" class="input--field input-small" name="email" value="<?php echo $data['email'] ?>" placeholder="Enter Email" Required><br><br>
                                    <input type="text" class="input--field input-small" name="permission" value="<?php echo $data['permission'] ?>" placeholder="Enter Permission" Required><br><br>
                                    <input type="text" class="input--field input-small" name="accredited" value="<?php echo $data['accredited'] ?>" placeholder="Enter Accredited" Required><br><br>
                                    <input type="submit" class="form--submit-button" name="update" value="Update">
                                </form>
                            </body>
                        </html>
<?php
        }
    }
}
?>



