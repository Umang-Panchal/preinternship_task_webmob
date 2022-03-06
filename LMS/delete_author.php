<?php 
session_start();
error_reporting(0);
require '../LMS/config/config.php';

if(strlen($_SESSION['alogin'])==0) {
    header('location: admin_login.php');
}

else {
    if(isset($_GET['adid'])) {
        $did=$_GET['adid'];
        $sql="DELETE FROM authors WHERE id='{$did}'";

        if(mysqli_query($conn, $sql)) {
            echo "<script>alert('Author is deleted!!!');</script>";
            echo "<script>window.location='list-author.php'</script>";
        }

        else {
            echo "<script>No data deleted!!</script>";
        }
    }
    mysqli_close($conn);

}
?>