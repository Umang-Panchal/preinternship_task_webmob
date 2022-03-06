<?php
class fruit{
    public $name;
    public $color;

    // for name property
    function  set_name($name){
        $this->name=$name;
    }
    function  get_name(){
        return $this->name;
    }

    // for color property
    function set_color($color){
        $this->color=$color;
    }
    function get_color(){
        return $this->color;
    }
}
$obj1=new Fruit();
$obj2=new Fruit();

$obj1->set_name("apple");
$obj1->set_color("Red");

$obj2->set_name("banana");
$obj2->set_color("yellow");

echo $obj1->get_name()." ";
echo $obj1->get_color()."<br><br>";
echo "<br>";

echo $obj2->get_name()." ";
echo $obj2->get_color()."<br><br>";
?>