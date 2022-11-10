<!DOCTYPE html>

<?php 
    //include("tblcontent.php");
    //include("system.php");
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
        <img src="<?php echo get_system_data($db, "tblsystemparameter","LOGO")[0]['paravalue']?>" class="icon">
        <h1><?php echo get_system_data($db, "tblsystemparameter","NAME")[0]['paravalue']?></h1>
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
                        <div class="gallery-content slide_content text_slide_content" style="background-color: <?php echo $row['bc']??''?>; color:<?php echo $row['textcolor']??''?>;">
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
                        Add slides by going to this link @<?php $my_current_ip=exec("ifconfig | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
echo $my_current_ip;?>/configure.php
                    </div>
                </div>
            <?php
            }
        ?>
        
    </div>
    <footer>
        @<?php echo date("Y"); ?> - Digital Bulletin Board, 
        Configure by going to <?php $my_current_ip=exec("ifconfig | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'"); echo $my_current_ip;?>/configure.php
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="js/system.js"></script>
    <script>
        //console.log("test");
        //const socket = new WebSocket('ws://localhost:5678');

        //// Connection opened
        //socket.addEventListener('open', (event) => {
        //    socket.send('Hello Server!');
        //});

        //// Listen for messages
        //socket.addEventListener('message', (event) => {
        //    alert('Message from server ', event.data);
        //});
        
        var intervalId = window.setInterval(function(){
          // call your function here
            $.ajax({
                url: 'GetUpdateStatus.php', // <-- point to server-side PHP script 
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                data: {}, 
                type: 'GET',
                success: function(message){
                    console.log("update status: '" + message + "'");
                    if(message.indexOf("1")>-1){
                        console.log("reloaded");
                        location.reload();
                    }
                }
            });
        }, 5000);
    </script>
  </body>
</html>
