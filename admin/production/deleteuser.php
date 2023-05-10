<?php
    require('../../connection/config.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM user where id='$id'";
    $result = mysqli_query($conn,$sql);

    if ($result){
        header("location:manageusers.php");
    }
