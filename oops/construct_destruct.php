<?php
class Fruit{
    public $a;
    public $b;

    function __construct($a="Mango",$b="Orange"){
        $this->a=$a;
        $this->b=$b;
        echo "My Favourite Fruit is:$this->a and $this->b";
    }
    function __destruct(){
        echo "<br><br>"."destructor Function";
    }
    function hello(){
        echo "<br><br>"."Hello Hi";
    }

}
$fruit=new Fruit("Apple","Banana");
$fruit->hello();
$fruit->hello();
$fruit->hello();
$fruit->hello();

?>