<?php
     session_start();
     error_reporting(0);
     $identifier='is_author';
     $auid=$_GET['auid']; 
     require '../LMS/config/config.php';
     if(strlen($_SESSION['alogin'])==0){
         header('location: admin_login.php');
     }
     else
     {
        include '../LMS/config/header.php';
        if(isset($auid)){
            $select="SELECT * FROM authors WHERE id='$auid'";
            $result=mysqli_query($conn,$select);
            $row=mysqli_fetch_array($result);
        }
        extract($_POST);
        if(isset($update_author)){
            $ast='';
            if($a_status=='on'){
                $ast='1';
            }
            else{
                $ast='0';
            }
            $update="UPDATE authors SET auth_fname='$a_fname',auth_lname='$a_lname',auth_dob='$a_dob',auth_gen='$a_gen',auth_address='$a_address',auth_mob=$a_mobile_no,auth_desc='$a_desc',auth_status='$ast' WHERE id='$update_author_id'";
            if(mysqli_query($conn,$update)){
                echo "<script>alert('data updated successfully!!');</script>";
                echo "<script>window.location='list-author.php'</script>";
            }
            else{
                echo "<script>alert('data not updated!!!');</script>"; 
            }
        }
        mysqli_close($conn);    
        ?>

        <!DOCTYPE html>
        <html lang="en">
        
        
        
        <body>
            <div class="container">
                <div class="row">
                    <div class="col mt-5">
                        <div class="card rounded-5 shadow-lg">
                            <h2 class="card-b_imgheader rounded-5 p-3 text-center bg-primary text-white">Update Authors</h2>
                            <div class="card-body">
                                <form id="add_author_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                                <input type="hidden" name="update_author_id" value="<?php echo $auid ?>" /> 
                                    <div class="mb-3 mt-3">
                                        <label for="a_fname" class="mb-1">Author's First Name</label>
                                           <input type="text" class="form-control" id="a_fname" placeholder="Enter Author's First Name"
                                            name="a_fname" value="<?php echo $row['auth_fname']; ?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="a_lname" class="mb-1">Author's Last Name</label>
                                        <input type="text" class="form-control" id="a_lname" placeholder="Enter Author's Last Name"
                                            name="a_lname" value="<?php echo $row['auth_lname']; ?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="a_dob" class="mb-1">Author's DOB</label>
                                        <input type="date" class="form-control" id="a_dob" placeholder="Enter Author's Date of Birth"
                                            name="a_dob" value="<?php echo $row['auth_dob']; ?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="a_gen" class="mb-1">Author's Gender:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="a_gen" id="a_gen_1" value="Male" <?php echo ($row['auth_gen']=='Male')?'checked':''?>>
                                            <label class="form-check-label" for="a_gen_1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="a_gen" id="a_gen_" value="Female" <?php echo ($row['auth_gen']=='Female')?'checked':''?>>
                                            <label class="form-check-label" for="a_gen_2">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="a_gen" id="a_gen_3" value="Other" <?php echo ($row['auth_gen']=='Other')?'checked':''?>>
                                            <label class="form-check-label" for="a_gen_3">Other</label>
                                        </div>
        
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="a_address" class="mb-1">Author's Address</label>
                                        <input type="text" class="form-control" id="a_address" placeholder="Enter Author's Address"
                                            name="a_address" value="<?php echo $row['auth_address']; ?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="a_mobile_no" class="mb-1">Authors Mobile No</label>
                                        <input type="text" class="form-control" id="a_mobile_no" placeholder="Enter Author's Mobile No"
                                            name="a_mobile_no" value="<?php echo $row['auth_mob']; ?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="a_desc" class="mb-1">Author's Description</label>
                                        <input type="text" class="form-control" id="a_desc" placeholder="Enter Author's Description"
                                            name="a_desc" value="<?php echo $row['auth_desc']; ?>">
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <div class="row">
                                            <div class="col-1">  
                                                <label for="a_status" class="mb-1">Status: </label>
                                            </div>
                                            <div class="col-3 col-sm-1">
                                                <label class="ms-4 ms-sm-0 me-0">Inactive</label>                              
                                            </div>
                                            <div class="col-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="a_status" name="a_status"<?php echo ($row['auth_status']=='1')?'checked':''?>>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary" id="update_author" name="update_author">Update
                                        Author</button>
                                    <a type="button" href="list-author.php" class="btn btn-danger" id="a_cancel" name="a_cancel">cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Author</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
            <script src="../LMS/JS/author_validate.js"></script>
            <style>
                .error{
                    color: red;
                }
            </style>
        </head>
        </html>        
<?php
     }
    include '../LMS/config/footer.php';

?>