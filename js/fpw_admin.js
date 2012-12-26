// Fire off Chosen plugin on the select list.
jQuery(document).ready(function($) {

	function fpwActivateChosen() {
		$( '#widgets-right .fpw-page-select' ).each( function() {
			theID = $(this).attr('id');
			$('#' + theID ).chosen({
				no_results_text: 'No pages match:',
				allow_single_deselect: true 
			});
		});
	}

	// Fire off chosen on save-widget callback, else the vanilla select reappears.
	//Thanks http://www.johngadbois.com/adding-your-own-callbacks-to-wordpress-ajax-requests/
	$(document).ajaxSuccess(function(e, xhr, settings) {
		var widget_id_base = 'fpw_widget';

		if(settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_id_base) != -1) {
			fpwActivateChosen();
		}

		if(settings.data.search('action=widgets-order') != -1) {
			fpwActivateChosen();
		}

	});	

	// fire on page load
	fpwActivateChosen();

	// Set overflow to visible so select list isn't chopped off
	// You can thank WordPress for necessitating that awful selector
	$('.widget:contains("Feature a Page Widget")').css( 'overflow', 'visible' );

});
