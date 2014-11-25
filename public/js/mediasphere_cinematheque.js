jQuery( document ).ready(function( $ ) {
    var jsFileLocation = $('script[src*=mediasphere_cinematheque]').attr('src');  // the js file path
    jsFileLocation = jsFileLocation.replace('public/js/mediasphere_cinematheque.js?ver=4.0.1', '');   // the js folder path
    
    $( ".widget_mediasphere_widget" ).click(function() {
        //$('#cinematheque_modal').load('../../inc/cinematheque.inc.php');
        //alert('Cinémathèque launch');
        $("#cinematheque_dialog").load( jsFileLocation + 'inc/cinematheque.inc.php', function() {
            var options = {
                title: "Ma Cinémathèque",
                draggable : true,
                height : 500,
                width : 1000,
                maxHeight: 1000,
                maxWidth: 1200,
                minHeight: 500,
                minWidth: 1000,
                //position: { my: "center", at: "center", of: window }, //Default
                resizable: true,
            };
            $('#cinematheque_dialog').dialog(options);
            $('#cinematheque_dialog iframe').show();
            //disable_scroll();
        });
        

        $(document).keypress(function(e) { 
            if (e.keyCode === 27) { //if Escape
                $("#cinematheque_dialog").fadeOut(500);
            } 
        });
        
        $( ".thumbnail" ).click(function() {
            var youtube_value = $(this).data('value');
            //var youtube_object = "<iframe width='560' height='315' src='//www.youtube.com/embed/" + youtube_value + "' frameborder='0' allowfullscreen></iframe>";
            //$('#cinematheque_dialog iframe').html(youtube_object);
            console.log(youtube_value);
        });
        
        
        
        
        
        
        
        /**
         * 
         * To disable scroll event
         */
        // left: 37, up: 38, right: 39, down: 40,
        // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
        var keys = [37, 38, 39, 40];

        function preventDefault(e) {
          e = e || window.event;
          if (e.preventDefault)
              e.preventDefault();
          e.returnValue = false;  
        }

        function keydown(e) {
            for (var i = keys.length; i--;) {
                if (e.keyCode === keys[i]) {
                    preventDefault(e);
                    return;
                }
            }
        }

        function wheel(e) {
          preventDefault(e);
        }

        function disable_scroll() {
          if (window.addEventListener) {
              window.addEventListener('DOMMouseScroll', wheel, false);
          }
          window.onmousewheel = document.onmousewheel = wheel;
          document.onkeydown = keydown;
        }

        function enable_scroll() {
            if (window.removeEventListener) {
                window.removeEventListener('DOMMouseScroll', wheel, false);
            }
            window.onmousewheel = document.onmousewheel = document.onkeydown = null;  
        }


    });
  
});