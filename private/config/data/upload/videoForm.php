<?php
// define variables and set to empty values
$titleErr = $descriptionErr = $subjectErr = "";
$title = $description = $subject = "";
$formCheck1 = false;
$formCheck2 = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
    } else {
        $title = test_input($_POST["title"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$title)) {
            $titleErr = "Only letters and white space allowed";
        } else {
            $formCheck1 = true;
        }
    }

    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
    } else {
        $subject = test_input($_POST["subject"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$subject)) {
            $subjectErr = "Only letters and white space allowed";
        } else {
            $formCheck2 = true;
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($formCheck1 && $formCheck2) {
// Escape user inputs for security
    $title = $conn->real_escape_string($_REQUEST['title']);
    $description = $conn->real_escape_string($_REQUEST['description']);
    $subject = $conn->real_escape_string($_REQUEST['subject']);

}

?>


