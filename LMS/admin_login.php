<?php

session_start();
error_reporting(0);
require 'config/config.php';
if($_SESSION["alogin"]!=""){
    $_SESSION["alogin"]="";
}
if(isset($_POST["login"])){
    $uname=$_POST["email"];
    $pass=$_POST["pswd"];
    $sql="select AdminEmail,UserName,Password from admin where AdminEmail='$uname' and Password='$pass'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if(mysqli_num_rows($result)>0){
        $_SESSION["alogin"]=$uname;
        $_SESSION["ulogin"]=$row['UserName'];
        echo "<script>window.location='dashboard.php'</script>";
    }else{
        echo "<script>alert('invalid login credentials!!')</script";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>



<body>
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                <p class="text-center p-0 mb-5 display-6">Library Management System</p>
                <div class="card rounded-5 shadow-lg">
                    <h2 class="card-header rounded-5 p-3 text-center bg-primary text-white">Login</h2>
                    <div class="card-body">
                        <form  id="form" method="POST">
                            <div class="mb-3 mt-3">
                                <label for="email" class="mb-1">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email">
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="mb-1">Password</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                    name="pswd">
                            </div>
                            <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary" id="login" name="login">Sign in</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="../LMS/JS/validate.js"></script>
    <style>
        body,
        html {
            height: 100%;
        }

        .error {
            color: red;
        }
    </style>
</head>