<!DOCTYPE html>

<?php 
    include("tblcontent.php");
    include("system.php");
    //include("api.php");
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Bulletin Board</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="">
  </head>
  <body>
    <header class="header">
        <img src="images/malvar.png" class="icon">
        <h1><?php 
            echo get_system_data($db, "tblsystemparameter","NAME")[0]['paravalue']
            ?></h1>
    </header>
    <div class="gallery">
        <?php
            if(is_array($get_tblcontent)){
                foreach($get_tblcontent as $row){
                    $type =$row['filetype'];
                    if($type=='IMG'){
                        ?>
                        <img class="gallery-content" src="<?php echo $row['filename']??''?>">
                        <?php
                    }
                    else if($type=='VID'){
                        ?>
                        <video class="gallery-content" controls loop src="<?php echo $row['filename']??''?>"></video>
                        <?php
                    }
                    else if($type=='TXT'){
                        ?>
                        <div class="gallery-content slide_content" style="background-color: <?php echo $row['bc']??''?>; color:<?php echo $row['textcolor']??''?>;">
                            <div class="MessageHeader">
                                <?php echo $row['textheader']??''?>
                            </div>
                            <div class="MessageBody">
                                <?php echo $row['textcontent']??''?>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            else{
            ?>
                <div class="gallery-content slide_content" style="background-color: gray; color:white;">
                    <div class="MessageHeader">
                        Empty
                    </div>
                    <div class="MessageBody">
                        
                    </div>
                </div>
            <?php
            }
        ?>
        
    </div>
    <footer>
        @<?php echo gethostbyname(trim(`hostname`));?> 2022 - Digital Bulletin Board
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="js/system.js"></script>
    <script>
        //console.log("test");
    </script>
  </body>
</html>
