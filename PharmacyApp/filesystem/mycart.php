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
<div id="content" style="">

    <div id="content_left" style="clear:left;  float:left;width:auto;">
        <div class="content_left_section" style="height:auto; ">
       <p style="color:cornflowerblue; font-size:28px; font-family:'berlin sans fb';">My Cart</p><br><br>
</div>
            <table border='0' cellspacing="0" cellpadding="4px">
			<tr><th>Product</th><th>Qty.</th><th>Price</th></tr>
			<?php
			
			//$xcer=$_SESSION['unhashed'];
			  
			$cartisql=mysql_query("SELECT * FROM ordertab WHERE pin='$mypassword'");
			
			while($cartsql_fetch=mysql_fetch_assoc($cartisql)){
				
				$id=$cartsql_fetch['id'];
				$items_id=$cartsql_fetch['item_id'];
				$items_name=$cartsql_fetch['item_name'];
				$price=$cartsql_fetch['costprice'];
				$quantity_demanded_for=$cartsql_fetch['quantity'];
				$each_cost_price=$price;
				$total_price=@$total_price+$each_cost_price;
				$arr['10']=$total_price;
				
				echo "<tr style='color:navy; border:1px solid lightgrey; font-size:14px; font-family:berlin sans fb;'><td><a href='removeproduct2.php?mycartremove=$id' title='Remove from Cart'><img src='../images/rmver.jpg' width='10' height='10'></a>&nbsp;&nbsp;&nbsp;&nbsp;$items_name</td><td style='text-align:center;'>$quantity_demanded_for</td><td>$each_cost_price</td></tr>";
				
				}
		
				echo "<tr style='color:red; border:0px;font-size:15px; font-family:arial;'><td></td><td></td><td>";?><?php echo @$arr['10']."</td></tr>";
				
			?>
        </table>
              
      <p style='color:green; font-size:14px; font-family:berlin sans fb; border:0px;font-size:15px;'><a href='printinvoice.php' target="_blank">Print Invoice</a></p>
        <br><br><br>
  
        
        <p style="color:green; font-size:14px; font-family:berlin sans fb;"></p><br>
        <p style="color:green; font-size:14px; font-family:berlin sans fb;"><a href="userlogout.php"><img src="../images/logout.jpg" width="100px" height="25px"></a></p><br>
        <p style="color:green; font-size:14px; font-family:berlin sans fb;"><a href="ordernow.php"><img src="../images/back.jpg" width="100px" height="25px"></a></p><br>
        <div class="margin_bottom_20"></div>
            <div class="rc_btn_02"></div> 
        
        
    </div>   <!-- end of news section -->
       
        
        
        
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    <!-- end of content left -->
    <div id="content_right" style="margin-left:-10px;">
     
     <?php
   $cat=@$_GET['mycart'];
   $sqlfirstforproduct=mysql_query("SELECT category FROM category WHERE id='$cat'");
      $er=mysql_fetch_assoc( $sqlfirstforproduct);
      $caty=$er['category'];
  
   ?>
        <div class="content_right_280_section margin_right_60" style="height:700px; overflow-y:scroll;float:right;">
            <div class="content_header_01"><?php echo "<br>$caty>>Products"; ?></div>
            <p>Rophe Pharmacy offer you our customer an egde in what you order for, like home delivery in the next 7Hours, discount in the purchase of drugs, counsel on health matters, and homely atmosphere anytime you come over to purchase drugs. we are at your services anytime... anyday...
            
            </p>
             <hr></hr>
          <?php
          $_SESSION['unhashed']=$mypassword;
          $_SESSION['cartt']=$cat;
          $sqlcontd=mysql_query("SELECT * FROM producta Where category_id='$cat' and quantity>'0'");
          while($eraw=mysql_fetch_assoc($sqlcontd)){
              $name=$eraw['prod'];
              $unitprice=$eraw['costprice'];
              $details=$eraw['details'];
              $quantity=$eraw['quantity'];
              $icon=$eraw['icon'];
              $prid=$eraw['id'];
              
          
       echo  "<div class='prod_box' style='margin:20px 50px 6px 5px;height:185px; width:173px; padding:10px 10px 10px 11px; float:left; clear:right; border:1px solid cornflowerblue; border-radius:3px;'>
          <div class='top_prod_box' style='padding:0; width:inherit; margin:0px; height:12px;'> <a title='Add to my Cart' href='processproducts2.php?myt=$prid' class='prod_details'><img src='../images/plus_orange.png' width='20' height='20'></a>&nbsp;&nbsp;<a title='View Details' href='details.php?details=$prid' class='prod_details'><img src='../images/list.png' width='20' height='20'></a>&nbsp;&nbsp;&nbsp;<b style='font-size:13px;'>$name</b></div><br>
          <div class='center_prod_box' style='text-align:center; width:inherit;'>            
               <div style='padding:5px 0px 5px 0px; font-style:bold; color:red;' class='product_title'><a href='details.html'></a></div>
               <div style='padding:5px 0px 5px 0px;' class='product_img'><a href='details.php'><img src='../prod/$icon' alt='x' border='0' width='120' height='120'/></a></div>
               <div class='prod_price'><span class='price'>N$unitprice</span></div>                        
          </div>
          <div class='bottom_prod_box' style='text-align:center; margin:20px 28px 6px 5px;'></div>             
          <div class='prod_details_tab' style='text-align:center;'>
              
                       
          </div>                     
      </div><div>";
              
              }
              
          ?>
          
          <br><br>
      
      
      
     
          
      <table width="500" height="auto" border="1" cellspacing="0" cellpadding="10" style="color:grey; border:1px solid navy; margin-top:6px;">
          <thead><td style="font-size:14px; color:navy;">More Categories</td></thead>
          <tbody>
              <tr><th>Category_Name</th><th>No of Available Products</th></tr>
              <?php
              $new=mysql_query("SELECT * FROM category");
                  while($extract=mysql_fetch_assoc($new)){
                      $dcat=$extract['category'];
                      $d=$extract['id'];
                      $inn=mysql_query("SELECT * FROM producta WHERE category_id='$d'");
                      $dps=mysql_num_rows($inn);
                      
              echo "<tr><td><a href='mycart.php?mycart=$d' title='Delete' > $dcat </a></td><td>$dps</td></tr>";
                      
                  }
                  
          ?>
          </tbody>
      </table>
     
    

</div>
</div>

<div class="margin_bottom_40 border_bottom" style="text-align:center;"></div>
         
       
        <div class="margin_bottom_40"></div>
    
    
    
            <div class="cleaner">&nbsp;</div>
        
 <!-- end of content right -->
 </div>
 
<div class="cleaner">&nbsp;</div>
</div>
</div>
</div>
  
 <!-- end of content -->
<div class="cleaner">&nbsp;</div>
<div class="cleaner">&nbsp;</div>


<br><br>
<?php include_once 'footer.php';

	}else{
	header('location:../index.php');
	}


 ?>
 </div>
</div>
</body>
</html>