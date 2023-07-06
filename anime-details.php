<?php
require('inc/header.php');
require('connection/config.php');
if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    if ($status == 0) {
        header("location:profile.php");
    }
}

?>

<?php
$id = $_GET['id'];
$animeId = $id;
$anime_query = "SELECT * FROM `anime_info` WHERE `id`='$id'";
$anime_result = mysqli_query($conn, $anime_query);

$data = mysqli_fetch_assoc($anime_result);
?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Categories</a>
                    <span><?php echo $data['Genre'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="Uploads/Pictures/<?php echo $data["Anime_Img"] ?>">
                        <div class="view"><i class="fa fa-eye"></i> <?php echo $data["Views"] ?></div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3><?php echo $data['Anime_Name'] ?></h3>
                        </div>
                        <!-- Rating system starts -->

                        <div class="container">
                            <form method="get" action="Rating.php" style="display: flex;" enctype="multipart/form-data">
                                <div class="rating">
                                    <input type="text" name="id" id="" value="<?php echo $data['id'] ?>" hidden>
                                    <input type="radio" name="rating" value="5" id="5">
                                    <label for="5"></label>
                                    <input type="radio" name="rating" value="4" id="4">
                                    <label for="4"></label>
                                    <input type="radio" name="rating" value="3" id="3">
                                    <label for="3"></label>
                                    <input type="radio" name="rating" value="2" id="2">
                                    <label for="2"></label>
                                    <input type="radio" name="rating" value="1" id="1">
                                    <label for="1"></label>
                                </div>
                                <button type="submit" class="follow-btn" style="border: none; margin-left: 10px;" value="submit">Rate!</button>
                                <?php
                                $sql = "SELECT avg(rating) AS average FROM rating WHERE anime_id='$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <span style="color:aliceblue;font-size:larger;padding-top:10px;"><?php echo "Avg:  " . round($row['average'], 1) ?></span>
                                ?>
                            </form>
                        </div>



                        <!-- Rating system ends -->

                        <p><?php echo $data["Anime_Description"] ?></p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul class="noList">
                                        <li><span>Type:</span> TV Series</li>
                                        <li><span>Studios:</span><?php echo $data["Studios"] ?></li>
                                        <li><span>Date aired:</span><?php echo date('Y-m-d', strtotime($data["Created_At"])) ?></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul class="noList">
                                        <li><span>Genre:</span>
                                            <?php
                                            $values = explode(',', $data['Genre']);
                                            // Loop through the array of values

                                            foreach ($values as $value) {
                                            ?>
                                                <?php echo $value, " " ?>
                                            <?php

                                            }
                                            ?>
                                        </li>
                                        <li><span>Views:</span> <?php echo $data["Views"] ?></li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="anime__details__btn">
                            <form method="POST" action='<?php if (isset($_SESSION['username'])) {
                                                            echo "Bookmark.php";
                                                        } else {
                                                            echo "#";
                                                        } ?>'>
                                <input type="number" name="a_id" value="<?php echo $id; ?>" hidden>
                                <?php
                                if (isset($_SESSION['id'])) {

                                ?>
                                    <input type="number" name="u_id" value="<?php echo $_SESSION['id']; ?>" hidden>
                                <?php
                                }
                                ?>

                                <?php

                                $id = $_GET['id'];
                                $sql = "SELECT `User_Name`,`Email`,`Pic`,`Password`,bookmark.id FROM `anime_info` INNER JOIN `bookmark` INNER JOIN `user` on bookmark.A_id='$id' and bookmark.U_id=user.id ";
                                $result = mysqli_query($conn, $sql);
                                $isBookmarked = mysqli_fetch_assoc($result);

                                if (!$isBookmarked) {
                                ?>
                                    <button type="submit" class="follow-btn" name="follow" value="submit" style="border: none;"><i class="fa fa-heart-o"></i>
                                        Follow
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a type="button" class="follow-btn" style="border: none;color: white;" href="DeleteBookmark.php?bid=<?php echo $isBookmarked['id'] ?>&aid=<?php echo $id ?>"><i class=" fa fa-heart-o"></i>
                                        Followed
                                    </a>
                                    <span style="color: white;">Click to unfollow</span>
                                <?php

                                }
                                ?>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="anime__details__episodes">
                    <div class="section-title">
                        <h5>List Name</h5>
                    </div>
                    <?php
                    $name = $data['Anime_Name'];
                    $query = "SELECT * FROM `videos` WHERE A_Name='$name' ";
                    $result = mysqli_query($conn, $query);

                    while ($data = mysqli_fetch_array($result)) {;

                    ?>
                        <a href="increaseviews.php?animename=<?php echo $name ?>&epname=<?php echo $data['Episode_Name'] ?>"><?php echo $data['Episode_Name'] ?></a>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <?php

                if (isset($animeId)) {
                    // Retrieve the anime details based on the provided ID
                    $animeSql = "SELECT * FROM anime_info WHERE id = $animeId";
                    $animeResult = mysqli_query($conn, $animeSql);
                    $animeRow = mysqli_fetch_assoc($animeResult);
                }

                if (isset($_SESSION['username'])) {
                ?>
                    <div class="anime__details__review" style="width: 300px; ">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        <div class="comment">
                            <div class="blog__details__comment__item">
                                <?php

                                $sql = "SELECT comments.id,user.User_Name,comments.Comment,user.Pic,comments.Created_At,comments.LikeCount
                            FROM user
                            INNER JOIN comments ON comments.U_Id=user.id 
                            WHERE comments.A_Id = $animeId";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $username = $row['User_Name'];
                                    $comment = $row['Comment'];
                                    $pic = $row['Pic'];
                                    $created_at =  $row['Created_At'];
                                    $like = $row['LikeCount'];
                                ?>

                                    <div class="blog__details__comment__item__pic">
                                        <img src="Uploads/Pictures/<?php echo $pic; ?>" alt="" width="80" height="80" style="border-radius:50%" />
                                    </div>

                                    <div class="blog__details__comment__item__text">
                                        <span><?php echo date('Y-m-d', strtotime($created_at)) ?></span>
                                        <h5><?php echo $username ?></h5>
                                        <p><?php echo $comment ?></p>
                                        <span>
                                            <span id="likeCount_<?php echo $id; ?>"><?php echo $like; ?></span>
                                            <a href="#" class="like-link" data-comment-id="<?php echo $id; ?>">Like</a>


                                            <a href='delete-comment.php?cid=<?php echo $row['id']; ?>&aid=<?php echo $animeId ?>'>Delete</a>

                                        </span>
                                    </div>


                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            $(".like-link").on("click", function(e) {
                                                e.preventDefault();

                                                // Get the comment ID from the data-comment-id attribute
                                                var commentId = $(this).data("comment-id");

                                                // Get the current like count element
                                                var likeCountElement = $("#likeCount_" + commentId);

                                                // Get the current like count value
                                                var likeCount = parseInt(likeCountElement.text());

                                                // Check if the user has already liked the comment
                                                var hasLiked = $(this).hasClass("liked");

                                                // Calculate the new like count
                                                var newLikeCount = hasLiked ? likeCount - 1 : likeCount + 1;

                                                // Send an AJAX request to update the like count
                                                $.ajax({
                                                    url: "update-like.php",
                                                    method: "POST",
                                                    data: {
                                                        commentId: commentId,
                                                        newLikeCount: newLikeCount
                                                    },
                                                    success: function(response) {
                                                        // Update the like count element with the new value
                                                        likeCountElement.text(newLikeCount);

                                                        // Toggle the "liked" class to indicate the user's action
                                                        $(this).toggleClass("liked");
                                                    },
                                                    error: function() {
                                                        console.log("An error occurred while updating the like count.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>




                                <?php
                                }
                            } else {
                                ?>



                                <h2 style="color:whitesmoke">Login to view comments</h2>
                            <?php
                            }
                            if (isset($_SESSION['username'])) {
                            ?>
                                <div class="anime__details__form">
                                    <div class="section-title">
                                        <h5>Your Comment</h5>
                                    </div>
                                    <form action="process-comment.php" method="get">
                                        <textarea name="comment" placeholder="Your Comment"></textarea>
                                        <input type="number" name="id" id="" value="<?php echo $animeId ?>" hidden>
                                        <button type="submit" name="submit"><i class="fa fa-location-arrow"></i> Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                            }
                ?>

            </div>






            <div class="col-lg-4 col-md-4">
                <div class="anime__details__sidebar">
                    <div class="section-title">
                        <h5>you might like...</h5>
                    </div>
                    <?php
                    $anime_query = "SELECT * FROM `anime_info`  ORDER BY `id` DESC";
                    $anime_result = mysqli_query($conn, $anime_query);
                    $count = 0;
                    while ($count < 3) {
                        $data = mysqli_fetch_array($anime_result);
                        $count += 1;
                    ?><a href="anime-details.php?id=<?php echo $data['id']
                                                    ?>">
                            <div class="product__sidebar__view__item set-bg" data-setbg="Uploads/Pictures/<?php echo $data["Anime_Img"] ?>">

                                <div class="view"><i class="fa fa-eye"></i> <?php echo $data["Views"] ?></div>
                                <h5><?php echo $data['Anime_Name'] ?>
                                </h5>
                            </div>
                        </a>
                    <?php
                    }
                    ?>

                </div>
            </div>



</section>
<!-- Anime Section End -->
<?php
require('inc/footer.php')
?>