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
			
			
		$system=$_SESSION['scope'];
		$subsystem=$_SESSION['sbsys'];
			
	
				$sql=mysqli_query($link,"SELECT id FROM faults WHERE sbsys='$subsystem' and sys='$system'");
				list($f)=mysqli_fetch_row($sql);
				
				if($_SERVER['REQUEST_METHOD']=='POST'){
					
						if($_POST['ndt']==1){
							//Root Cause
							
							$root=$_POST['rootfault'];
							$bc=$_POST['bcause'];
							
							$me->addrootfault($root,$bc,$f);
						
						}else{
							//Dependent Cause
							$fault=$_POST['fault'];
							$bc=$_POST['bcause'];
							$symp=$_POST['symp'];
							$sol=$_POST['sol'];
							$df=$_POST['df'];
							
							$me->adddpfault($fault,$bc,$symp,$sol,$df,$f);
								
							}
					
					}
						
			 ?>
            
         