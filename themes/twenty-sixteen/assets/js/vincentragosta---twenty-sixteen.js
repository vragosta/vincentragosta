/*! StoryCorps - Twenty Sixteen - v0.1.0
 * https://storycorps.org
 * Copyright (c) 2016; * Licensed GPL-2.0+ */
'use strict';

( function( win ) {
	var storycorps = {
		getDocHeight: function() {
			return Math.max(
				jQuery( document ).height(),
				jQuery( window ).height(),

				// For opera
				document.documentElement.clientHeight
			);
		},
		cacheElements: function() {
			this.body = document.body;
			this.main = this.body.querySelector( 'main' );
			this.header = this.body.querySelector( '#fixed' );
			this.menuIcon = this.header.querySelector( '.navbar-toggle' );
			this.closeMenuLink = this.header.querySelector( '.close' );
			this.mobileSearchIcon = this.header.querySelector( 'a.search-icon' );
			this.searchIcon = this.header.querySelector( '.search-icon a' );
			this.searchBar = this.header.querySelector( '.navbar-form input[type=text]' );
			this.sidebar = this.main.querySelector( '.sidebar' );
			this.showFilters = this.main.querySelector( '.show-filters' );
		},
		cacheDimensions: function() {
			if ( this.sidebar ) {
				this.sidebarOffset = jQuery( this.sidebar.parentElement ).offset().top;
				this.sidebarHeight = this.sidebar.clientHeight;
			}

			if ( this.main ) {
				this.mainOffsetBottom = this.main.clientHeight;
			}
		},
		setupSidebar: function( selector ) {
			var anchors = this.main.querySelectorAll( selector ),
				anchor,
				i,
				ul,
				li,
				a;

			// If there are no content anchors to link to, just hide the sidebar
			if ( anchors.length === 0 ) {
				if ( this.sidebar.textContent === '' ) {
					this.sidebar.classList.add( 'hidden' );
				}
				return false;
			}

			ul = document.createElement( 'ul' );

			for ( i = 0; i < anchors.length; i++ ) {
				anchor = anchors[i];
				li = document.createElement( 'li' );
				a = document.createElement( 'a' );

				a.href = '#' + anchor.id;
				a.textContent = anchor.textContent;

				li.appendChild( a );
				ul.appendChild( li );
			}

			this.sidebar.appendChild( ul );
		},
		handleSidebar: function( currentPos ) {
			if ( !currentPos ) {
				currentPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
				return false;
			}

			if ( !this.mainOffsetBottom || !this.sidebarOffset || !this.sidebarHeight ) {
				this.cacheDimensions();
			}

			if ( currentPos > this.sidebarOffset - 200 ) {
				this.sidebar.classList.add( 'fixed' );

				if ( currentPos >= this.mainOffsetBottom - this.sidebarHeight ) {
					this.sidebar.classList.add( 'bottom' );
				} else {
					this.sidebar.classList.remove( 'bottom' );
				}
			} else {
				this.sidebar.classList.remove( 'fixed' );
				this.sidebar.classList.remove( 'bottom' );
			}
		},
		scrollToAnchor: function( target, offset ) {
			var $target = jQuery( target.getAttribute( 'href' ) );

			jQuery( 'html, body' ).stop().animate( {
				'scrollTop': $target.offset().top - offset
			} );
		},
		handleAnchorClick: function( e ) {
			if ( e.currentTarget.getAttribute( 'href' ).length > 1 && !e.currentTarget.classList.contains( 'more-link' ) ) {
				e.preventDefault();

				if ( e.target.tagName.toLowerCase() === 'a' ) {
					this.scrollToAnchor( e.currentTarget, 150 );
				}
			}
		},
		handleScroll: function() {
			var currentPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;

			// Set initial scroll position and do not fire scroll event on page load
			if ( typeof this.scrolledPosition === undefined ) {
				this.scrolledPosition = 0;
				return false;
			}

			// Add a shadow when scrolling down
			if ( currentPos > 0 ) {
				this.header.classList.add( 'shadow' );
			} else {
				this.header.classList.remove( 'shadow' );
			}

			// Shrink header when scrolling down
			if ( currentPos > 100 && currentPos > this.scrolledPosition ) {
				this.header.classList.add( 'mini' );
			} else {
				this.header.classList.remove( 'mini' );
			}

			// Handle sticky sidebar
			if ( this.sidebar ) {
				this.handleSidebar( currentPos );
			}

			// Cache scroll position
			this.scrolledPosition = currentPos;
		},
		toggleFilters: function( e ) {
			var chevron = e.currentTarget.querySelector( 'i' );

			chevron.classList.toggle( 'fa-chevron-down' );
			chevron.classList.toggle( 'fa-chevron-up' );
		},
		toggleMenu: function( e ) {
			e.preventDefault();
			this.body.classList.toggle( 'menu' );

			if ( e.currentTarget.tagName.toLowerCase() === 'a' ) {
				this.searchBar.focus();
			}
		},
		closeMenu: function( e ) {
			e.preventDefault();

			this.body.classList.remove( 'menu' );
		},
		toggleSearch: function( e ) {
			e.preventDefault();

			console.log( e.currentTarget.firstElementChild );

			e.currentTarget.firstElementChild.classList.toggle( 'fa-times' );
			this.header.classList.toggle( 'search' );
			this.searchBar.focus();
		},
		mainClick: function() {
			this.header.classList.remove( 'mini' );
		},
		init: function() {
			var i;

			// Cache elements used by this script to reduce DOM queries
			this.cacheElements();

			// Toggle show/hide mobile menu
			this.menuIcon.addEventListener( 'click', this.toggleMenu.bind( this ) );

			this.mobileSearchIcon.addEventListener( 'click', this.toggleMenu.bind( this ) );

			// Hide mobile menu
			this.closeMenuLink.addEventListener( 'click', this.closeMenu.bind( this ) );

			// Toggle navbar search input
			this.searchIcon.addEventListener( 'click', this.toggleSearch.bind( this ) );

			// bring mobile menu bar back when tapping on screen
			this.main.addEventListener( 'click', this.mainClick.bind( this ) );

			// Scroll handlers
			win.addEventListener( 'scroll', this.handleScroll.bind( this ) );

			// Page sidebar
			if ( this.sidebar ) {

				// Set up sidebar with desired anchor elements
				this.setupSidebar( '.content h3[id]' );

				win.addEventListener( 'resize', this.cacheDimensions.bind( this ) );
			}

			this.anchorLinks = this.main.querySelectorAll( 'a[href^="#"]' );

			// Anchor links
			for ( i = 0; i < this.anchorLinks.length; i++ ) {
				this.anchorLinks[i].addEventListener( 'click', this.handleAnchorClick.bind( this ) );
			}

			// Search page filters
			if ( this.showFilters ) {
				this.showFilters.addEventListener( 'click', this.toggleFilters.bind( this ) );
			}
		}
	};

	jQuery( document ).ready( function() {
		storycorps.init();
	} );
} )( this );
