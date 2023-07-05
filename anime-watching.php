<?php
require('inc/header.php');
require('connection/config.php');
if(isset($_SESSION['status'])){
    $status = $_SESSION['status'];
    if($status==0){
        header("location:profile.php");
    }
}
?>


<?php
$epname = $_GET['epname'];

$query0 = "SELECT * FROM `videos` WHERE `Episode_Name`='$epname' ";
$result0 = mysqli_query($conn, $query0);
$data0 = mysqli_fetch_assoc($result0);

$Aname = $_GET['animename'];
$query1 = "SELECT * FROM `anime_info` WHERE Anime_Name='$Aname' ";
$result1 = mysqli_query($conn, $query1);
$data1 = mysqli_fetch_assoc($result1);


?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Categories</a>
                    <a href="#"><?php echo $data1['Genre'] ?></a>
                    <span><?php echo $data1['Anime_Name'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="anime__video__player">
                    <video id="player" playsinline controls data-poster="Uploads/Pictures/<?php echo $data1["Anime_Img"] ?>">
                        <source src='Uploads/videos/<?php echo $data1['Anime_Name']
                                                    ?>/<?php echo $data0['Ep_Video']
                                                        ?>' type='video/<?php echo $data0['ext'] ?>'>
                        <!-- Captions are optional -->
                        <track kind="captions" label="English captions" src="#" srclang="en" default />
                    </video>
                </div>
                <div class="anime__details__episodes">
                    <div class="section-title">
                        <h5>List Name</h5>
                    </div>

                    <?php
                    $name = $data0['A_Name'];
                    $query = "SELECT * FROM `videos` WHERE A_Name='$name' ";
                    $result = mysqli_query($conn, $query);

                    while ($data = mysqli_fetch_assoc($result)) {;

                    ?>
                        <a href="increaseviews.php?animename=<?php echo $name ?>&epname=<?php echo $data['Episode_Name'] ?>"><?php echo $data['Episode_Name'] ?></a>
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