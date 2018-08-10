<?php
session_start();
include_once('hconnect.php');
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

<script src="js/jquery.countdown360.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" charset="utf-8">
function red(){
	window.location='admin.php';
	}

$(function(){
	var no=10;			
		   $("#countdown").countdown360({
       	 radius      : 45,
         seconds     : no,
         fontColor   : 'white',
         autostart   : true,
         onComplete  : function () { window.location="admin.php" 
		 }
		   }).start()
		});
          </script>
			
<?php
					$em=@($_SESSION['em']);
					
                if(isset($_SESSION['em'])){
					
					$p=@($_SESSION['pass']);
					
					if(!empty($em) && !empty($p)){
					
					$phash=md5($p);
					$sql=mysql_query("SELECT * FROM administrators WHERE email='$em' AND hashed='$phash'");
					$vbx=mysql_fetch_assoc($sql);
					
					if(mysql_num_rows($sql)==1){
					header('location:passby.php');
					}else{
		$arr['1']="<b style='text-align:center; color:red; font-family:'Browallia New'; font-size:25px; margin:20px 260px auto 260px;'>Incorrect EMAIL/PASSWORD</b>";
							unset($_SESSION['em'],$_SESSION['pass']);
							//echo '<body onload="red()"></body>';
					}
						}
					
				}
				?>
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

  <div id="content_right"  style="margin-left:200px; float:none;">
    
        <div class="content_right_280_section margin_right_60">
            <div class="content_header_01"><i>Rophe</i></div>
        
       
       <p id="countdown" style="position:relative;margin:45px 50px auto 50px; width:auto; "></p>		
       <p id='report' style="align:center; margin-left:200px; font-family:berlin sans fb; font-size:20px; font-style:bold; color:red;"><?php echo @$arr['1']; ?></p>
       
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
