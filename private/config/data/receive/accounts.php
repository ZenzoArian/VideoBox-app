<?php
// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = "";
$formCheck1 = false;
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

if ($formCheck1 && $formCheck3) {
    include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

// Escape user inputs for security
    $username = $conn->real_escape_string($_REQUEST['username']);
    $password = $conn->real_escape_string($_REQUEST['password']);

    $sql = "SELECT username, password FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if ($username == $row["username"]) {
          if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $row["username"];
            header("Location: profile.php");
          } else {
            echo "Incorrect";
          }
        }
      }
    }

// Close connection
    $conn->close();
}

?>


