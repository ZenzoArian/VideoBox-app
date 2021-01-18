<?php
include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');
if(isset($_POST['submit']))
{
    $user_id = $_POST['user_id'];
    $result = mysqli_query($conn,"SELECT * FROM user_details where user_id='" . $_POST['user_id'] . "'");
    $sql = "SELECT * FROM users where username='" . $_POST['user_id'] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
	$fetch_user_id=$row['username'];
	$email_id=$row['email'];
	$password=$row['password'];
	    if($user_id==$fetch_user_id) {
            $to = $email_id;
            $subject = "Password";
            $txt = "Your password is : $password.";
            $headers = "From: zenzo.arian@xs4all.nl" . "\r\n" .
            "CC: zenzo.arian@xs4all.nl";
            mail($to,$subject,$txt,$headers);
        }
            else{
                echo 'invalid userid';
            }
}
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Video Box</title>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
        <form action='' method='post'>
        <table cellspacing='5'>
        <tr><td>user id:</td><td><input type='text' name='user_id'/></td></tr>
        <tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
        </table>
    </body>
</html>

<!-- 
    --- PAGES ---
    home                  - searchbar, top 5 watched videos overview.
    login                 - link to create account, link to password forgot.
    create account        - link to login.
    password forgot       - link to login, link to create account.
    video upload          - forum to upload video with content.
    profile               - overview of uploaded content, create content, update content, delete content.
    logout                - message when logged out, link to home page.
    admin users overview  - overview of users, create users, update users, delete users.
    admin videos overview - overview of content, be able to sort content on users or subject, create content, update content, delete content.
 -->