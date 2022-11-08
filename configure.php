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
    <title>Configuration</title>
    <link rel="stylesheet" href="/css/configure.css">
    <link rel="shortcut icon" href="">
  </head>
  <body>
    <header class="header">
        <img src="/images/malvar.png" class="icon">
        <h1><?php 
            echo get_system_data($db, "tblsystemparameter","NAME")[0]['paravalue']
            ?></h1>
    </header>
    <div class="left_pane">
        <?php
            if(is_array($get_tblcontent)){
                foreach($get_tblcontent as $row){
                    $type =$row['filetype'];
                    if($type=='IMG'){
                        ?>
                        <img class="gallery-content" src="<?php echo $row['filename']??''?>" id="<?php echo $row['cid']??''?>">
                        <?php
                    }
                    else if($type=='VID'){
                        ?>
                        <video class="gallery-content" controls loop src="<?php echo $row['filename']??''?>" id="<?php echo $row['cid']??''?>"></video>
                        <?php
                    }
                    else if($type=='TXT'){
                        ?>
                        <div class="gallery-content slide_content" style="background-color: <?php echo $row['bc']??''?>; color:<?php echo $row['textcolor']??''?>;" id="<?php echo $row['cid']??''?>">
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
        <img class="gallery-content" src="/images/addslide.png" title="Add new announcement">
    </div>
    <div class="main_screen">
        <!--
        <div class="inside_main">
            <img class="img-content hidden" id="img_main" src="">
            <video class="video-content hidden" id="video_main" controls loop autoplay src=""></video>
            <div class="gallery-content text_content" style="background-color: gray; color:white;">
                <div class="inline text_content_main">
                    <div class="MessageHeader">
                        Header
                    </div>
                    <div class="MessageBody">
                        This is just a sample text for the body. This is just a testing. This is just a sample text for the body. This is just a testing. This is just a sample text for the body. This is just a testing.
                        This is just a sample text for the body. This is just a testing. This is just a sample text for the body. This is just a testing. This is just a sample text for the body. This is just a testing.
                    </div>

                </div>
                <div class="inline text_right_pane">
                    
                </div>
            </div>
            
        </div>
        <div class="button_classic">Delete</div>
        -->
        <!--working upload-->
        <!--
        <form name="form" method="post" action="upload.php" enctype="multipart/form-data" >
        <input type="file" name="my_file" /><br /><br />
        <input type="submit" name="submit" value="Upload"/>
        </form>
        -->
        <div class="div_form">
            
            <input id="sortpicture" type="file" name="sortpic" />
            
            <button id="upload">Upload</button>
            
            
        </div>
        
    </div>
    <footer>
        @ 2022 - Digital Bulletin Board
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('div.left_pane img,div.left_pane video,div.left_pane div.slide_content').click(function(){
                //if($(this).is('img')){
                //    $("#img_main").attr("src",$(this).attr("src"));

                //    $("div.inside_main img").removeClass("hidden");
                //    $("div.inside_main video").addClass("hidden");
                //    $("div.inside_main div").addClass("hidden");
                //}
                //if($(this).is('video')){
                //    $("#video_main").attr("src",$(this).attr("src"));

                //    $("div.inside_main img").addClass("hidden");
                //    $("div.inside_main video").removeClass("hidden");
                //    $("div.inside_main div").addClass("hidden");
                //}
                //if($(this).is('div')){
                //    $("div.inside_main img").addClass("hidden");
                //    $("div.inside_main video").addClass("hidden");
                //    $("div.inside_main div").removeClass("hidden");
                //}
            })
        })
        $('#upload').on('click', function() {
            var file_data = $('#sortpicture').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);                     
            
            $.ajax({
                url: 'upload.php', // <-- point to server-side PHP script 
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    console.log(php_script_response); // <-- display response from the PHP script, if any
                }
             });
        });
    </script>
  </body>
</html>
