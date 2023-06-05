<?php
require('../../connection/config.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
echo $id;

$sql2 = "SELECT * FROM videos WHERE id = '$id'";
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($result2);

$path = '../../Uploads/videos/'.$row['A_Name'] .'/'. $row['Ep_Video'] ;
$unlink = unlink($path);
if($unlink){  
    $sql = "DELETE FROM videos where id='$id'";
    $result = mysqli_query($conn, $sql);
}


 if ($result && $unlink) {
     header("location:managefile.php");
 }
}