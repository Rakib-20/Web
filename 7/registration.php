<?php include "db.php"; ?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $cnum = $_POST['cnum'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO teacher (name, department, address, designation, email, date, cnum, salary)
        VALUES('$name','$department','$address','$designation','$email','$date','$cnum','$salary')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "Teacher's Information Added Successfully!!!!";
        header("location: show.php?msg=$msg");
    } else {
        echo "Information updated failed!!!";
        header("location: registration.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <table align="center" border="0">

            <h2 style="text-align: center;">Registration Teacher's profile</h3>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" id="name" placeholder="name..."></td>
                </tr>
                <tr>
                    <td>Department:</td>
                    <td><input type="text" name="department" placeholder="dept name..."></td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td><input type="text" name="address" placeholder="address..."></td>
                </tr>
                <tr>
                    <td>Designation: </td>
                    <td><input type="text" name="designation" placeholder="designation..."></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" placeholder="email..."></td>
                </tr>
                <tr>
                    <td>Date of birth: </td>
                    <td><input type="date" name="date" placeholder="date..."></td>
                </tr>
                <tr>
                    <td>Contact number: </td>
                    <td><input type="number" name="cnum" placeholder="contact..."></td>
                </tr>
                <tr>
                    <td>Salary: </td>
                    <td><input type="text" name="salary" placeholder="salary..."></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="submit" name="submit"></td>
                </tr>
                <tr>
                    <td><a href="show.php">Show teacher's</a></td>
                </tr>
        </table>
    </form>
</body>
</html>