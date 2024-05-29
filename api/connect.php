<?php
$connect = mysqli_connect("localhost", "root", "", "voting") or die("Connection failed!");

if($connect) {
    echo "Connected!";
} else {
    echo "Not connected!";
}
?>