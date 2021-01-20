<?php
$username = "Unknown User";
function logUser($user_action) {
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $username = $_SESSION['username'];
} else {
    $username = "Unknown User";
}
$log = fopen("../private/logHandel/logs/user.txt", "a+") or die("Unable to open file!");

$user = date("Y-m-d h:i:s") . " - " . "User: " . $username . " - " . "Action: " . $user_action . " - on " . basename($_SERVER['PHP_SELF']) . " \n";
fwrite($log, $user);

fclose($log);
}

?>