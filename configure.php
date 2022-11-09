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
                        <img class="gallery-content IMG" src="<?php echo $row['filename']??''?>" id="<?php echo $row['cid']??''?>">
                        <?php
                    }
                    else if($type=='VID'){
                        ?>
                        <video class="gallery-content VID" controls loop src="<?php echo $row['filename']??''?>" id="<?php echo $row['cid']??''?>"></video>
                        <?php
                    }
                    else if($type=='TXT'){
                        ?>
                        <div class="gallery-content slide_content TXT" style="background-color: <?php echo $row['bc']??''?>; color:<?php echo $row['textcolor']??''?>;" id="<?php echo $row['cid']??''?>">
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
        <img class="gallery-content NEW" src="/images/addslide.png" title="Add new announcement">
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
            <div class="alert">
                <h2>Configurations</h2>
            
                <p class="paragraph"> Please select the type of announcement  if image, video or text</p>
            
            </div>
            
            <div class="radiosdivclass">
                <label class="form-control">
                  <input type="radio" name="TYPE" value="IMG"/>
                  Image
                </label>

                <label class="form-control">
                  <input type="radio" name="TYPE" value="VID"/>
                  Video
                </label>
                
                <label class="form-control">
                  <input type="radio" name="TYPE" value="TXT"/>
                  Text
                </label>
                
            </div>
            
            
            
            <div class="Uploader hidden">
                <input id="inputFile" class="" type="file" name="inputFile_name" />
                <input type="text" class="hidden" id="input_filename" placeholder="File Name" disabled/>
            </div>
            <div class="preview-img hidden">
                <img src="" />
            </div>
            <div class="preview-vid hidden">
                <video controls loop src=""></video>
            </div>
            
            <div class="preview-txt hidden">
                <div class="divTextInputs">
                    <input type="text" class="TextInputs" id="input_Header" placeholder="Header"/>
                    <textarea cols="40" class="TextInputs" rows="5" id="input_Body" placeholder="Body"></textarea>
                    Background Color: 
                    <input type="color" class="TextInputs" name="favcolor" value="#000000" id="input_bc">
                    Text Color: 
                    <input type="color" class="TextInputs" name="favcolor" value="#ffffff" id="input_tc">
                </div>
                <div class="gallery-content slide_content configuration_sampple_text" style="margin-top:20px;">
                    <div class="MessageHeader input_header">
                        Empty
                    </div>
                    <div class="MessageBody input_body">
                        
                    </div>
                </div>
                
            </div>
            
            <div class="buttons hidden">
                <input id="inputsave" type="button" class="btn_green" value="Save" onclick="insertTblContent()">
                <input id="inputcancel" type="button" class="btn_red hidden" value="Delete">
            </div>
            
        </div>
        
    </div>
    <footer>
        @ 2022 - Digital Bulletin Board
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type="text/javascript">
        //background-color: #000000; color:#ffffff;
        $(".configuration_sampple_text").css("background-color","#000000");
        $(".configuration_sampple_text").css("color","#ffffff");
        function reset_main(){
            $("#inputFile").removeClass("hidden");
            $("#inputFile").val(null);
            
            $("#input_filename").addClass("hidden");
            $("#input_filename").val("");
            
            $(".preview-img").addClass("hidden");
            $(".preview-img img").attr("src","");
            
            $(".preview-vid").addClass("hidden");
            $(".preview-vid video").attr("src","");
            
            $(".preview-txt").addClass("hidden");
            $("#input_Header").val("");
            $("#input_Body").val("");
            $("#input_bc").val("#000000");
            $("#input_tc").val("#ffffff");
            $(".input_header").html("");
            $(".input_body").html("");
            
            $(".buttons").addClass("hidden");
            $("#inputsave").removeClass("hidden");
            $("#inputcancel").addClass("hidden");
            
            $(".configuration_sampple_text").css("background-color","black");
            $(".configuration_sampple_text").css("color","white");
            $(".Uploader").addClass("hidden");
            $(".divTextInputs").removeClass("hidden");
        }
        var UploadedFile = "";
        $(document).ready(function(){
            $('div.left_pane img,div.left_pane video,div.left_pane div.slide_content').click(function(){
                console.log("commented function");
                
                reset_main();
                if($(this).hasClass("NEW")){
                    //New slide
                    $("div.alert p.paragraph").removeClass("hidden");
                    $("div.radiosdivclass").removeClass("hidden");
                    $("input[type=radio]").prop("checked",false)
                    
                }
                else{
                    //OLD slide
                    $("div.alert p.paragraph").addClass("hidden");
                    $("div.radiosdivclass").addClass("hidden");
                    $("input[type=radio]").prop("checked",false)
                    if($(this).hasClass("IMG")) {
                        // If selected image
                        $(".preview-img").removeClass("hidden");
                        $(".preview-img img").attr("src",$(this).attr("src"));
                        
                        $(".preview-img img").attr("id",$(this).attr("id"));
                        
                        $(".buttons").removeClass("hidden");
                        $("#inputsave").addClass("hidden");
                        $("#inputcancel").removeClass("hidden");
                    };
                    if($(this).hasClass("VID")){
                        // If selected video
                        $(".preview-vid").removeClass("hidden");
                        $(".preview-vid video").attr("src",$(this).attr("src"));
                        
                        $(".preview-vid video").attr("id",$(this).attr("id"));
                        
                        $(".buttons").removeClass("hidden");
                        $("#inputsave").addClass("hidden");
                        $("#inputcancel").removeClass("hidden");
                        
                    };
                    if($(this).hasClass("TXT")){
                        // If selected text
                        $(".preview-txt").removeClass("hidden");
                        
                        $(".divTextInputs").addClass("hidden");
                        
                        $(".buttons").removeClass("hidden");
                        $("#inputsave").addClass("hidden");
                        $("#inputcancel").removeClass("hidden");
                        
                        $("div.configuration_sampple_text div.MessageHeader").html($(this).find("div.MessageHeader").html());
                        $("div.configuration_sampple_text div.MessageBody").html($(this).find("div.MessageBody").html());
                        $("div.configuration_sampple_text").css("background-color",$(this).css("background-color"));
                        $("div.configuration_sampple_text").css("color",$(this).css("color"));
                    };
                    
                }
            })
        })
        
        //$('#inputFile').on('click', function() {
        $('#inputFile').change(function() {
            const image_ext = ["IMG","PNG","JPG","JPEG", "SVG"];
            const video_ext = ["MP4","MOV","WMV","AVI","MKV"];
            
            var file_data = $('#inputFile').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);                     
            
            const ext = file_data.name.split(".");
            
            if(!image_ext.includes(ext[1].toUpperCase()) && $("input[type=radio]:checked").val()=="IMG"){
                alert("please select image file.");
                $("#inputFile").val(null);
                return;
            }
            else if(!video_ext.includes(ext[1].toUpperCase()) && $("input[type=radio]:checked").val()=="VID"){
                alert("please select video file");
                $("#inputFile").val(null);
                return;
            }
            
            $.ajax({
                url: 'upload.php', // <-- point to server-side PHP script 
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(response_filename){
                    console.log(response_filename); // <-- display response from the PHP script, if any
                    $("#input_filename").val(response_filename);
                    $("#input_filename").removeClass("hidden");
                    $("#inputFile").addClass("hidden");
                    
                    const extension = response_filename.split('.');
                    if(image_ext.includes(extension[1].toUpperCase())){
                        $(".preview-img").removeClass("hidden");
                        $(".preview-img img").attr("src","/img/"+response_filename);
                    }
                    else if(video_ext.includes(extension[1].toUpperCase())){
                        $(".preview-vid").removeClass("hidden");
                        $(".preview-vid video").attr("src","/img/"+response_filename);
                    }
                    UploadedFile=response_filename;
                    $(".buttons").removeClass("hidden");
                    
                }
             });
        });
        
        $("input[type=radio]").change(function(){
            var type = $("input[type=radio]:checked").val();
            
            reset_main();
            if(type == "IMG"){
                reset_main();
                $(".Uploader").removeClass("hidden");
                $("#inputFile").removeClass("hidden");
                $("#input_filename").addClass("hidden");
                $("#input_filename").val("");
                
            }
            else if(type == "VID"){
                $(".Uploader").removeClass("hidden");
                $("#input_filename").addClass("hidden");
                $("#input_filename").val("");
                
            }
            else if(type == "TXT"){
                $(".Uploader").addClass("hidden");
                $(".preview-txt").removeClass("hidden");
            }
            
        })
        $(".TextInputs").change(function(){
            var header = $("#input_Header").val();
            var body = $("#input_Body").val();
            var bc = $("#input_bc").val();
            var tc = $("#input_tc").val();
            
            console.log(bc);
            
            $(".input_header").html(header);
            $(".input_body").html(body);
            $(".configuration_sampple_text").css("background-color",bc);
            $(".configuration_sampple_text").css("color",tc);
            
            $(".buttons").removeClass("hidden");
        })
        
        function insertTblContent(){
            $.ajax({
                url: 'insertTblContent.php', // <-- point to server-side PHP script 
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                data: { filetype: $("input[type=radio]:checked").val(), 
                        filelocation: " ",
                        filename: "/img/"+$("#input_filename").val(),
                        textheader: $("#input_Header").val(),
                        textcontent: $("#input_Body").val(),
                        bc: $("#input_bc").val(),
                        textcolor: $("#input_tc").val(),
                        order: "0"
                    },                         
                type: 'GET',
                success: function(message){
                    alert(message);
                    reset_main();
                    location.reload();
                }
             });
        }
        
    </script>
  </body>
</html>
