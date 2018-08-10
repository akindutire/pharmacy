<?php
session_start();
include_once('hconnect.php');
$ai=$_SESSION['coid'];
$deactive=mysql_query("UPDATE administrators SET active='0' WHERE id='$ai'");
mysql_close($link);
session_destroy();
unset($ai,$_SESSION['em'],$_SESSION['pass']);
header('location:admin.php');
?>