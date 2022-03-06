<?php
extract($_POST);
if(isset($sign_up)){
    echo "<table border='2'><tr><th>First Name</th><th>Last Name</th><th>Gender</th><th>Department</th></tr>";
    echo "<tr><td>$fname</td>";
    echo "<td>$lname</td>";
    echo "<td>$optradio</td>";
    echo "<td>$dept</td>";
    echo "</tr></table>";
}
?>