<?php
session_start();
unset($_SESSION['username']);
session_destroy();
$_SESSION = NULL;
header("location:/anime-archive/");
