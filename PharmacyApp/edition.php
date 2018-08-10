<?php
session_start();
include_once('hconnect.php');
  $io=$_SESSION['io'];
  $id=@$_GET['edit'];
 
        $new=mysql_query("SELECT * FROM producta WHERE id='$id'");
		$fetchme=mysql_fetch_assoc($new);
		$p=$fetchme['prod'];
		$q=$fetchme['quantity'];
		$c=$fetchme['costprice'];
		$d=$fetchme['details'];
		
		
		
		if(isset($_POST['sub'])){
			
			$up=$_POST['pr'];
			$uq=$_POST['qt'];
			$uc=$_POST['ct'];
			$ud=$_POST['dtn'];
			$idr=@$_GET['edit'];
			if(!empty($up) && !empty($uq) && !empty($uc) && !empty($ud)){
				$rp=mysql_query("UPDATE producta SET prod='$up' WHERE id='$idr'");
				$rq=mysql_query("UPDATE producta SET quantity='$uq' WHERE id='$idr'");
				$rc=mysql_query("UPDATE producta SET costprice='$uc' WHERE id='$idr'");
				$rd=mysql_query("UPDATE producta SET details='$ud' WHERE id='$idr'");
				//echo $idr;
				header("location:subcat.php?catid=$io");
			}else{
				$arr['1']='Empty Field(s)';
				}
			}
	
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<meta name="keywords" content="Professional Template, HTML, CSS, free website template" />
<meta name="description" content="Professional Template, HTML, CSS, free website template provided by freecsstemplates.in" />
<style>
@import "hosp.css";

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
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

<script type="text/javascript" src="js/slider.js"></script>
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
<div id="content"><!-- end of content left -->

  <div id="content_right" style="margin-left:200px; float:none;">
    
        <div class="content_right_280_section margin_right_60">
            <div class="content_header_01"><i>Update Product </i></div>
      
        <p id='report' style="align:center; margin-left:200px; font-family:berlin sans fb; font-size:20px; font-style:bold; color:red;"><?php echo @$arr['1'];?></p>
        <form action="<?php  $_SERVER['PHP_SELF']; ?>" method="post" name="myform" enctype="multipart/form-data">
            
        <div class="all"><label>Product</label><input type="text" name="pr" value="<?php echo $p; ?>" autofocus required/></div>
        <div class="all"><label>Quantity</label><input type="number" name="qt" value="<?php echo $q; ?>" required/></div>
         <div class="all"><label>Cost Price</label><input type="text" name="ct" value="<?php echo $c; ?>" required/></div>
          <div class="all"><label>Description</label><input type="text" name="dtn" value="<?php echo $d; ?>" required/></div>
        <div class="all"><input type="submit" value="Edit" name="sub"></div>
        </form>
      
        <br><br><br>
           <div class="margin_bottom_40 border_bottom" style="text-align:center;"><?php echo "<a href='subcat.php?catid=$io'><img src='images/back.jpg' width='100' height='25' /></a>";?></div>   
        <div class="image_wrapper"><img src="images/images(4).jpeg" height="60" width="auto" alt="image" /><img src="images/images(9).jpeg" height="60" width="auto" alt="xc"><img src="images/images(11).jpeg" height="60" width="auto" alt="image" /><img src="images/images(13).jpeg" height="60" width="auto" alt="image" /><img src="images/images(14).jpeg" height="60" width="auto" alt="image" /></div>
           
      </div>
 
  <div class="content_right_section">

    <div class="cleaner">&nbsp;</div>
        </div>                    
        <div class="cleaner_h20">&nbsp;</div>
    </div> <!-- end of content right -->

<div class="cleaner">&nbsp;</div>

</div> <!-- end of content -->
</div> <!-- end of content wrapper -->

<?php include_once 'footer.php'; session_write_close();?>

</body>
</html>
