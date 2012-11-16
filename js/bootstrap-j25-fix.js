/* Fix Bluestork and Joomla! Conflict */
window.addEvent( 'domready', function(){
	var modal = $$('.control-group .modal') ;
	setTimeout(function(){ modal.removeClass('modal'); }, 500 );
	
	var a = $$('.control-group a', '#editor-xtd-buttons a', '.toggle-editor a') ;
	
	setTimeout(function(){ a.addClass('btn pull-left'); }, 500 );
	
	var label = $$('.control-group label') ;
	
	//setTimeout(function(){ a.addClass('control-label'); }, 500 );
} );