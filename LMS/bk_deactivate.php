<?php
  
    // Connect to database 
    require '../LMS/config/config.php';
  
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['bkid'])){
  
        // Store the value from get to 
        // a local variable "course_id"
        $bk_id=$_GET['bkid'];
  
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        $sql="UPDATE books SET book_status=0 WHERE book_id='$bk_id'";
  
        // Execute the query
        mysqli_query($conn,$sql);
    }
  
    // Go back to course-page.php
    header('location: list-book.php');
?>