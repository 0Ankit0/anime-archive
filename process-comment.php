<?php
session_start();
require('connection/config.php');

if (isset($_SESSION['username']) && isset($_POST['comment'])) {
    $username = $_SESSION['username'];
    $comment = $_POST['comment'];

    // Insert the comment into the database
    $sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    }

    // Redirect back to the page after submitting the comment
    exit();
} else {
    // Handle the case if the user is not logged in or comment is not provided
    echo "Error: Unable to process the comment.";
}
