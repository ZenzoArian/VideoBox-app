
<!DOCTYPE HTML>
<html>
    <head>
        <title>Video Box</title>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/actions/checkLoginUser.php'); ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/actions/checkAccreditedUser.php'); ?>
        <!-- Upload response -->
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/data/upload/videoFile.php'); ?>
    <?php 
    if(isset($_SESSION['message'])){
       echo $_SESSION['message'];
       unset($_SESSION['message']);
    }
    ?>
    <form method="post" action="" enctype='multipart/form-data'>
        <p>
            <label for="title">title:</label><br>
            <input type="text" name="title" id="title" maxlength="15" class="input--field input-small">
            <span class="error">* <?php echo $titleErr;?></span>
            <br><br>
        </p>
        <p>
            <label for="description">description:</label><br>
            <textarea type="text" name="description" id="description" maxlength="50" class="input--field input-small"></textarea>
            <br><br>
        </p>
        <p>
            <label for="subject">subject:</label><br>
            <input type="text" name="subject" id="subject" maxlength="10" class="input--field input-small">
            <span class="error">* <?php echo $subjectErr;?></span>
            <br><br>
        </p>
      <input type='file' name='file' />
      <input type='submit' value='Upload' name='but_upload'>
    </form>
    </body>
</html>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

