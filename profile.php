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
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="Bookmarks" aria-selected="true">Bookmarks</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
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
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="padding-inline: 4rem;width: 100%;">
        <table class="table">

            <tbody>
                <tr>
                    <td>
                        <img src="https://placehold.it/100x100" alt="Website 1" class="img-fluid">
                    </td>
                    <td><a href="https://www.website1.com" target="_blank">https://www.website1.com</a></td>
                    <td>
                        <button class="btn btn-primary">Continue Reading</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="https://placehold.it/100x100" alt="Website 2" class="img-fluid">
                    </td>
                    <td><a href="https://www.website2.com" target="_blank">https://www.website2.com</a></td>
                    <td>
                        <button class="btn btn-primary">Continue Reading</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <!-- Add more bookmark rows here -->
            </tbody>
        </table>

    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding-inline: 4rem;width: 100%;">
        <img src="Uploads/Pictures/pic.jpg" alt="" height="300px" width="1240px" style="object-fit: cover;">
    </div>
</div>



<?php
require('inc/footer.php');
require('connection/config.php');
