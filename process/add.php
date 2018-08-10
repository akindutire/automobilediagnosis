<?php
	
	namespace cliqs\fault\login;
	
	
	
	include_once('../include/settings.php');
	include_once('../class/users.php');
	
	
	use cliqs\fault\users\user as me;
	use cliqs\fault\users\connect as connectme;
	use cliqs\fault\users\performance as ivalid;
	
	
	
	$me=new me();
	$connectme=new connectme();
	//$checkme=new ivalid();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$pid=(int)$_POST['pid'];
	
	
		if($pid==1){
			
			//1	-Add Client
			
			$mail=stripslashes(strip_tags(trim($_POST['mail'])));
			$owner=stripslashes(strip_tags(trim($_POST['owner'])));
			$tel=stripslashes(strip_tags(trim($_POST['tel'])));
			$car=stripslashes(strip_tags(trim($_POST['car'])));
			$addr=stripslashes(strip_tags(trim($_POST['addr'])));
		
	
			if(!empty($car) && !empty($tel) && !empty($owner)){
			
				$connectme->iconnect();
				$checkme->checkSys();
				$me->addcar($mail,$owner,$tel,$car,$addr);
			
			}else{
				echo "<img src='../images/cancel.png' width='auto' height='14px'>&nbsp;Incorrect Field Format";
			}
		}
	
	
	}
	exit();
?>