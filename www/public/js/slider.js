$(document).ready(function() {
    var slide;
	slide = $("#demo").lightSlider({
                auto:true,
                loop:true,
                item:3,
                slideMove:1,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                speed:400,
                responsive : [
                    {
                        breakpoint:800,
                        settings: {
                            item:1,
                            slideMove:1,
                            slideMargin:6,
                          }
                    },
                {
                    breakpoint:480,
                    settings: {
                        item:1,
                        slideMove:1
                    }
            }
        ]
    });
    $('#demo').parent().on('mouseenter',function(){
        slide.pause();
    });
    $('#demo').parent().on('mouseleave',function(){
        slide.play();
    });
});


function showslide() {
    $('#container').hide();
    $('#demo').css("visibility","");
    $('#btn-sl').hide();
    $('#btn-img').show();
    $('#btn-loadmore').hide();
    toggleFullScreen();
    // Go fullscreen
    // var elem = document.getElementById("body");
    // var req = elem.requestFullScreen || elem.webkitRequestFullScreen || elem.mozRequestFullScreen;
    // req.call(elem);

}

function toggleFullScreen() {
          if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
           (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {  
              document.documentElement.requestFullScreen();  
            } else if (document.documentElement.mozRequestFullScreen) {  
              document.documentElement.mozRequestFullScreen();  
            } else if (document.documentElement.webkitRequestFullScreen) {  
              document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
            }  
          } else {  
            if (document.cancelFullScreen) {  
              document.cancelFullScreen();  
            } else if (document.mozCancelFullScreen) {  
              document.mozCancelFullScreen();  
            } else if (document.webkitCancelFullScreen) {  
              document.webkitCancelFullScreen();  
            }  
          }  
        }

function showimage() {
    $('#container').show();
    $('#demo').css("visibility","hidden");
    $('#btn-sl').show();
    $('#btn-img').hide();
    $('#btn-loadmore').show();
    toggleFullScreen();
}

function configSlide() {
    console.log('slide : ' +tagN);
    $.getJSON( "/api/data?tag=" + tagN)
        .done(function(data) {
            if(data != '') {
                //$('#demo').empty();
                var html = "";
                $.each(data, function(key, val) {
                    html = html + htmlForSlide(val);
                });
                $('#demo').html(html);
            }
    });
}

function removeSlide(){
    $('#demo').empty();
}

function htmlForSlide(val) {
    var html = '<li><h3>' +
                    '<img src="' + val["standard_url"] +'" class="img-responsive">' +
                '</li></h3>';
    return html;
}