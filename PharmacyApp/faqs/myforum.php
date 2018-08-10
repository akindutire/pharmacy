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
            <br> <br> <br>
            
            
            <?php
				
$perpage=8;

if(isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
$page=1;
}
$calc=$perpage*$page;
$start=$calc-$perpage;
$rep_validate=mysql_query("SELECT * FROM news LIMIT $start,$perpage");
$rows=mysql_num_rows($rep_validate);
$rep_validate_order=mysql_query("SELECT * FROM news LIMIT $start,$perpage");
if($rows){
$i=0;

echo "<table width='600px;' border='1' cellspacing='0' cellpadding='10' style='font-size:21px; font-family:Browallia New; color:navy;'>
<tr><td>News</td></tr>
";
while($rep_fetch=mysql_fetch_assoc($rep_validate_order)){

			$rep_id=$rep_fetch['id'];
			
			$rep_subject=$rep_fetch['subject'];
			$rep_report=$rep_fetch['report'];	
			$rep_name=$rep_fetch['time'];		
			$rep_com=$rep_fetch['noco'];
			
			$real_rep_report=substr($rep_report,0,699);
			$report_lenght=strlen($rep_report);
			
		
			
			
			
			if(!empty($rep_report)){
				if($report_lenght>=700){
				 echo "<tr  style='font-size:19px;'> <td><b>$rep_subject</b><br><br>$real_rep_report... &nbsp;<a href='readmore.php?nid=$rep_id'>Continue reading</a>&nbsp;&nbsp;<br><br><a href='viewcmt.php?cid=$rep_id'><img src='../images/chat (2).png' alt='cmt' height='20px' width='20px'>&nbsp;Comments($rep_com)</a> </td></tr>";
				}else
				echo "<tr style='font-size:19px;'><td><b>$rep_subject</b><br><br>$rep_report<br><br><a href='viewcmt.php?cid=$rep_id'><img src='../images/chat (2).png' alt='cmt' height='20px' width='20px'>&nbsp;Comments($rep_com)</a> </td></tr>";
			}else{
			echo "EMPTY REPORT<br>";
			}	
			
		
			}
			
}echo '<br><div class="blink" style="color:blue; font-size:14px; text-align:center;"><a href="news.php">&nbsp;<img src="../images/button_plus_green.png" width="20" height="20"/>Ask question(s)</a>&nbsp;&nbsp;&nbsp;</div></table>';
?>



<!--And for Navigation Element--->
<?php 
if(isset($page)){
$counts=mysql_query("SELECT Count(*) As Total FROM news");
$rows=mysql_num_rows($counts);
if($rows){
$rs=mysql_fetch_assoc($counts);
$total=$rs['Total'];
}
$totalpage=ceil($total/$perpage);
if($page<=1){
echo "<span style='color:blue; font-size:18px; margin:10px;' id='page_links'></span>";
}
else{
$j=$page-1;
echo "<span style='color:blue; font-size:18px; margin:6px;'><a id='page_a_link' href='myforum.php?page=$j'><img src='../images/prev.png' width='30' height='30'></a></span>&nbsp;";
}
for($i=1;$i<=$totalpage;$i++){
if($i<>$page){
echo "<span style='color:blue; font-size:18px; margin:6px;'><a href='myforum.php?page=$i' id='page_a_link'>$i</a></span>&nbsp;&nbsp;";
}
else{
echo "<span id='page_links' style='color:blue; font-size:18px; margin:6px;'>$i</span>";
}
}
if($page==$totalpage){
echo "<span style='color:blue; font-size:18px; margin:10px;' id='page_links'></span>";
}
else{
$j=$page+1;
echo "<span style='color:blue; font-size:18px; margin:6px;'><a href='myforum.php?page=$j' id='page_a_link'><img src='../images/nextt.png' width='30' height='30'></a></span>";
}
}
?>			
  
            
            
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