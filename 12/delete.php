<?php
include "db.php";

$id = $_GET['id'];
$sql = "DELETE FROM student1 where id = '$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $msg = "Deleted Successfully!!!!!!!";
    header("location: show.php?msg=$msg");
} else {
    echo "Deleted failed!!!";
}
