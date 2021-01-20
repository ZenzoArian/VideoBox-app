<?php

function logError($error_kind, $error_message) {
$log = fopen("../private/logHandel/logs/error.txt", "a+") or die("Unable to open file!");

$error = date("Y-m-d h:i:s") . " - " . $error_kind . " error: " . $error_message . " - on " . basename($_SERVER['PHP_SELF']) . " \n";
fwrite($log, $error);

fclose($log);
}

?>