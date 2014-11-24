jQuery(window).load(function(){

	jQuery( "#ms_admin_tabs" ).tabs();
	jQuery( "#homepage-tabs" ).accordion({
		header: "h3"
	})
	.sortable({
		axis: "y",
		handle: "h3",
		stop: function( event, ui ) {
			// IE doesn't register the blur when sorting
			// so trigger focusout handlers to remove .ui-state-focus
			ui.item.children( "h3" ).triggerHandler( "focusout" );
			current_order(jQuery(this));

			// Refresh accordion to handle new order
			jQuery( this ).accordion( "refresh" );
		}
	});

});

function current_order(el){
	var order=[];
	el.children().each( function(i){
		order[i]=this.id;
	});
		// silly test
		for(var i=0; i<order.length; i++){
			console.log("got " + order[i]);
		}
	}


	jQuery("#btnLeft").click(function () {
		var selectedItem = jQuery("#rightValues option:selected");
		jQuery("#leftValues").append(selectedItem);
	});

	jQuery("#btnRight").click(function () {
		var selectedItem = jQuery("#leftValues option:selected");
		jQuery("#rightValues").append(selectedItem);
	});

	jQuery("#rightValues").change(function () {
		var selectedItem = jQuery("#rightValues option:selected");
	});