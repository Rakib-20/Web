<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        span{
            font-weight: bold;
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
                    <p><span>Name:</span> <?php echo $_POST["name"]; ?></p>
                    <p><span>Father's Name:</span> <?php echo $_POST["fname"]; ?></p>
                    <p><span>Mother's Name:</span> <?php echo $_POST["mname"]; ?></p>
                    <p><span>Email:</span> <?php echo $_POST["email"]; ?></p>
                    <p><span>Education:</span> <?php echo $_POST["education"]; ?></p>
                    <p><span>Roll:</span> <?php echo $_POST["roll"]; ?></p>
                    <p><span>Department:</span> <?php echo $_POST["dname"]; ?></p>
                    <p><span>Session:</span> <?php echo $_POST["session"]; ?></p>
                    <p><span>Address:</span> <?php echo $_POST["address"]; ?></p>
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