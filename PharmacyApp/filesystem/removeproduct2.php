<?php
session_start();
include '../hconnect.php';

$cat_id=@$_SESSION['cartt'];

$cart=@$_GET['mycartremove'];
echo $cart;
if(isset($cart)){
	$sqlquantity=mysql_query("SELECT * FROM ordertab WHERE id='$cart'");
	$xerl=mysql_fetch_assoc($sqlquantity);
	$cartqty=$xerl['quantity'];
	$item_id=$xerl['item_id'];
	$sqlprt=mysql_query("SELECT * FROM producta WHERE id='$item_id'");
	$prtxerl=mysql_fetch_assoc($sqlprt);
	$prodqty=$prtxerl['quantity'];
	$q_callback=$prodqty+$cartqty;
	$lastsql=mysql_query("UPDATE producta SET quantity='$q_callback' WHERE id='$item_id'");
		
		if($lastsql==true){
		$removesql=mysql_query("DELETE FROM ordertab  WHERE id='$cart'");
		header("location:mycart.php?mycart=$cat_id");
		}

}
?>