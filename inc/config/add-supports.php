<?php
load_theme_textdomain( 'the-margo', get_template_directory() . '/languages' );

/*
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

/*
 * Enable support for Post Formats.
 * See http://codex.wordpress.org/Post_Formats
 */
add_theme_support( 'post-formats', array(
	//'aside',
	'image',
	'video',
	'quote',
	//'link',
) );

// Set up the WordPress core custom background feature.
add_theme_support( 'custom-background', apply_filters( 'the_margo_custom_background_args', array(
	'default-color' => 'ffffff',
	'default-image' => '',
) ) );

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
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */
add_theme_support( 'post-thumbnails' );

/**
	Add custom sizes for post thumbnails
**/

add_image_size( 'blog-posts-no-sidebar', 1140, 477, true );
add_image_size( 'blog-posts', 848, 477, true ); // (cropped)
add_image_size( 'widget-thumb', 65, 65, true ); // (cropped)