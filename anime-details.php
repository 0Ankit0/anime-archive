<?php
require('inc/header.php');
require('connection/config.php');

?>

<?php
$id = $_GET['id'];
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
                if (isset($_SESSION['username'])) {
                ?>
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        <div class="comment">
                            <div class="blog__details__comment__item">
                                <?php

                                $sql = "SELECT user.User_Name,comments.Comment,user.Pic,comments.Created_At,comments.Like
                            FROM user
                            INNER JOIN comments ON comments.U_Id=user.id";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $username = $row['User_Name'];
                                    $comment = $row['Comment'];
                                    $pic = $row['Pic'];
                                    $created_at =  $row['Created_At'];
                                    $like = $row['Like'];
                                ?>

                                    <div class="blog__details__comment__item__pic">
                                        <img src="Uploads/Pictures/<?php echo $_SESSION['Pic'] ?>" alt="" width="80" height="80" style="border-radius:50%" />
                                    </div>
                                    <div class="blog__details__comment__item__text">
                                        <span><?php echo date('Y-m-d', strtotime($created_at)) ?></span>
                                        <h5><?php echo $username ?></h5>
                                        <p><?php echo $comment ?></p>
                                        <span>
                                            <span id="likeCount"><?php echo $like ?></span>
                                            <a href="#" onclick="toggleLike(event, <?php echo $id ?>)">Like</a>
                                        </span>
                                    </div>
                                    <script>
                                        function setCookie(name, value, days) {
                                            var expires = "";
                                            if (days) {
                                                var date = new Date();
                                                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                                                expires = "; expires=" + date.toUTCString();
                                            }
                                            document.cookie = name + "=" + (value || "") + expires + "; path=/";
                                        }

                                        function getCookie(name) {
                                            var nameEQ = name + "=";
                                            var ca = document.cookie.split(';');
                                            for (var i = 0; i < ca.length; i++) {
                                                var c = ca[i];
                                                while (c.charAt(0) === ' ') {
                                                    c = c.substring(1, c.length);
                                                }
                                                if (c.indexOf(nameEQ) === 0) {
                                                    return c.substring(nameEQ.length, c.length);
                                                }
                                            }
                                            return null;
                                        }

                                        function toggleLike(event, id) {
                                            event.preventDefault();

                                            var likeCountElement = document.getElementById('likeCount');
                                            var currentLikes = parseInt(likeCountElement.textContent);
                                            var isLiked = getCookie('isLiked_' + id) === 'true';

                                            if (isLiked) {
                                                currentLikes -= 1;
                                                setCookie('isLiked_' + id, 'false', 365); // Set the cookie to expire in 1 year
                                            } else {
                                                currentLikes += 1;
                                                setCookie('isLiked_' + id, 'true', 365); // Set the cookie to expire in 1 year
                                            }

                                            likeCountElement.textContent = currentLikes;
                                        }

                                        // Retrieve and set the initial like status on page load
                                        window.addEventListener('DOMContentLoaded', function() {
                                            var isLiked = getCookie('isLiked_<?php echo $id ?>') === 'true';
                                            var likeCountElement = document.getElementById('likeCount');

                                            if (isLiked) {
                                                likeCountElement.textContent = parseInt(likeCountElement.textContent) + 1;
                                            }
                                        });
                                    </script>
                            </div>



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
                                <input type="number" name="id" id="" value="<?php echo $id ?>" hidden>
                                <button type="submit" name="submit"><i class="fa fa-location-arrow"></i> Review</button>
                            </form>
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

                    </div>
            </div>
</section>
<!-- Anime Section End -->
<?php
require('inc/footer.php')
?>