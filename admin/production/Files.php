<?php
require('../../connection/config.php');


if (isset($_POST['submit'])) {
    $epname = $_POST['epname'];
    $animeName = $_POST['animeName'];

    $name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $position = strpos($name, ".");
    $fileextension = substr($name, $position + 1);
    $fileextension = strtolower($fileextension);

    if (isset($name)) {
        $path = '../../Uploads/videos/';
        if (!empty($name)) {
            if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm")) {
                $success = 0;
                echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
            } else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm")) {
                $success = 1;
                if (move_uploaded_file($tmp_name, $path . $name)) {
                    $sql = "INSERT INTO `videos`( `Episode_Name`, `Ep_Video`, `A_Name`,`ext`) VALUES ('$epname','$name','$animeName','$fileextension')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        header("location:managefile.php");
                    }
                }
            }
        }
    }
}
