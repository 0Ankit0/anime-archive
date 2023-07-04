<?php
require('connection/config.php');
if (isset($_POST['follow'])) {
    $a_id = $_POST['a_id'];
    $u_id = $_POST['u_id'];
    $sql = "INSERT INTO `bookmark` (`U_Id`, `A_Id`) VALUES ('$u_id','$a_id')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "success";
        header("location:anime-details.php?id=$a_id");
    } else {
        echo "Error";
    }
}
