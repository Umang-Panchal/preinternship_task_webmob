<?php
      session_start();
      error_reporting(0);
      $identifier='is_book';
      $uid=$_GET['uid']; 
      require '../LMS/config/config.php';
      if(strlen($_SESSION['alogin'])==0){
          header('location: admin_login.php');
      }
      else
      {
        include '../LMS/config/header.php';
        if(isset($uid)){
            $select="SELECT * FROM books where book_id='$uid'";
            $result=mysqli_query($conn,$select);
            $row=mysqli_fetch_array($result);
        }
        
        if(isset($_POST['update_book']))
        {  
            $book_uid=$_POST["update_book_id"];
            $b_title=$_POST["b_title"];
            $b_pages=$_POST["b_pages"];
            $b_lang=$_POST["b_lang"];
            $b_author=$_POST["b_author"];
            $b_author=implode(", ",$b_author);
            $b_isbn=$_POST["b_isbn"];
            $b_desc=$_POST["b_desc"];
            $b_price=$_POST["b_price"];
            $bookimg=$_FILES['b_img']['name'];
            $b_status=$_POST["b_status"];
            $bst='';
            if($b_status=='on'){
                $bst='1';
            }
            else{
                $bst='0';
            }
            $extension = substr($bookimg,strlen($bookimg)-4,strlen($bookimg));
            // allowed extensions
            $allowed_extensions = array(".jpg","jpeg",".png",".gif");
            // Validation for allowed extensions .in_array() function searches an array for a specific value.
            //rename the image file
            $imgnewname=md5($bookimg.time()).$extension;
            // Code for move image into directory
            if(!in_array($extension,$allowed_extensions))
            {
                echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
            }
            else
            {
                move_uploaded_file($_FILES['b_img']['tmp_name'],"../LMS/bookimg/".$imgnewname);
                $sql2="UPDATE books SET book_title='$b_title',book_pages='$b_pages',book_language='$b_lang',book_author='$b_author',book_image='$imgnewname', book_ISBN='$b_isbn', book_desc='$b_desc',book_price='$b_price', book_status='$bst' WHERE book_id='$book_uid' ";
                if(mysqli_query($conn,$sql2))
                {
                    echo "<script>alert('Book updated successfully');</script>";
                    echo "<script>window.location.href='list-book.php'</script>";
                }
                else 
                {
                    echo "<script>alert('Something went wrong.Please try again');</script>";    
                    echo "<script>window.location.href='list-book.php'</script>";
                }
            }
        }                 
    }
 ?>

<!DOCTYPE html>
<html lang="en">



<body>
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <div class="card rounded-5 shadow-lg">
                    <h2 class="card-b_imgheader rounded-5 p-3 text-center bg-primary text-white">Update Book</h2>
                    <div class="card-body">
                        <form id="add_book_form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                        <input type="hidden" name="update_book_id" value="<?php echo $uid ?>" /> 
                            <div class="mb-3 mt-3">
                                <label for="b_title" class="mb-1">Book Title</label>
                                <input type="text" class="form-control" id="b_title" placeholder="Enter Book Title"
                                    name="b_title" value="<?php echo $row['book_title']; ?>">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="b_pages" class="mb-1">Book Pages</label>
                                <input type="text" class="form-control" id="b_pages" placeholder="Enter No. Book Pages"
                                    name="b_pages" value="<?php echo $row['book_pages']; ?>">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="b_lang" class="mb-1">Book Language</label>
                                <input type="text" class="form-control" id="b_lang" placeholder="Enter Book Language"
                                    name="b_lang" value="<?php echo $row['book_language']; ?>">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="b_author" class="mb-1">Book Author</label>
                                <select name="b_author[]" class="form-select" id="b_author" multiple>
                                    <option value="" selected>Select Book's Author</option>
                                    <?php 

                                        $sqlsel = "SELECT id, CONCAT(auth_fname,' ',auth_lname) AS auth_name from  authors ";
                                        $resultsel=mysqli_query($conn,$sqlsel);
                                        if(mysqli_num_rows($resultsel)>0)
                                        {

                                        while($rowsel=mysqli_fetch_array($resultsel))
                                        {   
                                        ?>  
                                            <option value="<?php echo htmlentities($rowsel['auth_name']);?>"><?php echo htmlentities($rowsel['auth_name']);?></option>
                                        <?php
                                     }} 
                                     ?> 
                                </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="b_img" class="mb-1">Book Image</label>
                                <input type="file" class="form-control" id="b_img" placeholder="Upload Image of Book"
                                    name="b_img"> <span><?php echo $row['book_image']?></span>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="b_isbn" class="mb-1">Book ISBN</label>
                                <input type="text" class="form-control" id="b_isbn" placeholder="Enter Book ISBN"
                                    name="b_isbn" value="<?php echo $row["book_ISBN"]; ?>">

                            </div>
                            <div class="mb-3 mt-3">
                                <label for="b_desc" class="mb-1">Book Description</label>
                                <input type="text" class="form-control" id="b_desc" placeholder="Enter Book Description"
                                    name="b_desc" value="<?php echo $row["book_desc"]; ?>">
                            </div>
                            
                            <div class="mb-3 mt-3">
                                <label for="b_price" class="mb-1">Book Price</label>
                                <input type="text" class="form-control" id="b_price" placeholder="Enter Book Price"
                                    name="b_price" value="<?php echo $row["book_price"]; ?>">
                            </div>

                            <div class="mb-3 mt-3">
                                <div class="row">
                                    <div class="col-1">  <label for="b_status" class="mb-1">Status: </label></div>
                                    <div class="col-3 col-sm-1">
                                        <label class="ms-4 ms-sm-0 me-0">Inactive</label>                              
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="b_status" name="b_status" <?php echo ($row['book_status']=='1')?'checked':''?>>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="update_book" name="update_book">Update
                                Book</button>
                            <a type="button" href="list-book.php" class="btn btn-danger" id="b_cancel"
                                name="b_cancel">cancel</a>
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
    <title>Update Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="../LMS/JS/book_validate.js"></script>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
</html>
<?php
    include '../LMS/config/footer.php';
?>