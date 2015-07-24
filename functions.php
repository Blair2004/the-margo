<?php
/**
* the margo functions and definitions
*
* @package the margo
*/
 
define('HEADER_IMAGE_WIDTH', 114);
define('HEADER_IMAGE_HEIGHT', 23);


class the_margo
{
	function __construct()
	{
		add_action( 'after_setup_theme' , array( $this , 'after_setup_theme' ) );
		add_action( 'widgets_init' , array( $this , 'widgets_init' ) );
		add_action( 'wp_enqueue_scripts' , array( $this , 'scripts' ) );
	}
	
	function after_setup_theme()
	{
		include_once( dirname( __FILE__ ) . '/inc/config/add-supports.php' );
		include_once( dirname( __FILE__ ) . '/inc/config/nav-menus.php' );
	}
	function widgets_init()
	{
		include_once( dirname( __FILE__ ) . '/inc/config/sidebars.php' );
	}
	
	function scripts()
	{
		include_once( dirname( __FILE__ ) . '/inc/config/scripts.php' );
	}
}

new the_margo;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Load Walke Class

require get_template_directory() . '/inc/menu-walker.php';

// Load Comment Walker

require get_template_directory() . '/inc/comment-walker.php';

// include fiters

require get_template_directory() . '/inc/filters/filters.php';

// Include Widget Classes

require get_template_directory() . '/inc/widgets/widget.calendar.php';
require get_template_directory() . '/inc/widgets/widget.recents-posts.php';
require get_template_directory() . '/inc/widgets/widget.categories.php';
require get_template_directory() . '/inc/widgets/widget.pages.php';
require get_template_directory() . '/inc/widgets/widget.search.php';
require get_template_directory() . '/inc/widgets/widget.comments.php';
require get_template_directory() . '/inc/widgets/widget.meta.php';
