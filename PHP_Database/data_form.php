<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
    <form action="database.php" method="post">
        <table border="1">
            <tr>
                <td align="center" colspan="2">
                    <h3>Student Details</h3>
                </td>
            </tr>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" placeholder="Enter Your Name" name="fname" required>
                </td>
            </tr>
            <tr>
                <td>
                    Phone Number:
                </td>
                <td>
                    <input type="number" placeholder="Enter Your Phone Number" name="phone" required>
                </td>
            </tr>
            <tr>
                <td>
                    Department:
                </td>
                <td>
                    <select name="dept" required>
                        <option value="">Select</option>
                        <option value="IT">Information Technology</option>
                        <option value="CE">Computer Engineering</option>
                        <option value="ME">Mecchanical Engineering</option>
                        <option value="civil">Civil Engineering</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="submit" value="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>