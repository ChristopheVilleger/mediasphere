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
                height : 600,
                width : 800,
                maxHeight: 1000,
                maxWidth: 1000,
                minHeight: 600,
                minWidth: 800,
                position: { my: "center", at: "center", of: window }, //Default
                resizable: true,
                
            };
            $('#cinematheque_dialog').dialog(options);
            $('#cinematheque_dialog iframe').show();
        });
    });
  
});