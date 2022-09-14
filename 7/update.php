<?php include "db.php"; ?>
<?php

$id = $_GET['id'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $cnum = $_POST['cnum'];
    $salary = $_POST['salary'];

    $sql = "UPDATE teacher SET name = '$name', department = '$department', address = '$address', designation = '$designation', email = '$email', date = '$date', cnum = '$cnum', salary = '$salary' where id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "update successfully!!!!";
        header("location: show.php?msg=$msg");
        echo "update!!!!!";
    } else {
        echo "Failed!!!!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update teacher's Info</title>
</head>

<body>
    <h2 style="text-align: center">Update teacher's info into database</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <table align="center" border="0">
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM teacher where id = '$id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" name="name" id="name" value="<?php echo $row['name'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Department: </td>
                        <td><input type="text" name="department" id="department" value="<?php echo $row['department'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td><input type="text" name="address" id="address" value="<?php echo $row['address'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Designation: </td>
                        <td><input type="text" name="designation" id="designation" value="<?php echo $row['designation'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type="text" name="email" id="email" value="<?php echo $row['email'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Date of birth: </td>
                        <td><input type="date" name="date" id="date" value="<?php echo $row['date'] ?>"></td>
                    </tr>
                    <tr>
                        <td>C_number: </td>
                        <td><input type="number" name="cnum" id="cnum" value="<?php echo $row['cnum'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Salary: </td>
                        <td><input type="text" name="salary" id="salary" value="<?php echo $row['salary'] ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Edit" name="update"></td>
                    </tr>
                    <tr>
                        <td><a href="show.php">Show teacher's</a></td>
                    </tr>
            <?php
                }
            }

            ?>
        </table>
    </form>
</body>

</html>