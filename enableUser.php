<?php
require('./connection/config.php');
$uid = $_GET['uid'];
$sql = "UPDATE `user` SET status=1 where id='$uid'";
$result = mysqli_query($conn, $sql);

if ($result) {
    session_start();
    $_SESSION['status'] = 1;
    header("location:/anime-archive/");
}
