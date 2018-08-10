<?php 
ob_start();
session_start();
include 'votedb.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Newsprint by Free Css Templates</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="fcss/default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<!-- start header -->
<div id="header">
	<h1><img src="images/te.png" alt="inec" ></h1>
	
</div>
<!-- end header -->
<!-- star menu -->
<div id="menu">
	<ul>
		<li class="current_page_item"><a href="vthome.php">Home</a></li>
		<li><a href="myforum.php">Blog</a></li>
		<li><a href="contact.php">Contact</a></li>
	</ul>
</div>


<div id="search">
			<h2>Search</h2>
			
		</div>
<!-- end menu -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<div class="title">
				<h2>INEC Blog</h2>
				
			</div>
			<div class="entry">
				<p>
				
</p>
</div>



<?php 
session_start();
 include 'openconnection.php';
 //include 'checker.php';
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Individual</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!--top part start -->
	<div id="top"> <a href="index.html"><img src="images/logo.gif" alt="individual" width="286" height="66" border="0" /></a>
        <ul>
          <li><a href="index.php">home</a></li>
          
          <li><a href="mail.php">contact us</a></li>
        </ul>
</div>
	<!--top part end -->
    <!--header start -->
<div id="header">
	  <p></p>
</div>
	<!--header end -->
	<!--body start -->
	<div id="body">
	<br class="spacer" />
	<ul class="nav">
	<li class="navLink"><a href="unallocate.php" class="service">Unallocated space</a></li>
	<li class="navLink"><a href="rules.php" class="testimonial">Rules and regulation</a></li>
	<li class="navLink"><a href="require.php" class="project">requirements</a></li>
	  </ul>
  <!--left panel start -->
  <div id="left">
  <h2>FAQ(s)</h2>
  
  <div id="leftcom">
  <h2>
 		 <form id="searchform" method="post" action="sernews.php">
				<fieldset>
				<input type="text" name="s" id="s" size="15" value="" />
				<input type="submit" name="submitsearch" id="x" value="Search" />
				</fieldset>
			</form>
  </h2>
  <div id="leftBottomcomment">
		
   <?php
$search=$_POST['submitsearch'];
$cinp=$_POST['s'];
if(isset($search) &&!empty($cinp)){
global $cinp;
$search_query="SELECT * FROM news WHERE subject LIKE '%".$cinp."%' ";
$search_validate=mysql_query($search_query);
while($sch_fetch=mysql_fetch_assoc($search_validate)){

			
			$srep_subject=$sch_fetch['subject'];
			$srep_report=$sch_fetch['report'];
			$srep_name=$sch_fetch['name'];
			$srep_time=$sch_fetch['time'];
			$sreal_rep_report=substr($srep_report,0,500);
			$srep_id=$sch_fetch['id'];
			$srep_com=$sch_fetch['noco'];
			
			echo "<div id='news'><br>
			<img src='myforum/$srep_pix' height='60' width='55' id='fimg'><br>
			<p id='boldtxt'>$srep_subject</p>
			<p id='finetxt'>$sreal_rep_report...</p>
			 <a href='readmore.php?nid=$srep_id' class='more'>Read More</a> &nbsp;&nbsp;&nbsp; <a href='viewcmt.php?cid=$srep_id' class='comments'>Comments($srep_com)</a> </p>
			 <small id='dt'>Posted By &nbsp;$srep_name&nbsp; at&nbsp;$srep_time</small>
			<br><br></div>";		
			
			}
}else 
echo '';
?>		
	
		
        <div err>
       <form action="newscomments.php" method="post" id="comment">
				<textarea rows="2" cols="14" name="cmt"></textarea>	
				<br><input type="submit" name="comment" value="Comment" id="cmtsb">
				</form><br><br><a href="myforum.php" id="blink">Back to Message</a>
        </div>
		</div>
	</div>
</body>
</html>


			