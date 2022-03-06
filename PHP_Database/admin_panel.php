<?php
$conn=new mysqli("localhost","root","","DB_Demo") or die("Connection Failed!!".$conn->connect_error);
$sql="SELECT * FROM Test_Demo";
$result=$conn->query($sql);
if($result->num_rows > 0){
    $i=0;
    echo "<table border='1'><tr><th>No.</th><th>First Name</th><th>Last Name</th><th>Department</th><th colspan='2'>Action</th></tr>";
    while($row=$result->fetch_assoc()){
      $i++;
      echo "<tr><td>$i</td><td>".$row['Fname']."</td><td>".$row['Lname']."</td><td>".$row['Dept']."</td><td><a href='update.php?uid=$row[Id]'>Update</a></td><td><a href='delete.php?did=$row[Id]'>Delete</a></td></tr>";
    }
    echo "</table>";
}
else{
    echo "No results";
}

$conn->close();

?>