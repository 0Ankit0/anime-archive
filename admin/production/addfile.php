<?php
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
                        <h2>Registration Form <small>Click to validate</small></h2>
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
                        <form id="demo-form" data-parsley-validate>
                            <label for="fullname">Full Name * :</label>
                            <input type="text" id="fullname" class="form-control" name="fullname" required />

                            <label for="email">Email * :</label>
                            <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />

                            <label>Gender *:</label>
                            <p>
                                M:
                                <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> F:
                                <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                            </p>

                            <label>Hobbies (2 minimum):</label>
                            <p style="padding: 5px;">
                                <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required class="flat" /> Skiing
                                <br />

                                <input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> Running
                                <br />

                                <input type="checkbox" name="hobbies[]" id="hobby3" value="eat" class="flat" /> Eating
                                <br />

                                <input type="checkbox" name="hobbies[]" id="hobby4" value="sleep" class="flat" /> Sleeping
                                <br />
                            <p>

                                <label for="heard">Heard us by *:</label>
                                <select id="heard" class="form-control" required>
                                    <option value="">Choose..</option>
                                    <option value="press">Press</option>
                                    <option value="net">Internet</option>
                                    <option value="mouth">Word of mouth</option>
                                </select>

                                <label for="message">Message (20 chars min, 100 max) :</label>
                                <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>

                                <br />
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="cancel" class="btn btn-warning">Cancel</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
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
?>