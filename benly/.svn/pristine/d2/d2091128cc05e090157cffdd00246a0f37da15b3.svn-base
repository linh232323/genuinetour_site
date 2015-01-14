(function($){
    $.fn.extend({
        zrotat: function(options){
            var defaults = {
                
            };
            
            function slide(){
                var all = $("div.slideshow img");
                var active = $("div.slideshow img.active");
                var next = active.next();
                
                if (next.length==0){
                    next = all.first();
                }
                active.fadeOut("slow");
                next.fadeIn("slow");
                next.addClass("active");
                active.removeClass("active");
            }
            
            var options = $.extend(defaults, options);
            return this.each(function(){
                var o = options;
                var object = $(this);
                setInterval(slide, 3000);
            });
        }
    });
})(jQuery);

