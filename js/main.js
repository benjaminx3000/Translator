jQuery(document).ready(function($) {
	($('body.wp-admin').length > 0 )? adminInit($) : init($);
});

function init($){
	console.log('Theme JS Initialized!');	
	$('a[href="#SignupForm"]').fancybox();
	templateCompare($);
}

function adminInit($){
	console.log('Admin JS Initialized!');
    $('input.datepicker').datepicker({
    	dateFormat: 'MM - mm, DD yy' ,
    	autoSize: true
    });
}

function templateCompare($){
	//set up
	$.get(window.location + 'wp-content/themes/translator/js/templates/template-compare.html', function(data){
		$('body').append(data);
		initializeTool();
	});
	function initializeTool () {
		var file = $('#TemplateFile'),
			image = $('#TemplateContainer'),
			toggle = $('#templateCompare');

		$(file).change(function(e){
			console.log(file);
			//$(image).attr('src', file.val());
		});

		$(toggle).toggle(
			function(e){
				$(this).text('off');
				$(image).css({'opacity' : '1'});
		}, function(e){
			$(this).text('on');
			$(image).css({'opacity' : '0'});
		});
	}
}

