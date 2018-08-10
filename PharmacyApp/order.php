<?php
session_start();
include_once('hconnect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORDER Goods</title>
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
    
    <?php include_once 'tab.php'; ?>
    <!-- end of menu -->
</div> <!-- end of menu wrapper -->





<div id="content_wrapper">
<div id="content"><!-- end of content left -->

  <div id="content_right"  style="margin-left:200px; float:none;">
    
        <div class="content_right_280_section margin_right_60">
            <div class="content_header_01"><i>User Delivery Entries</i></div>
        
        <?php
		
        if(isset($_POST['submiti'])){
			$name=trim(strtoupper(stripslashes($_POST['name'])));
			$local=trim(ucwords($_POST['location']));
			$phone=trim($_POST['phn']);
			if(!empty($name)){
				$_SESSION['name']=$name;
				$_SESSION['location']=$local;
				$_SESSION['tel']=$phone;
				header('location:filesystem/validateme.php');
			}else{
				$arr['1']='Empty Field';
				}
			}
		mysql_close($link);
		?>
        <p id='report' style="align:center; margin-left:200px; font-family:berlin sans fb; font-size:20px; font-style:bold; color:red;"><?php echo @$arr['1']; ?></p>
        <form action="order.php" method="post" name="myform">
        <div class="all"><label>Name</label><input type="text" name="name" value=Mr/Mrs onchange="check()" required/></div>
        <div class="all"><label>Location</label><input type="text" name="location" onchange="check()" placeholder="Valid Location Please" required/></div>
        <div class="all"><label>Phone no.</label><input type="tel" name="phn" onchange="check()" placeholder="0810893643" required/></div>
        
        <div class="all"><input type="submit" value="Make Order" name="submiti"></div>
        </form>
        <br><br><br>
            
        <div class="image_wrapper"><img src="images/images(4).jpeg" height="60" width="auto" alt="image" /><img src="images/images(9).jpeg" height="60" width="auto" alt="xc"><img src="images/images(11).jpeg" height="60" width="auto" alt="image" /><img src="images/images(13).jpeg" height="60" width="auto" alt="image" /><img src="images/images(14).jpeg" height="60" width="auto" alt="image" /></div>
            <p>Rophe Pharmacy offer you our customer an egde in what you order for, like home delivery in the next 7Hours, discount in the purchase of drugs, counsel on health matters, and homely atmosphere anytime you come over to purchase drugs. we are at your services anytime... anyday...
            
            </p>
      </div>
  <div class="margin_bottom_40 border_bottom"></div>
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

<script>
function check(){
	var name=myform.name.value;
	if(name=' '){
		getElementById('report').innerHTML='Empty Fields';
	}else{
		return name;
			}
	}
</script>