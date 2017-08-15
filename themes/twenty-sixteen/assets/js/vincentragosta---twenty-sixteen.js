/**
 * VincentRagosta - Twenty Sixteen - v0.1.0
 * https://vincentragosta.com
 * Copyright (c) 2016; * Licensed GPL-2.0+
 */
'use strict';

( function( $ ) {

	var vincentragosta = {

		/**
		 * When the dropdown button is clicked ( hamburger button ),
		 * toggle mobile menu with standard site menu.
		 *
		 * @since 0.1.0
		 * @uses removeClass(), addClass()
		 * @return void
		 */
		setupMenuToggle : function() {

			// Listener for drop down button.
			$( '.drop-down' ).click( function() {
				$( '.nav-container' )
					.hide();

				$( '#mobile-menu' )
					.fadeIn();
			});

			// Listener for close menu button.
			$( '.close-menu' ).click( function () {
				$( '.nav-container' )
					.show()

				$( '#mobile-menu' )
					.fadeOut();
			});

		},

		/**
		 * When the page is loaded, remove the class 'unloaded' from the menu.
		 *
		 * @since 0.1.0
		 * @uses removeClass(), addClass()
		 * @return void
		 */
		loadElements : function() {
			$( '.menu' ).removeClass( 'unloaded' );
			$( '#logo' ).removeClass( 'unloaded' );
		},

		/**
		 *
		 *
		 * @since 0.1.0
		 * @uses removeClass(), addClass()
		 * @return void
		 */
		initInstagram : function() {
			var template =
				'<div class="instagram-image col-xs-12 col-sm-6 col-md-4 col-lg-2">' +
					'<a href="{{image}}" data-rel="lightbox" title="{{caption}}">' +
						'<figure itemscope itemtype="http://schema.org/CreativeWork">' +
							'<meta itemprop="project-image" content="{{image}}" />' +
							'<div class="image normalize-image" style="background-image: url( \'{{image}}\' );"></div>' +
						'</figure>' +
					'</a>' +
				'</div>',

				feed = new Instafeed({
					get : 'user',
					userId : 4257019760,
					accessToken : VincentRagosta.options.accessToken,
					resolution : 'standard_resolution',
					target : 'instagram-feed',
					template : template,
					limit : 12
				});

				if ( $( '#instagram-feed' ).length ) {
					feed.run();
				}
		},

		/**
		 * On scroll of the doors template, add class visible if scroll from top is above 800px and less than 1400 from bottom of document.
		 *
		 * @since 0.1.0
		 * @uses  scroll(), scrollTop(), height(), addClass(), removeClass()
		 */
		scrollListener : function() {
			$( window ).scroll( function() {
				if ( $( window ).scrollTop() >= 800 && $( window ).scrollTop() < ( $( document ).height() - 1400 ) ) {
					$( '.arrow.top' ).addClass( 'visible' );
				} else {
					$( '.arrow.top' ).removeClass( 'visible' );
				}
			});
		},

		/**
		 * Sends contact information to contact endpoint for processing.
		 *
		 * @since 0.1.0
		 * @uses click(), val(), ajax(), stringify()
		 * @return void
		 */
		sendContactInformation : function() {
			$( '.contact-btn' ).click(function() {
				var firstname = $( 'input[name=firstname]' ).val(),
					lastname = $( 'input[name=lastname]' ).val(),
					email = $( 'input[name=email]' ).val(),
					message = $( 'textarea[name=message]' ).val(),
					data = {
						'firstname' : firstname,
						'lastname' : lastname,
						'email' : email,
						'message' : message
					};

				$.ajax( {
					url: VincentRagosta.options.apiUrl  + '/contact/',
					type: 'post',
					headers: {
						'X-WP-Nonce': VincentRagosta.options.nonce
					},
					data: JSON.stringify( data ),
					dataType: 'json',
				} ).then(function( response ) {
					window.location.href = VincentRagosta.options.homeUrl + '/contact/';
				} );
			});
		},

		/**
		 * VincentRagosta class initializer.
		 *
		 * @since 0.1.0
		 * @uses menuFadeIn(), setupMenuToggle()
		 * @return void
		 */
		init: function() {
			this.loadElements();
			this.setupMenuToggle();
			this.initInstagram();
			this.scrollListener();
			this.sendContactInformation();
		}
	};

	jQuery( document ).ready( function() {

		// Initialize the vincentragosta class.
		vincentragosta.init();

	} );
} )( jQuery );
