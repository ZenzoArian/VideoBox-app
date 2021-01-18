
<!DOCTYPE HTML>
<html>
    <head>
        <title>Video Box</title>
    </head>
    <body>
        <?php include '../src/components/header.php' ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/src/actions/checkLoginUSer.php'); ?>
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