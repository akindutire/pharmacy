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
		
	
$ac=mysql_query("UPDATE administrators SET active='1' WHERE email='$m'");	
	$at=$rw['active'];
	if($bk==0 && !empty($m)){
		global $px;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME</title>
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
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script src="js/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery.tooltipsubcat.js" type="text/javascript"></script>

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
        <div class="margin_bottom_20"></div>
            <div class="rc_btn_02"></div> 
        
        
        </div>   <!-- end of news section -->
        
        <div class="margin_bottom_20 border_bottom"></div>
        <div class="margin_bottom_20"></div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div> <!-- end of content left -->

    <div id="content_right">
     
     
        <div class="content_right_280_section margin_right_60" style="height:300px;">
            <div class="content_header_01">Menu</div>
            <p>Rophe Pharmacy offer you our customer an egde in what you order for, like home delivery in the next 7Hours, discount in the purchase of drugs, counsel on health matters, and homely atmosphere anytime you come over to purchase drugs. we are at your services anytime... anyday...
            <br> <br> <br>
        <table width="auto" height="150px" cellspacing="10" cellpadding="5" style="color:blue; border:1px solid cadetblue; margin-top:6px;">
        	<tbody>
        		
                <?php
				
				if($hid=='1' && $rank=='Head Doctor'){
                						
        		echo "<tr>
				<td><a href='cpanel.php' title='Enter As Pharmacist' > <img src='images/images.jpeg' width='auto' height='120'> </a></td>
				<td><a href='distributors.php' title='Enter As DeliveryMan' > <img src='images/images(10).jpeg' width='auto' height='120'> </a></td>
				<td><a href='headdoctor.php' title='Enter As Super User' ><img src='images/stock_people.png' width='auto' height='120'></a></td></tr>";
				
				}else if($rank=='Distributor' && $hid=='0'){
				echo "<td><a href='distributors.php' title='Enter As DeliveryMan' > <img src='images/images(10).jpeg' width='auto' height='120'> </a></td>";
				}else if($rank=='Pharmacist'  && $hid=='0'){
				echo "<td><a href='cpanel.php' title='Enter As Pharmacist' > <img src='images/images.jpeg' width='auto' height='120'> </a></td>";
				}else if($hid=='1' && $rank='Distributor'){
                						
        		echo "<tr>
				<td><a href='cpanel.php' title='Enter As Pharmacist' > <img src='images/images.jpeg' width='auto' height='120'> </a></td>
				<td><a href='distributors.php' title='Enter As DeliveryMan' > <img src='images/images(10).jpeg' width='auto' height='120'> </a></td>
				<td><a href='headdoctor.php' title='Enter As Super User' ><img src='images/stock_people.png' width='auto' height='120'></a></td></tr>";
				}else if($hid=='1' && $rank=='Distributor'){
                						
        		echo "<tr>
				<td><a href='cpanel.php' title='Enter As Pharmacist' > <img src='images/images.jpeg' width='auto' height='120'> </a></td>
				<td><a href='distributors.php' title='Enter As DeliveryMan' > <img src='images/images(10).jpeg' width='auto' height='120'> </a></td>
				<td><a href='headdoctor.php' title='Enter As Super User' ><img src='images/stock_people.png' width='auto' height='120'></a></td></tr>";
				
				}
				
							?>
			</tbody>
        </table>
      </div>
    



<br><br><br><br>
<div class="margin_bottom_40 border_bottom"></div>
        <div class="margin_bottom_40"></div>
    
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

<?php $_SESSION['coid']=$id; include_once 'footer.php'; session_write_close();

	}else{
	header('location:admin.php');
	}

}else{
	header('location:admin.php');
	}

 ?>

</body>
</html>