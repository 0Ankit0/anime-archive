  <body class="nav-md footer_fixed">


      <!-- footer_fixed to make the footer fixed -->
      <?php
        if (isset($_SESSION['username'])) {
        ?>
          <div class="container body">
              <div class="main_container">
                  <div class="col-md-3 left_col">
                      <!-- <div class="col-md-3 left_col menu_fixed"> 
           make menu fixed using menu_fixed -->
<<<<<<< HEAD
                  <div class="left_col scroll-view">
                      <div class="navbar nav_title" style="border: 0">
                          <a href="index.php" class="site_title"><span>Admin Dashboard</span></a>
                      </div>

                      <div class="clearfix"></div>

                      <!-- menu profile quick info -->
                      <div class="profile clearfix">
                          <div class="profile_pic">
                              <img src="../../Uploads/Pictures/<?php echo $_SESSION['Pic'] ?>" alt="..." class="img-circle profile_img" height="60" />
=======
                      <div class="left_col scroll-view">
                          <div class="navbar nav_title" style="border: 0">
                              <a href="dashboard.php" class="site_title"><span>Admin Dashboard</span></a>
>>>>>>> 7ff0b10dcf5250bcae33442972ce04f8d6d8ba84
                          </div>

                          <div class="clearfix"></div>

                          <!-- menu profile quick info -->
                          <div class="profile clearfix">
                              <div class="profile_pic">
                                  <img src="../../Uploads/Pictures/<?php echo $_SESSION['Pic']; ?>" alt="..." class="img-circle profile_img" />
                              </div>
                              <div class="profile_info">
                                  <span>Welcome,</span>
                                  <h2>
                                      <?php

                                        echo $_SESSION['username'];

                                        ?>
                                  </h2>
                              </div>
                          </div>
                          <!-- /menu profile quick info -->

                          <br />

                          <!-- sidebar menu -->
                          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                              <div class="menu_section">
                                  <h3>General</h3>
                                  <ul class="nav side-menu">
                                      <li>
                                          <a href="dashboard.php"><i class="fa fa-home"></i> Home </a>
                                      </li>
                                      <?php
                                        switch ($_SESSION['role']) {
                                            case "admin":
                                        ?>
                                              <li>
                                                  <a><i class="fa fa-user"></i> Users
                                                      <span class="fa fa-chevron-down"></span></a>
                                                  <ul class="nav child_menu">
                                                      <li>
                                                          <a href="addusers.php">Add users</a>
                                                      </li>
                                                      <li><a href="manageusers.php">Manage users</a></li>

                                                  </ul>
                                              </li>
                                          <?php
                                                break;
                                            case "creator":
                                            ?>
                                              <li>
                                                  <a><i class="fa fa-folder-open-o"></i> Files
                                                      <span class="fa fa-chevron-down"></span></a>
                                                  <ul class="nav child_menu">
                                                      <li>
                                                          <a href="addfile.php">Add files</a>
                                                      </li>
                                                      <li><a href="managefile.php">Manage files</a></li>

                                                  </ul>
                                              </li>
                                      <?php
                                                break;
                                        }

                                        ?>


                                  </ul>
                              </div>
                          </div>
                          <!-- /sidebar menu -->

                          <!-- /menu footer buttons -->
                          <div class="sidebar-footer hidden-small">
                              <a data-toggle="tooltip" data-placement="top" title="Settings">
                                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="Lock">
                                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="Logout" href="index.php">
                                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                              </a>
                          </div>
                          <!-- /menu footer buttons -->
                      </div>
                  </div>

                  <!-- top navigation -->
                  <div class="top_nav">
                      <div class="nav_menu">
                          <div class="nav toggle">
                              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                          </div>
                          <nav class="nav navbar-nav">
                              <ul class="navbar-right">
                                  <li class="nav-item dropdown open" style="padding-left: 15px">
                                      <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                          <img src="../../Uploads/Pictures/<?php echo $_SESSION['Pic']; ?>" alt="" />
                                          <?php


                                            echo $_SESSION['username'];

                                            ?>
                                      </a>
                                      <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                          <a class="dropdown-item" href="javascript:;"> Profile</a>
                                          <a class="dropdown-item" href="javascript:;">
                                              <span class="badge bg-red pull-right">50%</span>
                                              <span>Settings</span>
                                          </a>
                                          <a class="dropdown-item" href="javascript:;">Help</a>
                                          <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                      </div>
                                  </li>
<<<<<<< HEAD
                                  <?php switch ($_SESSION['role']) {
                                        case "admin":
                                    ?>
                                          <li>
                                              <a><i class="fa fa-user"></i> Users
                                                  <span class="fa fa-chevron-down"></span></a>
                                              <ul class="nav child_menu">
                                                  <li>
                                                      <a href="addusers.php">Add users</a>
                                                  </li>
                                                  <li><a href="manageusers.php">Manage users</a></li>

                                              </ul>
                                          </li>
                                      <?php
                                        case "creator":
                                        ?>
                                          <li>
                                              <a><i class="fa fa-folder-open-o"></i> Files
                                                  <span class="fa fa-chevron-down"></span></a>
                                              <ul class="nav child_menu">
                                                  <li>
                                                      <a href="addfile.php">Add files</a>
                                                  </li>
                                                  <li><a href="managefile.php">Manage files</a></li>

                                              </ul>
                                          </li>
                                          <li>
                                              <a><i class="fa fa-folder-open-o"></i> Add Anime_Info
                                                  <span class="fa fa-chevron-down"></span></a>
                                              <ul class="nav child_menu">
                                                  <li>
                                                      <a href="addanimeinfo.php">Add anime_info</a>
                                                  </li>
                                                  <li><a href="manageanimeinfo.php">Manage anime_info</a></li>

                                              </ul>
                                          </li>
                                  <?php
                                    }
                                    ?>
=======
>>>>>>> 7ff0b10dcf5250bcae33442972ce04f8d6d8ba84


                              </ul>
                          </nav>
                      </div>
                  </div>
<<<<<<< HEAD
              </div>

              <!-- top navigation -->
              <div class="top_nav">
                  <div class="nav_menu">
                      <div class="nav toggle">
                          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                      </div>
                      <nav class="nav navbar-nav">
                          <ul class="navbar-right">
                              <li class="nav-item dropdown open" style="padding-left: 15px">
                                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                      <img src="../../Uploads/Pictures/<?php echo $_SESSION['Pic'] ?>" alt="" />
                                      <?php

                                        if (isset($_SESSION['username'])) {
                                            echo $_SESSION['username'];
                                        }
                                        ?>
                                  </a>
                                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="javascript:;"> Profile</a>
                                      <a class="dropdown-item" href="javascript:;">
                                          <span class="badge bg-red pull-right">50%</span>
                                          <span>Settings</span>
                                      </a>
                                      <a class="dropdown-item" href="javascript:;">Help</a>
                                      <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                  </div>
                              </li>


                          </ul>
                      </nav>
                  </div>
              </div>
              <!-- /top navigation -->
=======
                  <!-- /top navigation -->
              <?php
            }
                ?>
>>>>>>> 7ff0b10dcf5250bcae33442972ce04f8d6d8ba84
