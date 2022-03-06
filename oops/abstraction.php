<?php 
//abstraction
abstract class Fruit {
    public $name;

    public function __construct($n) {
        $this->name=$n;
    }

    abstract public function show($name);
}

//trait
trait strawberry{
    // public $str="Hello"; // traits also can have properties
    public function fav_fruit_1(){
        echo "strawberry is also my favourite fruit<br>";
        return $this;
    }
}
trait grapes{
    public function fav_fruit_2(){
        echo "grapes is my favourite fruit<br>";
        return $this;
    }
}

class fav_fruit extends Fruit {
    public function show($name, $color="Yellow", $weight="200") {
        //implementing abstract methods
        return "$name have $color color and $weight gram weight";
    }

    use strawberry,grapes;  
}

$fav=new fav_fruit("Mango");
echo "Your Favourite Fruit is: ".$fav->show("Mango");
echo "<br><br>";
//method chaining
$fav->fav_fruit_1()->fav_fruit_2();
?>