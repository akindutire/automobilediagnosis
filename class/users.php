<?php
namespace cliqs\fault\users;


/*	
	Encryption Type: AES
	Database Salt: cliqsdiamond
	App Provider: Cliqs Team
	User Website: realcliqs.com
	Author: Akindutire Ayomide Samuel
	Email: cliqsapp@gmail.com or akindutire33@gmail.com
	GPL Free Licience
	Contact: 08107926083
	Database Encrypted, System Trial Flag Available, And Personalized Script
	
*/


define('EXKIT','../images/exp.bmp');
define('UPKIT','../conn/update.txt');
define('SIKIT','../include/silent.bmp');
define('RELOCATEKITDIRECTORY','../images/silent.bmp');
define('X',101);

$link=mysqli_connect('localhost','root','','fault');


class connect{
	
	public function iconnect(){
		
			global $link;
			
			if($link){
				echo "";
			}else{
				die("System Currently Not Available, Try Again Later");
				}
		}
	
}

/*This Class Checks The System Integrity*/


class performance{
	
	
	public function checkSys(){
		
		global $link;
		
		$sql=mysqli_query($link,"SELECT * FROM performancetab WHERE st='1'") or die('101xFc: Unknown Reference');
		list($id,$start,$exp,$istatus,$lastmin)=mysqli_fetch_row($sql);
	
		if(mysqli_num_rows($sql)==0 && file_exists(EXKIT)==false){ 
			
			$trial=3;
			
			$this->createTrial($trial);
		

		}else if(file_exists(EXKIT)==false){
		
		
			$this->repairTrial($exp,$lastmin);
		
		}else if($exp=='LP'){
		
			echo '';
		
		}else{
		
			$this->updateTrial($exp,$lastmin);
		
			}
	}
	
	//Inter Fc
	
	private function createTrial($trial){
		global $link;
		
		//@Db Salt;
		$salt='cliqsdiamond';
		
		
		$start=date(time());
		$exp=date(strtotime("+ $trial month"));
		
		$fd=fopen(EXKIT,'w+');
		fwrite($fd,$exp);
		
		mysqli_query($link,"INSERT INTO performancetab(id,ifr,tg,st,lm) VALUES('NULL','$start','$exp',1,'$start')");

	}
	
	private function repairTrial($exp,$lastmin){
		
		global $link;
		
		$fd=fopen(EXKIT,'w+');
		fwrite($fd,$exp);
		mysqli_query($link,"UPDATE performancetab SET lm='$lastmin' WHERE id=1 and st=1");

		
		}
	
	private function updateTrial($exp,$lastmin){
		
		global $link;
		
		$inow=date('d M Y, H:i a',time());
		
		$now=date(time());
		
			if($lastmin>$now){
				die('System/PC Time Inaccurate, Please Adjust Your Date,$inow');
			
			}else if($now>=$lastmin){
				
				file_exists(SIKIT)?'':die('Application Error: Some Modules Unable To Load');
				
				if($now>$exp){
							
					@rename(SIKIT,RELOCATEKITDIRECTORY);
					die('Unexpected Reference 101xF, Strongly Recommend Contacting App Provider.');
						
				}else{
					$new_min=date(time());
					mysqli_query($link,"UPDATE performancetab SET lm='$new_min' WHERE id=1 and st=1");
				}	
				
			}
		}
	
	
	//End Inter Fc
		
}//End Class SysPerformance



class user{
	
	/***************Basic User Function************************/
	
	
	public function login($usr,$pwd){
		global $link;
		
		$sql=mysqli_query($link,"SELECT * FROM users WHERE mail='".mysqli_real_escape_string($link,$usr)."' AND password='".mysqli_real_escape_string($link,$pwd)."' AND bk='0'");
		
		if(mysqli_num_rows($sql)==1){
			
			
			$_SESSION['iusr']=$usr;
			$_SESSION['ipwd']=$pwd;
			
			echo X;
		}else{
			echo "<img src='../images/cancel.png' width='auto' height='14px'>&nbsp;Invalid Combination";
			}
		
		}
		
