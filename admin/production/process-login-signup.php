<?php
require('../../connection/config.php');

if (isset($_POST['Login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM  user WHERE `Email`='$email' && `Password`='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($result) {
        session_start();
        $_SESSION['username'] = $row['User_Name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['Role'];
        $_SESSION['Pic'] = $row['Pic'];

        switch ($row['Role']) {
            case "user":
                header("location:/anime-archive/");
                break;
            case "creator":
                header("location:dashboard.php");
                break;
            case "admin":
                header("location:dashboard.php");
                break;
            default:
                header("location:index.php?error=true");
                break;
        }
    }
}
if (isset($_POST['create'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $username, $email, $password;
}
