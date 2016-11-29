/*! StoryCorps - Twenty Sixteen - v0.1.0
 * https://storycorps.org
 * Copyright (c) 2016; * Licensed GPL-2.0+ */
'use strict';

( function( win ) {
	jQuery( document ).ready( function() {
		$ = jQuery;
		$( 'button.drop-down' ).click( function() {
			$( this ).removeClass( 'fade-in' ).addClass( 'fade-out' );
			$( this ).siblings( 'button.close' ).removeClass( 'fade-out' ).addClass( 'fade-in' );
		});

		$( 'button.close' ).click( function () {
			$( this ).removeClass( 'fade-in' ).addClass( 'fade-out' );
			$( this ).siblings( 'button.drop-down' ).removeClass( 'fade-out' ).addClass( 'fade-in' );
		});
	} );
} )( this );
