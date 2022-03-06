<?php
$numbers = array(5,6,8,9,10,1,2,4,3,7);
$array_size = count($numbers);

echo "Numbers before sort: ";
for ( $i = 0; $i < $array_size; $i++ ){
    echo $numbers[$i]." ";
}
echo "<br><br>";
for ( $i = 0; $i < $array_size; $i++ )
{
   for ($j = 0; $j < $array_size; $j++ )
   {
      if ($numbers[$i] < $numbers[$j])
      {
         $temp = $numbers[$i];
         $numbers[$i] = $numbers[$j];
         $numbers[$j] = $temp;
      }
   }
}

echo "Numbers after sort: ";
for( $i = 0; $i < $array_size; $i++ ){
    echo $numbers[$i]." ";
}

?>