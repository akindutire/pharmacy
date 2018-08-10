<?php
session_start();
include 'hconnect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME</title>
<meta name="keywords" content="Professional Template, HTML, CSS, free website template" />
<meta name="description" content="Professional Template, HTML, CSS, free website template provided by freecsstemplates.in" />
<style>
@import "hosp.css";


</style>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
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
    
    <?php include_once 'tab.php'; ?>
    <!-- end of menu -->
</div> <!-- end of menu wrapper -->



<div id="banner_wrapper">
     
     <?php include_once 'banner.php'; ?>
     
   	
</div> <!-- end of banner wrapper -->


<div id="content_wrapper">
<div id="content">

    <div id="content_left">
        <div class="content_left_section">
            <div class="content_header_01" >Our news</div>
            
                    <?php
$perpage=7;
$start=0;

$rep_validate_order=mysql_query("SELECT * FROM news LIMIT $start,$perpage");
while($rep_fetch=mysql_fetch_assoc($rep_validate_order)){

			$rep_id=$rep_fetch['id'];
			$rep_subject=$rep_fetch['subject'];
			$rr=substr($rep_subject,0,32);
			$lenght=strlen($rep_subject);
			if($lenght<=18){
				
			echo "
			<div class='news_section' style='margin:5px auto 5px auto; font-size:14px; color:blue;'>
                
                <div style=' color:blue;' class='news_title'><a href='faqs/readmore.php?nid=$rep_id'>&nbsp;$rep_subject&nbsp;</a></div>
				
			</div>";
			
			}else{
				
				echo "
			<div class='news_section' style='margin:5px auto 5px auto; font-size:14px;'>
                
                <div class='news_title'><a href='faqs/readmore.php?nid=$rep_id'>&nbsp;$rr...&nbsp;</a></div>
				
			</div>";
				
				}
				
}


?>
              
              <p><a href="faqs/myforum.php">More News</a></p> 
            
        
           
        
            
        
        
        </div>   <!-- end of news section -->
        
        <div class="margin_bottom_20 border_bottom"></div>
        <div class="margin_bottom_20"></div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div> <!-- end of content left -->

    <div id="content_right">
     
     
        <div class="content_right_280_section margin_right_60">
            <div class="content_header_01">Rophe Pharmacy</div>
            <div class="image_wrapper"><img src="images/images(4).jpeg" alt="image" /></div>
            <p>Rophe Pharmacy offer you our customer an egde in what you order for, like home delivery in the next 7Hours, discount in the purchase of drugs, counsel on health matters, and homely atmosphere anytime you come over to purchase drugs. we are at your services anytime... anyday...
            
            </p>
      </div>
    



<br><br><br><br>

        <div class="content_right_280_section">
            <div class="content_header_01">Our Services</div>     
            <p>
            At Rophe Pharmacy we provide to our customers some variety of service which is at our disposal, the following services are listed below;
        </p> 
            
            <ul>
                <li>Seminars on Drug Usage</li>
                <li>Consultancy on Healthcare</li>
                <li>Profesional Training</li>
                <li>Drug Sale</li>
            </ul>
            
            <div class="cleaner"></div>
    
            <div class="rc_btn_02"></div>   
    
            <div class="cleaner"></div>       
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

<?php include_once 'footer.php'; ?>

</body>
</html>