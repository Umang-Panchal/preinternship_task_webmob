<?php

$target_path="uploads/";


//gives file name
$target_file= $target_path.basename($_FILES["files"]["name"]);
echo $target_file;
$uploadOk=1;

//gives extension of file
$imgfiletype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// echo  $imgfiletype;


//check if file is image or fake image
if(isset($_POST["submit"])){

    //gives image inforamtion like mime, width, height
    $check=getimagesize($_FILES["files"]["tmp_name"]);
    // print_r($check);
    if($check!==false){
        echo "File is an Image:". $check["mime"]."<br><br>";
        $uploadOk=1;
    }
    else{
        echo "File is not image "."<br><br>";
        $uploadOk=0;
    }
}


if(file_exists($target_file)){
    echo "File already exists!!!" ."<br><br>";
    $uploadOk=0;
}

if($uploadOk==0){
    echo "File not uploaded!!" ."<br><br>";
}
else{
    if(move_uploaded_file($_FILES["files"]["tmp_name"],$target_file)){
        echo "File is uploaded!!!" ."<br><br>";
        echo "<img src='$target_file' alt='Your Image' width='200' height='200'>";
    }
    else{
        echo "File was not uploaded!!" ."<br><br>";
    }
}   
?>