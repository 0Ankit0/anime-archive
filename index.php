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

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">

            <?php
            $slider_count_query = "SELECT * FROM `anime_info`";
            $slider_count_result = mysqli_query($conn, $slider_count_query);
            $count = 0;
            while ($count < 5) {
                $data = mysqli_fetch_assoc($slider_count_result);
                $count += 1;
            ?>
                <div class="hero__items set-bg" data-setbg="Uploads/Pictures/<?php echo $data["Anime_Img"] ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <?php
                                $values = explode(',', $data['Genre']);

                                // Loop through the array of values
                                foreach ($values as $value) { ?>
                                    <div class="label"><?php echo $value ?></div>

                                <?php
                                }
                                ?>
                                <h2><?php echo $data['Anime_Name'] ?></h2>
                                <p><?php echo $data['Anime_Description'] ?></p>
                                <a href="anime-details.php?id=<?php echo $data['id'] ?>"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Adventure</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="categories.php?category=adventure" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $anime_query = "SELECT * FROM `anime_info`  WHERE Genre LIKE '%adventure%'  ORDER BY `id` DESC";
                        $anime_result = mysqli_query($conn, $anime_query);
                        $count = 0;
                        while ($count < 3) {
                            $data = mysqli_fetch_array($anime_result);
                            $count += 1;
                        ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <a href="anime-details.php?id=<?php echo $data['id'] ?>">
                                        <div class="product__item__pic set-bg" data-setbg="Uploads/Pictures/<?php echo $data["Anime_Img"] ?>">

                                            <div class="view"><i class="fa fa-eye"></i> <?php echo $data['Views'] ?></div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <?php
                                                $values = explode(',', $data['Genre']);
                                                // Loop through the array of values
                                                $count = 0;
                                                foreach ($values as $value) {
                                                    if ($count < 3) { ?>
                                                        <li><?php echo $value ?></li>
                                                <?php
                                                        $count++;
                                                    }
                                                }
                                                ?>
                                            </ul>
                                            <h5><?php echo $data['Anime_Name'] ?></h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="popular__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Action</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="categories.php?category=action" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $anime_query = "SELECT * FROM `anime_info` WHERE Genre LIKE '%action%'";
                        $anime_result = mysqli_query($conn, $anime_query);
                        $count = 0;
                        while ($count < 3) {
                            $data = mysqli_fetch_assoc($anime_result);
                            $count += 1;
                        ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <a href="anime-details.php?id=<?php echo $data['id'] ?>">
                                        <div class="product__item__pic set-bg" data-setbg="Uploads/Pictures/<?php echo $data["Anime_Img"] ?>">

                                            <div class="view"><i class="fa fa-eye"></i> <?php echo $data['Views'] ?></div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <?php
                                                $values = explode(',', $data['Genre']);
                                                // Loop through the array of values
                                                $count = 0;
                                                foreach ($values as $value) {
                                                    if ($count < 3) { ?>
                                                        <li><?php echo $value ?></li>
                                                <?php
                                                        $count++;
                                                    }
                                                }
                                                ?>
                                            </ul>
                                            <h5><?php echo $data['Anime_Name'] ?></h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="recent__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Fantasy</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="categories.php?category=fantasy" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $anime_query = "SELECT * FROM `anime_info`  WHERE Genre LIKE '%fantasy%'";
                        $anime_result = mysqli_query($conn, $anime_query);
                        $count = 0;
                        while ($count < 3) {
                            $data = mysqli_fetch_assoc($anime_result);
                            $count += 1;
                        ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <a href="anime-details.php?id=<?php echo $data['id']
                                                                    ?>">
                                        <div class="product__item__pic set-bg" data-setbg="Uploads/Pictures/<?php echo $data["Anime_Img"] ?>">

                                            <div class="view"><i class="fa fa-eye"></i><?php echo $data['Views'] ?></div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <?php
                                                $values = explode(',', $data['Genre']);
                                                // Loop through the array of values
                                                $count = 0;
                                                foreach ($values as $value) {
                                                    if ($count < 3) { ?>
                                                        <li><?php echo $value ?></li>
                                                <?php
                                                        $count++;
                                                    }
                                                }
                                                ?>
                                            </ul>
                                            <h5><?php echo $data['Anime_Name'] ?></h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

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
                            ?><a href="anime-details.php?id=<?php echo $data['id']
                                                            ?>">
                                    <div class="product__sidebar__view__item set-bg mix day years" data-setbg="Uploads/Pictures/<?php echo $data["Anime_Img"] ?>">
                                        <div class="view"><i class="fa fa-eye"></i><?php echo $data['Views'] ?> </div>
                                        <h5><?php echo $data['Anime_Name'] ?></h5>
                                    </div>
                                </a>
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