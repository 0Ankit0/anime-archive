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
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./categories.html">Categories</a>
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
                    <div class="anime__details__pic set-bg" data-setbg="<?php echo $data["Anime_Img"] ?>">
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3><?php echo $data['Anime_Name'] ?></h3>
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                            <span>1.029 Votes</span>
                        </div>
                        <p><?php echo $data["Anime_Description"] ?></p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Type:</span> TV Series</li>
                                        <li><span>Studios:</span><?php echo $data["Studios"] ?></li>
                                        <li><span>Date aired:</span><?php echo date('Y-m-d', strtotime($data["Created_At"])) ?></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Rating:</span> 8.5 / 161 times</li>
                                        <li><span>Genre:</span> Action, Adventure, Fantasy, Magic</li>
                                        <li><span>Views:</span> <?php echo $data["Views"] ?></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
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
                        <a href="anime-watching.php?animename=<?php echo $name ?>&epname=<?php echo $data['Episode_Name'] ?>"><?php echo $data['Episode_Name'] ?></a>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Reviews</h5>
                    </div>
                    <div class="comments">
                        <?php
                        // Fetch and display comments here
                        $sql = "SELECT * FROM comments ORDER BY created_at DESC";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $username = $row['username'];
                            $comment = $row['comment'];
                            $pic = $row['pic'];

                            echo '<div class="comment">';
                            echo '<div class="comment__author">';
                            echo '<img src="' . $pic . '" alt="User Profile Picture">';
                            echo '<span>' . $username . '</span>';
                            echo '</div>';
                            echo '<div class="comment__content">';
                            echo '<p>' . $comment . '</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                <?php
                // Only logged-in users can see the comment form
                if (isset($_SESSION['username'])) {
                    echo '
        <div class="anime__details__form">
            <div class="section-title">
                <h5>Your Comment</h5>
            </div>
            <form action="process-comment.php" method="POST">
                <textarea name="comment" placeholder="Your Comment"></textarea>
                <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
            </form>
        </div>
        ';
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
                    ?>
                        <div class="product__sidebar__view__item set-bg" data-setbg="<?php echo $data["Anime_Img"] ?>">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#"><?php echo $data['Anime_Name'] ?></a></h5>
                        </div>
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