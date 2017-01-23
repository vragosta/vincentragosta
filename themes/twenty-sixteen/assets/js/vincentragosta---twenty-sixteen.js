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
				$( this )
					.removeClass( 'visible' )
					.addClass( 'not-visible' );

				$( '#mobile-menu' )
					.removeClass( 'not-visible' )
					.addClass( 'visible' );
			});

			// Listener for close menu button.
			$( '.close-menu' ).click( function () {
				$( '.drop-down' )
					.removeClass( 'not-visible' )
					.addClass( 'visible' );

				$( '#mobile-menu' )
					.removeClass( 'visible' )
					.addClass( 'not-visible' );
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
