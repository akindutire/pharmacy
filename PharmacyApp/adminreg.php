<?php
session_start();
include_once('hconnect.php');
  
        if(isset($_POST['sub'])){
			$rank=$_POST['rank'];
			$sx=mysql_query("SELECT * FROM administrators WHERE rank='Head Doctor'");
			if(mysql_num_rows($sx)==1 and $rank!='Head Doctor' or mysql_num_rows($sx)==0){
			$email=trim(stripslashes($_POST['email']));
			$sql_cont=mysql_query("SELECT * FROM administrators WHERE email='$email'");
						if(mysql_num_rows($sql_cont)==0){
					#-------------end check-----------		

				#photo upload mode started
					$available_extensions=array('jpg','jpeg','png','gif','ico');
					$max_size=712000000;
			$filename=$_FILES['file']['name'];
			$filesize=$_FILES['file']['size'];
			$tmpname=$_FILES['file']['tmp_name'];
			$ext=strtolower(pathinfo($name,PATHINFO_EXTENSION));
					if((in_array($ext,$available_extensions)) || ($filesize<=$max_size)){
						$path='admin/';
						//$dblen=strlen($name);
					
						$sna=mktime().$filename;
						move_uploaded_file($tmpname,$path.$sna);
							
					}else{
						$a['0']='<body onload="ut()"></body>';
							}
			
			
			$pass=trim($_POST['pass']);
			$hashed=md5($pass);
			$name=ucwords(trim($_POST['name']));
			
			if($rank=='Head Doctor'){
				$hid=1;
				}else{
					$hid=0;
					}
			if(!empty($email) && !empty($pass) && !empty($rank) && !empty($name) && !empty($sna)){
				$run=mysql_query("INSERT INTO forgotpin(pass,hash) VALUES('$pass','$hashed')");
				
				$sql=mysql_query("INSERT INTO administrators(rank,email,hashed,pix,name,hid,bk,active) VALUES('$rank','$email','$hashed','$sna','$name','$hid','0','0')");
				
				$last_id=mysql_insert_id($link);	
				if($sql==true){
					
					
					$_SESSION['last']=$last_id;
					header('location:printdetails.php');
					}
				
			}else{
				$arr['1']='Some field(s) is/are Empty';
				}
			
		}else{
			$arr['2']='Email Already Exist';
			}
	}else{
			$arr['3']='Someone Is Already A Head Doctor';
			}
		}
	
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
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
            <div class="content_header_01"><i>Admin Registration</i></div>
      
        <p id='report' style="align:center; margin-left:200px; font-family:berlin sans fb; font-size:20px; font-style:bold; color:red;"><?php echo @$arr['0'].'<br>'; echo @$arr['1'].'<br>'; echo @$arr['2'].'<br>'; echo @$arr['3'].'<br>';?></p>
        <form action="adminreg.php" method="post" name="myform" enctype="multipart/form-data">
        <div class="all"><label>Name</label><input type="text" name="name" value="<?php echo @$name; ?>" required/></div>
        <div class="all"><label>PassKey</label><input type="password" name="pass" maxlength="10" required/></div>
        <div class="all"><label>e-Mail</label><input type="email" name="email" value="<?php echo @$email; ?>" required/></div>
        <div class="all"><label>Photo</label><input type="file" name="file" required/></div>
        <div class="all">
        <label>Rank</label><select name="rank" required/>
        <option value="Head Doctor">Head Doctor</option>
        <option value="Pharmacist">Pharmacist</option>
        <option value="Distributor">Distributor</option>
        </select>
        </div>
        
        <div class="all"><input type="submit" value="Register" name="sub"></div>
        </form>
       <p style="text-align:center;"><a href="adminreg.php"></a></p>
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
