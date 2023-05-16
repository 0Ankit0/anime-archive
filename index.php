<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a href="https://sourcecodester.com" class="navbar-brand">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Simple Video Upload</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Video</button>
		<br /><br />
		<hr style="border-top:3px solid #ccc;"/>
		<?php
			require 'conn.php';
 
			$query = mysqli_query($conn, "SELECT * FROM `video` ORDER BY `video_id` ASC") or die(mysqli_error());
			while($fetch = mysqli_fetch_array($query)){
		?>
		<div class="col-md-12">
			<div class="col-md-4" style="word-wrap:break-word;">
				<br />
				<h4>Video Name</h4>
				<h5 class="text-primary"><?php echo $fetch['video_name']?></h5>
			</div>
			<div class="col-md-8">
				<video width="100%" height="240" controls>
					<source src="<?php echo $fetch['location']?>">
				</video>
			</div>
			<br style="clear:both;"/>
			<hr style="border-top:1px groovy #000;"/>
		</div>
		<?php
			}
		?>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<form action="save_video.php" method="POST" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Video File</label>
								<input type="file" name="video" class="form-control-file"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
=======
<?php
require('inc/header.php');
require('connection/config.php');
?>

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">

            <?php
            $slider_count_query = "SELECT * FROM `anime_info`";
            $slider_count_result = mysqli_query($conn, $slider_count_query);
            $count = 0;
            while ($count < 3) {
                $data = mysqli_fetch_array($slider_count_result);
                $count += 1;
            ?>
                <div class="hero__items set-bg" data-setbg="<?php echo $data["Anime_Img"] ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label"><?php echo $data['Genre'] ?></div>
                                <h2><?php echo $data['Anime_Name'] ?></h2>
                                <p><?php echo $data['Anime_Description'] ?></p>
                                <a href="anime-details.php"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
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
                                <h4>Trending Now</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="categories.php" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $anime_query = "SELECT * FROM `anime_info`";
                        $anime_result = mysqli_query($conn, $anime_query);
                        $count = 0;
                        while ($count < 3) {
                            $data = mysqli_fetch_array($anime_result);
                            $count += 1;
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
                                        <h5><a href="anime-details.php"><?php echo $data['Anime_Name'] ?></a></h5>
                                    </div>
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
                                <h4>Popular Shows</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="categories.php" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $anime_query = "SELECT * FROM `anime_info`  ORDER BY `id` DESC";
                        $anime_result = mysqli_query($conn, $anime_query);
                        $count = 0;
                        while ($count < 3) {
                            $data = mysqli_fetch_array($anime_result);
                            $count += 1;
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
                                        <h5><a href="anime-details.php"><?php echo $data['Anime_Name'] ?></a></h5>
                                    </div>
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
                                <h4>Recently Added Shows</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="categories.php" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $anime_query = "SELECT * FROM `anime_info`  ORDER BY `id` ASC";
                        $anime_result = mysqli_query($conn, $anime_query);
                        $count = 0;
                        while ($count < 3) {
                            $data = mysqli_fetch_array($anime_result);
                            $count += 1;
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
                                        <h5><a href="anime-details.php"><?php echo $data['Anime_Name'] ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="live__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Live Action</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="categories.php" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $anime_query = "SELECT * FROM `anime_info`  ORDER BY `id` DESC";
                        $anime_result = mysqli_query($conn, $anime_query);
                        $count = 0;
                        while ($count < 3) {
                            $data = mysqli_fetch_array($anime_result);
                            $count += 1;
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
                                        <h5><a href="anime-details.php"><?php echo $data['Anime_Name'] ?></a></h5>
                                    </div>
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
                            $anime_query = "SELECT * FROM `anime_info`  ORDER BY `id` DESC";
                            $anime_result = mysqli_query($conn, $anime_query);
                            $count = 0;
                            while ($count < 3) {
                                $data = mysqli_fetch_array($anime_result);
                                $count += 1;
                            ?>
                                <div class="product__sidebar__view__item set-bg mix day years" data-setbg="<?php echo $data["Anime_Img"] ?>">
                                    <div class="ep">18 / ?</div>
                                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                    <h5><a href="anime-details.php"><?php echo $data['Anime_Name'] ?></a></h5>
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
>>>>>>> Dashboard
