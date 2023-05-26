<?php
require('../../connection/config.php');
$id = $_GET['id'];

$sql2 = "SELECT * FROM videos WHERE id = '$id'";
$result2 = mysqli_query($conn, $sql2);
$row = $result2->fetch_assoc();
$path = 'Uploads/videos/' . $row['Episode_Name'] . "." . $row['ext'];
$unlink = unlink($path);

$sql = "DELETE FROM videos where id='$id'";
$result = mysqli_query($conn, $sql);


if ($result && $unlink) {
    header("location:managefile.php");
}
