<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
} else {
    require('inc/header.php');
    require('inc/sidebar.php');
?>


    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Add Users</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
            </div>
            <div class="alert alert-warning alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
            </div> -->

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Files <small>Click to validate</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form id="demo-form" data-parsley-validate enctype="multipart/form-data" action="Files.php" method="post">
                                <label for="epname">Episode Name * :</label>
                                <input type="text" class="form-control" name="epname" required />

                                <label for="file">Episode file * :</label>
                                <input type="file" id="file" class="form-control" name="file" data-parsley-trigger="change" required />


                                <label for="animeInfo">Anime Name*:</label>
                                <select id="animeInfo" class="form-control" name="animeName" required>
                                    <option value="">Choose..</option>
                                    <?php

                                    $anime_query = "SELECT * FROM `anime_info`";
                                    $anime_result = mysqli_query($conn, $anime_query);
                                    while ($data = mysqli_fetch_array($anime_result)) {

                                    ?>
                                        <option value="<?php echo $data['Anime_Name'] ?>"><?php echo $data['Anime_Name'] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>

                                <br />
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <a class="btn btn-warning" href="managefile.php" role="button">Cancel</a>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                    </div>
                                </div>

                            </form>
                            <!-- end form for validations -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



<?php
    require('inc/footer.php');
}
?>