<?php
	
	namespace cliqs\fault\retrieve;
	
	
	
	include_once('../include/settings.php');
	include_once('../class/users.php');
	
	
	use cliqs\fault\users\user as me;
	use cliqs\fault\users\connect as connectme;
	use cliqs\fault\users\performance as ivalid;
	use cliqs\fault\users\records as records;
	
	
	
	$me=new me();
	$connectme=new connectme();
	//$checkme=new ivalid();
	$record=new records();
	//echo 'good';
	
		$connectme->iconnect();
		$checkme->checkSys();
	
	$rid=(int)$_POST['rtid'];
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//1	-Get All Subsystem of A System
		
		if($rid==1){
				$sys=(int)$_POST['scope'];
				$record->syssb($sys);
		}else{
			echo "";
			}
		
	}
	exit();
?>