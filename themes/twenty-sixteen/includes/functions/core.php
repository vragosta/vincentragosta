<?php
namespace vincentragosta_com\Twenty_Sixteen\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @since 0.1.0
 *
 * @uses add_action()
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme',  $n( 'vincentragosta_setup' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts'              ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles'               ) );
}

/**
 * Declare theme support.
 *
 * @uses add_theme_support(), set_post_thumbnail_size(), add_image_size(), and add_post_type_support() to set theme options.
 *
 * @since 0.1.0
 *
 * @return void
 */
function vincentragosta_setup() {
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add excerpt support to...
	add_post_type_support( 'page', 'excerpt' );
}

/**
 * Enqueue scripts for front-end.
 *
 * @uses wp_enqueue_script() to load front end scripts.
 *
 * @since 0.1.0
 *
 * @return void
 */
function scripts() {
	wp_register_script(
		'bootstrap',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/lib/bootstrap/dist/js/bootstrap.min.js",
		array( 'jquery' ),
		VINCENTRAGOSTA_COM_VERSION,
		true
	);

	wp_enqueue_script(
		'vincentragosta_com',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/js/vincentragosta---twenty-sixteen.js",
		array( 'jquery', 'bootstrap' ),
		VINCENTRAGOSTA_COM_VERSION,
		true
	);

	wp_localize_script( 'vincentragosta_com', 'themeUrl', VINCENTRAGOSTA_COM_TEMPLATE_URL );
}

/**
 * Enqueue styles for front-end.
 *
 * @uses wp_enqueue_style() to load front end styles.
 *
 * @since 0.1.0
 *
 * @return void
 */
function styles() {
	wp_register_style(
		'fontawesome',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/lib/fontawesome/css/font-awesome.min.css",
		array(),
		VINCENTRAGOSTA_COM_VERSION
	);

	wp_register_style(
		'bootstrap',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/lib/bootstrap/dist/css/bootstrap.min.css",
		array( 'fontawesome' ),
		VINCENTRAGOSTA_COM_VERSION
	);

	wp_register_style(
		'sanitize',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/lib/sanitize/sanitize.min.css",
		array(),
		VINCENTRAGOSTA_COM_VERSION
	);

	wp_enqueue_style(
		'vincentragosta_com',
		VINCENTRAGOSTA_COM_URL . "/assets/css/vincentragosta---twenty-sixteen.css",
		array( 'bootstrap', 'fontawesome', 'sanitize' ),
		VINCENTRAGOSTA_COM_VERSION
	);
}