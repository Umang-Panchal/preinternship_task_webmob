<?php
    class files{
        public $name;
        public $mode;
        public $fileopen;
        public $write;
        public $read;
        function __construct($n,$m){
            $this->name=$n;
            $this->mode=$m;
        }
        function openfile(){
            $this->fileopen=fopen($this->name,$this->mode) or die("cant not open file");
            if($this->fileopen){
                $this->write=fwrite($this->fileopen,"something new here!!");
            }
        }
        function readfile1(){
            return $this->read=readfile($this->name);
        }
        function __destruct(){
            fclose($this->fileopen);
        }
    }

    $open=new files("/opt/lampp/htdocs/php_demos/PHP_advanced/files/demo.txt","w+");
    $open->openfile();
    echo $open->readfile1(); 

?>