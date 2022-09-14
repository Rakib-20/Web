<?php 
    session_start();
    if(!isset($_SESSION['uname'])){
        $msg = "Login first";
        header("location: index.php?msg=$msg");
    }
    if(isset($_POST['logout'])){
        session_destroy();
        $msg = "Logout successfully";
        header("location: index.php?msg=$msg");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminHome</title>
</head>
<body>
        <h1 align="center"><?php echo $_SESSION['uname'] ?></h1>
        <h1 align="center"><?php echo $_SESSION['email'] ?></h1>
    <form align="center" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="submit" value="Logout" name="logout">
    </form>

</body>
</html>
