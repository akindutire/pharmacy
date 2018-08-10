<?php
session_start();
include '../hconnect.php';

$myname=$_SESSION['name'];
$mylocation=@$_SESSION['location'];
$routemypassword=$_SESSION['my_pass'];
if(!empty($myname) && !empty($routemypassword)){
	if(file_exists($routemypassword)){
	$fp=fopen($routemypassword,'r');
	$mypassword=file_get_contents($routemypassword);
	}else{
		header('location:../order.php');
		}
		//echo $mypassword;
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Goods</title>
<meta name="keywords" content="Professional Template, HTML, CSS, free website template" />
<meta name="description" content="Professional Template, HTML, CSS, free website template provided by freecsstemplates.in" />
<style>
@import "../hosp.css";


form{
	margin-top:5px;
	margin-bottom:5px;
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
<script type="text/javascript" src="../js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="../js/slider.js"></script>
<script src="../js/jquery.tooltip.js" type="text/javascript"></script>
<script src="../js/tooltipsubcat.js" type="text/javascript"></script>

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
    
    <?php include_once 'tab.php'; ?>
    <!-- end of menu -->
</div> <!-- end of menu wrapper -->





<div id="content_wrapper">
<div id="content">

    <div id="content_left">
        <div class="content_left_section" style="height:auto;">
        <p style="color:cornflowerblue; font-size:28px; font-family:'berlin sans fb';">My Cart</p><br><br>
    		<table border='0' cellspacing="0" cellpadding="4px">
			<tr><th>Product</th><th>Qty.</th><th>Price</th></tr>
			<?php
			
			$xcer=$_SESSION['unhashed'];
			  
			$cartsql=mysql_query("SELECT * FROM ordertab WHERE pin='$xcer'");
			while($cartsql_fetch=mysql_fetch_assoc($cartsql)){
				
				$id=$cartsql_fetch['id'];
				$items_id=$cartsql_fetch['item_id'];
				$items_name=$cartsql_fetch['item_name'];
				$price=$cartsql_fetch['costprice'];
				$quantity_demanded_for=$cartsql_fetch['quantity'];
				$each_cost_price=$price;
				$total_price=@$total_price+$each_cost_price;
				$arr['10']=$total_price;
				
				echo "<tr style='color:navy; border:1px solid lightgrey; font-size:14px; font-family:berlin sans fb;'><td><a href='removeproduct.php?rmp=$id' title='Remove from Cart'><img src='../images/rmver.jpg' width='10' height='10'></a>&nbsp;&nbsp;&nbsp;&nbsp;$items_name</td><td style='text-align:center;'>$quantity_demanded_for</td><td>$each_cost_price</td></tr>";
				
				}
				
				echo "<tr style='color:red; border:0px;font-size:15px; font-family:arial;'><td></td><td></td><td>";?><?php echo @$arr['10']."</td></tr>"; ?>
			
        </table>
         <p style="color:green; font-size:14px; font-family:berlin sans fb;"><a href="printinvoice.php" target="_blank">Print Invoice</a></p>
        
        <p style="color:green; font-size:14px; font-family:berlin sans fb;"><a href="userlogout.php"><img src="../images/logout.jpg" width="100px" height="25px"></a></p><br>
        <div class="margin_bottom_20"></div>
            <div class="rc_btn_02"></div> 
        
        
        </div>   <!-- end of news section -->
        
        <div class="margin_bottom_20 border_bottom"></div>
        <div class="margin_bottom_20"></div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div> <!-- end of content left -->

    <div id="content_right">
     
     <?php
	 $cat=@$_SESSION['cartt'];
     $pro_id=@$_GET['details'];
	 $sqlfirstforproduct=mysql_query("SELECT category FROM category WHERE id='$cat'");
		$er=mysql_fetch_assoc( $sqlfirstforproduct);
		$caty=$er['category'];
	$sqlcontd=mysql_query("SELECT * FROM producta Where id='$pro_id'");
	$eraw=mysql_fetch_assoc($sqlcontd);
	$name=$eraw['prod'];
	 ?>
        <div class="content_right_280_section margin_right_60" style="height:700px; overflow-y:scroll;">
            <div class="content_header_01"><?php echo "<br>$caty>>$name"; ?></div>
            <p>Rophe Pharmacy offer you our customer an egde in what you order for, like home delivery in the next 7Hours, discount in the purchase of drugs, counsel on health matters, and homely atmosphere anytime you come over to purchase drugs. we are at your services anytime... anyday...
            </p>
            <hr></hr>
            <?php
           		//$unitprice=$eraw['costprice'];
				$description=$eraw['details'];
				$unitprice=$eraw['costprice'];
				$details=$eraw['details'];
				$quantity=$eraw['quantity'];
				$icon=$eraw['icon'];
				$prid=$eraw['id'];
				
			
       
				
			?>
            
            <br><br>
        
        
        
       
            
        <table width="500" height="auto" border="0" cellspacing="0" cellpadding="10" style="color:green; font-size:24px; font-family:'Berlin sans fb';text-align:center; margin-top:6px;">
        	
            <tbody>
        		<tr><td><?php echo "<img src='../prod/$icon' width='130' height='130'>"; ?></td></tr>
				<tr><td><?php echo $name; ?></td></tr>		
        		<tr><td>Description: <?php echo "&nbsp;$details"; ?></td></tr>
                <tr><td>Quantity Available: <?php echo "&nbsp;$quantity"; ?></td></tr>
	     		<tr><td>Unit Price: <?php echo "&nbsp;N$unitprice"; ?></td></tr>		
				<tr><td></td></tr>
			</tbody>
        </table>
        <?php
        $_SESSION['product']=$pro_id;
		$_SESSION['pname']=$name;
		$_SESSION['quantity']=$quantity;
		$_SESSION['price']=$unitprice;		
		?>
        
        <form action="processproducts.php" method="post">
        <div class="all"><label>Quantity</label><input type="number" name="quantity" placeholder="2"></div>
        <div class="all"><input type="submit" name="submit" value="Add to Cart"></div>
      	</form>
      
      
      
      </div>
    

<div class="margin_bottom_40 border_bottom" style="text-align:center; margin-top:-55px;"><a href=<?php echo "mycart.php?mycart=$cat"; ?>><img src="../images/back.jpg" width="100" height="25" /></a></div>
        <div class="margin_bottom_40"></div>
    <br><br>
      <!--  <div class="content_right_section">
            <div class="content_header_02">Adverts</div>
            
            <div class="content_right_w620_wrapper">
                <div class="content_right_w620_inner">
                    <div class="box_w170 margin_right_25">
                        <div class="image_wrapper"><a><img src="images/images(3).jpeg" alt="image 2" /></a></div>
                        <p>Vestibulum a augue nec dolor vulputate fermentum.</p>
                    </div>
        
                    <div class="box_w170 margin_right_25">
                        <div class="image_wrapper"><a href="#"><img src="images/images(7).jpeg" alt="image 3" /></a></div>
                        <p>liquam erat volutpat. Vestibulum neque felis.</p>
                    </div>
    
                    <div class="box_w170">
                        <div class="image_wrapper"><a href="#"><img src="images/images(6).jpeg" alt="image 4" /></a></div>
                        <p>Donec nec lectus turpis mauris viverra leo at tortor.</p>
                    </div>
    
                    <div class="margin_bottom_10"></div>
    
                    <div class="rc_btn_02"><a href="#">View all</a></div>
    
                    <div class="cleaner"></div>
                </div>
            </div>
    -->
    
            <div class="cleaner">&nbsp;</div>
        </div>                    
        <div class="cleaner_h20">&nbsp;</div>
    </div> <!-- end of content right -->

<div class="cleaner">&nbsp;</div>

</div> <!-- end of content -->
</div> <!-- end of content wrapper -->

<?php include_once 'footer.php';

	}else{
	header('location:/index.php');
	}


 ?>

</body>
</html>