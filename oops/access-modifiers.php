<?php // Class test
// {
// public $variable1;
// private $variable2;
// public function pubMethod($a)
// {
// echo $a;
// }
// private function privMethod($b)
// {
// echo $this->variable2*$b;
// }
// public function pubPrivMethod()
// {
// $this->variable2 = 5;
// $this->privMethod(20);
// }
// }
// $objT = new test();
// // $objT->variable1 = 3;
// // $objT->variable2 = 1;
// // $objT->pubMethod("test");
// // $objT->privMethod(1);
// // $objT->pubPrivMethod();

class hello {
    protected $var1;
    public $var2;

    protected function demoParent() {
        echo "this is demo";
    }
}

class child extends hello {
    public function demoChild() {
        $this ->demoParent();
    }
}

$objChild=new child();
$objChild ->demoChild();
?>