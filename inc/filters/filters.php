<?php
/**
 * Filter For Comments Form
**/

add_filter( 'comment_form_default_fields' , 'the_margo_comment_form_fields' );

function the_margo_comment_form_fields( $fields )
{
	$fields[ 'author' ]	=	'<div class="row">
	<div class="col-md-4">
		<label for="author">' . __( 'Name' ) . '<span class="required">*</span></label>
		<input id="author" name="author" type="text" value="" size="30" aria-required="true">
	</div>';
	
	$fields[ 'email' ]	=	
	'<div class="col-md-4">
		<label for="author">' . __( 'Email' ) . '<span class="required">*</span></label>
		<input id="author" name="email" type="email" value="" size="30" aria-required="true">
	</div>';
	
	$fields[ 'url' ]	=	
	'<div class="col-md-4">
		<label for="author">' . __( 'Website' ) . '<span class="required">*</span></label>
		<input id="author" name="email" type="url" value="" size="30" aria-required="true">
	</div>
	</div>';
	
	return $fields;
}

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package the margo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function the_margo_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'the_margo_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function the_margo_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'the-margo' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'the_margo_wp_title', 10, 2 );

endif;

/** 
 * Create The Margo Panel
**/

add_filter( 'piklist_admin_pages' , 'the_margo_panel_page' );

function the_margo_panel_page( $pages )
{
	$pages[]	=	array(
		'page_title'			=>		__( 'About' , 'the-margo' ),
		'menu_title'			=>		__( 'The Margo Panel' , 'the-margo' ),
		'capability'			=>		'manage_options',
		'setting'				=>		'the_margo_home',
		'menu_slug'				=>		'the-margo-home',
		'save_text'				=>		__( 'Save Settings' , 'the-margo' )
	);
	
	$pages[]	=	array(
		'page_title'			=>		__( 'General Layout' , 'the-margo' ),
		'menu_title'			=>		__( 'General Layout' , 'the-margo' ),
		'capability'			=>		'manage_options',
		'setting'				=>		'the_margo_layout',
		'menu_slug'				=>		'the-margo-layout',
		'default_tab'			=>		'Pages',
		'save_text'				=>		__( 'Save Layout' , 'the-margo' ),
		'sub_menu'				=>		'the-margo-home'
	);
	
	return $pages;
}
