/*! StoryCorps - Twenty Sixteen - v0.1.0
 * https://storycorps.org
 * Copyright (c) 2016; * Licensed GPL-2.0+ */
'use strict';

( function( win ) {
	jQuery( document ).ready( function() {
		$ = jQuery;
		$( '#drop-menu button' ).click( function() {
			$( this ).removeClass( 'fade-in' ).addClass( 'fade-out' );
			$( this ).siblings( 'i' ).removeClass( 'fade-out' ).addClass( 'fade-in' );
		});

		$( '#drop-menu i' ).click( function () {
			$( this ).removeClass( 'fade-in' ).addClass( 'fade-out' );
			$( this ).siblings( 'button' ).removeClass( 'fade-out' ).addClass( 'fade-in' );
		});
		// $( '#drop-menu' ).click( function() {
		// 	console.log( $( this ).data( 'toggle' ) );
		// 	if ( $( this ).find( ':first-child' ).data( 'toggle' ) ) {
		// 		console.log( 'true' );
		// 		$( this ).find( 'button' ).addClass( 'fade-out' );
		// 		$( this ).find( 'i' ).addClass( 'fade-in' );
		// 	} else {
		// 		console.log( 'false' );
				// $( this ).find( 'button' ).addClass( 'fade-in' );
				// $( this ).find( 'i' ).addClass( 'fade-out' );
		// 	}
		// });
	} );
} )( this );
