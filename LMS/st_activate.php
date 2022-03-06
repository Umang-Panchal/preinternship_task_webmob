<?php
  
  require '../LMS/config/config.php';
    // Check if id is set or not if true toggle,
    // else simply go back to the page
    if (isset($_GET['stid'])){
  
        $st_id=$_GET['stid'];
  
        $sql="UPDATE authors SET auth_status=1 WHERE id='$st_id'";
        // Execute the query
        mysqli_query($conn,$sql);
    }
  
    // Go back to course-page.php
    header('location: list-author.php');
?>