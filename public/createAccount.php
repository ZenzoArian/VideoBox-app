<!DOCTYPE HTML>
<html>
    <head>
        <title>Video Box</title>
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/data/upload/user.php'); ?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" maxlength="15" class="input--field input-small">
        <span class="error">* <?php echo $usernameErr;?></span>
        <br><br>
    </p>
    <p>
        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email" maxlength="50" class="input--field input-small">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
    </p>
    <p>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" maxlength="20" class="input--field input-small">
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
