
<?php
	include("database.php");

	$db= $conn;

	if(empty($db)){
		$msg= "Database connection error";
	}
	else{
		$query = "SELECT paravalue FROM `tblsystemparameter` WHERE parameter='UPD'";
		$result = $db->query($query);
		
		if($result==TRUE){
			
			while($row = $result->fetch_assoc()) {
				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
				$status = $row["paravalue"];
			}
			
			$db->query("update tblsystemparameter set paravalue='0' where parameter='UPD'");
			
			echo $status;
		}
		else{
			echo "ERROR";
		}
	}
	$db->close();
?>
