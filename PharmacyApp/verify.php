<?php  
session_start();
include 'hconnect.php';
$pin=$_SESSION['mapn'];
	if(!empty($pin)){
		$hash=md5($pin);
		$sql=mysql_query("DELETE FROM ordertab WHERE pin='$pin'");
		$orderer=mysql_query("DELETE FROM orderer WHERE hash='$hash'");
			if($sql==true && $orderer==true){
				$randfile=@$_SESSION['filer'];
				fopen($randfile,'r+');
				unlink($randfile);

				echo "<body onLoad='sux()'></body>";
				}
				
	}else{
		echo "<body onLoad='servererror()'></body>";
	}

?>
<script>
function servereeror(){
	alert("Server Error Retry");
	window.location='distributors.php';
	}
function sux(){
	alert("Safe Delivery");
	window.location='distributors.php';
	}
</script>