	public function getdata(){
		global $link;
		
			$usr=$_SESSION['iusr'];
			$pwd=$_SESSION['ipwd'];
		
		
			$sql=mysqli_query($link,"SELECT id,role FROM users WHERE mail='".mysqli_real_escape_string($link,$usr)."' AND password='".mysqli_real_escape_string($link,$pwd)."'");
		
			list($id,$role)=mysqli_fetch_row($sql);
			$_SESSION['role']=$role;
			
			return $id;
		}
		
		
	public function logout(){
		global $link;
		
			
			$_SESSION[]=array();
			session_unset();
			
			$usr=$_SESSION['iusr'];
			
			
			header('location:../');
				}	
		
	
	public function verifylogin($role){
		global $link;
		$usr_id=$this->getdata();
		$role=ucfirst($role);
		if($_SESSION['role']==$role){
			echo '';
		}else{
			header('location:lgt.php');
			}		
		}
		
	public function haveexternalrights(){
		global $link;
		
		$usr_id=$this->getdata();
		$sql=mysqli_query($link,"SELECT extrights FROM users WHERE id='$usr_id'");
		list($ex)=mysqli_fetch_row($sql);
			
			return $ex;
		}


	/**************************************************End Basic User Function*********************************/

	
	//Add Client
	public function addcar($mail,$owner,$tel,$car,$addr){
		global $link;
		
		/*------------------------	Checking Book Existence-------------------------------------------*/
		
		//No Account Limit
		
		
		/*------------------------------Registering Client by Preparing A Query-----------*/
		
		$sql=mysqli_prepare($link,"INSERT INTO clients(id,name,addr,cardiagnosed,tel,mail,lastdiagnose) VALUES(?,?,?,?,?,?,?)");
		
		$e='';
		mysqli_stmt_bind_param($sql,'issssss',$e,$owner,$addr,$car,$tel,$mail,$e);
		if(mysqli_stmt_execute($sql)){
		

			echo "<img src='../images/accept.png' height='14px' width='auto'>&nbsp;Successfully Added A Client";
			}else{
				echo "<img src='../images/cancel.png' width='auto' height='14px'>&nbsp;Registration FAILED ,Please Retry";
				}

		}






	//Add Root Fault
	public function addrootfault($root,$bc,$f){
		global $link;
			
			$sql=mysqli_query($link,"INSERT INTO node(id,fault_id,isRoot,problem,independentcause,diagnose_id,connected_node,symptom) VALUES('Null','$f','1','$root','$bc','','','')") or die('System Error');
		
		if($sql){
			header('location:lfaults.php');
			}

		}
		
	//Add Dependent Fault
	public function adddpfault($fault,$bc,$symp,$sol,$df,$f){
		global $link;

			$sql=mysqli_query($link,"INSERT INTO node(id,fault_id,isRoot,problem,independentcause,diagnose_id,connected_node,symptom) VALUES('Null','$f','0','$fault','$bc','$sol','','$symp')") or die('System Error');
		$cur_id=mysqli_insert_id($link);
		
		if($sql){
			$dg=explode(';',$df);
			foreach($dg as $ag){
				
				$qs=mysqli_query($link,"SELECT connected_node FROM node WHERE id='$ag'");
				list($cv)=mysqli_fetch_row($qs);
				
				if(!empty($cv)){
					
					$cv=$cv."$cur_id;";
					
					}else{
						$cv=$cur_id.";";
						}
					
				$sql5=mysqli_query($link,"UPDATE node SET connected_node='$cv' WHERE id='$ag'") or die(mysqli_error($link));
				if($sql5){
								header('location:lfaults.php');

					}
				}
			
			}


		}
		
	
	
	
}//End Class User


class records{
	
	public function profiledata(){
		
		global $link;
		
		$usr_id=user::getdata();
		
		$sql=mysqli_query($link,"SELECT * FROM users WHERE id='$usr_id'");
		list($e,$role,$name,$mail,$pwd,$passport,$sex,$bk,$dpt,$bk)=mysqli_fetch_row($sql);
		$role=strtoupper($role);
		echo "
		
        <p style='font-family:amble; color:green; font-size:14px;'><a><b>$role</b></a></p>
		 
        <p style='font-family:amble; color:blue;'><a>$name</a></p>
        <p style='font-family:amble; color:blue;'><a>$mail</a></p>
        <p style='font-family:amble; color:blue;'><a>$sex</a></p>
        <p style='font-family:amble; color:blue;'><a>$dpt</a></p>
		
        
		
		";
		
		}
	public function profilepic(){
	
		global $link;
		
		$usr_id=user::getdata();
		
		$sql=mysqli_query($link,"SELECT * FROM users WHERE id='$usr_id'");
		list($e,$role,$name,$mail,$pwd,$passport,$sex,$bk,$dpt,$bk)=mysqli_fetch_row($sql);
		$role=strtoupper($role);
		echo "
		
        <a><img src='../uploads/pix/$passport' width='100%;' height='auto'></a>
		 
        
		";
		
		}
	
