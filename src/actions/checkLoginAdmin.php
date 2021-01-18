<?php

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');
        $sql = "SELECT username, permission FROM users";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($_SESSION['username'] == $row["username"] && $row["permission"] != "admin") {
                    // Close connection
                    $conn->close();
                    
                    header("Location: index.php");
                }
            }
        }
    } else {
        header("Location: index.php");
    }
    
?>