<?php
    session_start();
    error_reporting(0);
    $identifier='is_book';
    require '../LMS/config/config.php';
    
    if(strlen($_SESSION['alogin'])==0){
        header('location: admin_login.php');
    }
    else
    {
        if(isset($_GET['sid'])){

            $i=0;
            $sid=$_GET['sid'];
            require '../LMS/config/header.php';
            echo "<div class='container mt-5'>";
            $select="select * from books where book_id='$sid'";
            $result=mysqli_query($conn,$select);
            if(mysqli_num_rows($result)>0)
            {
               
                while($row=mysqli_fetch_array($result))
                {
                    $i++; ?>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card bd-primary mg-t-20">
                                <div class="card-header bg-primary text-white h3">Book Details</div>
                                <div class="card-body pd-sm-30">
                            
                                    <dl class="row">

                                    <dt class="col-sm-3 tx-inverse">Book Image</dt>
                                    <dd class="col-sm-9">
                                        <img src="../LMS/bookimg/<?php echo $row['book_image'] ?>" border='2' width="100" height="100" alt="Book Image">
                                    </dd>

                                    <dt class="col-sm-3">Book Title</dt>
                                    <dd class="col-sm-9"><?php echo $row['book_title'];?></dd>

                                    <dt class="col-sm-3">Book Pages</dt>
                                    <dd class="col-sm-9">
                                        <?php echo $row['book_pages'];?>
                                    </dd>

                                    <dt class="col-sm-3">Book Language</dt>
                                    <dd class="col-sm-9"><?php echo $row['book_language'];?></dd>

                                    <dt class="col-sm-3 text-truncate tx-inverse">Book Author</dt>
                                    <dd class="col-sm-9"><?php echo $row['book_author'];?></dd>


                                    <dt class="col-sm-3 text-truncate tx-inverse">Book ISBN</dt>
                                    <dd class="col-sm-9"><?php echo $row['book_ISBN'];?></dd>
                                    
                                    <dt class="col-sm-3 text-truncate tx-inverse">Book Description</dt>
                                    <dd class="col-sm-9"><?php echo $row['book_desc'];?></dd>

                                    <dt class="col-sm-3 text-truncate tx-inverse">Book Price</dt>
                                    <dd class="col-sm-9"><?php echo "₹".$row['book_price'];?></dd>
                                    
                                    <dt class="col-sm-3 text-truncate tx-inverse">Book Status</dt>
                                    <dd class="col-sm-9">
                                        <div class="row">
                                            <div class="col-3 col-sm-1">
                                                <label class="me-0">Inactive</label>                              
                                            </div>
                                            <div class="col-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="b_status" name="b_status" <?php echo ($row['book_status']=='1')?'checked':''?> disabled>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                                                </div>
                                            </div>
                                        </div>
                                    </dd>

                                </div><!-- card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
               <?php
                }
                // echo "</table></div>";
            }
            else{
                // echo "no record found!!!";
            }
        }
        mysqli_close($conn);
    }

?>
<html>
    <head>
    <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>List of Books</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>
</html>
<?php
    include '../LMS/config/footer.php';
?>