<?php
    $nameError=$emailError=$genError=$websiteError="";
    $name=$email=$gen=$website="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["fname"])){
            $nameError="Name Required!!!!";
        }else{
            $name=validate_input($_POST["fname"]);
        }
        
        if(empty($_POST["email"])){
            $emailError="Email required!!!";
        }
        else{
            $email=validate_input($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               $emailError="Invalid Email Format!!!";
            }
        }

        if(empty($_POST["gender"])){
            $genError="Gender required!!!";
        }
        else{
            $gen=validate_input($_POST["gender"]);
        }
        if(empty($_POST["website"])){
            $websiteError="URL Required!!!";
        }
        else{
            $website=validate_input($_POST["website"]);
            if(!filter_var($website,FILTER_VALIDATE_URL)){
                $websiteError="Invalid Website Format!!!";
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
    <title>Form Validation Using php</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="fname">
                    <span class="error"><?php echo $nameError ?></span>
                </td>
            </tr>
            <tr>
                <td>email:</td>
                <td>
                    <input type="text" name="email">
                    <span class="error"><?php echo $emailError ?></span>
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="female">Male
                    <input type="radio" name="gender" value="male">Female
                    <span class="error"><?php echo $genError ?></span>
                </td>
            </tr>
            <tr>
                <td>Website:</td>
                <td>
                    <input type="text" name="website">
                    <span class="error"><?php echo $websiteError ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="submit">
                </td>
            </tr>
        </table>
    </form>

    <?php
        echo "<br><br>";
        echo "Your Name is: ".$name ."<br>";
        echo "Your Email is: ".$email ."<br>";
        echo "Your Gender is: ". $gen ."<br>";
        echo "Your Website is: ". $website ."<br>";
    ?>
</body>

</html>