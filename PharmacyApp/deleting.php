<?php
session_start();
include 'hconnect.php';
$catid=$_SESSION['io'];

$dlp=@$_GET['delprod'];
if(isset($dlp)){
$sql=mysql_query("DELETE FROM producta WHERE id='$dlp'");
if($sql==true){
	header("location:subcat.php?catid=$catid");
	}else{
	header("location:subcat.php?catid=$catid");
		}
	
	}
?>