<?php
    session_start();
    error_reporting(0);
    $identifier='is_home';
    if(strlen($_SESSION['alogin'])==0){
        header('location:admin_login.php');
    }
    else{?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Dashboard</title>
        </head>
        <body>
            <?php include '../LMS/config/header.php' ?>
            <div class="container" style="height: 60vh"> 
                <div class="row">
                    <div class="col">
                        <h3 class="mt-5">Welcome, <?php echo  ucfirst($_SESSION['ulogin']); ?></h3>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <?php include '../LMS/config/footer.php';?>
                    </div>
                </div>
            </div>
        </body>
        </html>
   <?php }?>