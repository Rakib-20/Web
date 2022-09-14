<?php 
    session_start();
    if(!isset($_SESSION['uname'])){
        $msg = "Login first";
        header("Location: admin.php?msg=$msg");
    }
    if(isset($_POST['logout'])){
        session_destroy();
        session_unset();
        $msg = "Logout successfully";
        header("Location: admin.php?msg=$msg");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>
<body>
    <h2><?php echo $_SESSION['uname'] ?></h2>
    <h2><?php echo $_SESSION['password'] ?></h2>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>