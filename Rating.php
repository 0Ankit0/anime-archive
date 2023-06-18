 <?php

    require('./connection/config.php');

    // Retrieve the anime ID from the URL parameters
    $animeId = $_GET['id'];

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rating = $_POST['rating'];

        // Insert the new rating into the anime_info table
        $sql = "UPDATE anime_info SET Rating = '$rating' WHERE id = '$animeId'";
        if ($conn->query($sql) === TRUE) {
            $message = "Rating submitted successfully!";
            // Redirect to the same page to avoid form resubmission
            header("Location:anime-details.php?id=?$animeId");
            exit;
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Retrieve the average rating for the specific anime
    $sql = "SELECT Rating FROM anime_info WHERE id = '$animeId'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $average_rating = $row['Rating'];
    ?>
