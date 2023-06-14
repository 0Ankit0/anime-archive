<?php
require('inc/header.php');
require('connection/config.php');

?>

<?php
$username = $_SESSION['username'];
$user_query = "SELECT * FROM `user` WHERE `username`='$username'";
$user_result = mysqli_query($conn, $user_query );

$data = mysqli_fetch_assoc($user_result );

//get all followers details
//get all bookmarks details
?>

<!-- User Section Begin -->
<section class="user-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="user__details__pic set-bg" data-setbg="Uploads/Pictures/<?php echo $data["profile"] ?>"> // how to display image from backend
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="user__details__name">
                        <div class="anime__details__title">
                            <h3><?php 
		$name  = $data['firstname'] + $data['secondname']
		echo $name  ?>
	         </h3>
                        </div>
                   
                        <div class="user__details__extra">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
		<p>Followers</p>
                                    <ul>
                                            <?php
                                            //to write coonect to database if required for followers
                                            $followers = explode(',', $data['followers']); // this new parameter need to be added
                                            // Loop through the array of values

                                            foreach ($followers as $value) {
                                            ?>
			<li><span><?php echo $value, " " ?></span></li>
                                            <?php

                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
		<p>Bookmarks</p>
                                    <ul>
                                            <?php
                                           //to write coonect to database if required for followers
                                            $bookmarks = explode(',', $data['bookmarks']); // this new parameter need to be added
                                            // Loop through the array of values

                                            foreach ($bookmarks as $value) {
                                            ?>
			<li><span><?php echo $value, " " ?></span></li>
                                            <?php

                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- User Details Page -->
<?php
require('inc/footer.php')
?>