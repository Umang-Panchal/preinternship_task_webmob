
        <!-- <script>
            $(document).ready( function () {
                $('#listbook').DataTable();
            } );
        </script> -->

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
            require '../LMS/config/header.php';
            echo "<div class='container'>";
            echo "<div class='row'><div class='col-6 col-sm-10'><h1 class='text-center d-none d-sm-block mt-5 mb-5'>List of Books</h1><h3 class='text-center d-block d-sm-none mt-5 mb-5'>List of Books</h3></div><div class='col-6 col-sm-2 d-flex justify-content-end align-items-center'><a class='btn btn-success text-end mt-5 mb-5' href='add-book.php' name='add_book'><i class='fa-solid fa-plus'></i><span class='ms-1'>Add New</span></a></div></div>";
            $sql="select * from books";
            $result=mysqli_query($conn,$sql); 
            if(mysqli_num_rows($result)>0){
                $i=0;
                ?>
                <div class="table-responsive">
                <table class='table table-striped text-center' id='listbook'>
                    <thead>
                        <tr> 
                            <th>#</th> 
                            <th>Book Image</th>
                            <th>Title</th> 
                            <th>Author</th>                 
                            <th>Price</th>                 
                            <th>ISBN</th> 
                            <th>Status</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                <?php
                while($row=mysqli_fetch_array($result)){
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><img src="../LMS/bookimg/<?php echo $row['book_image'] ?>" border='2' width="100" height="100" class="img-fluid" /> </td>
                        <td><?php echo $row['book_title'] ?></td>
                        <td><?php echo $row['book_author']?></td>
                        <td><?php echo "₹".$row['book_price']?></td>
                        <td><?php echo $row['book_ISBN'] ?></td>
                        <td>
                        <?php 
                                    if($row['book_status']=="1") 
                                    {
                                        echo "<a onClick=\"javascript: return confirm('Are you sure you want to Deactivate this Book?');\" href=bk_deactivate.php?bkid=".$row['book_id']." name='deactive' class='badge bg-danger rounded-pill' style='text-decoration:none;width: 75px;'>Deactivate</a>";
                                    }
                                    
                                    else{
                                        echo "<a onClick=\"javascript: return confirm('Are you sure you want to Activate this Book?');\"  href=bk_activate.php?bkid=".$row['book_id']." name='active' class='badge bg-success rounded-pill' style='text-decoration:none;width: 75px;'>Activate</a>";
                                    } 
                                    
                                ?>
                        </td>
                        <td><a href="show_book.php?sid=<?php echo  $row['book_id']?>"><i class='fa-solid fa-info'></i></a></td>
                        <td><a href="edit_book.php?uid=<?php echo $row['book_id']?>"><i class='far fa-edit'></i></a></td>
                        <td><a onClick="javascript: return confirm('Please confirm deletion');" href='delete_book.php?did=<?php echo $row['book_id'] ?>'><i class='far fa-trash-alt'></i></a></td>
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
                echo "No record Found!!";
            }


            include '../LMS/config/footer.php';
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>List of Books</title>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>
        <body>
            <!-- <script>
                $(document).ready( function () {
                    $('#listbook').DataTable();
                } );
            </script> -->
        </body>
        </html>

<?php
    }
?>