<?php
  
    // Connect to database 
    require '../LMS/config/config.php';
  
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['stid'])){
  
        // Store the value from get to 
        // a local variable "course_id"
        $st_id=$_GET['stid'];
  
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        $sql="UPDATE authors SET auth_status=0 WHERE id='$st_id'";
  
        // Execute the query
        mysqli_query($conn,$sql);
    }
  
    // Go back to course-page.php
    header('location: list-author.php');
?>