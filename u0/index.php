<?php

	
/***********************************************************************************************	
	Encryption Type: AES
	Database Salt: cliqsdiamond
	App Provider: Cliqs Team
	User Website: realcliqs.com
	Author: Akindutire Ayomide Samuel
	Email: cliqsapp@gmail.com or akindutire33@gmail.com
	GPL Free Licience
	Contact: 08107926083
	Database Encrypted, System Trial Flag Available, And Personalized Script
	
***********************************************************************************************/

	include_once('../include/settings.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Automobile Fault Detector</title>
<meta name="keywords" content="free templates, website templates, CSS, XHTML" />
<meta name="description" content="Simple Automobile Diagnosis" />


<script src="../js/jquery-1.9.0.min.js" language="javascript" type="text/javascript"></script>
<script src="../js/check.js" language="javascript" type="text/javascript"></script>



<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>


<style>
@import "../css/forms.css";
@import "../css/style.css";
@import "../css/interim.css";


@font-face {
    font-family: 'amble';
    src:url(../fonts/Amble-Regular-webfont.ttf) format('truetype');
}
</style>


</head>
<body>
<div id="templatemo_header_wrapper">
<!--  Free Web Templates by TemplateMo.com  -->
  <div id="templatemo_header">
    
   	<div id="site_logo"><img src="../images/logo3.png"></div>
        
		<div id="templatemo_menu">
      		<div id="templatemo_menu_left"></div>
            <ul>
                  <li><a href="index.php" class="current">Home</a></li>
<!--                  <li><a href="http://www.templatemo.com">Services</a></li>
                  <li><a href="http://www.templatemo.com/page/2">Gallery</a></li>
                  <li><a href="#">Company</a></li>
                  <li><a href="#" class="last">Contact</a></li>
-->            </ul>    	
		</div> <!-- end of menu -->
    
    </div>  <!-- end of header -->
</div> <!-- end of header wrapper -->

<div id="templatemo_banner_wrapper">
	<div id="templatemo_banner">
    
    	<div id="templatemo_banner_image">
        	<div id="templatemo_banner_image_wrapper">
            	<img src="../images/templatemo_image_01.jpg" alt="image 1" />
            </div>
        </div>
        
        <div id="templatemo_banner_content">
        	<div class="header_01">Auto Repair Shop</div>
            <p>We Diagnose With our First Detect system</p>
            <div class="button_01"></div>
        </div>	
    
    	<div class="cleaner"></div>
    </div> <!-- end of banner -->
</div> <!-- end of banner wrapper -->

<div id="templatemo_content_wrapper">
	<div id="templatemo_content">
    
    	<div id="column_w530">
        	
            <div class="header_02">Login</div>
            
            
            
            
            <center><div id="form_cont">
          	
            <div id="feedback" style="background:transparent; color:black; font-size:18px; padding:1px; margin:1% 32% 2px 32%; height:auto; width:350px; text-align:center; border-radius:3px;"></div>
            
            <form action="../process/ulogin.php" method="post">
          		<div class="all"><label>Username</label><input type="email" name="usr" id="usr"></div>
            	<div class="all"><label>Password</label><input type="password" name="pwd" id="pwd"></div>
           		<div class="all"><label></label><button type="submit" id="sblogin">Login</button></div>
                <div class="all"></div>
            </form>
          </div></center>

            
            
            
            
            
          <div class="margin_bottom_20"></div>           


          <div class="cleaner"></div>
        </div>
    	<div class="cleaner"></div>
    </div> <!-- end of content wrapper -->
</div> <!-- end of content wrapper -->

<div id="templatemo_footer_wrapper">

	<div id="templatemo_footer">
    	
        <div class="section_w180">
          <div class="section_w180_content"> 
           	  <ul class="footer_menu_list">
                    <li></li>
            	</ul>
            </div>
        </div>
        <div style="width:100%; height:5%; background:rgba(0, 0, 226, 0.79); color:white; font-family:amble; text-align:center; padding:15px;">
       	  <p>2015 Auto Repair realcliqs.com</p>
        </div>
        <div class="cleaner"></div>
    </div> <!-- end of footer -->
    <!--  Free CSS Templates by TemplateMo.com  -->
</div> <!-- end of footer -->
<div align=center></div></body>
</html>