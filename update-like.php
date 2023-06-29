<?php
// update-like.php
require('./connection/config.php');
// Assuming you have established a database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the comment ID and new like count from the AJAX request
    $commentId = $_POST['commentId'];
    $newLikeCount = $_POST['newLikeCount'];

    // Update the like count in the database
    $updateQuery = "UPDATE comments SET `Like` = $newLikeCount WHERE id = $commentId";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Success";
    } else {
        echo "Error updating the like count.";
    }
}
