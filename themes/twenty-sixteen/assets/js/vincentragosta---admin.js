/*! VincentRagosta - Twenty Sixteen - v0.1.0
 * https://vincentragosta.com
 * Copyright (c) 2016; * Licensed GPL-2.0+ */
'use strict';

( function( win ) {
	jQuery( document ).ready( function() {
		$ = jQuery;

		// TODO
		$( '.number-columns' ).on( 'change', function() {
			if ( this.value === '0' ) {
				$( '.vr-column' ).hide();
			} else if ( this.value === '1' ) {
				$( '.vr-column.one' ).show();
			} else if ( this.value === '2' ) {
				$( '.vr-column.one' ).show();
				$( '.vr-column.two' ).show();
			} else if ( this.value === '3' ) {
				$( '.vr-column.one' ).show();
				$( '.vr-column.two' ).show();
				$( '.vr-column.three' ).show();
			}
		} );
	} );
} )( this );
