<?php
    $nameError=$emailError=$genError=$websiteError=$ipError=$numError="";
    $name=$email=$gen=$website=$ip=$num="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["name"])){
            $nameError="Name Required!!!!";
        }else{
            $name=filter_var($_POST["name"],FILTER_SANITIZE_STRING);
            if($name===""){
                $nameError="Name Required"; 
            }
        }
        
        if(empty($_POST["email"])){
            $emailError="Email required!!!";
        }
        else{
            $email= filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               $emailError="Invalid Email Format!!!";
            }
        }
        if(empty($_POST["website"])){
            $websiteError="URL Required!!!";
        }
        else{
            $website=filter_var($_POST["website"],FILTER_SANITIZE_URL);
            if(!filter_var($website,FILTER_VALIDATE_URL)){
                $websiteError="Invalid Website Format!!!";
            }
        }
        if(empty($_POST["ip"])){
            $ipError="IP address Required!!!";
        }
        else{
            if(!filter_var($_POST["ip"],FILTER_VALIDATE_IP)){
                $ipError="Invalid IP Format!!!";
            }
        }
        if(empty($_POST["num"])){
            $numError="Number Required!!!";
        }
        else{
            $num=$_POST["num"];
            $min=1;
            $max=20;
            if (filter_var((int)$num, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
                $numError="Number is not between 1 to 20";
            }
        }

    }
    function validate_input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Form</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <table>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" placeholder="Enter Your Name"></td>
                <td><span class="error"><?php echo $nameError?></span></td>
            </tr>

            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" placeholder="Enter Your email"></td>
                <td><span class="error"><?php echo $emailError?></span></td>
            </tr>

            <tr>
                <td>Website: </td>
                <td><input type="text" name="website" placeholder="Enter Your website"></td>
                <td><span class="error"><?php echo $websiteError?></span></td>
            </tr>

            <tr>
                <td>IP address: </td>
                <td><input type="text" name="ip" placeholder="Enter Your ip address"></td>
                <td><span class="error"><?php echo $ipError?></span></td>
            </tr>

            <tr>
                <td>Number:</td>
                <td><input type="number" name="num" placeholder="Enter Number between 1 to 20"></td>
                <td><span class="error"><?php echo $numError?></span></td>
            </tr>

            <tr>
                <td colspan="2">
                    <center><input type="submit" value="submit" name="submit"></center>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>