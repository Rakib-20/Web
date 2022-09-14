<?php include "db.php" ?>

<?php
if (isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $photo = $_FILES['fileToUpload']['name'];

    $sql = "INSERT INTO product (productName, quantity, description, photo)
        VALUES('$productName','$quantity','$description','$photo')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "Product Information Added Successfully!!!!";
        header("location: showProduct.php?msg=$msg");
    } else {
        echo "Information updated failed!!!";
        header("location: registration.php");
    }
}
?>
<?php 
if (isset($_POST['submit'])) {
    $photo = $_FILES['fileToUpload']['name'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);
    $uploadOk = 1;

    if ($uploadOk = 0) {
        echo "Upload photo failed!!!!!";
    } else {
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
            echo "Photo uploaded successfully!!!!!!";
        } else {
            echo "Photo uploaded failed!!!!!";
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
    <title>Registration</title>
</head>
<body>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <table align="center" border="0">

            <h2 style="text-align:center";>Registration product Information</h3>
                <tr>
                    <td>Product Name: </td>
                    <td><input type="text" name="productName" id="productName" placeholder="product name..."></td>
                </tr>
                <tr>
                    <td>Quantity: </td>
                    <td><input type="number" name="quantity" placeholder="quantity..."></td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td><input type="text" name="description" placeholder="description..."></td>
                </tr>
                <tr>
                    <td>Photo: </td>
                    <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="submit" name="submit"></td>
                </tr>
                <tr>
                    <td><a href="showProduct.php">Show products</a></td>
                </tr>
        </table>
    </form>
</body>

</html>

