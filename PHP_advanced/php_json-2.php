<?php
extract($_POST);
if(isset($submit)){
    $data= array("name"=>$name,"email"=>$email,"website"=>$website,"IP address"=>$ip);
    echo json_encode($data,JSON_PRETTY_PRINT);
    echo "<br><br>";
    $dataarray=json_decode(file_get_contents('https://jsonplaceholder.typicode.com/todos'),true);


    echo "<table border='1'><tr><th>UserId</th><th>Id</th><th>Title</th><th>Completed</th></tr>";
    foreach($dataarray as $val){
        if($val['completed']==false){
            $completed="false";
        }
        else{
            $completed="true";
        }

        echo "<tr><td>".$val['userId']."</td>";
        echo "<td>".$val['id']."</td>";
        echo "<td>".$val['title']."</td>";
        echo "<td>".$completed."</td></tr>";
        
    }
    echo "</table>";
}
?>