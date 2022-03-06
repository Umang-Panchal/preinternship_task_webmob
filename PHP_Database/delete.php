<?php
if(isset($_GET['did'])){
    $did=$_GET['did'];
    $conn=new mysqli("localhost","root","","DB_Demo") OR die("Connection Failed:".$conn->connect_error);
    $sql="DELETE FROM Test_Demo WHERE Id='{$did}'";
    if($conn->query($sql)===TRUE){
        echo "<script>alert('Your data is deleted!!!');</script>";
        echo "<script>window.location='admin_panel.php'</script>";
    }
    else{
        echo "Data not deleted!!!";
    }
}
$conn->close();
?>