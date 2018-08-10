<?php
session_start();
include_once('hconnect.php');
  $id=$_SESSION['last'];
       
			$e=1;
			if($e){
			$sql_cont=mysql_query("SELECT * FROM administrators WHERE id='$id'");
						$assoc=mysql_fetch_assoc($sql_cont);
						if(mysql_num_rows($sql_cont)==1){
						#-------------end check-----------		
						$name=$assoc['name'];
						$pix=$assoc['pix'];
						$rank=$assoc['rank'];
						$date=date('Y M d H:i a',time());
						}else{
							//header('location:admin.php');
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

<script>
function ut(){
	
	alert('Image too large/Unsupported Image Format');
	}
</script>
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
.all select{
	clear:right;
	float:right;
	border:2px solid cadetblue;
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
	color:green;
	padding:3px;
	width:260px;
	height:24px;
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
            <div class="content_header_01"><i>PRINT DETAILS</i></div>
      
        
        <p style="text-align:center; font-size:16px; font-family:berlin sans fb;"><?php echo "<img src='admin/$pix' height='150px;' width='auto' " ?></p><br><br><br>
        <p style="text-align:center; font-size:16px; font-family:berlin sans fb;">Name:&nbsp;<?php echo $name; ?></p><br>
        <p style="text-align:center; font-size:16px; font-family:berlin sans fb;">Rank:&nbsp;<?php echo $rank; ?></p><br>
        <p style="text-align:center; font-size:16px; font-family:berlin sans fb;">Date:&nbsp;<?php echo $date; ?></p><br>
        <?php echo "<body onload='window.print()'></body>"; ?>
        <br><br><br>
             
       
           
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
