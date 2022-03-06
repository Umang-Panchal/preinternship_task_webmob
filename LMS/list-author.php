<?php
    session_start();
    error_reporting(0);
    $identifier='is_author';
    require '../LMS/config/config.php';
    if(strlen($_SESSION['alogin'])==0){
        header('location: admin_login.php');
    }
    else
    {       
            require '../LMS/config/header.php';
            echo "<div class='container'>";
            echo "<div class='row'><div class='col-6 col-sm-10'><h1 class='text-center d-none d-sm-block mt-5 mb-5'>List of Authors</h1><h3 class='text-center d-block d-sm-none mt-5 mb-5'>List of Authors</h3></div><div class='col-6 col-sm-2 d-flex justify-content-end align-items-center'><a class='btn btn-success text-end mt-5 mb-5' href='add_author.php' name='add_author'><i class='fa-solid fa-plus'></i><span class='ms-1'>Add New</span></a></div></div>";
            $sql="select id,concat(auth_fname,' ', auth_lname) AS Name, auth_dob, auth_gen, auth_address, auth_mob, auth_desc, auth_status from authors";
            $result=mysqli_query($conn,$sql); 
            if(mysqli_num_rows($result)>0){
                    $i=0;?>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr> 
                                <th>#</th> 
                                <th>Name</th> 
                                <th>Date of Birth</th> 
                                <th>Gender</th> 
                                <th>Address</th> 
                                <th>Mobile No.</th> 
                                <th>Description</th> 
                                <th>Status</th>
                                <th colspan='2'>Action</th>
                            </tr>
                        </thead>
                
                <?php 
                while($row=mysqli_fetch_array($result)){
                        $i++;
                        $d=strtotime($row['auth_dob']);
                        $date=date("d/m/Y",$d);?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['Name']?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $row['auth_gen'] ?></td>
                            <td><?php echo $row['auth_address'] ?></td>
                            <td><?php echo $row['auth_mob']?></td>
                            <td><?php echo $row['auth_desc']?></td>
                            <td>
                                <?php 
                                    if($row['auth_status']=="1") 
                                    {
                                        echo "<a onClick=\"javascript: return confirm('Are you sure you want to Deactivate this Author?');\" href=st_deactivate.php?stid=".$row['id']." name='deactive' class='badge bg-danger rounded-pill' style='text-decoration:none;width: 75px;'>Deactivate</a>";
                                    }
                                    
                                    else{
                                        echo "<a onClick=\"javascript: return confirm('Are you sure you want to Activate this Author?');\"  href=st_activate.php?stid=".$row['id']." name='active' class='badge bg-success rounded-pill' style='text-decoration:none;width: 75px;'>Activate</a>";
                                    } 
                                    
                                ?>
                            </td>
                            <td><a href="edit_author.php?auid=<?php echo $row['id']?>"><i class="far fa-edit"></i></a></td>
                            <td><a onClick="javascript: return confirm('Please confirm deletion');" href="delete_author.php?adid=<?php echo $row['id']?>"><i class="far fa-trash-alt"></i></a></td>
                        </tr>

                <?php
                    }
                ?>
                    </table>
                    </div>
                </div>
            <?php
            }
            else{
                echo "No record Found";
            }
            include '../LMS/config/footer.php';
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>List of Authors</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>

        <body>

        </body>

        </html>
<?php
    }
?>