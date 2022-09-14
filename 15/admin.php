<?php
    session_start();
    $conn=mysqli_connect('localhost','root','','labwork');
    if (!$conn) {
        echo "Error connecting to db";
    }

    if(isset($_SESSION['uname'])){
        header("Location: adminHome.php");
    }
    if(isset($_POST['submit'])){
        $uname=$_POST['uname'];
        $password=$_POST['password'];

        $sql="SELECT * FROM user WHERE uname='$uname' || password='$password'";

        $result = mysqli_query($conn,$sql);

        if(!mysqli_num_rows($result)>0){
            echo "no row in the db";
            header("Location: adminHome.php?msg=$msg");
        }else{
            while($row=mysqli_fetch_assoc($result)){
                if(($row['uname']==$uname || $row['email']==$uname)&&($row['password']==$password)){
                    $_SESSION['uname']=$row['uname'];
                    $_SESSION['password']=$row['password'];
                    echo "login successfully";
                    header("Location: adminHome.php"); 
                }
                else{
                    echo "login failed";
                }
            }
        }
    }   
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <form name="myForm" action="<?php $_SERVER['PHP_SELF']?>" method="POST" onsubmit="return onsubmitFunc()">
        <table border="0" align="center">
            <h1 align="center">Admin Panel</h1>
            <p style="color: black; text-align: center"><?php
                                                        if (!isset($_GET['msg'])) {
                                                            echo "";
                                                        } else {
                                                            echo $_GET['msg'];
                                                        }
                                                        ?></p>
            <tr>
                <td>User Name or Email</td>
                <td><input type="text" name="uname" id="uname" oninput=validateUnameEmail();><span id="unameEmailErr"></span></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password" oninput="validatePassword()"><span id="passwordErr"></span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" id="Log In"></td>
            </tr>
            <tr>
                <td><a href="registration.php">Registration</a></td>
            </tr>
        </table>
    </form>
    <script>
    function validateUnameEmail() {
        if (document.forms['myForm']['uname'].value == "") {
            document.getElementById("unameEmailErr").innerHTML = "Must be filled";
        } else {
            const uname_validation = /[A-Za-z0-9]{4,}/;
            const email_validation = /^\w+@\w+\.\w{2,3}$/;
            if (!document.forms['myForm']['uname'].value.match(email_validation) && !document.forms['myForm']['uname'].value.match(uname_validation)) {
                document.getElementById("unameEmailErr").innerHTML = "Invalid Username or Email";
                return false;
            } else {
                document.getElementById("unameEmailErr").innerHTML = "";
                return true;
            }
        }
    }

    function validatePassword() {
        if (document.forms['myForm']['password'].value == "") {
            document.getElementById("passwordErr").innerHTML = "Must be filled";
        } else {
            const password_validation = /^\(?([A-Za-z0-9]{4,})\)?$/;
            if (!document.forms['myForm']['password'].value.match(password_validation)) {
                document.getElementById("passwordErr").innerHTML = "Password must be filled at least 4 characters";
                return false;
            } else {
                document.getElementById("passwordErr").innerHTML = "";
                return true;
            }
        }
    }
    function onsubmitFunc() {
        if (!validateUnameEmail() || !validatePassword()) {
            return false;
        } else {
            return true;
        }
    }
</script>
</body>
</html>