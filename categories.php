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
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Categories</a>
                    <span><?php echo $_GET['category'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                    <h4><?php echo $_GET['category'] ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <!-- <div class="product__page__filter">
                                    <p>Order by:</p>
                                    <select>
                                        <option value="">A-Z</option>
                                        <option value="">1-10</option>
                                        <option value="">10-50</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $anime_query = "SELECT * FROM `anime_info`  WHERE Genre LIKE '%adventure%'  ORDER BY `id` DESC";
                        $anime_result = mysqli_query($conn, $anime_query);
                        $count = 0;
                        while ($data = mysqli_fetch_array($anime_result)) {

                        ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="anime-details.php?id=<?php echo $data['id']
                                                                ?>">
                                    <div class="product__item">
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
                        ?><a href="anime-details.php?id=<?php echo $data['id']
                                                        ?>">
                                <div class="product__sidebar__view__item set-bg mix day years" data-setbg="Uploads/Pictures/<?php echo $data["Anime_Img"] ?>">
                                    <div class="view"><i class="fa fa-eye"></i><?php echo $data['Views'] ?> </div>
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
    </div>
    </div>
</section>
<!-- Product Section End -->
<?php
require('inc/footer.php')
?>