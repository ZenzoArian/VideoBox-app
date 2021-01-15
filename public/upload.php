<?php

$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);


if (isset($name)) {

    $path= 'Uploads/videos/';
    if (empty($name))
    {
        echo "Please choose a file";
    }
    else if (!empty($name)){
        if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
        {
            echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
        }


        else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
        {
            if (move_uploaded_file($tmp_name, $path.$name)) {
                echo 'Uploaded!';
            }
            else {
                echo "wy";
            }
        }
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
    </body>
</html>

<!--<form method="post" enctype="multipart/form-data" action="--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?><!--">-->
<!--    <label for="file"><span>Filename:</span></label>-->
<!--    <input type="file" name="file" id="file" />-->
<!--    <br />-->
<!--    <input type="submit" name="submit" value="Submit" />-->
<!--</form>-->
<form action="" method='post' enctype="multipart/form-data">
    <input type="file" name="file"/><br><br>
    <input type="submit" value="Upload"/>
</form>
</form>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

