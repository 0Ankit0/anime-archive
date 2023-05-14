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


    </div>
    <!-- /page content -->
<?php
    require('inc/footer.php');
}
?>