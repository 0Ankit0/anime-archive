<?php
require('./connection/config.php');

session_start();

$cid = $_GET['cid'];
$aid = $_GET['aid'];

// Retrieve the comment's user ID from the database
$sql = "SELECT U_Id FROM comments WHERE id='$cid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$commentUserId = $row['U_Id'];

// Check if the comment belongs to the currently logged-in user
if ($_SESSION['id'] == $commentUserId) {
    // Display an alert box confirmation
    echo "<script>
            var confirmDelete = confirm('Are you sure you want to delete this comment?');
            if (confirmDelete) {
                // Delete the comment
                var deleteUrl = 'delete-comment.php?cid=$cid&action=delete&aid=$aid';
                window.location.href = deleteUrl;
            } else {
                // Redirect back to the anime details page
                window.location.href = 'anime-details.php?id=$aid';
            }
          </script>";
} else {
    // Comment does not belong to the logged-in user, redirect to an appropriate page or display an error message
    echo "You can only delete your comments.";
}

// Process the delete action if confirmed
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    // Delete the comment
    $deleteSql = "DELETE FROM comments WHERE id='$cid'";
    $deleteResult = mysqli_query($conn, $deleteSql);


    if ($deleteResult) {
        // echo $aid;
        header("Location: anime-details.php?id=$aid");
        exit();
    } else {
        echo "Error deleting comment: " . mysqli_error($conn);
    }
}
