<?php
session_start();
include '../hconnect.php';
$pin=@$_SESSION['pin'];
$xpi=md5($pin);
$sql=mysql_query("SELECT * from orderer where hash='$xpi'");
$row=mysql_fetch_assoc($sql);
$rand=$row['rand'].'.xps';
$name=$row['name'];

if(!empty($rand)){
if(file_exists($rand)){
	$fd=fopen($rand,'r+');
	$real=file_get_contents($rand);
		
		if(!empty($real)){
			$_SESSION['my_pass']=$rand;
			$_SESSION['name']=$name;
			header("location:ordernow.php");
			
			}
	}else{
	echo "<body onload='xc()'></body>";
	}
}else{
	echo "<body onload='rxc()'></body>";
	}

?>
<script>
function xc(){
	alert("Server Error");
	window.location='status.php';
	}
function rxc(){
	alert("Incorrect Pin");
	window.location='status.php';	
	}


</script>