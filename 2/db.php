<?php
$conn = mysqli_connect("localhost", "root", "", "labwork");
if (!$conn) {
    echo "Database connection failed" . mysqli_connect_error();
}
