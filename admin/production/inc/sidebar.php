  <body class="nav-md footer_fixed">
      <!-- footer_fixed to make the footer fixed -->
      <div class="container body">
          <div class="main_container">
              <div class="col-md-3 left_col">
                  <!-- <div class="col-md-3 left_col menu_fixed"> 
           make menu fixed using menu_fixed -->
                  <div class="left_col scroll-view">
                      <div class="navbar nav_title" style="border: 0">
                          <a href="index.php" class="site_title"><span>Admin Dashboard</span></a>
                      </div>

                      <div class="clearfix"></div>

                      <!-- menu profile quick info -->
                      <div class="profile clearfix">
                          <div class="profile_pic">
                              <img src="images/img.jpg" alt="..." class="img-circle profile_img" />
                          </div>
                          <div class="profile_info">
                              <span>Welcome,</span>
                              <h2>John Doe</h2>
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
                                      <a><i class="fa fa-user"></i> Users
                                          <span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                          <li>
                                              <a href="addusers.php">Add users</a>
                                          </li>
                                          <li><a href="manageusers.php">Manage users</a></li>

                                      </ul>
                                  </li>



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
                                      <img src="images/img.jpg" alt="" />John Doe
                                  </a>
                                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="javascript:;"> Profile</a>
                                      <a class="dropdown-item" href="javascript:;">
                                          <span class="badge bg-red pull-right">50%</span>
                                          <span>Settings</span>
                                      </a>
                                      <a class="dropdown-item" href="javascript:;">Help</a>
                                      <a class="dropdown-item" href="index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                  </div>
                              </li>


                          </ul>
                      </nav>
                  </div>
              </div>
              <!-- /top navigation -->