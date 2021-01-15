<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User Form</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
//include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');
//
//
//// Escape user inputs for security
//$username = $conn->real_escape_string($_REQUEST['username']);
//$permission = $conn->real_escape_string($_REQUEST['permission']);
//
////The mysqli_real_escape_string() function escapes special characters
//// in a string and create a legal SQL string to provide security against SQL injection.
//
//
//// Attempt insert query execution
//$sql = "INSERT INTO users (username, permission) VALUES ('$username', '$permission')";
//if($conn->query($sql) === true){
//    echo "Records inserted successfully.";
//} else{
//    echo "ERROR: Could not able to execute $sql. " . $conn->error;
//}
//
//// Close connection
//$conn->close();

// define variables and set to empty values
$usernameErr = $emailErr = $passwordErr = "";
$username = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $usernameErr = "Name is required";
    } else {
        $username = test_input($_POST["username"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
            $usernameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <span class="error">* <?php echo $usernameErr;?></span>
        <br><br>
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
    </p>
    <input type="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $username;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
?>

</body>
</html>
