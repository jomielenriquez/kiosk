
<?php
	include("database.php");

	$db= $conn;
	
	$headername = $_GET['headername'];
	$headerlogo = $_GET['headerlogo'];
	$TYPE = $_GET['TYPE'];
	$duration = $_GET['duration'];


	if(empty($db)){
		$msg= "Database connection error";
	}
	else{
		if($db->query("UPDATE `tblsystemparameter` SET `paravalue`='$headername' WHERE `parameter`='NAME'")!=TRUE){
			echo "ERROR";
		}
		if($db->query("UPDATE `tblsystemparameter` SET `paravalue`='$headerlogo' WHERE `parameter`='LOGO'")!=TRUE){
			echo "ERROR";
		}
		if($db->query("UPDATE `tblsystemparameter` SET `paravalue`='$TYPE' WHERE `parameter`='TYP'")!=TRUE){
			echo "ERROR";
		}
		if($db->query("UPDATE `tblsystemparameter` SET `paravalue`='$duration' WHERE `parameter`='DUR'")!=TRUE){
			echo "ERROR";
		}
		
		if($db->query("update tblsystemparameter set paravalue='1' where parameter='UPD'")!=TRUE){
			echo "ERROR";
		}
		
		echo "SUCCESS";
	}
	$db->close();
?>
