<?php
class Fruit{
    public $name;
    public $color;
    function __construct($n,$c){
        $this->name=$n;
        $this->color=$c;
    }
    function show(){
        echo "Fruit name is $this->name and color is $this->color";
    }
}
class mango extends Fruit{
    
    // method overriding 
    public $weight;
    function __construct($n,$c,$w){
        $this->name=$n;
        $this->color=$c;
        $this->weight=$w;
    } 
    function show(){
        echo "The fruit is $this->name and color is $this->color and weight is $this->weight gram";
    }
}

$mango =new mango("Mango","Yellow","150");
echo "<h3>Inheritance with method overriding</h3>";
$mango->show();
?>