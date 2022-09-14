<?php include "db.php";
?>
<?php
$sql = "SELECT* FROM product";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>ProductShow</title>
        <style>
            .flex-container {
                display: flex;
            }

            .product_box {
                border: 2px solid red;
                margin: 10px;
            }

            span {
                font-weight: 700;
            }
        </style>
    </head>

    <body>

        <h2>Product List:</h2>


        <div class="flex-container">
            <?php while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="product_box">
                    <img width="200px" height="200px" src="./uploads/<?php echo $row['photo'] ?>" alt="image"><br>
                    <div class="product_bottom">
                        <span>Product Title: </span><?php echo $row['productName'] ?><br>
                        <span>Quantity: </span><?php echo $row['quantity'] ?><br>
                        <span>Description: </span><?php echo $row['description'] ?><br>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        </div>
    </body>

    </html>