$(document).ready(function(){
    $("div.slide_content").each(function(){
       content_toggle($(this));
    })
    
    $("img").each(function(){
       content_toggle($(this));
    })
    
    //addcode to all videos in the web
    $("video").each(function(){
        content_toggle(this);
    })
})
function minimizeall(){
    $(".gallery img").removeClass("maximize");
}
function content_toggle(e){
    $(e).click(function(){
        if($(e).hasClass("maximize")){
            $(e).removeClass("maximize");
            $('body').removeClass("noscroll");
            $(e).css('transform', 'none')
            // $(e).removeAttr("controls");
            $('footer').css('bottom','0');
            $('body').css('background-color','unset');
            $('header').css('display','');
            $('footer').css('display','');

            $('div.gallery .gallery-content').each(function(){
                $(this).css("display","");
            })

            // show all the videos if image or text will be close, to show video controls.
            if(!$(e).is('video')){
                $('video').css('display','');
            }
        }
        else{
            minimizeall();
            var location =document.body.getBoundingClientRect().top;
            location = location *-1;
            
            // hide all the videos if image or text will be open, to hide video controls.
            
            $(e).css('transform', 'translateY(' + location + 'px)')
            
            $(e).addClass("maximize");
            $('body').addClass("noscroll");
            $('footer').css('bottom','unset');
            $('body').css('background-color','black');
            $('header').css('display','none');
            $('footer').css('display','none');

            $('div.gallery .gallery-content').each(function(){
                if(!$(this).hasClass("maximize")) $(this).css("display","none");
            })
            
            if(!$(e).is('video')){
                $('video').css('display','none');
            }
        }         
    })
}




//Create new database table
//tblcontent
//columns
//  cid           int
//  filetype        nvarchar(10)  ** image, video, text  //must include youtube link
//  filelocation    nvarchar(250)
//  filename        nvarchar(50)
//  textheader      nvarchar(50)  ** if type is text
//  textcontent     nvarchar(50)  ** if type is text
//  bc              nvarchar(50)  ** if type is text  // background color
//  textcolor       nvarchar(50)  ** if type is text


//tblsystempar
//columns
//  tblid           int
//  tblcode         nvarchar(50)
//  tblval          nvarchar(50)

//  data
//  backgroundimage      ""


