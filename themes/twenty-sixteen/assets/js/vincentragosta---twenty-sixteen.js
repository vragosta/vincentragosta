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
		 * @since  0.1.0
		 * @uses   removeClass(), addClass()
		 * @return void
		 */
		setupMenuToggle : function() {

			// Listener for drop down button.
			$( '.drop-down' ).click( function() {
				$( '#mobile-menu' )
					.addClass( 'visible' );
			});

			// Listener for close menu button.
			$( '.close-menu' ).click( function () {
				$( '#mobile-menu' )
					.removeClass( 'visible' );
			});

		},

		/**
		 * When the page is loaded, remove the class 'unloaded' from the menu.
		 *
		 * @since  0.1.0
		 * @uses   removeClass(), addClass()
		 * @return void
		 */
		menuFadeIn : function() {
			$( '.menu' ).removeClass( 'unloaded' );
		},

		/**
		 * VincentRagosta class initializer.
		 *
		 * @since  0.1.0
		 * @uses   menuFadeIn(), setupMenuToggle()
		 * @return void
		 */
		init: function() {
			this.menuFadeIn();
			this.setupMenuToggle();
		}
	};


	jQuery( document ).ready( function() {

		// Initialize the vincentragosta class.
		vincentragosta.init();

	} );
} )( jQuery );
