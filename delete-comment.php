<?php
require('./connection/config.php');

session_start();

if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to login page or display an error message
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

// Retrieve the comment's user ID from the database
$sql = "SELECT U_Id FROM comments WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$commentUserId = $row['U_Id'];

// Check if the comment belongs to the currently logged-in user
if ($_SESSION['id'] == $commentUserId) {
    // Delete the comment
    $deleteSql = "DELETE FROM comments WHERE id='$id'";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
        header("Location: anime-details.php");
        exit();
    } else {
        echo "Error deleting comment: " . mysqli_error($conn);
    }
} else {
    // Comment does not belong to the logged-in user, redirect to an appropriate page or display an error message
    echo "You can only delete your comments.";
}
