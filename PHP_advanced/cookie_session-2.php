<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

<?php

if(isset($_POST["submit"])){
    $uname=$_POST["uname"];
    $_SESSION["username"]=$uname;
}
    echo "Welcome " . $_SESSION["username"]."." . "<br><br>";


setcookie("user",$_SESSION["username"],time()+(86400*30),"/");
    if(!isset($_COOKIE["user"])){
        echo "Cookie is not set!!!";
    }
    else{
        echo  "cookie is set with value: ".$_COOKIE["user"];
    }
    

?>

</body>

</html>