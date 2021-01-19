
<!DOCTYPE HTML>
<html>
    <head>
        <title>Video Box</title>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/src/actions/checkLoginUser.php'); ?>
        <?PHP

            session_start();
            session_destroy();
            header("Location: index.php");

        ?>
    </body>
</html>