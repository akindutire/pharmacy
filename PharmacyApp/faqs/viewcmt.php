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
            <div class="content_header_01"><i>News</i></div>
        
        <?php
		
      
		?>
    
        <div class="image_wrapper"><img src="../images/images(4).jpeg" height="60" width="auto" alt="image" /><img src="../images/images(9).jpeg" height="60" width="auto" alt="xc"><img src="../images/images(11).jpeg" height="60" width="auto" alt="image" /><img src="../images/images(13).jpeg" height="60" width="auto" alt="image" /><img src="../images/images(14).jpeg" height="60" width="auto" alt="image" /></div>
           
            
            <?php
				
if(isset($_GET['cid'])){
$newid=@$_GET['cid'];
$s_0="SELECT * FROM `news` WHERE id='$newid'";
$s_1=mysql_query($s_0);
$s_2=mysql_fetch_assoc($s_1);
$head=$s_2['subject'];
$sql="SELECT * FROM newcomment WHERE head IN ('".$head."')";
$sql_run=mysql_query($sql);
$mnr=mysql_num_rows($sql_run);

while($cmt=mysql_fetch_assoc($sql_run)){
	
	if($mnr>=1){
	$real_cmt_name=$cmt['comments'];
	$real_cmt_time=$cmt['time'];
//"SELECT * FROM `test` WHERE country IN (\'ghana\')";
	echo "<hr></hr><div class='news' style='font-family:Browallia New; font-size:19px; padding:10px; color:Black; background:aliceblue'>
	<p class='finetxt'><b style='color:black;'>$real_cmt_name</b><br>
	<small style='color:red;'>$real_cmt_time</small></p>
	</div>";
	}else {
	echo 'NO comments';
	}
}
}
$msql="UPDATE news SET noco='$mnr' WHERE id='$newid'";
$runsql=mysql_query($msql);
	$_SESSION['x']=$newid;

?>			
  
             <form action="newscomments.php" method="post" id="comment">
				<div class="all"><textarea rows="2" cols="14" name="cmt" class="ctm"></textarea></div>	
				<div class="all"><input type="submit" name="comment" value="Comment" id="cmtsb"></div>
				</form>
			<br><a href="myforum.php" id="blink"><img src="../images/prev.png" width="20" height="20" />&nbsp;&nbsp;Back to Message</a>	

            
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