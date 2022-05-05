<?php
/**
 * RITZ functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage RITZ
 * @since RITZ 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since RITZ 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}


if ( ! function_exists( 'ritz_setup' ) ) :

	function ritz_setup() {

		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on ritz, use a find and replace
         * to change 'ritz' to the name of your theme in all the template files
         */
		load_theme_textdomain( 'ritz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
		add_theme_support( 'title-tag' );

		/*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, true );



		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
		) );

		add_theme_support( 'custom-header', apply_filters( 'ritz_custom_header_args', array(
			'width' => 954,
			'height' => 1300,
		) ) );


		$gallery_thumbnail = get_gallery_thumbnail_size();
		add_image_size( 'team_thumbnail', 141, 154, true );
		add_image_size( 'gallery_thumbnail', $gallery_thumbnail['width'], $gallery_thumbnail['height'], true );
	}
endif; // ritz_setup
add_action( 'after_setup_theme', 'ritz_setup' );

function get_gallery_thumbnail_size() {
	return array(
		'width' => 871,
		'height' => 565
	);
}


function ritz_init() {

	ritz_register_post_types();



	if ( class_exists( 'MultiPostThumbnails' ) ) {
		new MultiPostThumbnails(
			array(
				'label' => 'List thumbnail',
				'id' => 'list-thumbnail',
				'post_type' => 'team'
			)
		);

		$post_id = 0;
		if ( isset( $_GET['post'] ) ) {
			$post_id = absint( $_GET['post'] );
		}

	}
}

add_action('init', 'ritz_init');



add_action( 'wp_print_styles', 'ritz_deregister_styles', 100 );
function ritz_deregister_styles()    {
	wp_deregister_style( 'wp-emoji-release' );
}
