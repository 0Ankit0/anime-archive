<?php
require('./connection/config.php');
$epname = $_GET['epname'];
$Aname = $_GET['animename'];
$query1 = "SELECT * FROM `anime_info` WHERE Anime_Name='$Aname' ";
$result1 = mysqli_query($conn, $query1);
$data1 = mysqli_fetch_assoc($result1);
$view = $data1['Views'];
$newview = $view + 1;
$queryviews= "UPDATE `anime_info` SET `Views`='$newview' WHERE Anime_Name='$Aname'; ";
$resultviews = mysqli_query($conn,$queryviews);
header("location:anime-watching.php?animename=$Aname&epname=$epname");
?>