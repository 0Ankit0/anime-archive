 <?php

    require('./connection/config.php');

    // Retrieve the anime ID from the URL parameters
    if (isset($_GET['id'])) {
        $animeId = $_GET['id'];

        // Handle form submission

        $rating = $_GET['rating'];

        // Insert the new rating into the anime_info table
        $sql = "UPDATE anime_info SET Rating = '$rating' WHERE id = '$animeId'";
        $result = mysqli_query($conn, $sql);

        if ($result)
            header("location:anime-details.php?id=$animeId");
    }


    ?>
