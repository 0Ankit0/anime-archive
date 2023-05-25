<?php
require('../../connection/config.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $userName = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $sql = "UPDATE user  SET `User_Name`='$userName',`Email`='$email',`Password`='$password',`Role`='$role' WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:manageUsers.php");
    }
}
if (isset($_POST['submit'])) {
    $fileName = $_FILES["Picture"]["name"];
    $tmp_name = $_FILES["Picture"]["tmp_name"];

    $position = strpos($fileName, ".");
    $fileextension = substr($fileName, $position + 1);
    $fileextension = strtolower($fileextension);

    if (isset($fileName)) {
        $path = '../../Uploads/Pictures/';
        if (!empty($fileName)) {

            $success = 1;
            if (move_uploaded_file($tmp_name, $path . $fileName)) {
                $userName = $_POST['fullname'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $role = $_POST['role'];

                $sql = "INSERT INTO user(`User_Name`, `Pic`,`Email`,`Password`,`Role`)  VALUES('$userName','$fileName','$email','$password','$role')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("location:manageUsers.php");
                }
            }
        }
    }
}
