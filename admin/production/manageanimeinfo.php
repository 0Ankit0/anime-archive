<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
} else {
    require('inc/header.php');
    require('inc/sidebar.php');
?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage anime info</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Users</h2>
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

                            <p>Simple table to edit and delete the users</p>

                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">I.D</th>
                                        <th style="width: 20%">Anime Name</th>
                                        <th>Picture</th>
                                        <th style="width: 20%">Anime Description</th>
                                        <th>Studios</th>
                                        <th>Genre</th>
                                        <th>Views</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM anime_info";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>

                                            <td><?php echo $row['Anime_Name'] ?></td>

                                            <td><a href="../../Uploads/Pictures/<?php echo $row['Anime_Img']; ?>" target="_blank"><img src="../../Uploads/Pictures/<?php echo $row['Anime_Img']; ?>" width="70" height="50"></td>

                                            <td><?php echo $row['Anime_Description'] ?></td>

                                            <td><?php echo $row['Studios'] ?></td>
                                            <td><?php echo $row['Genre'] ?></td>
                                            <td><?php echo $row['Views'] ?></td>

                                            <td>
                                                <a href="addanimeinfo.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fa fa-trash-o"></i>Delete
                                                </button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are You sure You want to delete the file?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                By clicking the confirm button the data stored in the database will be lost forever.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="deleteuser.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <a href="addusers.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a> -->
                                                <!-- <a href="deleteuser.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> -->
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <!-- end project list -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

<?php
    require('inc/footer.php');
}
?>