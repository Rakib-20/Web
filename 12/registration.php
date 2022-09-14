<?php include "db.php"; ?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $department = $_POST['dept'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO student1 (name, department, address, email, date, phone)
        VALUES('$name','$department','$address','$email','$date','$phone')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "Student Information Added Successfully!!!!";
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
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <table align="center" border="0">

            <h2 align="center">Registration student Information</h3>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" id="name" placeholder="name..."></td>
                </tr>
                <tr>
                    <td>Department:</td>
                    <td><input type="text" name="dept" placeholder="dept name..."></td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td><input type="text" name="address" placeholder="address..."></td>
                </tr>
                <tr>
                <td>Email</td>
                <td><input type="email" name="email" placeholder="email..."></td>
                </tr>
                <tr>
                    <td>Date of birth</td>
                    <td><input type="date" name="date" placeholder="date of birth..."></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" placeholder="phone..."></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="submit" name="submit"></td>
                </tr>
                <tr>
                    <td><a href="show.php">Show students</a></td>
                </tr>
        </table>
    </form>
</body>
</html>
