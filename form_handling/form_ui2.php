<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>POST method</title>
</head>

<body>
    <div class="container">
        <h2 align="center"><u>Registration Form using POST method</u></h2> <br> <br>
        <form action="form_2.php" method="POST">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Your name" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Your Email ID" required>
            </div>
            <div class="form-group">
                <label>Date of Birth:</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Select Your Department</label>
                <select name="dept" class="form-control" required>
                    <option value="">Select</option>
                    <option value="Information Technology">IT</option>
                    <option value="Computer Engineering">CE</option>
                    <option value="Mechanical Engineering">ME</option>
                </select>
            </div>
            <label>Hobbies:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="Hobbie[]" value="Reading">
                <label class="form-check-label">Reading</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="Travelling" name="Hobbie[]">
                <label class="form-check-label">Travelling</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="Other" name="Hobbie[]">
                <label class="form-check-label">Other</label>
            </div> <br>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>