<!DOCTYPE html>
<?php 
    //include("tblcontent.php");
    //include("system.php");
    //include("api.php");
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}
body{
	background-color:black;
}

/* Slideshow container */
.slideshow-container {
  /*max-width: 1000px;*/
  height:95vh;
  position: relative;
  margin: auto;
  text-align:center;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}


/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  /*position: absolute;*/
  /*bottom: 8px;*/
  margin: 0;
  width: 100%;
  text-align: center;
  
  display: table-cell;
  vertical-align: middle;
  font-size: 30px;
  height:95vh;
  width:100vw;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

img.source, video.source{
	height:95vh !important;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>
<body>

<div class="slideshow-container">
	<?php
		if(is_array($get_tblcontent)){
				$count =0;
                foreach($get_tblcontent as $row){
					$count++;
                    $type =$row['filetype'];
                    if($type=='IMG'){
                        ?>
                        <!--<img class="gallery-content" src="<?php echo $row['filename']??''?>">-->
                        
                        <div class="mySlides fade">
						  <div class="numbertext"><?php echo $count ?> / <?php echo count($get_tblcontent) ?></div>
						  <img src="<?php echo $row['filename']??''?>" class="source">
						  <!--<div class="text">Caption Text</div>-->
						</div>
                        <?php
                    }
                    else if($type=='VID'){
                        ?>
                        <!--<video class="gallery-content" controls loop src="<?php echo $row['filename']??''?>"></video>-->
                        <div class="mySlides fade">
						  <div class="numbertext"><?php echo $count ?> / <?php echo count($get_tblcontent) ?></div>
						  <video loop controls autoplay="autoplay" muted src="<?php echo $row['filename']??''?>" class="source"></video>
						  <!--<div class="text">Caption Text</div>-->
						</div>
                        
                        <?php
                    }
                    else if($type=='TXT'){
                        ?>
                        <!--
                        <div class="gallery-content slide_content text_slide_content" style="background-color: <?php echo $row['bc']??''?>; color:<?php echo $row['textcolor']??''?>;">
                            <div class="MessageHeader">
                                <?php echo $row['textheader']??''?>
                            </div>
                            <div class="MessageBody">
                                <?php echo $row['textcontent']??''?>
                            </div>
                        </div>-->
                        <div class="mySlides fade">
						  <div class="numbertext"><?php echo $count ?> / <?php echo count($get_tblcontent) ?></div>
						  <div class="text" style="background-color: <?php echo $row['bc']??''?>; color:<?php echo $row['textcolor']??''?>;">
							<?php echo $row['textheader']??''?> <br/>
							<?php echo $row['textcontent']??''?>
						  </div>
						</div>
                        <?php
                    }
                }
            }
            else{
            ?>
                <div class="mySlides fade">
				  <div class="numbertext">No slides yet</div>
				  <img src="<?php echo get_system_data($db, "tblsystemparameter","LOGO")[0]['paravalue']?>" class="source">
				  <div class="text">Add slides by going to this link @<?php $my_current_ip=exec("ifconfig | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
echo $my_current_ip;?>/configure.php</div>
				</div>
            <?php
            }
	?>
	<a class="prev" onclick="plusSlides(-1)" style="left:0;display:none">❮</a>
	<a class="next" onclick="plusSlides(1)" style="display:none">❯</a>

</div>
<br>

<div style="text-align:center">
	<?php
		if(is_array($get_tblcontent)){
				$count =0;
                foreach($get_tblcontent as $row){
					$count++;
                    $type =$row['filetype'];
                    ?>
                    <span class="dot" onclick="currentSlide(<?php echo $count ?>)"></span> 
                    <?php
                }
            }
            else{
            ?>
                <span class="dot" onclick="currentSlide(1)"></span> 
            <?php
            }
	?>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
  
  
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
	//$(".mySlides[style='display:none'] video").click()
	//try {
	//	$(".mySlides:visible video").get(0).pause(); 
	//}
	//catch{}
  showSlides(slideIndex += n);
}

function currentSlide(n) {
	//$(".mySlides[style='display:none'] video").click()
	//alert($("div.mySlides[style*=display\\:block]").get(0).tagName);
	//$(".mySlides:visible video")
	//try {
	//	var vid = $(".mySlides:visible video").get(0).pause(); 
	//}
	//catch{}
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

slideIndex = 0;
showSlidesauto();

async function showSlidesauto() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
    //try{await slides[i].getElementsByTagName("video").get(0).pause();}catch{}
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  
  var duration = 0;
  try{
	console.log(slides[slideIndex-1].getElementsByTagName("video")[0].duration);
	duration = slides[slideIndex-1].getElementsByTagName("video")[0].duration;
	//slides[slideIndex-1].getElementsByTagName("video")[0].play();
  }catch{}
  if(duration==0) setTimeout(showSlidesauto, <?php echo get_system_data($db, "tblsystemparameter","DUR")[0]['paravalue']?>);
  else {
	  //try{await slides[slideIndex-1].getElementsByTagName("video")[0].get(0).play();}catch{}
	  setTimeout(showSlidesauto, parseFloat(duration)*1000);
	  }
}
// check update every 5 sec
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
	
	
	
	$(document).click(function(){
    var elem = document.documentElement; if (elem.requestFullscreen) { elem.requestFullscreen() }
  })
       
</script>

</body>
</html> 
