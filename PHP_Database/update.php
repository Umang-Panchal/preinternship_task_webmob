<?php
if(isset($_GET['uid'])){
    $uid=$_GET['uid'];
    $conn=new mysqli("localhost","root","","DB_Demo") OR die("connection Failed:".$conn->connect_error);
    $select="SELECT Fname, Lname, Dept FROM Test_Demo";
    $result=$conn->query($select);
    $row=$result->fetch_assoc();
}

if(isset($_POST["submit"])){
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $dept=$_POST["dept"];

    $update="UPDATE Test_Demo SET Fname='$fname', Lname='$lname',Dept='$dept' WHERE Id='$uid'";
    if($conn->query($update)===TRUE){
        echo "<script>alert('data updated successfully!!');</script>";
        echo "<script>window.location='admin_panel.php'</script>";
    }
    else{
        echo "<script>alert('data not updated!!!');</script>"; 
    }
$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
    <form method="POST">
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="fname" value="<?php echo $row['Fname'] ?>"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lname" value="<?php echo $row['Lname'] ?>"></td>
            </tr>
            <tr>
                <td>Department:</td>
                <td><input type="text" name="dept" value="<?php echo $row['Dept'] ?>"></td>
            </tr>
            <tr>
                <td colspan='2'>
                    <center><input type="submit" value="submit" name="submit"></center>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>