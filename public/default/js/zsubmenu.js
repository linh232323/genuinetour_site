(function($){
    $.fn.extend({
        zsubmenu: function(option){
            return this.each(function(){
                $(this).find("div").hover(function(){
                    $(this).css("height","100px");
                    $(this).find(".sub-menu").fadeIn("slow");
                },
                function(){
                    $(this).find(".sub-menu").fadeOut("slow");                   
                }
                );
            });
        }
    });
})(jQuery);
