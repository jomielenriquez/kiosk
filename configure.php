<!DOCTYPE html>
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
        <h1>Malvar Senior High School</h1>
    </header>
    <div class="left_pane">
        <div class="nullleftpane hidden"> <img src="/images/addslide.png"></div>
        <img class="gallery-content" src="https://venngage-wordpress.s3.amazonaws.com/uploads/2018/11/Blue-Conservation-Creative-Poster-Example-Template.jpg">
        <img class="gallery-content" src="https://images.examples.com/wp-content/uploads/2018/10/Vintage-Concert-Poster-Template.jpg">
        <img class="gallery-content" src="https://i.pinimg.com/236x/8e/db/51/8edb51ee62442a5bcff7e6e35c4b88e2.jpg">
        <img class="gallery-content" src="https://img.freepik.com/free-vector/music-event-poster-with-photo_52683-42061.jpg?w=2000">
        <img class="gallery-content" src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/birthday-celebration-poster-design-template-c5004390166467beb97bda3cd476bb87_screen.jpg?ts=1633119555">
        <img class="gallery-content" src="https://cdn.dribbble.com/users/5702172/screenshots/13243989/goodluckexam.png">
        <img class="gallery-content" src="https://c8.alamy.com/comp/2BG7H7E/attention-please-vector-poster-with-voice-megaphone-speech-announcement-poster-alert-message-from-bullhorn-illustration-2BG7H7E.jpg">
        <img class="gallery-content" src="https://pub-static.fotor.com/assets/projects/pages/5ba2936e-e825-4333-8bdf-3374328b4047/300w/yellow-news-announcement-1146f834-dcf9-4bb0-adbc-1e78ed1a391e.jpg">
        <img class="gallery-content" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3UTLW1wXqLazzYWqnV3kWyEMyfnCrEWrwlNZnn4CO4TIUPtXX4YyKU4UKgA3F-5Ejzwo&usqp=CAU">
        <video class="gallery-content" src="https://media.w3.org/2010/05/sintel/trailer.mp4"></video>
        <video class="gallery-content" src="https://media.w3.org/2010/05/sintel/trailer.mp4"></video>
        <div class="gallery-content slide_content" style="background-color: gray; color:white;">
            <div class="MessageHeader">
                Header
            </div>
            <div class="MessageBody">
                This is just a sample text for the body. This is just a testing. This is just a sample text for the body. This is just a testing. This is just a sample text for the body. This is just a testing.
                This is just a sample text for the body. This is just a testing. This is just a sample text for the body. This is just a testing. This is just a sample text for the body. This is just a testing.
            </div>
        </div>

    </div>
    <div class="main_screen">
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
    </div>
    <footer>
        @ 2022 - Digital Bulletin Board
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('div.left_pane img,div.left_pane video,div.left_pane div.slide_content').click(function(){
                if($(this).is('img')){
                    $("#img_main").attr("src",$(this).attr("src"));

                    $("div.inside_main img").removeClass("hidden");
                    $("div.inside_main video").addClass("hidden");
                    $("div.inside_main div").addClass("hidden");
                }
                if($(this).is('video')){
                    $("#video_main").attr("src",$(this).attr("src"));

                    $("div.inside_main img").addClass("hidden");
                    $("div.inside_main video").removeClass("hidden");
                    $("div.inside_main div").addClass("hidden");
                }
                if($(this).is('div')){
                    $("div.inside_main img").addClass("hidden");
                    $("div.inside_main video").addClass("hidden");
                    $("div.inside_main div").removeClass("hidden");
                }
            })
        })
    </script>
  </body>
</html>