<!DOCTYPE html>
<?php 
	include("tblcontent.php");
    include("system.php");
    
	$slide = get_system_data($db, "tblsystemparameter","TYP")[0]["paravalue"];
	//echo $slide;
	//$slide="SLIDE";
	if($slide=="SLIDE"){include("slideshow.php");}
	else{include("nonslideshow.php");}
?>
