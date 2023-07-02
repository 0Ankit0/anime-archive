<?php
session_start();
require('connection/config.php');

if (isset($_SESSION['username']) && isset($_GET['submit'])) {
    $id = $_GET['id'];
    $username = $_SESSION['username'];
    $sql11 = "SELECT * FROM user WHERE User_Name='$username'";
    $result11 = mysqli_query($conn, $sql11);
    $data = mysqli_fetch_assoc($result11);

    $u_id = $data['id'];
    $comment = $_GET['comment'];

    // Insert the comment into the database
    $sql = "INSERT INTO comments (U_Id, A_Id, Comment) VALUES ('$u_id', '$id', '$comment')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        header("location:anime-details.php?id=$id");
    }

    // Redirect back to the page after submitting the comment
    exit();
} else {
    // Handle the case if the user is not logged in or comment is not provided
    echo "Error: Unable to process the comment.";
}
