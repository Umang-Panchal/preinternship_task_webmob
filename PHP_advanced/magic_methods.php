<?php
class Fruit{
    public $name;
    public $color;
    public $setname;
    public $setval;
    public $callname;
    public $callargs;
    // public $csname;
    // public $csargs;
    public function __construct($n,$c){
        $this->name=$n;
        $this->color=$c;
        echo "Your Favourite fruit is: $this->name and it's color is: $this->color.<br><br>";
        echo "__constructor method called!!<br><br>";
    }
    public function __destruct(){
        echo "<br><br>__destruct method called!!";
    }
    public function __set($nam,$val){
        $this->setname=$nam;
        $this->setval=$val;
        echo  "try to change undefined property $this->setname and its value is $this->setval<br>";
    }
    public function __get($nam){
        if(isset($this->setname)){
            return $this->setname;
        }
    }
    public function __call($mname,$args){
        $this->callname=$mname;
        $this->callargs=$args[0];
        echo "<br>try to call undefined method $this->callname and its arguments is: $this->callargs<br>";
    }
    public static function __callStatic($cname,$cargs){
        echo "<br>call to undefined static method $cname and its arguments is: {$cargs[0]}<br>";
    }
    public function __isset($isname){
        echo "<br>call of isset() method on undefined property: $isname<br>";
    }
    public function __unset($uname){
        echo "<br>call of unset() method on undefined property: $uname<br>";
    }
    public function __toString(){
        return "<br>Fruit name is: $this->name and color is: $this->color<br>";
    }
    public function __invoke(){
        echo "<br>Fruit object is called as function<br>";
    }
    public function __debugInfo(){
        echo "<br>";
        return array("favourite_fruit"=>$this->name);
    }
}
$magics=new Fruit("Mango","Yellow");
echo "value of undefined propery weight is:".$magics->weight='200gm'."<br>";
$magics->getfruit("strawberry","pineapple");
Fruit::how_are_you("Hello");
isset($magics->taste);
unset($magics->taste);
echo $magics; //toString method
$magics(); //invoke method
var_dump($magics);
?>