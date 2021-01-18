<?php session_start(); ?>

<link rel=stylesheet href="../src/themes/style.css" >
<link rel=stylesheet href="../src/themes/header.css" >

<div class="header--container-outer">
    <div class="header--container-inner">
        <div class="header--logo-container">
            <a href="index.php">
                <img src="../src/themes/images/logo.png" alt="Videobox logo" class="header--logo">
            </a>
        </div>
        <div class="header--nav-container">
            <a href="index.php">            <div class="header--nav-item">Home</div></a>
            <?php include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/src/actions/checkHeader.php'); ?>
        </div>
    </div>
</div>
