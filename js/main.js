jQuery(document).ready(function($) {
	($('body.wp-admin').length > 0 )? adminInit($) : init($);
});

function init($){
	console.log('Theme JS Initialized!');	
	var path = window.location.pathname.split('/');
		path = path[path.length - 2];
	$('a[href="#SignupForm"], .fancy').fancybox();
	
	navigation($);
	initUI($);
	handleHash($, window.location.hash);
	$('.article').postTemplate();
	switch(path){
		case 'lab' :
			tabInator($, function(index){
				$('select').find('option').eq(index).attr('selected', 'selected');
			});
			break;
		default :
			tabInator($);
			break
	}

}

function adminInit($){
	console.log('Admin JS Initialized!');
    $('input.datepicker').datepicker({
    	dateFormat: 'DD<br>MM-d, yy',
    	autoSize: true
    });
}

function handleHash($, hash){
	console.log(hash);

	console.log($(hash).find('.preview'));
	$(hash).find('.preview').click();
}

function tabbedPost($){

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
		window.location.hash = $(this).parents('.hentry').attr('id');
		collapser = $(this).siblings('.collapsable');
		//if it's not the same as from the last click,
		//then close the last one and open the new
		if(!lastArticle){
			console.log(lastArticle);
			$(lastArticle).height(0);
			$(plus).removeClass('open');
			height = $(collapser).find('.article').outerHeight();
			plus = $(this).find('.plus');
			$(plus).addClass('open');
			$(collapser).height(height);
			lastArticle = $(collapser);
		}
		if(collapser.attr('id') !== lastArticle.attr('id')){
			$(lastArticle).height(0);
			$(plus).removeClass('open');
			height = $(collapser).find('.article').outerHeight();
			plus = $(this).find('.plus');
			$(plus).addClass('open');
			$(collapser).height(height);
			lastArticle = $(collapser);
		} else {
			if($(collapser).height() == 0){
				$(collapser).height(height);
				$(plus).addClass('open');
			} else{
				$(collapser).height(0);
				$(plus).removeClass('open');
			}
		}
		var ref = $(this);
		console.log($(ref).css('margin-top'));
		var delay = parseFloat($(collapser).css('-webkit-transition-duration'));
		console.log(delay * 1000);
		setTimeout(function(){
			$.scrollTo({left:0, top: $(ref).offset().top - parseInt($('#primary').css('marginTop')) + 2}, delay * 1000);
		}, delay * 1000);
		
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

//tabs
function tabInator($, callback){
	var	nav = $('.tab-nav li'),
		currentNav = $('.tab-nav .current'),
		tabs = $('.tab'),
		currentTab = $('.tab.current');

	$(nav).click(function updateTab(e){
		//change out the nav
		$(currentNav).removeClass('current');
		currentNav = $(this);
		$(currentNav).addClass('current');
		//change out the tabbed content
		$(currentTab).removeClass('current');
		currentTab = $(tabs).eq($(this).index());
		$(currentTab).addClass('current');
		if(callback){
			callback($(this).index());
		}
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

