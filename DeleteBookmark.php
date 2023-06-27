<?php
require('./connection/config.php');
$bid = $_GET['bid'];
$sql = "DELETE FROM bookmark WHERE id='$bid'";
$result = mysqli_query($conn, $sql);

if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    header("location:anime-details.php?id=$aid");
} else {
    header("location:profile.php");
}
