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
                <?php
                if (isset($_SESSION['username'])) {
                ?>
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        <div class="comments">
                            // Fetch and display comments here
                            <?php
                            $sql = "SELECT * FROM comments ORDER BY created_at DESC";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $username = $_SESSION['username'];
                                $comment = $row['Comment'];
                                $pic = $_SESSION['Pic'];
                            ?>
                                <div class="blog__details__comment__item">
                                    <div class="blog__details__comment__item__pic">
                                        <img src="Uploads/Pictures/<?php echo $_SESSION['Pic'] ?>" alt="" width="80" height="80" style="border-radius:50%" />
                                    </div>
                                    <div class="blog__details__comment__item__text">

                                        <span><?php echo date('Y-m-d', strtotime($row["Created_At"])) ?></span>
                                        <h5><?php echo $username ?></h5>
                                        <p><?php echo $comment ?></p>
                                        <span>

                                            <?php echo $row['Like'] ?>
                                            <a href="#">Like</a></span>

                                    </div>
                                </div>

                        </div>


                    </div>

                    // Only logged-in users can see the comment form

                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="process-comment.php" method="POST">
                            <textarea name="comment" placeholder="Your Comment"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                <?php
                            }
                        } else {
                ?>
                <h2 style="color:whitesmoke">Login to view comments</h2>
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
                    ?>
                        <div class="product__sidebar__view__item set-bg" data-setbg="Uploads/Pictures/<?php echo $data["Anime_Img"] ?>">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="anime-details.php?id=<?php echo $data['id']
                                                                ?>"><?php echo $data['Anime_Name'] ?></a></h5>
                        </div>
                    <?php
                    }
                    ?>