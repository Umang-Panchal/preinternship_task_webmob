<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator using oop</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <input type="number" name="num1" placeholder="Enter Number1">
        <input type="number" name="num2" placeholder="Enter Number2"> <br><br>
        <input type="submit" name="add" value="+">
        <input type="submit" name="sub" value="-">
        <input type="submit" name="mul" value="*">
        <input type="submit" name="div" value="/">
        <input type="submit" name="pi" value="&#960;">
    </form>
</body>

</html>


<?php
class calculation{
    public $a,$b,$c;
    const PI=M_PI; //constant demo
    function sum(){
        $this->c=$this->a+$this->b;
        return $this->c;
    }
    function sub(){
        $this->c=$this->a-$this->b;
        return $this->c;
    }
    function mul(){
        $this->c=$this->a*$this->b;
        return $this->c;
    }
    function div(){
        $this->c=$this->a/$this->b;
        return $this->c;
    }
}  
extract($_POST);
$c1=new calculation();
$c1->a=$num1;
$c1->b=$num2;


// var_dump($c2 instanceof calculation);

echo "<br><br>";
if(isset($add)){
    echo "Summation is:".$c1->sum()."<br><br>";
}
if(isset($sub)){
    echo "Substraction is:".$c1->sub()."<br><br>";
}
if(isset($mul)){
    echo "Multiplication is:".$c1->mul()."<br><br>";
}
if(isset($div)){
    echo "Division is:".$c1->div()."<br><br>";
}
if(isset($pi)){
    echo "Value of PI is: ".calculation::PI."<br><br>";
}
?>