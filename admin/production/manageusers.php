  <?php
    require('inc/header.php');
    require('inc/sidebar.php');
    ?>


  <!-- page content -->
  <div class="right_col" role="main">
      <div class="">
          <div class="page-title">
              <div class="title_left">
                  <h3>Manage users</h3>
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
                                      <th style="width: 20%">User Name</th>
                                      <th>Email</th>
                                      <th>Password</th>
                                      <th>Role</th>
                                      <th style="width: 20%">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $sql = "SELECT * FROM user";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                      <tr>
                                          <td><?php echo $row['id'] ?></td>

                                          <td><?php echo $row['User_Name'] ?></td>


                                          <td><?php echo $row['Email'] ?></td>

                                          <td><?php echo $row['Password'] ?></td>
                                          <td>
                                              <button type="button" class="btn btn-success btn-xs"><?php echo $row['Role'] ?></button>
                                          </td>
                                          <td>

                                              <a href="addusers.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                              <a href="deleteuser.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
    ?>