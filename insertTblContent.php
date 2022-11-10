
<?php
	include("database.php");

	$db= $conn;
	
	$filetype = $_GET['filetype'];
	$filelocation = $_GET['filelocation'];
	$filename = $_GET['filename'];
	$textheader = $_GET['textheader'];
	$textcontent = $_GET['textcontent'];
	$bc = $_GET['bc'];
	$textcolor = $_GET['textcolor'];
	$order = $_GET['order'];

	if(empty($db)){
		$msg= "Database connection error";
	}
	else{
		$query = "INSERT INTO tblcontent(filetype, filelocation, filename, textheader, textcontent, bc, textcolor,`order`) VALUES ('$filetype','$filelocation','$filename','$textheader','$textcontent','$bc','$textcolor','$order')";
		//$result = $db->query($query);

		if($db->query($query)==TRUE){
			//update tblsystemparameter set paravalue='1' where parameter='UPD'
			
			$db->query("update tblsystemparameter set paravalue='1' where parameter='UPD'");
			
			echo "SUCCESS";
		}
		else{
			echo "ERROR";
		}
	}
	$db->close();
?>