	public function client(){
		
		global $link;
		
				$sql=mysqli_query($link,"SELECT * FROM clients");
		
		echo "	<tr>
              	<th>Vehicle Owner</th>
                <th>Telephone</th>
                <th>E mail</th>
				<th>Vehicle Name</th>
				
				<th>Diagnose</th>
		      </tr>";
			
		
			

			
		while(list($id,$name,$addr,$cardiagnosed,$tel,$mail,$lastdiagnose)=mysqli_fetch_row($sql)){
			
/*           $in_sql=mysqli_query($link,"SELECT * FROM diagnosis WHERE client_id='$id'"); 
			 list($did,$client_id,$date,$car,$fault,$status)=mysqli_fetch_row($in_sql);
*/			 
			 
        echo "  <tr style='font-size:14px;'>
              	<td>$name</td>
                <td>$tel</td>
                <td>$mail</td>
				<td>$cardiagnosed</td>
				
				
				
				<td><button><a id='diagnose' style='text-decoration:none;' href='diagnose.php?clt=$id'>Diagnose</button></td>
				</tr>";

			}
	
	}


	public function syssb($sys){
	
		global $link;
		
		
		
		$sql=mysqli_query($link,"SELECT * FROM subsystem WHERE sys='$sys' ORDER BY id");
		
		
		if(mysqli_num_rows($sql)!=0){
			
		while(list($id,$sys,$sub)=mysqli_fetch_row($sql)){
		
			$sb=ucwords($sub);
			$sbid=$id;
		
			echo "<option value='$sbid' data-sbname='$sb'>$sb</option>";
			
			}
		}else{
			echo "<option value='No Sub System Found'>No Sub System Found</option>";
			
			}
		
	
	}

	public function getFaultList($fault_id,$subsystem,$system,$queryinput){
	
		global $link;
		$queryinput=addslashes($queryinput);
		
		$sql=mysqli_query($link,"SELECT * FROM  node WHERE problem  LIKE '%$queryinput%' AND fault_id='$fault_id'");
		$frt=mysqli_num_rows($sql);
		if($frt!=0){
			
			
				echo "<h3>$frt records found in our knowledge Center to be the cause of <i>$queryinput</i></h3>";
			
			while(list($id,$ifault,$rootfault,$problem,$independentcause,$idiagnose,$subnodes,$symptom)=mysqli_fetch_row($sql)){
			echo "<div style='padding:4px; border:1px solid grey; margin-top:15px; margin-bottom:15px;'>";
			
			$problem=ucwords($problem);
			$independentcause=ucwords($independentcause);
			
			echo "<h3>$problem</h3>";
			
			
			
		if(!empty($independentcause) || !empty($subnodes)){
			
			
			
			//Basic Failure
			if(empty($independentcause)){
				echo "<li class='se' style='text-decoration:none;'>No Basic Cause Of This Problem,Suggest Looking Into its Dependent Causes</li>";
				}else{
					
					echo "<h4><i>Basic Cause</i></h4>";
					
					$independentcause=explode(';',$independentcause);
					foreach($independentcause as $icause){
						$icause=ucwords($icause);
						echo "<li class='se' style='text-decoration:none;'>$icause</li>";
					}
				
				}
			
			
			//Symptoms
			if(empty($symptom)){
				
				echo "<h4><i>Symptoms</i></h4>";
				
				echo "<li class='se' style='text-decoration:none;'>No Symptoms Found</li>";
				
				
				}else{
					
					echo "<h4><i>Symptoms</i></h4>";
					
					$symptom=explode(';',$symptom);
					foreach($symptom as $sy){
						$sy=ucwords($sy);
						echo "<li class='se' style='text-decoration:none;'>$sy</li>";
					}
				
				}
			
			
			//Solution Or Advice
			if(empty($idiagnose)){
				
				echo "<h4><i>Possible Solution</i></h4>";
				
				echo "<li class='se' style='text-decoration:none;'>No Solution Found</li>";
				
				
				}else{
					
					echo "<h4><i>Possible Solution</i></h4>";
				
					$idiagnose=explode(';',$idiagnose);
						
						foreach($idiagnose as $solution){
				
						
				
						$solution=ucwords($solution);
				
						echo "<li class='se' style='text-decoration:none;'>$solution</li>";
					}
				
				}
			
			
			
			//Other Related Failure
			if(empty($subnodes)){
				
				echo "<h4><i>Dependent Cause</i></h4>";
				
				echo "<li class='se' style='text-decoration:none;'>No Other Fault Was Detected Apart From its basic Cause</li>";
				
				
			}else{
				
				echo "<h4><i>Dependent Cause</i></h4>";
				
				$subnodes=explode(';',$subnodes);
				foreach($subnodes as $in_nodes){
				
					$sqlp=mysqli_query($link,"SELECT problem FROM node WHERE id='$in_nodes'");
					list($otherpro)=mysqli_fetch_row($sqlp);
				
					$otherpro=ucwords($otherpro);
				
					echo "<li class='re'><a  style='color:green; text-decoration:none;' href='cfaults.php?vb=$in_nodes' target='_self'>$otherpro</a><li>";
				}
			
			}
			
			
			
			
		}else{
			
			echo "<li class='se' style='text-decoration:none;'>This Problem( <b>$problem</b> ) Was Found Be The Basic Cause <i>$queryinput</i></li>";
			
			}
			
			
				echo "</div>";
			
			
			}//End Loop
			
		}else{
			echo "No Search Found On Our Knowledge Base";
			}	
		
	
	}


