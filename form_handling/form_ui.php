<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <style>
        body,
        html {
            height: 100%;
        }
    </style>
</head>


<body>
    <div class="container h-100">
        <div class="d-flex flex-column h-100 justify-content-center align-items-center">
            <h2>Registration Form</h2>
            <form class="col-12" method="post" action="form.php">
                <div class="mb-3 mt-3">
                    <label for="fname" class="mb-2">First Name:</label>
                    <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter First Name" />
                    <label class="form-label"><?php echo $fnameError;?></label>
                </div>

                <div class="mb-3 mt-3">
                    <label for="lname" class="mb-2">Last Name:</label>
                    <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter Last Name" />
                    <label class="form-label"><?php echo $lnameError;?></label>
                </div>

                <div class="form-check-inline">
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="Male">
                    <label class="form-check-label" for="radio1">Male</label>
                    <label class="form-label"><?php echo $radioError;?></label>
                </div>

                <div class="form-check-inline">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="Female">
                    <label class="form-check-label" for="radio2">Female</label>
                </div>

                <div class="mb-3 mt-3">
                    <select id="dept" class="form-select" name="dept">
                        <option value="">Select Department</option>
                        <option value="IT">Information Technology</option>
                        <option value="CE">Computer Engineering</option>
                        <option value="ME">Mechanical Engineering</option>
                    </select>
                    <label class="form-label"><?php echo $deptError;?></label>
                </div>

                <button type="submit" class="btn btn-primary w-100" name="sign_up">Sign Up</button>
            </form>
        </div>
    </div>

</body>

</html>