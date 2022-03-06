<?php
/*string*/
echo "<h3>Demo of String</h3>";
$string="Hello World!!";
echo "string is:-".$string;
echo "<br><br>";
echo "Length of string: ".strlen($string)."<br><br>";
echo "Reverse of string: ".strrev($string)."<br><br>";
echo "Words in string:".str_word_count($string)."<br><br>";
echo "World is Positioned at: ". strpos($string,"World")."<br><br>";
echo "Replaced String: ". str_replace("World","Webmob Tech", $string);


/*numbers*/
echo "<br><br><h3>Demo of Numbers</h3>";
$x=  65780;
$y=6.50;
$z="245.20";
echo "number $x is integer or not? ".is_int($x)."<br><br>";
echo "number $y is float or not? ".is_float($y)."<br><br>";

//casting float to integer
echo "Float to Integer for number $y is: ".(int)$y;


//casting string to integer
echo "String to Integer for number $z is: ".(int)$z;


/*maths*/
echo "<br><br><h3>Demo of Maths</h3>";
echo "Value of Pi: ".pi()."<br><br>";
echo "minimum of number $x and $y is: ".min($x,$y)."<br><br>";
echo "maximum of number $x and $y is: ".max($x,$y)."<br><br>";
echo "absolute value of number $y is: ".abs($y)."<br><br>";
echo "Square Root of number is: ".sqrt($x)."<br><br>";
echo "Random number is: ".rand(10,200);

?>