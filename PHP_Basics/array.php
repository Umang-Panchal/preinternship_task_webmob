<?php
$fruit=array("Apple","Banana","Grapes","Mango"); //array

echo "Array using foreach loop: ";
foreach($fruit as $x){ //for each loop
    echo  "$x ";
}
echo "<br><br>";
echo "Array using for loop: ";
for($i=0;$i<count($fruit);$i++){
    echo "$fruit[$i] ";
}
echo "<br><br>";
// implementation of print_r method.
echo "<h4>Different Array Methods: </h4>";

//push method
array_push($fruit,"pineappple");
echo "Push Method: ";
print_r($fruit);
echo "<br><br>";

//pop method
array_pop($fruit);   
echo "Pop Method: ";
print_r($fruit);
echo "<br><br>";

//reverse method

echo "Reverse Method: ";
print_r(array_reverse($fruit));
echo "<br><br>";

//unshift method
echo "unshift method: ";
array_unshift($fruit,"pineapple");
print_r($fruit);
echo "<br><br>";

//shift method
echo "shift method: ";
array_shift($fruit);
print_r($fruit);
echo "<br><br>";

//search method
echo "Mango Element found at position: ".array_search("Mango",$fruit);

//slice method
echo "<br><br>slice method: ";
print_r(array_slice($fruit,1,3));
echo "<br><br>"




?>