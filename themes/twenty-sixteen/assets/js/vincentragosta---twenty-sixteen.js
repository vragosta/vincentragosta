"use strict";

(function($) {
    var vincentragosta = {
        setupMenuToggle: function() {
            $(".drop-down").click(function() {
                $(".nav-container").hide();
                $("#mobile-menu").fadeIn();
            });
            $(".close-menu").click(function() {
                $(".nav-container").show();
                $("#mobile-menu").fadeOut();
            });
        },
        loadElements: function() {
            $(".menu").removeClass("unloaded");
            $("#logo").removeClass("unloaded");
        },
        initInstagram: function() {
            var template = '<div class="instagram-image col-xs-12 col-sm-6 col-md-4 col-lg-2">' + '<a href="{{image}}" data-rel="lightbox" title="{{caption}}">' + '<figure itemscope itemtype="http://schema.org/CreativeWork">' + '<meta itemprop="project-image" content="{{image}}" />' + '<div class="image" style="background-image: url( \'{{image}}\' );"></div>' + "</figure>" + "</a>" + "</div>", feed = new Instafeed({
                get: "user",
                userId: 4257019760,
                accessToken: VincentRagosta.options.accessToken,
                resolution: "standard_resolution",
                target: "instagram-feed",
                template: template,
                limit: 12
            });
            if ($("#instagram-feed").length) {
                feed.run();
            }
        },
        scrollListener: function() {
            $(window).scroll(function() {
                if ($(window).scrollTop() >= 800 && $(window).scrollTop() < $(document).height() - 1400) {
                    $(".arrow.top").addClass("visible");
                } else {
                    $(".arrow.top").removeClass("visible");
                }
            });
        },
        sendContactInformation: function() {
            $(".contact-btn").click(function() {
                var firstname = $("input[name=firstname]").val(), lastname = $("input[name=lastname]").val(), email = $("input[name=email]").val(), message = $("textarea[name=message]").val(), data = {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    message: message
                };
                $.ajax({
                    url: VincentRagosta.options.apiUrl + "/contact/",
                    type: "post",
                    headers: {
                        "X-WP-Nonce": VincentRagosta.options.nonce
                    },
                    data: JSON.stringify(data),
                    dataType: "json"
                }).then(function(response) {
                    window.location.href = VincentRagosta.options.homeUrl + "/contact/";
                });
            });
        },
        init: function() {
            this.loadElements();
            this.setupMenuToggle();
            this.initInstagram();
            this.scrollListener();
            this.sendContactInformation();
        }
    };
    jQuery(document).ready(function() {
        vincentragosta.init();
    });
})(jQuery);