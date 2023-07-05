<?php
require('inc/header.php');
?>
<style>
    .nav-item a {
        color: white;
    }

    * {
        color: white;
    }

    .nav {
        border: none;
    }

    .fade:not(.show) {
        opacity: 0;
        display: none;
    }
</style>
<div style="display: flex; margin: 5rem 4rem;">
    <!-- MENU BOX (LEFT-CONTAINER) -->
    <!-- <ul class="menu-box-menu">
            <li>
                <a data-toggle="tab" href="#profile" style="color: whitesmoke;" class="menu-box-tab"> Profile</a>
            </li>
            <li>
                <a data-toggle="tab" href="#bookmarks" style="color: whitesmoke;" class="menu-box-tab">Bookmarks</a>
            </li>

        </ul> -->
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="flex-direction: column;">
        <li class="nav-item">
            <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="Bookmarks" aria-selected="true">Favourites</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
        </li>
    </ul>




    <!-- <div id="profile" class="tab-pane fade active show">
            <h3 style="color: whitesmoke;">Profile</h3>
            <p style="color: whitesmoke;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div id="bookmarks" class="tab-pane fade">
            <h3 style="color: whitesmoke;">Menu 1</h3>
            <p style="color: whitesmoke;">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div> -->
    <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab" style="padding-inline: 4rem;width: 100%;">
        <table class="table">

            <tbody>
                <?php
                require('connection/config.php');
                $sql = "SELECT `Anime_Name`,`Anime_Img`,bookmark.A_id,bookmark.id FROM `anime_info` INNER JOIN `bookmark` INNER JOIN `user`  on  anime_info.id=bookmark.A_id and bookmark.U_id=user.id ";
                $result = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_assoc($result)) {

                ?>
                    <tr>
                        <td>
                            <img src="<?php echo "Uploads/Pictures/" . $data['Anime_Img'] ?>" alt="Website 1" width="180" height="100" style="object-fit: contain;">
                        </td>
                        <td style="padding-top: 50px;color: white;">
                            <a href="anime-details.php?id=<?php echo $data['A_id'] ?>" style="color: white;">

                                <?php echo $data['Anime_Name'] ?>
                            </a>
                        </td>
                        <td style="padding-top: 50px;">
                            <a type="button" href="DeleteBookmark.php?bid=<?php echo $data['id'] ?>" style="border: none; color: #e53637;">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

    </div>
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding-inline: 4rem;width: 100%;">
        <?php
        require('connection/config.php');
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM  `user`  WHERE `id`= '$id'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);

        ?>

        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img src="Uploads/Pictures/<?php echo $data['Pic'] ?>" alt="Generic placeholder image" style="min-width: 150px; z-index: 1 ;min-height: 170px; object-fit: cover;">
                <div style="display: flex;">

                    <a type="button" class="follow-btn" style="border: none; margin-top: 20px;" href="./admin/production/logout.php">Logout </a>
                    <?php
                    if (isset($_SESSION['status'])) {
                        if ($_SESSION['status'] == 0) {
                    ?>

                            <a type="button" class="follow-btn" style="border: none; margin-top: 20px;" href="enableUser.php?uid=<?php echo $id ?>">Enable account </a>
                        <?php
                        } else {
                        ?>
                            <a type="button" class="follow-btn" style="border: none; margin-top: 20px;" href="disableUser.php?uid=<?php echo $id ?>">Disable account</a>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="ms-3" style="margin-top: 150px;">
                <h2><?php echo $data['User_Name'] ?></h2>
            </div>
        </div>
        <div style="margin-top: 7rem;">
            <form action="UpdateUser.php" method="POST" enctype="multipart/form-data">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-xl-9">


                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body">

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">User name</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="number" name="id" value="<?php echo $data['id'] ?>" hidden>

                                            <input type="text" class="form-control form-control-lg" name="fullname" value="<?php echo $data['User_Name'] ?>" />

                                        </div>
                                    </div>

                                    <hr class="mx-n3">

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Email address</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input type="email" class="form-control form-control-lg" value="<?php echo $data['Email'] ?>" name="email" />

                                        </div>
                                    </div>

                                    <hr class="mx-n3">

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Password</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input type="password" class="form-control form-control-lg" name="password" />
                                        </div>
                                    </div>

                                    <hr class="mx-n3">

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Change Profile</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input class="form-control form-control-lg" id="formFileLg" type="file" value="<?php echo $data['Pic'] ?>" name="Picture" />
                                            <div class="small text-muted mt-2">Upload your profile picture</div>

                                        </div>
                                    </div>

                                    <hr class="mx-n3">

                                    <div class="px-5 py-4">
                                        <button type="submit" class="btn btn-primary btn-lg" name="update" value="update">Update</button>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>




        </div>
    </div>
</div>



<?php
require('inc/footer.php');
require('connection/config.php');
