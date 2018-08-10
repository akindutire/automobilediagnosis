<?php
namespace cliqs\fault\logout;

	include_once('../include/settings.php');
	include_once('../class/users.php');
	
	use cliqs\fault\users\user as me;
	use cliqs\fault\users\connect as connectme;
	use cliqs\fault\users\performance as ivalid;
	
	$me=new me();
	
	$me->logout();

?>