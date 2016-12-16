/*! VincentRagosta - Twenty Sixteen - v0.1.0
 * https://vincentragosta.com
 * Copyright (c) 2016; * Licensed GPL-2.0+ */
'use strict';

( function( win ) {
	jQuery( document ).ready( function() {
		// TODO
		$ = jQuery;

		// TODO
		$( 'button.drop-down' ).click( function() {
			$( this ).removeClass( 'fade-in' ).addClass( 'fade-out' );
			$( '#mobile-menu' ).removeClass( 'fade-out' ).addClass( 'fade-in' );
		});

		// TODO
		$( 'button.close-menu' ).click( function () {
			$( 'button.drop-down' ).removeClass( 'fade-out' ).addClass( 'fade-in' );
			$( '#mobile-menu' ).removeClass( 'fade-in' ).addClass( 'fade-out' );
		});

	} );
} )( this );