	public function faults($a){
		
		global $link;
		
				$sql=mysqli_query($link,"SELECT * FROM node WHERE fault_id='$a'");
		
		echo "	<tr>
              	
				
				<th>Fault</th>
                <th>Fault Type</th>
                <th>Basic Causes</th>
                <th>Related Causes</th>
				<th>Symptoms</th>
				<th>Solution</th>


		      </tr>";
			
		$frt=mysqli_num_rows($sql);
		if($frt!=0){
			
			
			
			
			while(list($id,$ifault,$rootcheck,$problem,$independentcause,$idiagnose,$subnodes,$symptom)=mysqli_fetch_row($sql)){
			
			 $problem=ucwords($problem);
			 $independentcause=ucwords($independentcause);
       
	   			
				echo "
				<tr>
				
					<td>$problem</td>
				
				";
	   				
					if($rootcheck==1){
						echo "<td>Root Fault</td>";
					}else{
						echo "<td>Dependent Fault</td>";
					}
	   			
	   			
				
				//Basic Fault
				if(empty($independentcause)){
					
					echo "<td>No Basic Cause</td>";
				
				}else{
					echo "<td>";
					
					$independentcause=explode(';',$independentcause);
					foreach($independentcause as $icause){
						$icause=ucwords($icause);
						echo "$icause,<br>";
					}
					
					echo "</td>";
				}
	   
	   
	   		//Other Related Failure
			
			if(empty($subnodes)){
				
				
				echo "<td>No Fault Detected</td>";
				
				
			}else{
				
				echo "<td>";
				
				$subnodes=explode(';',$subnodes);
				foreach($subnodes as $in_nodes){
				
					$sqlp=mysqli_query($link,"SELECT problem FROM node WHERE id='$in_nodes'");
					list($otherpro)=mysqli_fetch_row($sqlp);
				
					$otherpro=ucwords($otherpro);
				
					echo "$otherpro,<br>";
				}
				
				echo "</td>";
			}//End Other Related Causes
	   
	   
	   		//Symptoms
			if(empty($symptom)){
				
				
				echo "<td>No Symptoms Found</td>";
				
				
				}else{
					
					echo "<td>";
					$symptom=explode(';',$symptom);
					foreach($symptom as $sy){
						$sy=ucwords($sy);
						echo "$sy<br>";
					}
					echo "</td>";
				}
			
			
			//Solution Or Advice
			if(empty($idiagnose)){
				
				
				echo "<td>No Solution Found</td>";
				
				
				}else{
					
					echo "<td>";
					$idiagnose=explode(';',$idiagnose);
						
						foreach($idiagnose as $solution){
				
						
				
						$solution=ucwords($solution);
				
						echo "$solution<br>";
					}
					echo "</td>";
					
				}

	   echo "</tr>";
	   
	   
			}//End Loop
		
		}else{
			
			echo "<center>No Faults Added Yet</center>";
			
			}//End Rows Count
	} 


}//End Of Records




?>