<!DOCTYPE HTML>
<html>
    <head>
        <title>Video Box</title>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
        <?PHP

            session_start();
            session_destroy();
            header("Location: index.php");

        ?>
    </body>
</html>