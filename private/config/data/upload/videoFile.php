<?php
include($_SERVER['DOCUMENT_ROOT'].'/VideoBox-app/private/config/connection/index.php');
include('videoForm.php');
 
if(isset($_POST['but_upload'])){
   $maxsize = 5368709120; // 5MB
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "../src/uploads/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             $_SESSION['message'] = "File too large. File must be less than 5MB.";
          } else{
             // Upload
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
               // Insert record
               
                $file = $_FILES["file"]["name"];
                $username = $_SESSION['username'];
                $sql = "INSERT INTO uploads (username, title, description, subject, views, file) VALUES ('$username', '$title', '$description', '$subject', '0', '$file')";
                if($conn->query($sql) === true){
                    echo "Records inserted successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . $conn->error;
                }
            
            
            // Close connection
                $conn->close();
             }
          }

       } else{
          $_SESSION['message'] = "Invalid file extension.";
       }
   } else{
       $_SESSION['message'] = "Please select a file.";
   }
} 
?>