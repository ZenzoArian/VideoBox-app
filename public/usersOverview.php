<!DOCTYPE html>
<html>
    <head>
        <title>Display all records from Database</title>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/src/actions/checkLoginAdmin.php'); ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/data/upload/user.php'); ?>

<h2>Make a user</h2>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" class="input--field input-small">
        <span class="error">* <?php echo $usernameErr;?></span>
        <br><br>
    </p>
    <p>
        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email" class="input--field input-small">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
    </p>
    <p>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" class="input--field input-small">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
    </p>
    <input type="submit" value="Submit" class="form--submit-button">
</form>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<br>
<br>

<h2>User overview and edit/delete a user</h2>

<table>
    <tr>
        <th>Id:</th>
        <th>Username:</th>
        <th>Email:</th>
        <th>Permission:</th>
        <th>Accredited:</th>
        <th>Edit:</th>
        <th>Delete:</th>
    </tr>

    <?php

    $accredited = "false";

    include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

    $records = mysqli_query($conn,"SELECT id, username, password, email, permission, accredited FROM users ORDER BY id DESC;"); // fetch data from database

    while($data = mysqli_fetch_array($records))
    {
        if ($data['accredited'] == 1) {
            $accredited = "true";
        } else {
            $accredited = "false";
        }
        ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['permission']; ?></td>
            <td><?php echo $accredited ?></td>
            <td><a href="editUser.php?location=user&id=<?php echo password_hash($data['id'], PASSWORD_DEFAULT); ?>">Edit</a></td>
            <td><a href="../private/config/data/edit/deleteUser.php?location=user&id=<?php echo password_hash($data['id'], PASSWORD_DEFAULT);?>">Delete</a></td>

        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>


