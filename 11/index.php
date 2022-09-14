<?php
include "./conn.php";
if (extract($_POST)) {
    $file_name = $_FILES['file']['name'];
    $sql = "INSERT INTO eproducts (products_name, products_description, quantity,photo) VALUES('$pname','$pDescription','$quantity','$file_name')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Added successfully";
        header("location: show.php");
    }else {
        echo "Insertion  failed";
    }
    if (isset($_FILES['file'])) {
        $file_name = $_files['file']['name'];

        $target_dir = "./uploads/";
        $target_file = $target_dir . basename($file_name);
        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
            echo "Insert successfully";
        }else{
            echo "File upload failed";
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
    <title>Add product</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <h3 style="text-align: center;">New Product ADD</h3>
        <table border="0" align="center">
            <tr>
                <td>Product Name: </td>
                <td><input type="text" name="pname" id="pname"></span></td>
            </tr>
            <tr>
                <td>Product Description: </td>
                <td><input type="text" name="pDescription" id="pDescription"></span></td>
            </tr>
            <tr>
                <td>Quantity: </td>
                <td><input type="number" name="quantity" id="quantity"></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input type="file" name="file" id="file"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
            <tr>
                <td>
                    <h3><a href="./show.php?">Show Products</a></h3>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
