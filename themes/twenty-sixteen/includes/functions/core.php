<?php
/**
 * This file contains the necessary theme configuration functions.
 *
 * @package VincentRagosta - Twenty Sixteen
 * @since   0.1.0
 */

// namespace vincentragosta_com\Twenty_Sixteen\Core;
namespace VincentRagosta\TwentySixteen\Core;

/**
 * Allows use of multiple post thumbnails plugin in this file
 * NOTE: needed when dealing with namespaces.
 */
use \MultiPostThumbnails;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @since  0.1.0
 * @uses   add_action()
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme',     $n( 'vincentragosta_setup' ) );
	add_action( 'wp_enqueue_scripts',    $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts',    $n( 'styles' ) );
	add_action( 'admin_enqueue_scripts', $n( 'admin_styles' ) );
	add_action( 'admin_enqueue_scripts', $n( 'admin_scripts' ) );
	add_action( 'widgets_init',          $n( 'sidebars' ) );
	add_action( 'widgets_init',          $n( 'widgets' ) );
}

/**
 * Declare theme support.
 *
 * @since  0.1.0
 * @uses   add_theme_support(), set_post_thumbnail_size(), add_image_size(), and add_post_type_support(), show_admin_bar()
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

	// TODO is this necessary?
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

	// If set to 'false', the admin bar will not display on front end.
	show_admin_bar( false );

	// Add additional images to any post type.
	if ( class_exists( 'MultiPostThumbnails' ) ) {

		new MultiPostThumbnails( array(
			'label'     => __( 'Cover Image', 'vincentragosta_com' ),
			'id'        => 'cover-image',
			'post_type' => 'project'
		) );

	}

}

/**
 * Enqueue scripts for front-end.
 *
 * @since  0.1.0
 * @uses   wp_register_script(), p_enqueue_script(), wp_localize_script()
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

	wp_localize_script(
		'vincentragosta_com',
		'VincentRagosta', [
			'themeUrl' => VINCENTRAGOSTA_COM_TEMPLATE_URL,
			'options'  => [
				'apiUrl'  => home_url( '/wp-json/v1' ),
				'homeUrl' => home_url(),
				'nonce'   => wp_create_nonce( 'wp_rest' ),
			]
		]
	);
}

/**
 * Enqueue styles for front-end.
 *
 * @since  0.1.0
 * @uses   wp_register_style(), wp_enqueue_style()
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
		'ionicons',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/lib/ionicons/css/ionicons.min.css",
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

	wp_register_style(
		'helpers',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---helpers.css",
		array(),
		VINCENTRAGOSTA_COM_VERSION
	);

	wp_register_style(
		'core-components',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---core-components.css",
		array(),
		VINCENTRAGOSTA_COM_VERSION
	);

	wp_register_style(
		'menus',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---menus.css",
		array(),
		VINCENTRAGOSTA_COM_VERSION
	);

	wp_register_style(
		'header',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---header.css",
		array(),
		VINCENTRAGOSTA_COM_VERSION
	);

	wp_register_style(
		'footer',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---footer.css",
		array(),
		VINCENTRAGOSTA_COM_VERSION
	);

	wp_register_style(
		'sidebars',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---sidebars.css",
		array(),
		VINCENTRAGOSTA_COM_VERSION
	);

	wp_register_style(
		'widgets',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---widgets.css",
		array(),
		VINCENTRAGOSTA_COM_VERSION
	);

	// Enqueue the single styles if on the single template.
	if ( is_single() ) :
		wp_enqueue_style(
			'single',
			VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---single.css",
			array(),
			VINCENTRAGOSTA_COM_VERSION
		);
	endif;

	// Enqueue the archive styles if on the archive template ( portfolio page ).
	if ( is_page( 'portfolio' ) || is_home() ) :
		wp_enqueue_style(
			'archive',
			VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---archive.css",
			array(),
			VINCENTRAGOSTA_COM_VERSION
		);
	endif;

	if ( is_page( 'contact' ) ) {
		wp_enqueue_style(
			'contact',
			VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---contact.css",
			array(),
			VINCENTRAGOSTA_COM_VERSION
		);
	}

	// if ( is_page( 'about' ) ) {
	// 	wp_enqueue_style(
	// 		'about',
	// 		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---about.css",
	// 		array(),
	// 		VINCENTRAGOSTA_COM_VERSION
	// 	);
	// }

	wp_enqueue_style(
		'vincentragosta_com',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---twenty-sixteen.css",
		array( 'bootstrap', 'fontawesome', 'ionicons', 'sanitize', 'helpers', 'core-components', 'menus', 'header', 'footer', 'sidebars' ),
		VINCENTRAGOSTA_COM_VERSION
	);
}

/**
 * Allows for custom CSS in wp-admin.
 *
 * @since  0.1.0
 * @uses   wp_enqueue_style()
 * @return void
 */
