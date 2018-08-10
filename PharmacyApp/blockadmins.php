<?php
include 'hconnect.php';

if(@$_GET['ra']){
						$ra=$_GET['ra'];
						$mra=mysql_query("UPDATE administrators SET bk='0' WHERE administrators.id=$ra");
						unset($ra);
						echo "<body onload='sx()'></body>";
					#	header('location:editadmins.php');
						}
else if(@$_GET['sa']){
						$sa=$_GET['sa'];
						$msa=mysql_query("UPDATE administrators SET bk='1' WHERE administrators.id=$sa");
						$JI=mysql_query("UPDATE administrators SET active='0' WHERE administrators.id=$sa");
						unset($sa);
						echo "<body onload='sx()'></body>";
					#	header('location:editadmins.php');
						}

?>
<head>
<script>
function sx(){
	window.location="headdoctor.php";
	}

</script>
</head>