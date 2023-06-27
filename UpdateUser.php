<?php
require('./connection/config.php');


if (isset($_POST['update'])) {

    $fileName = $_FILES["Picture"]["name"];

    $tmp_name = $_FILES["Picture"]["tmp_name"];

    $position = strpos($fileName, ".");
    $fileextension = substr($fileName, $position + 1);
    $fileextension = strtolower($fileextension);
    echo $fileName;
    if (isset($fileName)) {
        $path = './Uploads/Pictures/';
        if (!empty($fileName)) {

            $success = 1;
            if (move_uploaded_file($tmp_name, $path . $fileName)) {
                $id = $_POST['id'];
                $userName = $_POST['fullname'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);

                $sql = "UPDATE user SET `User_Name`='$userName',`Pic`='$fileName',`Email`='$email',`Password`='$password' WHERE `id`='$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("location:index.php");
                }
            }
        }
    }

    $id = $_POST['id'];
    $userName = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "UPDATE user SET `User_Name`='$userName',`Email`='$email',`Password`='$password' WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    echo $sql;
    if ($result) {
        session_start();
        $_SESSION['username'] = $userName;
        header("location:profile.php");
    }
}
