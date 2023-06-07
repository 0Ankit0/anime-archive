<?php
    require_once 'conn.php';
    if(ISSET($_POST['update'])){
        $image_name = $_FILES['profile']['name'];
        $image_temp = $_FILES['profile']['tmp_name'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $current = $_POST['current'];
        $exp = explode(".", $image_name);
        $end = end($exp);
        $name = time().".".$end;
        $path = "profile/".$name;
        $allowed_ext = array("gif", "jpg", "jpeg", "png");
        if(in_array($end, $allowed_ext)){
            if(unlink("profile/".$current)){
                if(move_uploaded_file($image_temp, $path)){
                    mysqli_query($conn, "UPDATE `user` set `firstname` = '$firstname', `lastname` = '$lastname', `profile` = '$path' WHERE `user_id` = '1'") or die(mysqli_error());
                    echo "<script>alert('User account updated!')</script>";
                    header("location: index.php");
                }
            }        
        }else{
            echo "<script>alert('Image only')</script>";
        }
    }
?>