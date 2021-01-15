<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Add User Form</title>-->
<!--    <style>-->
<!--        .error {color: #FF0000;}-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->

<?php
// define variables and set to empty values
$usernameErr = $emailErr = $passwordErr = "";
$username = $email = $password = "";
$formCheck1 = false;
$formCheck2 = false;
$formCheck3 = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $usernameErr = "Name is required";
    } else {
        $username = test_input($_POST["username"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
            $usernameErr = "Only letters and white space allowed";
        } else {
            $formCheck1 = true;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            $formCheck2 = true;
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        $formCheck3 = true;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($formCheck1 && $formCheck2 && $formCheck3) {
    include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

// Escape user inputs for security
    $username = $conn->real_escape_string($_REQUEST['username']);
    $password = $conn->real_escape_string($_REQUEST['password']);
    $email = $conn->real_escape_string($_REQUEST['email']);

//The mysqli_real_escape_string() function escapes special characters
// in a string and create a legal SQL string to provide security against SQL injection.


// Attempt insert query execution
    $sql = "INSERT INTO users (username, password, email, permission, accredited) VALUES ('$username', '$password', '$email', 'reporter', false)";
    if($conn->query($sql) === true){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }

// Close connection
    $conn->close();
}

?>


