<?php
$name=$_SESSION['name'];
$local=$_SESSION['location'];
$phone=$_SESSION['tel'];
$time=date('Y M d H:i a',mktime());
if(!empty($name)){
	
mt_srand((double)microtime() *1000000);

function rand_char($string){
	$lenght=strlen($string);
	$position=mt_rand(0,$lenght-1);
	
	return($string[$position]);
	}
	
function random_string($char,$len){
	$return_string="";
	for($x=0; $x<$len; $x++){
		$return_string=rand_char($char);
		return($return_string);
		}
	}
function pn(){

$g1=mt_rand(100,999);
	
$g2=mt_rand(100,999);

	$hg3='ABCDEFGHJIKLMONPQRTUVZWX';
$g3=random_string($hg3,1);

	$hg4='CDEFGWRTHXABJIKLMONPQUZV';



$g4=random_string($hg4,1);

$LT=$g3.$g4;

//$co_pn=array($g2,$g1,$LT);
 
 		#st for db
		$dpin=$g2.$g1.$LT;
		
		$hashed=md5($dpin);
		#ed
	$dpin;
	$hashed;
	$tn=mktime();
	global $name;
	global $local;
	global $phone;
	global $time;
	$e=$tn;
	
	$filename=$e.".xps";
	$fd = fopen($filename, "w+")or die("Can't open file $filename");
	$fout = fwrite($fd,$dpin);	
	
	if($fd==true){
	$cv=mysql_query("INSERT INTO orderer(hash,name,rand,location,phone,time) VALUES('$hashed','$name','$tn','$local','$phone','$time')");	
	if($cv==true){
	$_SESSION['my_pass']=$filename;
	echo "<body onload='odr()'></body>";
	fclose($fd);
	}else{
		echo "<body onload='serr()'></body>";
		}
		
	}else{
		//echo "<body onload='serr()'></body>";
		}
	
}

pn();

}else{
	
	header('location:../order.php');
	}
session_write_close();
?>

 <script>
	
	function serr(){
		alert('Server Error, Retry');
		window.location='../order.php';
		}
	function odr(){
		window.location='ordernow.php';
		}
		

	</script>
