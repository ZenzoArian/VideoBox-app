<!DOCTYPE HTML>
<html>
    <head>
        <title>Video Box</title>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
    </body>
</html>
<!-- 
    --- PAGES ---
    home                  - searchbar, top 5 watched videos overview.
    login                 - link to create account, link to password forgot.
    create account        - link to login.
    password forgot       - link to login, link to create account.
    video upload          - forum to upload video with content.
    profile               - overview of uploaded content, create content, update content, delete content.
    logout                - message when logged out, link to home page.
    admin users overview  - overview of users, create users, update users, delete users.
    admin videos overview - overview of content, be able to sort content on users or subject, create content, update content, delete content.
 -->

<form action="" method="post" class="form--search">
    <button type="submit" name="submit" value="Search"><img src="../src/themes/images/search.png" alt="search icon button"></button>
    <input type="text" name="search_title" placeholder="Video title" class="input--field">
</form>

<div class="homepage--video-container">
    <div class="video--content-container">

    <?php

    if (empty($_POST["search_title"])) {
        echo "<br>";
        echo "<br>";
    } else {
        $search_value_title=$_POST["search_title"];
        logUser("searched for title");
        echo "<br>";
        echo "<br>";


        include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

        $search_records_title = mysqli_query($conn,"SELECT * FROM uploads WHERE title LIKE '%{$search_value_title}%'");// fetch data from database

        while($data = mysqli_fetch_array($search_records_title)) {

            ?>
                <div class="video--content-container-single">
                        <div class="video--file-container">
                            <video controls><source src="../src/uploads/<?php echo $data['file']; ?>" type="video/mp4"></video>
                        </div>
                        <div class="video--info-container">
                            <?php echo $data['title']; ?>
                            <div class="video--info-container-inner">
                                <?php echo $data['username']; ?>
                                <?php echo " - " ?>
                                <?php echo $data['views'] . " views"; ?>
                            </div>
                        </div>
                    </div>
            <?php
        }
    }
    ?>
    </div>
</div>

<div class="homepage--video-container">
    <div class="video--content-container">
    <?php

        include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');

        $records = mysqli_query($conn,"SELECT username, title, views, file FROM uploads ORDER BY views DESC;"); // fetch data from database
        $i = 0;

        while($data = mysqli_fetch_array($records)) {
            if ($i < 5) {
                $i++;
            ?>
                    <div class="video--content-container-single">
                        <div class="video--file-container">
                            <video controls><source src="../src/uploads/<?php echo $data['file']; ?>" type="video/mp4"></video>
                        </div>
                        <div class="video--info-container">
                            <?php echo $data['title']; ?>
                            <div class="video--info-container-inner">
                                <?php echo $data['username']; ?>
                                <?php echo " - " ?>
                                <?php echo $data['views'] . " views"; ?>
                            </div>
                        </div>
                    </div>
                    <?php
            }
        }
        ?>
        </div>
    </div>