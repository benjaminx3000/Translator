// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/

window.log = function f() {
    log.history = log.history || [];
    log.history.push(arguments);
    if (this.console) {
        var args = arguments;
        var newarr;

        try {
            args.callee = f.caller;
        } catch(e) {

        }

        newarr = [].slice.call(args);

        if (typeof console.log === 'object') {
            log.apply.call(console.log, console, newarr);
        } else {
            console.log.apply(console, newarr);
        }
    }
};

// make it safe to use console.log always

(function(a) {
    function b() {}
    var c = "assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn";
    var d;
    for (c = c.split(","); !!(d = c.pop());) {
        a[d] = a[d] || b;
    }
})(function() {
    try {
        console.log();
        return window.console;
    } catch(a) {
        return (window.console = {});
    }
}());

// place any jQuery/helper plugins in here, instead of separate, slower script files.
(function($){
    $.fn.postTemplate = function(options){
        var settings = $.extend({
            gallerySelector:    '.image-gallery',
            thumbHeight:        '120',
            thumbWidth:         '120',
            opacity:            0.7,
            transitionSpeed:    'fast'
        }, options);

        this.each(function(index){
            var self = $(this),
                gallery = $(self).find(settings.gallerySelector),
                images = $(self).find('img'),
                text = $(self).text().split('~'),
                imageContainer = $('<div class="image-container"/>'),
                thumbContainer = $('<div class="thumb-container" />'),
                thumb = $('<div class="thumb" />'),
                thumbs,
                current,
                currentThumb;

                /*
                    1 Build the UI
                */
                
                $(imageContainer).css({'position' : 'relative'});
                $(gallery).append(imageContainer);
                $(imageContainer).append(images);
                $(images).css({'opacity': 0});
                $(images).each(function(index){
                    if(index > 0){
                        // leave the first image staticaly postiioned to prevent
                        // the container from collapsing
                        $(this).css({
                            'position': 'absolute',
                            'left': 0,
                            'top': 0
                        });
                    }

                    thumb = $('<div class="thumb" />');

                    $(thumb).css({
                        'height':   settings.thumbHeight,
                        'width':    settings.thumbWidth,
                        'test-align': 'center',
                        'overflow': 'hidden',
                        'display':  'inline-block',
                        'opacity':  settings.opacity
                    });
                    var img = $('<img src="'+ $(this).attr('src') +'" />');
                    $(img).css({
                        width: 'auto',
                        height: '100%'
                    });

                    $(thumb).append(img);
                    $(thumbContainer).append(thumb);
                });
                thumbs = $(thumbContainer).find('.thumb');
                $(gallery).append(thumbContainer);

                /*
                    2 Add Behavior
                */
                //bind events

                $(thumbs).hover(hoverIn, hoverOut);
                $(thumbs).click(onClick);

                //define methods
                function cycle (index) {
                    $(current).fadeTo(settings.transitionSpeed, 0);
                    current = $(images).eq(index);
                    $(current).fadeTo(settings.transitionSpeed, 1);
                }

                //thumbnails
                function hoverIn (e) {
                    $(this).stop().fadeTo('fast', 1.0);
                }
                function hoverOut (e) {
                    $(this).stop().fadeTo('fast', settings.opacity);
                }
                function onClick () {
                    
                    if(!$(this).hasClass('current')){
                        $(currentThumb).removeClass('current');
                        currentThumb = $(this);
                        $(currentThumb).addClass('current');
                        cycle($(thumbs).index($(this)));
                    }
                }
                $(thumbs).eq(0).click();
        });
        
    };
})(jQuery);

