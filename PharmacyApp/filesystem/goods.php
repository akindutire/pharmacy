<?php
session_start();
include_once('../hconnect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ordered Goods</title>
<meta name="keywords" content="Professional Template, HTML, CSS, free website template" />
<meta name="description" content="Professional Template, HTML, CSS, free website template provided by freecsstemplates.in" />
<style>
@import "../hosp.css";

form{
	margin-top:55px;
	}
.all{
	clear:both;
	width:400px;
	margin:20px 25px 30px 25px;
	}

.all label{
	color:green;
	font-size:16px;
	font-family:Berlin Sans FB;
	padding:2px;
	margin:2px;
	clear:left;
	float:left;
	margin-left:50px;
	}
.all input{
	clear:right;
	float:right;
	border:2px solid cadetblue;
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
	color:green;
	padding:3px;
	width:250px;
	height:20px;
	margin:3px;
	margin-left:5px;
	border-radius:3px;
	}
.all input[type=submit]{
	font-family:Berlin Sans FB;
	font-size:14px;
	clear:right;
	float:right;
	border:2px solid lightblue;
	border-radius:3px;
	color:green;
	height:30px;
	width:80px;
	background:navyblue;
	}



</style>
<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>

<script type="text/javascript" src="../js/slider.js"></script>
</head>


<body>

<div id="header_wrapper">
    <div id="header">
        <?php  include_once 'h1.php';?>
            
            <div class="cleaner">&nbsp;</div>
        </div>
        
        
    </div> <!-- end of header -->
</div>  <!-- end of header wrapper -->

<div id="menu_wrapper">    
    
    <?php include_once '../adtab.php'; ?>
    <!-- end of menu -->
</div> <!-- end of menu wrapper -->





<div id="content_wrapper">
<div id="content"><!-- end of content left -->

  <div id="content_right"  style="margin-left:200px; float:none;">
    
        <div class="content_right_280_section margin_right_60">
            <div class="content_header_01"><b>Goods</b></div>
        
      
        <p id='report' style="align:center; margin-left:200px; font-family:berlin sans fb; font-size:20px; font-style:bold; color:red;"></p>
        
        <br>
            
        <div class="image_wrapper"><img src="../images/images(4).jpeg" height="60" width="auto" alt="image" /><img src="../images/images(9).jpeg" height="60" width="auto" alt="xc"><img src="../images/images(11).jpeg" height="60" width="auto" alt="image" /><img src="../images/images(13).jpeg" height="60" width="auto" alt="image" /><img src="../images/images(14).jpeg" height="60" width="auto" alt="image" /></div>
            <p>Rophe Pharmacy offer you our customer an egde in what you order for, like home delivery in the next 7Hours, discount in the purchase of drugs, counsel on health matters, and homely atmosphere anytime you come over to purchase drugs. we are at your services anytime... anyday...
            
            </p><br><br>
            <table border='0' cellspacing="0" cellpadding="4px" width="500">
            
			<tr style='font-size:18px;'><th>Product</th><th>Qty.</th><th>Price</th></tr>
			<?php
			
			$xcer=$_GET['pin'];
			 $hashed=md5($xcer);
			$cartisql=mysql_query("SELECT * FROM ordertab WHERE pin='$xcer'");
			$sql=mysql_query("select * from orderer where hash='$hashed'");
			$ert=mysql_fetch_assoc($sql);
						$_SESSION['filer']='filesystem/'.$ert['rand'].'.xps';
									
			while($cartsql_fetch=mysql_fetch_assoc($cartisql)){
				
				$id=$cartsql_fetch['id'];
				$items_id=$cartsql_fetch['item_id'];
				$items_name=$cartsql_fetch['item_name'];
				$price=$cartsql_fetch['costprice'];
				$quantity_demanded_for=$cartsql_fetch['quantity'];
				$each_cost_price=$price;
				$total_price=@$total_price+$each_cost_price;
				$arr['10']=$total_price;
				
				echo "<tr style='color:navy; border:1px solid lightgrey; font-size:18px; font-family:berlin sans fb;'><td>&nbsp;&nbsp;$items_name</td><td style='text-align:center;'>$quantity_demanded_for</td><td  style='text-align:center;'>$each_cost_price</td></tr>";
				
				}
		
				echo "<tr style='color:red; border:0px;font-size:15px; text-align:center; font-family:arial;'><td></td><td></td><td>";?><?php echo @$arr['10']."</td></tr>";
			
			?>
        </table>
            
      </div>
  <div class="margin_bottom_40 border_bottom" style="text-align:center;">  <a href="../distributors.php"><img src="../images/back.jpg" width="100px" height="25px"></a>  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;</div>
  
  <div class="margin_bottom_40 border_bottom" style="text-align:center;">  <a href="../verify.php"><img src="../images/deliver.jpg" width="100px" height="25px"></a>  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;</div>
  
  
  <div class="content_right_section">
    <div class="cleaner">&nbsp;</div>
        </div>                    
        <div class="cleaner_h20">&nbsp;</div>
    </div> <!-- end of content right -->

<div class="cleaner">&nbsp;</div>

</div> <!-- end of content -->
</div> <!-- end of content wrapper -->

<?php include_once 'footer.php'; $_SESSION['mapn']=$xcer;session_write_close();?>

</body>
</html>