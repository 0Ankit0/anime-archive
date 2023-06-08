<?php
    $conn=mysqli_connect("localhost", "root", "", "db_profile");
 
    if(!$conn){
        die("Error: Failed to connect to database!");
    }
?>