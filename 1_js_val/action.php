
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Show</title>
    <style>
        body {
            width: 100%;
        }

        .section {
            width: 100%;
            margin: auto;
        }

        .section h1 {
            text-align: center;
        }

        span {
            font-weight: 700;
        }
    </style>
</head>

<body>

    <?php
    $Err = "";

    ?>
    <div class="section">

        <table align="center">
            <tr>
                <td>
                    <h1>Student's Information</h1>
                    <p><span>First Name:</span> <?php echo $_POST["fname"]; ?></p>
                    <p><span>Last Name:</span> <?php echo $_POST["lname"]; ?></p>
                    <p><span>Email:</span> <?php echo $_POST["email"]; ?></p>
                    <p><span>S_ID:</span> <?php echo $_POST["s_id"]; ?></p>
                    <p><span>Department:</span> <?php echo $_POST["department"]; ?></p>
                    <p><span>Phone:</span> <?php echo $_POST["phone"]; ?></p>
                    <p><span>Birthday:</span> <?php echo $_POST["birthday"]; ?></p>
                    <p><span>Present_Address:</span> <?php echo $_POST["p_address"]; ?></p>
                    <p><span>Permanent_Address:</span> <?php echo $_POST["per_address"]; ?></p>
                    <p><span>Religion:</span> <?php echo $_POST["religion"]; ?></p>
                    <p><span>Gender:</span> <?php echo $_POST["gender"]; ?></p>
                    <p><span>Blood Group:</span> <?php if (empty($_POST["blood"])) {
                                                        echo $Err;
                                                    } else {
                                                        echo ($_POST["blood"]);
                                                    } ?></p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>