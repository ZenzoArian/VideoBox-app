<?php

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<a href="logout.php">           <div class="header--nav-item">Logout</div></a>';
        echo '<a href="upload.php">           <div class="header--nav-item">Upload</div></a>';
        echo '<a href="profile.php">          <div class="header--nav-item">Profile</div></a>';

        include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');
        $sql = "SELECT username, permission FROM users";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($_SESSION['username'] == $row["username"] && $row["permission"] == "admin") {
                    // Close connection
                    $conn->close();
                    
                    echo '<a href="usersOverview.php">    <div class="header--nav-item">Users</div></a>';
                    echo '<a href="videosOverview.php">   <div class="header--nav-item">Videos</div></a>';
                }
            }
        }
    } else {
        echo '<a href="login.php">            <div class="header--nav-item">Login</div></a>';
        echo '<a href="createAccount.php">    <div class="header--nav-item">Create account</div></a>';
    }
    
?>