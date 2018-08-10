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
<title>Pharmacist</title>
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
<script src="js/tooltipsubcat.js" type="text/javascript"></script>

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



<div id="banner_wrapper">
     
     <?php include_once 'banner.php'; ?>
     
   	
</div> <!-- end of banner wrapper -->


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
     
     
        <div class="content_right_280_section margin_right_60" style="height:500px; overflow:scroll;">
            <div class="content_header_01">Dashboard</div>
            <p>Rophe Pharmacy offer you our customer an egde in what you order for, like home delivery in the next 7Hours, discount in the purchase of drugs, counsel on health matters, and homely atmosphere anytime you come over to purchase drugs. we are at your services anytime... anyday...
            <form action="cpanel.php" method="post" name="myform">
        <div class="all"><label>Category</label><input type="text" name="dis" autofocus required/></div>
        
        <div class="all"><input type="submit" value="Add" name="sub"></div>
        </form>
            </p>
            <?php
            if(isset($_POST['sub'])){
				$dis=$_POST['dis'];
				if(!empty($dis)){
					$ins=mysql_query("INSERT INTO category(category) VALUES('$dis')");
				
					}
				}
			
			?>
        <table width="500" height="auto" border="1" cellspacing="0" cellpadding="4" style="color:blue; border:1px solid navy; margin-top:6px;">
        	<tbody>
        		<tr><th>Category_Name</th><th>No of Available Products</th><th>Operation</th></tr>
                <?php
                $new=mysql_query("SELECT * FROM category");
					while($extract=mysql_fetch_assoc($new)){
						$dcat=$extract['category'];
						$d=$extract['id'];
						$inn=mysql_query("SELECT * FROM producta WHERE category_id='$d'");
						$drugs=mysql_num_rows($inn);
						
        		echo "<tr><td><a href='subcat.php?catid=$d' > $dcat </a></td><td>$drugs</td><td><a href='deletion.php?df=$d'><img src='images/cancel (3).png' width='17' height='17'></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='cation.php?edit=$d' title='Update' ><img src='images/upe.png' height='24' width='24' alt='X'></a></td></tr>";
						
					}
			?>
			</tbody>
        </table>
      </div>
    



<br><br>
<div class="margin_bottom_40 border_bottom" style="text-align:center;"><a href="passby.php"><img src="images/back.jpg" width="100" height="25" /></a></div>
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
	header('location:admin.php');
	}

}else{
	header('location:admin.php');
	}

 ?>

</body>
</html>