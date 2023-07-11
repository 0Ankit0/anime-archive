<?php
require('../../connection/config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;

    $sql2 = "SELECT * FROM anime_info WHERE id = '$id'";
    $result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($result2);

    $path = '../../Uploads/Pictures/' . $row['Anime_Img'];
    $unlink = unlink($path);
    if ($unlink) {
        $sql = "DELETE FROM anime_info where id='$id'";
        $result = mysqli_query($conn, $sql);
    }


    if ($result && $unlink) {
        header("location:manageanimeinfo.php");
    }
}
