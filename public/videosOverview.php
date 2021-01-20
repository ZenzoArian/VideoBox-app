<!DOCTYPE html>
<html>
    <head>
        <title>Display all records from Database</title>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/src/actions/checkLoginAdmin.php'); ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/data/upload/videoFile.php'); ?>

<?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<h2>Make a video</h2>

<form method="post" action="" enctype='multipart/form-data'>
    <p>
        <label for="title">title:</label><br>
        <input type="text" name="title" id="title" class="input--field input-small">
        <span class="error">* <?php echo $titleErr;?></span>
        <br><br>
    </p>
    <p>
        <label for="description">description:</label><br>
        <textarea type="text" name="description" id="description" class="input--field input-small"></textarea>
        <span class="error">* <?php echo $descriptionErr;?></span>
        <br><br>
    </p>
    <p>
        <label for="subject">subject:</label><br>
        <input type="text" name="subject" id="subject" class="input--field input-small">
        <span class="error">* <?php echo $subjectErr;?></span>
        <br><br>
    </p>
    <input type='file' name='file'/>
    <input type='submit' value='Upload' name='but_upload' class="form--submit-button">
</form>
</body>
</html>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<br>
<br>

<h2>Video overview and edit/delete</h2>

<table>
    <tr>
        <th>Video:</th>
        <th>Id:</th>
        <th>Username:</th>
        <th>Title:</th>
        <th>Description:</th>
        <th>Subject:</th>
        <th>Views:</th>
        <th>Edit:</th>
        <th>Delete:</th>
    </tr>

    <?php

    include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

    $records = mysqli_query($conn,"SELECT id, username, title, description, subject, views, file FROM uploads ORDER BY id DESC;"); // fetch data from database

    while($data = mysqli_fetch_array($records))
    {
        ?>
        <tr>
            <td>
                <video width="200" height="100" controls>
                    <source src="../src/uploads/<?php echo $data['file']; ?>" type="video/mp4">
                </video>
            </td>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['title']; ?></td>
            <td><?php echo $data['description']; ?></td>
            <td><?php echo $data['subject']; ?></td>
            <td><?php echo $data['views']; ?></td>
            <td><a href="../private/config/data/edit/editVideo.php?location=video&id=<?php echo password_hash($data['id'], PASSWORD_DEFAULT); ?>">Edit</a></td>
            <td><a href="../private/config/data/edit/deleteVideo.php?location=video&id=<?php echo password_hash($data['id'], PASSWORD_DEFAULT); ?>">Delete</a></td>
        </tr>
        <?php
    }
    ?>
</table>












<h2>Search uploads</h2>

<form action="" method="post" class="form--search">
    <input type="text" name="search_name" placeholder="username" class="input--field">
    <button type="submit" name="submit" value="Search"><img src="../src/themes/images/search.png" alt="search icon button"></button>
    <span class="searchOrText">or</span>
    <input type="text" name="search_subject" placeholder="subject" class="input--field">
    <button type="submit" name="submit" value="Search"><img src="../src/themes/images/search.png" alt="search icon button"></button>
</form>

<table>
    <tr>
        <th>Video:</th>
        <th>Id:</th>
        <th>Username:</th>
        <th>Title:</th>
        <th>Description:</th>
        <th>Subject:</th>
        <th>Views:</th>
    </tr>

<?php

if (empty($_POST["search_name"]) && empty($_POST["search_subject"])) {
    echo "Username or subject is required";
    echo "<br>";
    echo "<br>";

} else {


    if (!empty($_POST["search_name"])) {
        $search_type = 'username';
        $search_value=$_POST["search_name"];
    } else if (!empty($_POST["search_subject"])) {
        $search_type = 'subject';
        $search_value=$_POST["search_subject"];
    }

    echo "<br>";
    echo "<br>";


    include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

    $search_records = mysqli_query($conn,"SELECT * FROM uploads WHERE $search_type LIKE '%{$search_value}%'");// fetch data from database

    while($data = mysqli_fetch_array($search_records)) {

        ?>
        <tr>
            <td>
                <video width="200" height="100" controls>
                    <source src="../src/uploads/<?php echo $data['file']; ?>" type="video/mp4">
                </video>
            </td>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['title']; ?></td>
            <td><?php echo $data['description']; ?></td>
            <td><?php echo $data['subject']; ?></td>
            <td><?php echo $data['views']; ?></td>
        </tr>
        <?php
    }
}
?>
</table>

</body>
</html>