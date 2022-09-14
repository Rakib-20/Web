<?php
$conn = mysqli_connect('localhost', 'root', '', 'labwork');
if (!$conn) {
    die("connection failed") . mysqli_connect_error();
}
?>
<?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $s_id = $_POST['s_id'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $p_address = $_POST['p_address'];
    $per_address = $_POST['per_address'];
    $religion = $_POST['religion'];
    $gender = $_POST['gender'];
    $blood = $_POST['blood'];
    $sql = "INSERT INTO student6(fname,lname,email,s_id,department,phone,birthday,p_address,per_address,religion,gender,blood)
        VALUES('$fname','$lname','$email','$s_id','$department','$phone','$birthday','$p_address','$per_address','$religion','$gender','$blood')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Insert data in database successfully";
    } else {
        echo "Insert failed info in db ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Registration</title>
</head>

<body>
    <?php $empty = ""; ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <h1 style="text-align: center;">Student's Profile Form</h1>
        <table align="center">
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="fname" id="fname" required></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="lname" id="lname"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td>Student Id: </td>
                <td><input type="number" name="s_id" id="s_id"></td>
            </tr>
            <tr>
                <td>Department: </td>
                <td><input type="text" name="department" id="department"></td>
            </tr>
            <tr>
                <td>Phone: </td>
                <td><input type="number" name="phone" id="phone"></td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                <td><input type="date" name="birthday" id="birthday"></td>
            </tr>
            <tr>
                <td>Present Address: </td>
                <td><input type="text" name="p_address" id="p_address"></td>
            </tr>
            <tr>
                <td>Permanent Address: </td>
                <td><input type="text" name="per_address" id="per_address"></td>
            </tr>
            <tr>
                <td>Religion</td>
                <td>
                    <select name="religion" id="religion">
                        <option value="Islam">Islam</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Christianity">Christianity</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gender: </td>
                <td>
                    <input type="radio" name="gender" id="gender" value="male">Male
                    <input type="radio" name="gender" id="gender" value="female">Female
                    <input type="radio" name="gender" id="gender" value="others">Others
                </td>
            </tr>
            <tr>
                <td>Blood Group: </td>
                <td>
                    <input type="radio" name="blood" id="blood" value="A+">A+
                    <input type="radio" name="blood" id="blood" value="A-">A-
                    <input type="radio" name="blood" id="blood" value="AB+">AB+
                    <input type="radio" name="blood" id="blood" value="AB-">AB-
                    <input type="radio" name="blood" id="blood" value="O+">O+
                    <input type="radio" name="blood" id="blood" value="O-">O-
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>