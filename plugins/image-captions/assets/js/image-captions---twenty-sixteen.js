/**
 * Image Captions - Twenty Sixteen - v0.1.0
 * https://vincentragosta.com
 * Copyright (c) 2016; * Licensed GPL-2.0+
 */
 'use strict';

( function( $ ) {

  // TODO
	var imagecaptions = {

		/**
		 * When page is loaded, remove the class 'unloaded' from the sub-header and header elements.
		 *
		 * @since  0.1.0
		 * @uses   removeClass()
		 * @return void
		 */
		loadElements : function() {
			$( '.sub-header' )
				.removeClass( 'unloaded' );

			$( '.header' )
				.removeClass( 'unloaded' );
		},

		/**
		 * VincentRagosta class initializer.
		 *
		 * @since  0.1.0
		 * @uses   loadElements()
		 * @return void
		 */
		init : function() {
			this.loadElements();
		}
	};

  // TODO
	jQuery( document ).ready( function() {

		// Initialize the vincentragosta class.
		imagecaptions.init();

	} );

} )( jQuery );
