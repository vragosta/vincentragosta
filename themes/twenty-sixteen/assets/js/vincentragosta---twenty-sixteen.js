/*! VincentRagosta - Twenty Sixteen - v0.1.0
 * https://vincentragosta.com
 * Copyright (c) 2016; * Licensed GPL-2.0+ */
'use strict';

( function( win ) {
	jQuery( document ).ready( function() {
		// TODO
		$ = jQuery;

		// TODO
		$( '.drop-down' ).click( function() {
			$( this ).removeClass( 'visible' ).addClass( 'not-visible' );
			$( '#mobile-menu' ).removeClass( 'not-visible' ).addClass( 'visible' );
		});

		// TODO
		$( '.close-menu' ).click( function () {
			$( '.drop-down' ).removeClass( 'not-visible' ).addClass( 'visible' );
			$( '#mobile-menu' ).removeClass( 'visible' ).addClass( 'not-visible' );
		});

	} );
} )( this );
