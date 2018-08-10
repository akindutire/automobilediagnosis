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
	$checkme=new ivalid();
	$record=new records();
	
	$r='Staff';	
	$f=$_GET['vb'];
	$me->verifylogin($r);
	
//header('Content-Type:text/html; charset=utf-8');
			
			$sql=mysqli_query($link,"SELECT problem,fault_id FROM node WHERE id='$f'");
			list($queryinput,$fc)=mysqli_fetch_row($sql);
			
			$_SESSION['undesiredevent']=$queryinput;
			
			header('location:faults.php');			
			 ?>
            
         