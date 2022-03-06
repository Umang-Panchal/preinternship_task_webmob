
  
<?php
//printing data of registration page using POST method
extract($_POST);
if (isset($submit)) {
    echo "Your Name is: $name <br>";
    echo "Your Email ID is: $email<br>";
    echo "Your Birth Date is: $date<br>";
    echo "Your Department is: $dept<br>";
    $checkbox1=$Hobbie;
    $chk="";
    foreach ($checkbox1 as $chk1) {
        $chk.=$chk1.", ";
    }
    echo "Your Hobbies are: $chk<br>";
}
