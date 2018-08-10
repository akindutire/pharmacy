<?php
session_start();
include 'hconnect.php';
$m=$_SESSION['em'];
$p=$_SESSION['pass'];
$hs=md5($p);
$sql=mysql_query("SELECT * FROM administrators WHERE email='$m' and hashed='$hs'");
if(mysql_num_rows($sql)==1){
	$rw=mysql_fetch_assoc($sql);
	$px=$rw['pix'];
	$name=$rw['name'];
	$rank=$rw['rank'];
	$hid=$rw['hid'];
	$bk=$rw['bk'];
	$id=$rw['id'];
	$at=$rw['active'];	
	if($bk==0 && $at==1){
		global $px;
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Goods</title>
<meta name="keywords" content="Professional Template, HTML, CSS, free website template" />
<meta name="description" content="Professional Template, HTML, CSS, free website template provided by freecsstemplates.in" />
<style>
@import "hosp.css";


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
    
    <?php include_once 'adtab.php'; ?>
    <!-- end of menu -->
</div> <!-- end of menu wrapper -->





<div id="content_wrapper">
<div id="content">

    <div id="content_left">
        <div class="content_left_section" style="height:auto;">
        <p><?php echo "<img src='admin/$px' width='auto' height='120px'>"; ?></p><br><br>
        <p style="color:green; font-size:14px; font-family:berlin sans fb;">Name&nbsp;&nbsp;<?php echo $name; ?></p><br />

        <p style="color:green; font-size:14px; font-family:berlin sans fb;">Rank&nbsp;&nbsp;<?php echo $rank; ?></p><br>
     
    		

         
        
        <p style="color:green; font-size:14px; font-family:berlin sans fb;"><a href="logout.php"><img src="images/logout.jpg" width="100px" height="25px"></a></p><br>
         <p style="color:green; font-size:14px; font-family:berlin sans fb;"><a href="verifypin.php"><img src="images/searcher.jpg" width="100px" height="25px"></a></p><br>
        <div class="margin_bottom_20"></div>
            <div class="rc_btn_02"></div> 
        
        
        </div>   <!-- end of news section -->
        
        <div class="margin_bottom_20 border_bottom"></div>
        <div class="margin_bottom_20"></div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div> <!-- end of content left -->

    <div id="content_right">
     
    
        <div class="content_right_280_section margin_right_60" style="height:700px; overflow-y:scroll;">
            <div class="content_header_01"><b>Orders</b></div>
            <p>Rophe Pharmacy offer you our customer an egde in what you order for, like home delivery in the next 7Hours, discount in the purchase of drugs, counsel on health matters, and homely atmosphere anytime you come over to purchase drugs. we are at your services anytime... anyday...
            </p>
            <hr></hr>
           
           		
            
            <br><br>
        
        
        
       <?php
         $cartsql=mysql_query("SELECT * FROM orderer ORDER BY ID DESC");
		 if((mysql_num_rows($cartsql))>0){
	   ?>
            
        <table width="500" height="auto" border="1" cellspacing="0" cellpadding="10" style="color:green;  text-align:center; font-size:14px; font-family:'arial'; margin-top:6px;">
        	
            <tbody>
            <tr><th>Name</th><th>Pin</th><th>Date</th><th>Location</th><th>Phone</th></tr>
            <?php
          
			while($cartsql_fetch=mysql_fetch_assoc($cartsql)){
				
				$id=$cartsql_fetch['id'];
				$cst_name=$cartsql_fetch['name'];
				$time=$cartsql_fetch['time'];
				$loc=$cartsql_fetch['Location'];
				$ph=$cartsql_fetch['phone'];
				$cst_file='filesystem/'.$cartsql_fetch['rand'].'.xps';
				$pin=fopen($cst_file,'r');
				$rpn=file_get_contents($cst_file);
        	
				echo "<tr><td><a href='filesystem/goods.php?pin=$rpn'>$cst_name</a></td><td>$rpn</td><td>$time</td><td>$loc</td><td>$ph</td></tr>";
				}
            	?>    
			</tbody>
        </table>
       <?php
		 }else{
			  echo "<p style='color:green; font-size:14px; font-family:arial;text-align:center;'><a href='logout.php'><img src='images/dialog_warning.png' width='45px' height='45px'>&nbsp;No Order Made</a></p><br>";
 
			 }
	   
	   ?>
       
      
      
      </div>
    

<div class="margin_bottom_40 border_bottom" style="text-align:center; margin-top:-55px;"><a href="<?php echo "passby.php"; ?>"><img src="images/back.jpg" width="100" height="25" /></a></div>
        <div class="margin_bottom_40"></div>
    <br><br>

    
            <div class="cleaner">&nbsp;</div>
        </div>                    
        <div class="cleaner_h20">&nbsp;</div>
    </div> <!-- end of content right -->

<div class="cleaner">&nbsp;</div>

</div> <!-- end of content -->
</div> <!-- end of content wrapper -->

<?php include_once 'footer.php';

	}else{
	header('location:index.php');
	}
}else
	header('location:index.php');
 ?>

</body>
</html>