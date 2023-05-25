<?php
require('../../connection/config.php');

if (isset($_POST['update'])) {
    $anime_name = $_POST['anime_name'];
    $Anime_Description = $_POST['Anime_Description'];
    $Studios = $_POST['Studios'];
    $id = $_POST['id'];
    $Genre = $_POST['Genre'];

    $name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $position = strpos($name, ".");
    $fileextension = substr($name, $position + 1);
    $fileextension = strtolower($fileextension);

    if (isset($name)) {
        $path = '../../Uploads/Pictures/';
        if (!empty($name)) {

            if (move_uploaded_file($tmp_name, $path . $name)) {
                $sql2 = "UPDATE `anime_info` SET `Anime_Name`='$anime_name',`Anime_Img`='$name',`Anime_Description`='$Anime_Description',`Studios`='$Studios',`Genre`='$Genre' WHERE `id`='$id'";
                $result = mysqli_query($conn, $sql2);
                if ($result) {
                    header("location:manageanimeinfo.php");
                }
            }
        }
    }
}

if (isset($_POST['submit'])) {
    $anime_name = $_POST['anime_name'];
    $Anime_Description = $_POST['Anime_Description'];
    $Studios = $_POST['Studios'];
    $Genre = $_POST['Genre'];

    $name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $position = strpos($name, ".");
    $fileextension = substr($name, $position + 1);
    $fileextension = strtolower($fileextension);

    if (isset($name)) {
        $path = '../../Uploads/Pictures/';
        if (!empty($name)) {

            if (move_uploaded_file($tmp_name, $path . $name)) {
                $sql = "INSERT INTO `anime_info`( `Anime_Name`, `Anime_Description`, `Anime_Img`,`Genre`,`Studios`) VALUES ('$anime_name','$Anime_Description','$name','$Genre','$Studios')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("location:manageanimeinfo.php");
                }
            }
        }
    }
}
