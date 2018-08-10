<?php
ob_start();
session_start();
include '../hconnect.php';
								
					if(isset($_POST['comment'])){

					$txtcmt=ucfirst($_POST['cmt']);
					$time=time();
					$date=date('D   H :i a',$time);
					$id=$_SESSION['x'];
					
					$s="SELECT * FROM news WHERE id='$id'";
					$s_1=mysql_query($s);
					$s_2=mysql_fetch_assoc($s_1);
					$head=$s_2['subject'];
					#echo $head;
					
						if(!empty($txtcmt) && !empty($head)){
					
						$sql="INSERT INTO newcomment(head,comments,time)  	VALUES('$head','$txtcmt','$date')";
						$sql_run=mysql_query($sql) or die('Unable to comment try again later');
	
							if($sql_run){
							unset($_SESSION['x'],$txtcmt);
							header("location:viewcmt.php?cid=$id");
							}
						}else 
						echo '<p>Your comment field is empty.</p>';
					}
				
?>