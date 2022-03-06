<?php
// include "date_form.php" //also can use include here
require "date_form.php";
extract($_POST);
date_default_timezone_set("Asia/kolkata");
class date{
    function showdate(){
        echo "Today is: ".date("M d,Y")."<br><br>";
        echo "Time is: ".date("h:i:s a")."<br><br>";
    }
}
$today=new date();
$today->showdate();
if(isset($submit)){
    $birthd=strtotime($bdate);

    echo "Your birth date is:".date("d/m/Y",$birthd);
}
?>