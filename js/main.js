jQuery(document).ready(function($) {
	($('body.wp-admin').length > 0 )? adminInit($) : init($);
});

function init($){
	console.log('Theme JS Initialized!');	
	$('a[href="#SignupForm"], .fancy').fancybox();
	templateCompare($);
	navigation($);
	initUI($);
}

function adminInit($){
	console.log('Admin JS Initialized!');
    $('input.datepicker').datepicker({
    	dateFormat: 'DD<br>MM-d, yy',
    	autoSize: true
    });
}

function initUI($){
	var preview = $('.preview'),
		collapser,
		lastArticle,
		height,
		plus;

	$(preview).click(function(e){
		e.preventDefault();
		//find the collapsable content
		collapser = $(this).siblings('.collapsable');
		//if it's not the same as from the last click,
		//then close the last one and open the new
		if(collapser != lastArticle){
			$(lastArticle).height(0);
			$(plus).removeClass('open');
			height = $(collapser).find('.article').outerHeight();
			plus = $(this).find('.plus');
			$(plus).addClass('open');
			$(collapser).height(height);
			lastArticle = $(collapser);
		}
	});
}

//fun navigation thingie
function navigation($){
	var bubble,
		t,
		count = 0;

	$('#flask').hover(function(e){
		console.log('Hovering- shoud setInterval');
		t = setInterval(function(){
			count ++;
			console.log(t);
			bubble = $('<div class="wrapper wrapper-'+ count % 5 +'"><div class="sprite fun-nav_bubble"></div></div>');
			$(bubble).bind('webkitAnimationEnd', function(e){
				$(this).remove();
				console.log($(this));
			})
			$('#flask').append(bubble);
		}, 500)
	}, function(e){
		console.log('Hover Out- Should clearInterval');
		clearInterval(t);
	});
}


//
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

		$(document).on('keyup', function(e){
			if(e.keyCode == 27){
				$(toggle).click();
			}
		});
		$(toggle).toggle(
			function(e){
				$(this).text('off');
				$(image).css({'opacity' : '.6'});
		}, function(e){
			$(this).text('on');
			$(image).css({'opacity' : '0'});
		});
	}
}

