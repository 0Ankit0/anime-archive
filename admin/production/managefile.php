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
                    <h3>Projects <small>Listing design</small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <form id="searchForm" action="" method="GET">
                            <div class="input-group">
                                <input id="searchInput" name="search" type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button id="searchButton" class="btn btn-secondary" type="submit">Go!</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        // Submit the form with the searched value
                        $('#searchForm').submit(function(event) {
                            var searchedValue = $('#searchInput').val();
                            if (searchedValue !== '') {
                                var updatedURL = window.location.pathname + '?search=' + encodeURIComponent(searchedValue);
                                window.location.href = updatedURL;
                            }
                            event.preventDefault(); // Prevent the form from submitting normally
                        });
                    });
                </script>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Projects</h2>
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

                            <p>Simple table with project listing with progress and editing options</p>

                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">I.D</th>
                                        <th>Episode Name</th>
                                        <th>Episode video</th>
                                        <th>Anime Name</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <?php
                                if (isset($_GET['search'])) {
                                ?>
                                    <tbody>
                                        <?php
                                        $searchedValue = $_GET['search'];
                                        $sql = "SELECT * FROM videos WHERE A_Name LIKE '%$searchedValue%'";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>

                                                <td><?php echo $row['Episode_Name'] ?></td>


                                                <td>
                                                    <video width='120' height="60" controls>
                                                        <source src='../../Uploads/videos/<?php echo $row['A_Name']
                                                                                            ?>/<?php echo $row['Ep_Video']
                                                                                                ?>' type='video/<?php echo $data0['ext'] ?>'>Your browser doesnot support the video tag.
                                                    </video>
                                                </td>

                                                <td><?php echo $row['A_Name'] ?></td>

                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger btn-xs delete-button" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row['id']; ?>">
                                                        <i class="fa fa-trash-o"></i>Delete
                                                    </button>
                                                    <script>
                                                        // Get the ID value when the delete button is clicked
                                                        $('.delete-button').on('click', function() {
                                                            var id = $(this).data('id');
                                                            $('#confirmDelete').attr('href', 'deletefile.php?id=' + id);
                                                        });
                                                    </script>

                                                    <!-- Modal -->
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
                                                                    <a id="confirmDelete" href="#" class="btn btn-danger">Confirm</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <a href="deletefile.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> -->
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                <?php
                                } else {
                                ?>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM videos";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>

                                                <td><?php echo $row['Episode_Name'] ?></td>


                                                <td>
                                                    <video width='120' height="60" controls>
                                                        <source src='../../Uploads/videos/<?php echo $row['A_Name'] ?>/<?php echo $row['Ep_Video'] ?>' type='video/<?php echo $row['ext'] ?>'>Your browser doesnot support the video tag.
                                                    </video>
                                                </td>

                                                <td><?php echo $row['A_Name'] ?></td>

                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <!-- <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fa fa-trash-o"></i>Delete
                                                    </button> -->
                                                    <button type="button" class="btn btn-danger btn-xs delete-button" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row['id']; ?>">
                                                        <i class="fa fa-trash-o"></i>Delete
                                                    </button>
                                                    <script>
                                                        // Get the ID value when the delete button is clicked
                                                        $('.delete-button').on('click', function() {
                                                            var id = $(this).data('id');
                                                            $('#confirmDelete').attr('href', 'deletefile.php?id=' + id);
                                                        });
                                                    </script>

                                                    <!-- Modal -->
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
                                                                    <!-- <a href="deletefile.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Confirm</a> -->
                                                                    <a id="confirmDelete" href="#" class="btn btn-danger">Confirm</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <a href="deletefile.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> -->
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
                            <!-- end file list -->

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