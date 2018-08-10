<?php
session_start();
include '../hconnect.php';
$product_id=@$_SESSION['product'];
$category_id=@$_SESSION['cartt'];
$availablequantity=@$_SESSION['quantity'];
$product_name=@$_SESSION['pname'];
$mypin=$_SESSION['unhashed'];
$unitprice=$_SESSION['price'];

if(isset($_POST['submit'])){
	$quanty=trim($_POST['quantity']);
	//if(is_int($quanty)==true){
		
	if(!empty($mypin) && !empty($product_name)){
		if($quanty<=$availablequantity){
			$q_callback=$availablequantity-$quanty;
			$cost=$quanty*$unitprice;
			$sqlsubt=mysql_query("UPDATE producta SET quantity='$q_callback' WHERE id='$product_id'");
			$sqlinsert=mysql_query("INSERT INTO ordertab(item_id,item_name,quantity,costprice,pin) VALUES('$product_id','$product_name','$quanty','$cost','$mypin')");
			if($sqlinsert){
				unset($_SESSION['quantity'],$_SESSION['price'],$_SESSION['pname']);
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
	
	}
?>
<script>
function redirect(){
	var redirector=re.direct.value;
	alert("We Don't Have Up To The Demand Quantity Thank You!");
	window.location="details.php?details="+redirector;
	}
function iredirect(){
	var redirector=re.direct.value;
	
	window.location="details.php?details="+redirector;
	}
function ilredirect(){
	var redirector=re.direct.value;
	alert("Server Error Retry!");
	window.location="details.php?details="+redirector;
	}
function makesureredirect(){
	var redirector=re.direct.value;
	alert("Make Sure You Enter A Valid Data!");
	window.location="details.php?details="+redirector;
	}


</script>
<form name="re">
<input type="hidden" name="direct" value="<?php echo $product_id; ?>">
</form>
<?php
session_write_close();
?>