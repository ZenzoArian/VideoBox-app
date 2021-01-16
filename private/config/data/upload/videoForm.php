<?php
// define variables and set to empty values
$titleErr = $descriptionErr = $subjectErr = "";
$title = $description = $subject = "";
$formCheck1 = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["title"])) {
        $titleErr = "Name is required";
    } else {
        $title = test_input($_POST["title"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$title)) {
            $titleErr = "Only letters and white space allowed";
        } else {
            $formCheck1 = true;
        }
    }

    if (empty($_POST["description"])) {
        $descriptionErr = "Name is required";
    } else {
        $description = test_input($_POST["description"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$description)) {
            $descriptionErr = "Only letters and white space allowed";
        } else {
            $formCheck1 = true;
        }
    }

    if (empty($_POST["subject"])) {
        $subjectErr = "Name is required";
    } else {
        $subject = test_input($_POST["subject"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$subject)) {
            $subjectErr = "Only letters and white space allowed";
        } else {
            $formCheck1 = true;
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($formCheck1) {
// Escape user inputs for security
    $title = $conn->real_escape_string($_REQUEST['title']);
    $description = $conn->real_escape_string($_REQUEST['description']);
    $subject = $conn->real_escape_string($_REQUEST['subject']);

}

?>


