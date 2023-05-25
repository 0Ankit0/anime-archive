<?php
require('../../connection/config.php');
$id = $_GET['id'];
$sql2 = "SELECT * FROM user WHERE id = '$id'";
$result2 = mysqli_query($conn, $sql2);
$row = $result2->fetch_assoc();
$path = '../../Uploads/Pictures/' . $row['Pic'];
$unlink = unlink($path);

$sql = "DELETE FROM user where id='$id'";
$result = mysqli_query($conn, $sql);


if ($result && $unlink) {
    header("location:manageusers.php");
}
