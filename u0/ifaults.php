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
	$clt=$_POST['clt'];
	$me->verifylogin($r);
	
//header('Content-Type:text/html; charset=utf-8');
			
			$_SESSION['clt']=$clt;
			$_SESSION['scope']=$_POST['scope'];
			$_SESSION['sbsys']=$_POST['sbsys'];
			$_SESSION['undesiredevent']=$_POST['undesiredevent'];
			
			header('location:faults.php');			
			 ?>
            
         