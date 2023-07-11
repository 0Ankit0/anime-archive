<?php
require('../../connection/config.php');
$id = $_GET['id'];


$sql = "UPDATE `user` SET status=0 where id='$id'";
$result = mysqli_query($conn, $sql);


if ($result) {
    header("location:manageusers.php");
}
