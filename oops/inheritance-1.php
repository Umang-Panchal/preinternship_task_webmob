<?php
class Fruit{
    public $name="strawberry";
    private $color="Red";
    public  function pubmethod(){
        echo "I am in public method";
    }
    private function privmethod(){
        echo "I am in private method";
    }
    protected function protectmethod(){
        echo "I am in protected method";
    }
    public function pubprivmethod(){
        $this->privmethod();
    }
}
class strawberry extends Fruit{
    public function call_to_protected_method(){
        $this->protectmethod();
    }
}

$fr1=new Fruit();
$fr1->pubprivmethod(); //call to private method via public method 
// echo "Fruit color is: ".$fr1->color; //gives error access to private property.


$strawberry = new strawberry();
echo "<br><br>";
echo "Fruit Name is: ".$strawberry->name."<br><br>";
// echo "Fruit Color is: ".$strawberry->color."<br><br>"; //gives error because it is private property.
echo $strawberry->call_to_protected_method()."<br><br>";
?>