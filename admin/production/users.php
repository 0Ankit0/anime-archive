<?php
require('../../connection/config.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $userName = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE user  SET `User_Name`='$userName',`Email`='$email',`Password`='$password',`Role`='$role'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:manageUsers.php");
    }
}
if (isset($_POST['submit'])) {
    $userName = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO user(`User_Name`,`Email`,`Password`,`Role`)  VALUES('$userName','$email','$password','$role')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:manageUsers.php");
    }
}