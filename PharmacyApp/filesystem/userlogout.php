<?php
session_start();
include_once('../hconnect.php');
mysql_close($link);
session_destroy();
header('location:../index.php');
?>