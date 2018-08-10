<?php
session_start();
include '../hconnect.php';
$product_id=@$_GET['myt'];
$category_id=@$_SESSION['cartt'];
$mypin=$_SESSION['unhashed'];

 $sqlcontd=mysql_query("SELECT * FROM producta Where id='$product_id'");
	$asc=mysql_fetch_assoc($sqlcontd);
	$product_name=$asc['prod'];
	$availablequantity=$asc['quantity'];
	$unitprice=$asc['costprice'];
	
	

	$quanty=1;
	//if(is_int($quanty)==true){
		
	if(!empty($mypin) && !empty($product_name)){
		if($quanty<=$availablequantity){
			$q_callback=$availablequantity-$quanty;
			$cost=$quanty*$unitprice;
			$sqlsubt=mysql_query("UPDATE producta SET quantity='$q_callback' WHERE id='$product_id'");
			$sqlinsert=mysql_query("INSERT INTO ordertab(item_id,item_name,quantity,costprice,pin) VALUES('$product_id','$product_name','$quanty','$cost','$mypin')");
			if($sqlinsert){
				unset($product_id);
				echo "<body onLoad='iredirect()'></body>";
				}
		}else{
				echo "<body onLoad='redirect()'></body>";
			}
	}else{
				echo "<body onLoad='ilredirect()'></body>";
		}
		//}else{
			//	echo "<body onLoad='makesureredirect()'></body>";
			//}
	
	
?>
<script>
function redirect(){
	var redirector=re.direct.value;
	alert("This Product Has Finished Thank You!");
	window.location="mycart.php?mycart="+redirector;
	}
function iredirect(){
	var redirector=re.direct.value;
	
	window.location="mycart.php?mycart="+redirector;
	}
function ilredirect(){
	var redirector=re.direct.value;
	alert("Server Error Retry!");
	window.location="mycart.php?mycart="+redirector;
	}
function makesureredirect(){
	var redirector=re.direct.value;
	alert("Make Sure You Enter A Valid Data!");
	window.location="mycart.php?mycart="+redirector;
	}


</script>
<form name="re">
<input type="hidden" name="direct" value="<?php echo $category_id; ?>">
</form>
<?php
session_write_close();
?>