
<?php
	include("database.php");

	$db= $conn;
	
	$cid = $_GET['cid'];

	if(empty($db)){
		$msg= "Database connection error";
	}
	else{
		$query = "DELETE FROM `tblcontent` WHERE CID=$cid";
		//$result = $db->query($query);

		if($db->query($query)==TRUE){
			
			$db->query("update tblsystemparameter set paravalue='1' where parameter='UPD'");
			
			echo "SUCCESS";
		}
		else{
			echo "ERROR";
		}
	}
	$db->close();
?>