(function( $ ){
    
    var $scrollTo = $.scrollTo = function( target, duration, settings ){
        $(window).scrollTo( target, duration, settings );
    };

    $scrollTo.defaults = {
        axis:'xy',
        duration: parseFloat($.fn.jquery) >= 1.3 ? 0 : 1,
        limit:true
    };

    // Returns the element that needs to be animated to scroll the window.
    // Kept for backwards compatibility (specially for localScroll & serialScroll)
    $scrollTo.window = function( scope ){
        return $(window)._scrollable();
    };

    // Hack, hack, hack :)
    // Returns the real elements to scroll (supports window/iframes, documents and regular nodes)
    $.fn._scrollable = function(){
        return this.map(function(){
            var elem = this,
                isWin = !elem.nodeName || $.inArray( elem.nodeName.toLowerCase(), ['iframe','#document','html','body'] ) != -1;

                if( !isWin )
                    return elem;

            var doc = (elem.contentWindow || elem).document || elem.ownerDocument || elem;
            
            return $.browser.safari || doc.compatMode == 'BackCompat' ?
                doc.body : 
                doc.documentElement;
        });
    };

    $.fn.scrollTo = function( target, duration, settings ){
        if( typeof duration == 'object' ){
            settings = duration;
            duration = 0;
        }
        if( typeof settings == 'function' )
            settings = { onAfter:settings };
            
        if( target == 'max' )
            target = 9e9;
            
        settings = $.extend( {}, $scrollTo.defaults, settings );
        // Speed is still recognized for backwards compatibility
        duration = duration || settings.duration;
        // Make sure the settings are given right
        settings.queue = settings.queue && settings.axis.length > 1;
        
        if( settings.queue )
            // Let's keep the overall duration
            duration /= 2;
        settings.offset = both( settings.offset );
        settings.over = both( settings.over );

        return this._scrollable().each(function(){
            var elem = this,
                $elem = $(elem),
                targ = target, toff, attr = {},
                win = $elem.is('html,body');

            switch( typeof targ ){
                // A number will pass the regex
                case 'number':
                case 'string':
                    if( /^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ) ){
                        targ = both( targ );
                        // We are done
                        break;
                    }
                    // Relative selector, no break!
                    targ = $(targ,this);
                case 'object':
                    // DOMElement / jQuery
                    if( targ.is || targ.style )
                        // Get the real position of the target 
                        toff = (targ = $(targ)).offset();
            }
            $.each( settings.axis.split(''), function( i, axis ){
                var Pos = axis == 'x' ? 'Left' : 'Top',
                    pos = Pos.toLowerCase(),
                    key = 'scroll' + Pos,
                    old = elem[key],
                    max = $scrollTo.max(elem, axis);

                if( toff ){// jQuery / DOMElement
                    attr[key] = toff[pos] + ( win ? 0 : old - $elem.offset()[pos] );

                    // If it's a dom element, reduce the margin
                    if( settings.margin ){
                        attr[key] -= parseInt(targ.css('margin'+Pos)) || 0;
                        attr[key] -= parseInt(targ.css('border'+Pos+'Width')) || 0;
                    }
                    
                    attr[key] += settings.offset[pos] || 0;
                    
                    if( settings.over[pos] )
                        // Scroll to a fraction of its width/height
                        attr[key] += targ[axis=='x'?'width':'height']() * settings.over[pos];
                }else{ 
                    var val = targ[pos];
                    // Handle percentage values
                    attr[key] = val.slice && val.slice(-1) == '%' ? 
                        parseFloat(val) / 100 * max
                        : val;
                }

                // Number or 'number'
                if( settings.limit && /^\d+$/.test(attr[key]) )
                    // Check the limits
                    attr[key] = attr[key] <= 0 ? 0 : Math.min( attr[key], max );

                // Queueing axes
                if( !i && settings.queue ){
                    // Don't waste time animating, if there's no need.
                    if( old != attr[key] )
                        // Intermediate animation
                        animate( settings.onAfterFirst );
                    // Don't animate this axis again in the next iteration.
                    delete attr[key];
                }
            });

            animate( settings.onAfter );            

            function animate( callback ){
                $elem.animate( attr, duration, settings.easing, callback && function(){
                    callback.call(this, target, settings);
                });
            };

        }).end();
    };
    
    // Max scrolling position, works on quirks mode
    // It only fails (not too badly) on IE, quirks mode.
    $scrollTo.max = function( elem, axis ){
        var Dim = axis == 'x' ? 'Width' : 'Height',
            scroll = 'scroll'+Dim;
        
        if( !$(elem).is('html,body') )
            return elem[scroll] - $(elem)[Dim.toLowerCase()]();
        
        var size = 'client' + Dim,
            html = elem.ownerDocument.documentElement,
            body = elem.ownerDocument.body;

        return Math.max( html[scroll], body[scroll] ) 
             - Math.min( html[size]  , body[size]   );
    };

    function both( val ){
        return typeof val == 'object' ? val : { top:val, left:val };
    };

})( jQuery );
