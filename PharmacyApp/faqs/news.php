<?php
session_start();
include_once('../hconnect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORDER Goods</title>
<meta name="keywords" content="Professional Template, HTML, CSS, free website template" />
<meta name="description" content="Professional Template, HTML, CSS, free website template provided by freecsstemplates.in" />
<style>
@import "../hosp.css";
.content_header_01 .finetxt{
	font-size:12px;
	font-family:"Browallia New";
	color:blue;
	
	}
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
.all textarea{
	clear:right;
	float:right;
	border:2px solid cadetblue;
	font-size:14px;
	font-family:Arial, Helvetica, sans-serif;
	color:green;
	padding:4px;
	width:250px;
	height:120px;
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
            <div class="content_header_01"><i>Post News</i></div>
        
        <?php
		if(isset($_POST['submit'])){
				$subject=strtoupper(strip_tags(trim($_POST['head'])));
				$details=ucfirst(strip_tags(trim($_POST['message'])));
				$time=time();
				$date=date('M D, Y || H:i a', $time);
	
		
		if(!empty($subject) && !empty($details)){	
$query="insert into news(subject,report,time,noco)
value('$subject','$details','$date','0')";
$r=mysql_query($query) or die('SERVER ERROR @ ARTICLE');
			if($r){
			unset ($head,$subject,$details,$date);
			$message['0'] = "<img src='../images/inta 3.png' width='40' height='40'>&nbsp;News successfully Posted. &nbsp;<a href='myforum.php'>Back</a><br/>";
			
			}
		}
	}	
	
      
		?>
    
        <div class="image_wrapper"><img src="../images/images(4).jpeg" height="60" width="auto" alt="image" /><img src="../images/images(9).jpeg" height="60" width="auto" alt="xc"><img src="../images/images(11).jpeg" height="60" width="auto" alt="image" /><img src="../images/images(13).jpeg" height="60" width="auto" alt="image" /><img src="../images/images(14).jpeg" height="60" width="auto" alt="image" /></div>
            
           <p id='report' style="align:center; margin-left:200px; font-family:berlin sans fb; font-size:20px; font-style:bold; color:red;"><?php echo @$message['0']; ?></p>  
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
				<div class="all">
						<label>Subject</label><input type="text" name="head" placeholder="Subject"/></div>
			
			<div class="all"><label>News</label><textarea name="message" rows="10" cols="30" placeholder="Message"></textarea>
	
				 </div>
				<div class="all">
				 <input type="submit" name="submit" value="Post"/>
				 </div>
			</form><br>
            
            
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