<?php
require('./connection/config.php');
$uid = $_GET['uid'];
$sql = "UPDATE `user` SET status=0 where id='$uid'";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:./admin/production/logout.php");
}
