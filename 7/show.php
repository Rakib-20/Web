<?php include "db.php";

if (isset($_GET['msg'])) {
    echo $_GET['msg'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Students Info</title>
</head>
<body>
    <h1 style="text-decoration: underline; text-align: center;">Show teacher's info from database</h1>
    <table align="center">
        <tr>
            <td><a style="font-size: 20px;" href="registration.php">Register new teacher</a></td>
        </tr>
    </table>
    <table align="center" border="1">
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Adderss</th>
            <th>Designation</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>C_number</th>
            <th>Salary</th>
            <th>Operations</th>
        </tr>
        <?php
        $sql = "SELECT * FROM teacher";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>

                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['department'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['designation'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['cnum'] ?></td>
                    <td><?php echo $row['salary'] ?></td>
                    <td><a href="update.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>