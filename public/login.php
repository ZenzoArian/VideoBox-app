<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/data/receive/accounts.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Video Box - login</title>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
        
        <a href="forgotPassword.php">   <div class="">forgotPassword</div></a>
        <p><span class="error">* required field</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" maxlength="15">
                <span class="error">* <?php echo $usernameErr;?></span>
                <br><br>
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" maxlength="20">
                <span class="error">* <?php echo $passwordErr;?></span>
                <br><br>
            </p>
            <input type="submit" value="Submit">
        </form>
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>

    </body>
</html>