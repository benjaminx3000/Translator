jQuery(document).ready(function($) {
	($('body.wp-admin').length > 0 )? adminInit($) : init($);
});

function init($){
	console.log('Theme JS Initialized!');	
	$('a[href="#SignupForm"]').fancybox();
}

function adminInit($){
	console.log('Admin JS Initialized!');
    $('input.datepicker').datepicker({
    	dateFormat: 'MM - mm, DD yy' ,
    	autoSize: true
    });
}