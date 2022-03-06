<?php
  
  require '../LMS/config/config.php';
    // Check if id is set or not if true toggle,
    // else simply go back to the page
    if (isset($_GET['bkid'])){
  
        $bk_id=$_GET['bkid'];
  
        $sql="UPDATE books SET book_status=1 WHERE book_id='$bk_id'";
        // Execute the query
        mysqli_query($conn,$sql);
    }
  
    // Go back to course-page.php
    header('location: list-book.php');
?>