<?php
class Fruit {
    public static $name="Mango";
    public static $color="Yellow";
    public static $weight="200 gm";

    public static function show() {
        return "Your Favourite Fruit is ".self::$name." and its color is ".self::$color." and its weight is ".self::$weight.".";
    }
}

class mango extends Fruit {
    public $taste="sour and sweet";
    public function display() {
        return "Your favourite Fruit is ".parent::$name." and its color is ".parent::$color." and its weight is around ".parent::$weight." and it taste is ".$this->taste.".";
    }
}

$method=new mango();
echo $method->display();
?>