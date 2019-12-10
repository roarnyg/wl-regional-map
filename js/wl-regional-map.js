jQuery(document).ready(function () {
        if (window.mapInited) return;
        window.mapInited = 1;
        jQuery(".nor-map path").click(function(){
            var mainmap = jQuery(this).closest('.main-map');
            var action = mainmap.data('action');
            if(jQuery(this).data("url")){
                if (action) {
                    var url = jQuery(this).data('url');
                    var components = url.split("="); // Expect the region to be the last URL argument
                    if (components.length>0)  {
                       var region = components[components.length-1];
                       return window[action](region);
                    }
                } else {
                    // Default action - this will be a search
                    window.location.href = jQuery(this).data("url");
                }
            }
            var targetMap = jQuery(this).data("target");
            if(targetMap){
                mainmap.fadeOut(400,function(){
                jQuery("#"+targetMap).fadeIn();
                });
            }
        });

        jQuery(".sub-map .bt-back").click(function(){
            var mainmap = jQuery(this).closest('.nor-map').find('.main-map'.find('.main-map'));
            console.log("This %j", mainmap);
            jQuery(this).parent(".sub-map").fadeOut(400,function(){
                mainmap.fadeIn();
            });
        });
    });
