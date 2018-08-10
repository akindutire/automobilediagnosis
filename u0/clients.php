<?php
namespace cliqs\fault\mypanel;

	include_once('../class/users.php');
	include_once('../include/settings.php');

	use cliqs\fault\users\user as me;
	use cliqs\fault\users\connect as connectme;
	use cliqs\fault\users\performance as ivalid;
	use cliqs\fault\users\records as records;
	
	$me=new me();
	$connectme=new connectme();
	//$checkme=new ivalid();
	$record=new records();
	
	$r='Staff';	
	$me->verifylogin($r);

//header('Content-Type:text/html; charset=utf-8');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auto repair| Clients</title>
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
@import "../css/table.css";



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
                  <li><a href="cpanel.php" class="current">Home</a></li>
                  <li><a href="clients.php">Clients</a></li>
                 
                  <li><a href="knowledgebase.php">Got A Solution</a></li>
                  <li><a href="lgt.php" class="last">Logout</a></li>
            </ul>    	
		</div> <!-- end of menu -->
    
    </div>  <!-- end of header -->
</div> <!-- end of header wrapper --><!-- end of banner wrapper -->

<div id="templatemo_content_wrapper">
	<div id="templatemo_content">
    
    	<div id="column_w530">
        	
            <div class="header_02">Our Clients</div>
            
            
            
            
            <div id="form_cont" style="alignment-adjust:central;">
          	
            <div id="feedback" style="background:transparent; color:black; font-size:18px; padding:1px; margin:1% 32% 2px 32%; height:auto; width:350px; text-align:center; border-radius:3px;"></div>
            
         <table border="0" draggable="true" cellspacing="0" cellpadding="8px" style="padding:2px; background:transparent; border:0px; width:100%;">
              
         	<?php $record->client(); ?>            
               
         	</table>
				<br>
		   <center><li style="display:block;">
           		<button id="addclient" title="Add New Clent"><a target="_new"; href="newclient.php"><img src="../images/men63.png" height="20px" width="auto"></a></button>
                &nbsp;&nbsp;&nbsp;
 <!--               <button id="addclient" title="Add New Clent"><a href="newclient.php"><img src="../images/men63.png" height="20px" width="auto"></a></button>
-->           </li></center>
          </div>

            
            
            
            
            
            <!--<p class="em_text">Simple Gray is a professional XHTML/CSS layout provided by <a href="http://www.templatemo.com" target="_parent">templatemo.com</a> for free of charge. You can use this template for any purpose. Credit goes to <a href="http://www.photovaco.com" target="_blank">Free Photos</a> for photos.</p>-->
            
            <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam a justo dolor. Duis in tincidunt lorem. Nunc et tellus nisi. Nulla non velit lectus. Morbi luctus ullamcorper felis, non gravida neque congue sit amet.</p>-->
            
          <div class="margin_bottom_20"></div>
            
            <!--<ul class="content_list_01">
                <li>Integer tempor, libero quis laoreet dapibus, quam mauris hendrerit  urna, vel feugiat dolor lectus non velit. Fusce at nisl libero, ac  fringilla risus.</li>
                <li>Proin non velit nec enim volutpat euismod. Phasellus lorem velit, porttitor non iaculis in, euismod a metus. Nullam orci odio, dignissim a egestas ac, sollicitudin in quam.</li>
            </ul>-->
            
            <div class="margin_bottom_20"></div>           
            
           <!-- <div class="content_section_01">
            	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam a justo dolor. Duis in tincidunt lorem. Nunc et tellus nisi. Nulla non velit lectus. Morbi luctus ullamcorper felis, non gravida neque congue sit amet. Nam nec mi metus, ac elementum velit. Etiam vel arcu velit, eget consequat risus. 
            </div>
            -->
          <div class="cleaner"></div>
        </div>
    	<div class="cleaner"></div>
    </div> <!-- end of content wrapper -->
</div> <!-- end of content wrapper -->

<div id="templatemo_footer_wrapper">

	<div id="templatemo_footer">
	  <div style="width:100%; height:5%; background:rgba(0, 0, 226, 0.79); color:white; font-family:amble; text-align:center; padding:15px;">
   	    <p>2015 Auto Repair realcliqs.com</p>
        </div>
        <div class="cleaner"></div>
    </div> <!-- end of footer -->
    <!--  Free CSS Templates by TemplateMo.com  -->
</div> <!-- end of footer -->
<div align=center></div></body>
</html>