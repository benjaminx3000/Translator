/**
 * the global translator scope
 */

var tran = {};

jQuery(document).ready(function($) {
	( $('body.wp-admin').length > 0 )? adminInit($) : init($);
});

/**
 * this is the initialization for the front end
 * sets up UI caches vars etc..
 */
function init($){
	tran.topOffset = 2;
	tran.lastArticle = $('.collapsable.expanded');//if there is collapsable content manually set to be open, set the lastArticle variable
	console.log('Theme JS Initialized!');
	console.log(navigator.appCodeName);
	console.log(navigator.platform);

	var path = window.location.pathname.split('/');
		path = path[path.length - 2];
	$('a[href="#SignupForm"], .fancy').fancybox();
	$('.fancy-link, .event-card .more').click(function(e){
		e.preventDefault();
		$.fancybox.showLoading();
		$('#ajax-container').load( $(this).attr('href') + ' #ContentTop', function(){
			$.fancybox.open('#ajax-container', {autoSize: false,width: 800});
			$.fancybox.hideLoading();
		});
	});
	navigation($);
	initUI($);
	registerCustomAnalytics($);
	$('.case-study .primary').postTemplate();
	handleHash($, window.location.hash);
	
	switch(path){
		case 'lab' :
			tabInator($, function(index){
				$('select').find('option').eq(index).attr('selected', 'selected');
			});
			break;
		default :
			tabInator($);
			break;
	}

}

function registerCustomAnalytics($){
	$('#fun-nav a').click(function(e){
		_gaq.push(['_setCustomVar',
			1,                   // This custom var is set to slot #1.  Required parameter.
			'Clicked Fun Nav',     // The name acts as a kind of category for the user activity.  Required parameter.
			'Yes',               // This value of the custom variable.  Required parameter.
			2                    // Sets the scope to session-level.  Optional parameter.
		]);
		_gaq.push(['_trackEvent',
			'Navigation', // category of activity
			'Useed Fun Nav' // Action
		]);
	});
}

function adminInit($){
	tran.topOffset = -27;
	console.log('Admin JS Initialized!');
    $('input.datepicker').datepicker({
		dateFormat: 'DD, m/d',
		autoSize: true,
		altField: ".full-date",
        altFormat: "m/d/yy"
    });
}

function handleHash($, hash){
		$(hash).find('.expanded').removeClass('expanded');
		$(hash).find('.preview').click();
}


function initUI($){
	var preview = $('.preview'),
		collapser,
		height,
		self,
		plus;

	$(preview).click(function(e){
		e.preventDefault();
		
		//find the collapsable content
		window.location.hash = $(this).parents('.hentry').attr('id');
		self = $(this);
		collapser = $(self).siblings('.collapsable');
		
		
		if( tran.lastArticle == undefined || collapser.attr('id') !== tran.lastArticle.attr('id') ){
			//if it's not the same as from the last click,
			//then close the last one and open the new
			processClick();
		} else {
			//we are clicking on the same content
			//as last time, meaning we're gonna
			//toggle it!
			if($(collapser).height() == 0){
				height = $(collapser).find('.article').outerHeight();
				$(collapser).height(height);
				$(plus).addClass('open');
			} else{
				$(collapser).height(0);
				$(plus).removeClass('open');
			}
		}

		function processClick(){
			$(tran.lastArticle).height(0);
			$(plus).removeClass('open');
			height = $(collapser).find('.article').outerHeight();
			plus = $(self).find('.plus');
			$(plus).addClass('open');
			$(collapser).height(height);
			tran.lastArticle = $(collapser);
		}

		var ref = $(self);
		var delay = parseFloat($(collapser).css('-webkit-transition-duration'));
		setTimeout(function(){
			if(navigator.platform == 'iPhone' || navigator.platform == 'iPad' || navigator.platform == 'iPhone Simulator'){
				window.scrollTo(0, $(ref).offset().top - parseInt($('#primary').css('marginTop')) + tran.topOffset);
			} else {
				$.scrollTo({left:0, top: $(ref).offset().top - parseInt($('#primary').css('marginTop'))+ tran.topOffset}, delay * 1000);
			}
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

