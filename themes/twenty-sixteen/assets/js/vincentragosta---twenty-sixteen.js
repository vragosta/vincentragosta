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
		 * VincentRagosta class initializer.
		 *
		 * @since 0.1.0
		 * @uses menuFadeIn(), setupMenuToggle()
		 * @return void
		 */
		init: function() {
			this.loadElements();
			this.setupMenuToggle();
		}
	};

	jQuery( document ).ready( function() {

		// Initialize the vincentragosta class.
		vincentragosta.init();

		/**
	 * Sends contact information to contact endpoint for processing.
	 */
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

	} );
} )( jQuery );
