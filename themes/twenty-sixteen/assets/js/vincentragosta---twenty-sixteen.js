"use strict";

!function(e) {
    var n = {
        setupMenuToggle: function() {
            e(".drop-down").click(function() {
                e(".nav-container").hide(), e("#mobile-menu").fadeIn();
            }), e(".close-menu").click(function() {
                e(".nav-container").show(), e("#mobile-menu").fadeOut();
            });
        },
        loadElements: function() {
            e(".menu").removeClass("unloaded"), e("#logo").removeClass("unloaded");
        },
        initInstagram: function() {
            var n = new Instafeed({
                get: "user",
                userId: 4257019760,
                accessToken: VincentRagosta.options.accessToken,
                resolution: "standard_resolution",
                target: "instagram-feed",
                template: '<div class="instagram-image col-xs-12 col-sm-6 col-md-4 col-lg-2"><a href="{{image}}" data-rel="lightbox" title="{{caption}}"><figure itemscope itemtype="http://schema.org/CreativeWork"><meta itemprop="project-image" content="{{image}}" /><div class="image" style="background-image: url( \'{{image}}\' );"></div></figure></a></div>',
                limit: 12
            });
            e("#instagram-feed").length && n.run();
        },
        scrollListener: function() {
            e(window).scroll(function() {
                e(window).scrollTop() >= 800 && e(window).scrollTop() < e(document).height() - 1400 ? e(".arrow.top").addClass("visible") : e(".arrow.top").removeClass("visible");
            });
        },
        sendContactInformation: function() {
            e(".contact-btn").click(function() {
                var n = {
                    firstname: e("input[name=firstname]").val(),
                    lastname: e("input[name=lastname]").val(),
                    email: e("input[name=email]").val(),
                    message: e("textarea[name=message]").val()
                };
                e.ajax({
                    url: VincentRagosta.options.apiUrl + "/contact/",
                    type: "post",
                    headers: {
                        "X-WP-Nonce": VincentRagosta.options.nonce
                    },
                    data: JSON.stringify(n),
                    dataType: "json"
                }).then(function(e) {
                    window.location.href = VincentRagosta.options.homeUrl + "/contact/";
                });
            });
        },
        init: function() {
            this.loadElements(), this.setupMenuToggle(), this.initInstagram(), this.scrollListener(), 
            this.sendContactInformation();
        }
    };
    jQuery(document).ready(function() {
        n.init();
    });
}(jQuery);