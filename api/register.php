<?php

    include("connect.php");

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassowrd = $_POST['cpassword'];
    $address = $_POST['address'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $role = $_POST['role'];

    if($password == $cpassowrd) {
        move_uploaded_file($tmp_name, "../uploads/$image");
        $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password, address, photo, role, status, votes) VALUE ('$name', '$mobile', '$password', '$address', '$image', '$role', 0, 0)");
        if($insert) {
            echo '
            <script>
                alert("Registration successfull!");
                window.location = "../";
            </script>
        ';
        }
        else {
            echo '
            <script>
                alert("Some error occured!");
                window.location = "../routes/register.html";
            </script>
        ';
        }
    } 
    else {
        echo '
            <script>
                alert("password and confirm password doest not match!");
                window.location = "../routes/register.html";
            </script>
        ';
    }

?>