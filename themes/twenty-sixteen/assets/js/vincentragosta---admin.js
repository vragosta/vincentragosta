/*! VincentRagosta - Twenty Sixteen - v0.1.0
 * https://vincentragosta.com
 * Copyright (c) 2016; * Licensed GPL-2.0+ */
'use strict';

// TODO Move to text column plugin && make this an object
( function( $ ) {
	jQuery( document ).ready( function() {

		// Define global variables
		var numberColumns = $( '.number-columns' );

		textColumnWidget( numberColumns );

	} );

	/**
	 * Toggle widget display based on 'Columns To Display' select box option.
	 *
	 * @since 0.1.0
	 * @uses on()
	 * @return void
	 */
	function textColumnWidget( element ) {
		element.on( 'change', function() {

			// Define local variables.
			var column = $( '.column' ),

			// Column One
			columnOne = $( '.column.one' ),
			columnOneTitle = $( '.column.one input' ),
			columnOneIcon = $( '.column.one select' ),
			columnOneContent = $( '.column.one textarea' ),

			// Column Two
			columnTwo = $( '.column.two' ),
			columnTwoTitle = $( '.column.two input' ),
			columnTwoIcon = $( '.column.two select' ),
			columnTwoContent = $( '.column.two textarea' ),

			// Column Three
			columnThree = $( '.column.three' ),
			columnThreeTitle = $( '.column.three input' ),
			columnThreeIcon = $( '.column.three select' ),
			columnThreeContent = $( '.column.three textarea' );

			// Adjust display of widget based on column value.
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
	};
} )( jQuery );
