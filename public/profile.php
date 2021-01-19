
<!DOCTYPE HTML>
<html>
    <head>
        <title>Video Box</title>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/src/actions/checkLoginUSer.php'); ?>
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

            $records = mysqli_query($conn,"SELECT id, username, title, description, subject, views, file FROM uploads WHERE username LIKE '{$_SESSION['username']}' ORDER BY id DESC;"); // fetch data from database

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
                    <td><a href="../private/config/data/edit/editVideo.php?location=profile&id=<?php echo password_hash($data['id'], PASSWORD_DEFAULT); ?>">Edit</a></td>
                    <td><a href="../private/config/data/edit/deleteVideo.php?location=profile&id=<?php echo password_hash($data['id'], PASSWORD_DEFAULT); ?>">Delete</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
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