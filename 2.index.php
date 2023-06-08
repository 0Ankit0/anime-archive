<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    </head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
        </div>
    </nav>
    <div class="col-md-3"></div>
    <div class="col-md-6 well">
        <h3 class="text-primary">PHP - Simple Profile Update</h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <nav class="navbar navbar-default">
                <div class="container-fluid alert-info">
                    <a class="navbar-brand" href="https://sourcecodester.com">FaceProfile</a>
                </div>
            </nav>
            <button class="btn btn-warning" data-toggle="modal" data-target="#form_modal">Edit Profile</button>            
            <?php
                require'conn.php';
                $query=mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '1'") or die(mysqli_error());
                $fetch=mysqli_fetch_array($query);
            ?>
            <br style="clear:both;"/><br />
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <img src="profile/<?php echo $fetch['profile']?>" width="250px"/>
                <h4><?php echo $fetch['firstname']." ".$fetch['lastname']?></h4>
            </div>
        </div>
    </div>
    <div class="modal fade" id="form_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" enctype="multipart/form-data" action="update_profile.php">
                    <div class="modal-header">
                        <h3 class="modal-title">Update Profile</h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <label>Current Profile</label>
                            <img src="profile/<?php echo $fetch['profile']?>" width="250px"/>
                            <hr style="border-top:1px solid #000;"/>
                            <div class="form-group">
                                <label>New Profile</label>
                                <input type="file" class="form-control" name="profile" required="required"/>
                                <input type="hidden" class="form-control" name="current" value="<?php echo $fetch['profile']?>" required="required"/>
                            </div>
                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" class="form-control" name="firstname" required="required"/>
                            </div>
                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="text" class="form-control" name="lastname" required="required"/>
                            </div>
                        </div>
                    </div>
                    <br style="clear:both;"/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>