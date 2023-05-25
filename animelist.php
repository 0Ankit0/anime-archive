<?php
require('inc/header.php');
require('connection/config.php');
?>
<!-- Breadcrumb Begin -->

<!-- Breadcrumb End -->

<!-- Product Section Begin -->
<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="section-title">
                                    <h4>Anime Lists</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $anime_query = "SELECT * FROM `anime_info`  ORDER BY `id` DESC";
                        $anime_result = mysqli_query($conn, $anime_query);
                        while ($data = mysqli_fetch_array($anime_result)) {

                        ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo $data["Anime_Img"] ?>">
                                        <div class="ep">18 / 18</div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>Active</li>
                                            <li>Movie</li>
                                        </ul>
                                        <h5><a href="anime-details.php?id=<?php echo $data['id'] ?>"><?php echo $data['Anime_Name'] ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <!-- <div class="product__pagination">
                    <a href="anime-details.php" class="current-page">1</a>
                    <a href="anime-details.php">2</a>
                    <a href="anime-details.php">3</a>
                    <a href="anime-details.php">4</a>
                    <a href="anime-details.php">5</a>
                    <a href="anime-details.php"><i class="fa fa-angle-double-right"></i></a>
                </div> -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>Top Views</h5>
                        </div>
                        <!-- <ul class="filter__controls">
                            <li class="active" data-filter="*">Day</li>
                            <li data-filter=".week">Week</li>
                            <li data-filter=".month">Month</li>
                            <li data-filter=".years">Years</li>
                        </ul> -->
                        <div class="filter__gallery">
                            <?php
                            $anime_query = "SELECT * FROM `anime_info`  ORDER BY `Views` DESC";
                            $anime_result = mysqli_query($conn, $anime_query);
                            $count = 0;
                            while ($count < 3) {
                                $data = mysqli_fetch_array($anime_result);
                                $count += 1;
                            ?>
                                <div class="product__sidebar__view__item set-bg mix day years" data-setbg="<?php echo $data["Anime_Img"] ?>">
                                    <div class="ep">18 / ?</div>
                                    <div class="view"><i class="fa fa-eye"></i><?php echo $data['Views'] ?> </div>
                                    <h5><a href="anime-details.php?id=<?php echo $data['id']
                                                                        ?>"><?php echo $data['Anime_Name'] ?></a></h5>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<?php
require('inc/footer.php')
?>