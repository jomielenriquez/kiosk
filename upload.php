<?php
	/*
	if (($_FILES['my_file']['name']!="")){
	// Where the file is going to be stored
		$target_dir = "/var/www/html/img/";
		$file = $_FILES['my_file']['name'];
		$path = pathinfo($file);
		$filename = $path['filename'];
		$ext = $path['extension'];
		$temp_name = $_FILES['my_file']['tmp_name'];
		$path_filename_ext = $target_dir.$filename.".".$ext;
	 
	// Check if file already exists
	if (file_exists($path_filename_ext)) {
	 echo "Sorry, file already exists.";
	 }else{
		 //upload to db "/".$filename.".".$ext;
	 move_uploaded_file($temp_name,$path_filename_ext);
	 echo $path_filename_ext;
	 }
	}
	*/


    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        $file = $_FILES['file']['name'];
		$path = pathinfo($file);
		$filename = $path['filename'];
        $ext = $path['extension'];
        
        move_uploaded_file($_FILES['file']['tmp_name'], '/var/www/html/img/' . $_FILES['file']['name']);
        
        //echo $_FILES['file']['name'];
        echo $filename.".".$ext;
    }

?>
