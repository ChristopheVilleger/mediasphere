jQuery( document ).ready(function( $ ) {
    
    $( ".widget_mediasphere_widget" ).click(function() {
        //$('#cinematheque_modal').load('../../inc/cinematheque.inc.php');
        //alert('Cinémathèque launch');
        $('#cinematheque_dialog').dialog();
    });
  
});