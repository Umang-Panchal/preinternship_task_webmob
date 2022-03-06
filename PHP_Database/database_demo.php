<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="DB_Demo";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

$sql= "Insert into Test_Demo(Fname,Lname,Dept) Values ('Alexa','Johnson','Testing')";
// $sql = "INSERT INTO Test_Demo (Fname,Lname,Dept)
// VALUES ('John', 'Doe', 'UIUX');";
// $sql .= "INSERT INTO MyGuests (Fname,Lname,Dept)
// VALUES ('Mary', 'Moe', 'Testing');";
// $sql .= "INSERT INTO MyGuests (Fname,Lname,Dept)
// VALUES ('Julie', 'Dooley', 'Robotics')";


if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
    $sql1="SELECT Fname, Lname, Dept FROM Test_Demo";
    $result=$conn->query($sql1);
    if($result->num_rows > 0){
      $i=0;
      echo "<table border='1'><tr><th>No.</th><th>First Name</th><th>Last Name</th><th>Department</th></tr>";
      while($row=$result->fetch_assoc()){
        $i++;
        echo "<tr><td>$i</td><td>".$row['Fname']."</td><td>".$row['Lname']."</td><td>".$row['Dept']."</td></tr>";
      }
      echo "</table>";
    }
    else{
      echo "No results";
    }

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// if($conn->query($sql)=== TRUE){
//     // $last_id=$conn->insert_id;
//     echo "New Record Inserted Successfully<br>";
//     // echo "Last Inserted ID is".$last_id;
// }
// else{
//     echo "data not inserted".$sql."<br>".$conn->error;
// }
$conn->close();
?>