"use strict";

!function(e) {
    var n = {
        loadElements: function() {
            e(".featured-image .sub-header").removeClass("unloaded"), e(".featured-image .header").removeClass("unloaded");
        },
        init: function() {
            this.loadElements();
        }
    };
    jQuery(document).ready(function() {
        n.init();
    });
}(jQuery);