function admin_styles() {
	wp_enqueue_style(
		'admin',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/css/vincentragosta---admin.css",
		array(),
		VINCENTRAGOSTA_VERSION
	);
}

/**
 * Allows for custom javascript in wp-admin.
 *
 * @since  0.1.0
 * @uses   wp_enqueue_script()
 * @return void
 */
function admin_scripts() {
	wp_enqueue_script(
		'admin',
		VINCENTRAGOSTA_COM_TEMPLATE_URL . "/assets/js/vincentragosta---admin.js",
		array( 'jquery' ),
		VINCENTRAGOSTA_VERSION,
		true
	);
}

/**
 * Register sidebars for back-end.
 *
 * @since  0.1.0
 * @uses   __(), register_sidebar()
 * @return void
 */
function sidebars() {
	$cta_front_page_a = array(
		'name'          => __( 'Call To Action A ( Front Page )', 'theme_text_domain' ),
		'id'            => 'cta-front-page-a',
		'description'   => 'Call To Action sidebar on the frontpage.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$cta_front_page_b = array(
		'name'          => __( 'Call To Action B ( Front Page )', 'theme_text_domain' ),
		'id'            => 'cta-front-page-b',
		'description'   => 'Call To Action sidebar on the frontpage.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$cta_front_page_c = array(
		'name'          => __( 'Call To Action C ( Front Page )', 'theme_text_domain' ),
		'id'            => 'cta-front-page-c',
		'description'   => 'Call To Action sidebar on the frontpage.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$cta_front_page_d = array(
		'name'          => __( 'Call To Action D ( Front Page )', 'theme_text_domain' ),
		'id'            => 'cta-front-page-d',
		'description'   => 'Call To Action sidebar on the frontpage.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$cta_front_page_e = array(
		'name'          => __( 'Call To Action E ( Front Page )', 'theme_text_domain' ),
		'id'            => 'cta-front-page-e',
		'description'   => 'Call To Action sidebar on the frontpage.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$cta_front_page_f = array(
		'name'          => __( 'Call To Action F ( Front Page )', 'theme_text_domain' ),
		'id'            => 'cta-front-page-f',
		'description'   => 'Call To Action sidebar on the frontpage.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$cta_about_a = array(
		'name'          => __( 'Call To Action A ( About Page )', 'theme_text_domain' ),
		'id'            => 'cta-about-page-a',
		'description'   => 'Call To Action sidebar on the about page.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$cta_about_b = array(
		'name'          => __( 'Call To Action B ( About Page )', 'theme_text_domain' ),
		'id'            => 'cta-about-page-b',
		'description'   => 'Call To Action sidebar on the about page.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$cta_about_c = array(
		'name'          => __( 'Call To Action C ( About Page )', 'theme_text_domain' ),
		'id'            => 'cta-about-page-c',
		'description'   => 'Call To Action sidebar on the about page.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$cta_about_d = array(
		'name'          => __( 'Call To Action D ( About Page )', 'theme_text_domain' ),
		'id'            => 'cta-about-page-d',
		'description'   => 'Call To Action sidebar on the about page.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$cta_single = array(
		'name'          => __( 'Call To Action ( Single Template )', 'theme_text_domain' ),
		'id'            => 'cta-single',
		'description'   => 'Call To Action sidebar that displays below header on single template.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	$pre_footer = array(
		'name'          => __( 'Pre Footer', 'theme_text_domain' ),
		'id'            => 'pre-footer',
		'description'   => 'Call To Action sidebar that site above the footer.',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	);

	register_sidebar( $cta_front_page_a );
	register_sidebar( $cta_front_page_b );
	register_sidebar( $cta_front_page_c );
	register_sidebar( $cta_front_page_d );
	register_sidebar( $cta_front_page_e );
	register_sidebar( $cta_front_page_f );
	register_sidebar( $cta_about_a );
	register_sidebar( $cta_about_b );
	register_sidebar( $cta_about_c );
	register_sidebar( $cta_about_d );
	register_sidebar( $cta_single );
	register_sidebar( $pre_footer );
}

/**
 * Register custom widgets for back-end.
 *
 * @since  0.1.0
 * @uses   register_widget()
 * @return void
 */
function widgets() {
	register_widget( 'Notification_Widget' );
	register_widget( 'Text_Column_Widget' );
}
