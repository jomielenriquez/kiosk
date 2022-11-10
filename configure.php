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
        <img id="pageheaderlogo" src="<?php echo get_system_data($db, "tblsystemparameter","LOGO")[0]['paravalue']?>" class="icon">
        <h1 id="pageheadername"><?php echo get_system_data($db, "tblsystemparameter","NAME")[0]['paravalue']?></h1>
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
        <div class="div_form">
            <div class="alert">
                <h2>Configurations</h2>
                <input type="button" style="" class="btn_green" value="settings"/>
            
                <p class="paragraph"> Please select the type of announcement  if image, video or text</p>
            
            </div>
            
            <button type="button" class="collapsible">General Settings (Click here..)</button>
            <div class="content">
              <!--<p>Lorem ipsum...</p>-->
              Header Name
              <input type="text" id="inputnewname" placeholder="" value="<?php echo get_system_data($db, "tblsystemparameter","NAME")[0]['paravalue']?>"/>
              Header Logo
              <input type="file" id="newLogo" class="hidden"/>
              <input type="button" class="btn_green" id="btn_newLogo" value="Upload new"/>
              <br/>
              <img id="gs_previewLogo" src="<?php echo get_system_data($db, "tblsystemparameter","LOGO")[0]['paravalue']?>" style="height:200px;"/>
              <br/>
              TYPE
              <select name="TYPE" id="TYPE">
                  <option value="SLIDE">Slide Show</option>
                  <option value="GRID">Grid</option>
                </select>
                <div class="duration hidden">
              DURATION (sec)
              <input id="inputduration" type="number" value="<?php echo get_system_data($db, "tblsystemparameter","DUR")[0]['paravalue']/1000?>"/>  
                </div>
              
                
                
                <br/>
              <input type="button" class="btn_green" id="btn_saveGS" value="Save General Settings"/>
            </div>
            <script>
                var coll = document.getElementsByClassName("collapsible");
                var i;

                for (i = 0; i < coll.length; i++) {
                  coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                      content.style.display = "none";
                    } else {
                      content.style.display = "block";
                    }
                  });
                }
            </script>
            
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
                <input id="inputcancel" type="button" class="btn_red hidden" value="Delete" onclick="deleteTblContent()">
            </div>
            
        </div>
        
    </div>
    <footer>
        @<?php echo date("Y"); ?> - Digital Bulletin Board
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type="text/javascript">
        $("#btn_newLogo").click(function(){
            $("#newLogo").click();
        })
        $("#newLogo").change(function(){
            const image_ext = ["IMG","PNG","JPG","JPEG", "SVG"];
            const video_ext = ["MP4","MOV","WMV","AVI","MKV"];
            
            var file_data = $('#newLogo').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);                     
            
            const ext = file_data.name.split(".");
            
            if(!image_ext.includes(ext[1].toUpperCase())){
                alert("please select image file.");
                $("#newLogo").val(null);
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
                    response_filename = "/img/"+response_filename;
                    $("#gs_previewLogo").attr("src",response_filename);
                }
             });
        })
        
        // clicking this button will save the changes in the general settings
        $("#btn_saveGS").click(function(){
            var defaultlogo = $("#pageheaderlogo").attr("src");
            var defaultname = $("#pageheadername").html();
            
            var newlogo = $("#gs_previewLogo").attr("src");
            var newname = $("#inputnewname").val();
            
            //if(newlogo==defaultlogo && newname==defaultname){
            //    alert("There is no changes with the header..");
            //    return;
            //}
            
            var TYPE = $("#TYPE").val();
            var duration = parseFloat($("#inputduration").val()) * 1000;
            
            $.ajax({
                url: 'UpdateHeader.php', // <-- point to server-side PHP script 
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                data: { headername: newname, 
                        headerlogo: newlogo,
                        TYPE:TYPE,
                        duration:duration
                        
                    },                         
                type: 'GET',
                success: function(message){
                    alert(message);
                    reset_main();
                    location.reload();
                }
             });
        });
        
        
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
                        
                        $("div.div_form").attr("id",$(this).attr("id"));
                        
                        $(".buttons").removeClass("hidden");
                        $("#inputsave").addClass("hidden");
                        $("#inputcancel").removeClass("hidden");
                    };
                    if($(this).hasClass("VID")){
                        // If selected video
                        $(".preview-vid").removeClass("hidden");
                        $(".preview-vid video").attr("src",$(this).attr("src"));
                        
                        $("div.div_form").attr("id",$(this).attr("id"));
                        
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
                        $("div.div_form").prop("id",$(this).prop("id"));
                    };
                    
                }
            })
            $("#TYPE").val('<?php echo get_system_data($db, "tblsystemparameter","TYP")[0]["paravalue"]?>');
            if($("#TYPE").val()=="SLIDE") $(".duration").removeClass("hidden");
        })
        
        $("#TYPE").change(function(){
            if($("#TYPE").val()=="SLIDE") $(".duration").removeClass("hidden");
            else $(".duration").addClass("hidden");
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
        
        function deleteTblContent(){
            $.ajax({
                url: 'deleteTblContent.php', // <-- point to server-side PHP script 
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                data: { cid: $("div.div_form").prop("id")},                         
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
