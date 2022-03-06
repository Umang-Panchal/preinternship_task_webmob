<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form method="POST">
        <input type="number" name="num1" placeholder="Enter Number1"> <br><br>
        <input type="number" name="num2" placeholder="Enter Number2"> <br><br>
        <input type="submit" value="calculate" name="calc">
    </form>
</body>

</html>

<?php
$num1=$_POST["num1"]; //variables and supergloabals.
$num2=$_POST["num2"]; //variables and supergloabals.
// var_dump($num1); //demo of var_dump
// var_dump($num2); //demo of var_dump  
 if(isset($_POST["calc"])){
    echo "Addition of Two Number is: ".sum($num1,$num2);
}

// function for sum with arguments
function sum($n1,$n2){
    return $n1+$n2;
}

?>