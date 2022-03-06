<?php
$server="localhost";
$uname="root";
$pass="";
$dbname="DB_Demo";

$conn= new mysqli($server,$uname,$pass,$dbname) OR die("connection failed!!");


$sql="Insert into Test_Demo(Fname,Lname,Dept) values(?,?,?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param("sss",$fname,$lname,$dept);


$fname="Narendra";
$lname="Modi";
$dept="Prime Minister";
$stmt->execute();


$fname="Amit";
$lname="Shah";
$dept="Defence Dept";
$stmt->execute();

echo "Records added Successfully!!";

$stmt->close();
$conn->close();
?>