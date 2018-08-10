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
	
	if($bk==0){
		
		if(isset($_POST['sub'])){
			
			
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
<script type="text/javascript" src="js/jquery.tooltip.js"></script>
<script type="text/javascript" src="js/headdoc.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
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
<div id="content"><!-- end of content left -->

  <div id="content_right" style="margin-left:50px; float:none;">
    
        <div class="content_right_280_section margin_right_60">
            <div class="content_header_01"><i>Administrators </i></div>
      
        <p id='report' style="align:center; margin-left:200px; font-family:berlin sans fb; font-size:20px; font-style:bold; color:red;"><?php echo @$arr['1'];?></p>
        <?php $sql5=mysql_query("SELECT * FROM administrators");				
				$no=mysql_num_rows($sql5);
				
				if($no>=1){ ?>
         <table width="800" height="auto" border="1" cellspacing="0" cellpadding="4" style="color:rgb(104, 104, 255); font-size:18px; font-family:'Browallia New'; border:1px solid navy; margin-top:6px;">
        	<tbody>
        		<tr><th>Name</th><th>Email</th><th>Rank</th><th>Status</th><th>Active</th><th>Operations</th></tr>
                <?php
                $new=mysql_query("SELECT * FROM administrators");
					while($extract=mysql_fetch_assoc($new)){
						$name=$extract['name'];
						$email=$extract['email'];
						$rank=$extract['rank'];
						$photo=$extract['pix'];
						$superusercheck=$extract['hid'];
						$blockoption=$extract['bk'];
						$onoff=$extract['active'];
						$admin_id=$extract['id'];
					
					if($superusercheck==1){
					$arr['0']='Super Admin';
					}
				else if($superusercheck==0){
					$arr['1']='Normal Admin';
					}
				
				 if($blockoption==1){
					$arr['2']='Blocked Admin';
					}
				else if($blockoption==0){
					$arr['3']='Free Admin';
					}
					
					
					if($onoff==1){
						$ax['0']="<img src='images/online.jpg' width='20' height='25'/>";
					}else{
						$ax['0']="<img src='images/offline.jpg' width='20' height='25'/>";
					}		
					
						
        		echo "<tr><td><a href='admin/$photo'><img src='admin/$photo' width='45' height='45'/></a>&nbsp;&nbsp;$name</td><td>$email</td><td>$rank</td><td>";
		?><?php
			  
				if($superusercheck==1 and $blockoption==1){
				echo @$arr['0']; echo '&nbsp;&nbsp;<b>AND</b>&nbsp;&nbsp;'; echo @$arr['2']; 
				}
				
				else if($superusercheck==0 and $blockoption==1){
                echo @$arr['1']; echo '&nbsp;&nbsp;<b>AND</b>&nbsp;&nbsp;'; echo @$arr['2'];
               	}
					 
				else if($superusercheck==1 and $blockoption==0){
                	echo @$arr['0']; echo '&nbsp;&nbsp;<b>AND</b>&nbsp;&nbsp;'; echo @$arr['3']; 
                }
                
				else if($superusercheck==0 and $blockoption==0){
                	echo @$arr['1']; echo '&nbsp;&nbsp;<b>AND</b>&nbsp;&nbsp;'; echo @$arr['3']; 
				}
					
               
              
                
				
		?>		
			<?php echo "</td><td>";?><?php echo '&nbsp;&nbsp;'.$ax['0']; echo "</td><td>
			
			<a href='headdoctor.php?gha=$admin_id' title='Grant Head Admin' ><img src='images/avatar.png' height='24' width='24' alt='X'></a>&nbsp;|&nbsp;
			
			<a href='headdoctor.php?rha=$admin_id' title='Revoke Head Admin' ><img src='images/stock_people.png' height='24' width='24' alt='X'></a>&nbsp;|&nbsp;
			
			<a href='blockadmins.php?sa=$admin_id' title='Block User' ><img src='images/locked.png' height='24' width='24' alt='X'></a>&nbsp;|
			
			<a href='blockadmins.php?ra=$admin_id' title='Unblock User' ><img src='images/unlocked.jpg' height='24' width='24' alt='X'></a>|
			
			<a href='headdoctor.php?da=$admin_id' title='Delete User' ><img src='images/cancel (1).png' height='20' width='20' alt='X'></a>
			</td></tr>";
						
					}
			?>
			</tbody>
        </table>
      <?php }else{
     			 echo "<p><a><img src='images/dialog_warning.png' width='20px' height='20px'>No Admin</a></p>";
      }
	  
	  if(@$_GET['gha']){
						$gh=$_GET['gha'];
						$gha=mysql_query("UPDATE administrators SET hid='1' WHERE id='$gh'");
						unset($gh);
						echo "<body onload='sx()'></body>";
					
						}
				 	else if(@$_GET['rha']){
						$rh=$_GET['rha'];
						$rha=mysql_query("UPDATE administrators SET hid='0' WHERE id='$rh'");
						unset($rh);
						echo "<body onload='sx()'></body>";
					
						}
					
					else if(@$_GET['da']){
						$da=$_GET['da'];
						$mda=mysql_query("DELETE FROM administrators WHERE id='$da'");
						
						unset($da);
						echo "<body onload='sx()'></body>";
					
						}
				 	
	  
	   ?>
        <br><br><br>
           <div class="margin_bottom_40 border_bottom" style="text-align:center;"><?php echo "<a href='passby.php'><img src='images/back.jpg' width='100' height='25' /></a>";?></div>   
       
           
      </div>
 
  <div class="content_right_section">

    <div class="cleaner">&nbsp;</div>
        </div>                    
        <div class="cleaner_h20">&nbsp;</div>
    </div> <!-- end of content right -->

<div class="cleaner">&nbsp;</div>

</div> <!-- end of content -->
</div> <!-- end of content wrapper -->

<?php include_once 'footer.php'; session_write_close();
}else{
	header('location:admin.php');
	}

}else{
	header('location:admin.php');
	}
?>

</body>
</html>
