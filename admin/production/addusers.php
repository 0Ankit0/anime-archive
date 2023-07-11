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
                            <h2>Registration Form</h2>
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
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM user WHERE id='$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = $result->fetch_assoc();
                            ?>
                                <form id="demo-form" data-parsley-validate action="users.php" method="post" enctype="multipart/form-data">
                                    <label for="fullname">User Name * :</label>
                                    <input type="text" id="fullname" class="form-control" name="fullname" value="<?php echo $row['User_Name'] ?>" />

                                    <input type="number" id="id" class="form-control" name="id" value="<?php echo $row['id'] ?>" hidden />

                                    <label for="email">Email * :</label>
                                    <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" value="<?php echo $row['Email'] ?>" />

                                    <label for="password">password * :</label>
                                    <input type="password" id="password" class="form-control" name="password" data-parsley-trigger="change" value="<?php echo $row['Password'] ?>" />

                                    <label>Role *:</label>
                                    <p>
                                        User:
                                        <input type="radio" class="flat" name="role" id="roleM" value="user" required checked="value=" <?php echo $row['Role'] ?>"" />
                                        Creator:

                                        <input type="radio" class="flat" name="role" id="roleF" value="creator" />
                                        Admin:
                                        <input type="radio" class="flat" name="role" id="roleF" value="admin" />
                                    </p>


                                    <br />
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                            <a class="btn btn-warning" href="manageusers.php" role="button">Cancel</a>
                                            <!-- <button type="cancel" class="btn btn-warning">Cancel</button> -->
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-primary" name="update">update</button>
                                        </div>
                                    </div>

                                </form>
                            <?php
                            } else {
                            ?>
                                <form id="demo-form" data-parsley-validate action="users.php" method="POST" enctype="multipart/form-data">
                                    <label for="fullname">User Name * :</label>
                                    <input type="text" id="fullname" class="form-control" name="fullname" required />

                                    <label for="file">User Picture* :</label>
                                    <input type="file" id="file" class="form-control" name="Picture" data-parsley-trigger="change" required />

                                    <label for="email">Email * :</label>
                                    <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />

                                    <label for="password">password * :</label>
                                    <input type="password" id="password" class="form-control" name="password" data-parsley-trigger="change" required />

                                    <label>Role *:</label>
                                    <p>
                                        User:
                                        <input type="radio" class="flat" name="role" id="roleM" value="user" required />
                                        Creator:
                                        <input type="radio" class="flat" name="role" id="roleF" value="creator" />
                                        Admin:
                                        <input type="radio" class="flat" name="role" id="roleF" value="admin" />
                                    </p>


                                    <br />
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                            <a class="btn btn-warning" href="manageusers.php" role="button">Cancel</a>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-danger" name="submit">submit</button>
                                        </div>
                                    </div>

                                </form>
                            <?php

                            }
                            ?>
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