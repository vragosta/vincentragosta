/*! VincentRagosta - Twenty Sixteen - v0.1.0
 * https://vincentragosta.com
 * Copyright (c) 2016; * Licensed GPL-2.0+ */
'use strict';

( function( win ) {
	jQuery( document ).ready( function() {
		$ = jQuery;

		// TODO
		var numberColumns = $( '.number-columns' );

		// TODO
		numberColumns.on( 'change', function() {

			// TODO
			var column = $( '.vr-column' ),

			// TODO
			columnOne        = $( '.vr-column.one' ),
			columnOneTitle   = $( '.vr-column.one input' ),
			columnOneIcon    = $( '.vr-column.one select' ),
			columnOneContent = $( '.vr-column.one textarea' ),

			// TODO
			columnTwo        = $( '.vr-column.two' ),
			columnTwoTitle   = $( '.vr-column.two input' ),
			columnTwoIcon    = $( '.vr-column.two select' ),
			columnTwoContent = $( '.vr-column.two textarea' ),

			// TODO
			columnThree        = $( '.vr-column.three' ),
			columnThreeTitle   = $( '.vr-column.three input' ),
			columnThreeIcon    = $( '.vr-column.three select' ),
			columnThreeContent = $( '.vr-column.three textarea' );

			// TODO
			if ( this.value === '0' ) {
				column.hide();

				columnOneTitle.val( '' );
				columnOneIcon.val( '' );
				columnOneContent.val( '' );

				columnTwoTitle.val( '' );
				columnTwoIcon.val( '' );
				columnTwoContent.val( '' );

				columnThreeTitle.val( '' );
				columnThreeIcon.val( '' );
				columnThreeContent.val( '' );

			} else if ( this.value === '1' ) {
				columnOne.show();

				columnTwo.hide();
				columnTwoTitle.val( '' );
				columnTwoIcon.val( '' );
				columnTwoContent.val( '' );

				columnThree.hide();
				columnThreeTitle.val( '' );
				columnThreeIcon.val( '' );
				columnThreeContent.val( '' );

			} else if ( this.value === '2' ) {
				columnOne.show();
				columnTwo.show();

				columnThree.hide();
				columnThreeTitle.val( '' );
				columnThreeIcon.val( '' );
				columnThreeContent.val( '' );
			} else if ( this.value === '3' ) {
				columnOne.show();
				columnTwo.show();
				columnThree.show();
			}
		} );
	} );
} )( this );
