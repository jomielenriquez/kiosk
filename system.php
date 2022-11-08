
<?php
include("database.php");

$db= $conn;

function get_system_data($db, $tableName,$parameter){
	if(empty($db)){
		$msg= "Database connection error";
	}
	elseif(empty($tableName)){
		$msg= "Table Name is empty";
	}
	else{
		$query = "SELECT paravalue FROM $tableName where parameter = '$parameter'";
		$result = $db->query($query);

		if($result== true){
			if ($result->num_rows > 0) {
				$row= mysqli_fetch_all($result, MYSQLI_ASSOC);
				$msg= $row;
			} 
			else {
				$msg= "No Data Found"; 
			}
		}
		else{
			$msg= mysqli_error($db);
		}
	}
	return $msg;
}
?>
