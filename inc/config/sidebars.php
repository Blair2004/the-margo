<?php
/**
* Register widget area.
*
* @link http://codex.wordpress.org/Function_Reference/register_sidebar
*/

// Left Right SideBar
register_sidebar( array(
	'name'          => esc_html__( 'Left Sidebar', 'the-margo' ),
	'id'            => 'left-sidebar',
	'description'   => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '<span class="head-line"></span></h4>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Right Sidebar', 'the-margo' ),
	'id'            => 'right-sidebar',
	'description'   => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '<span class="head-line"></span></h4>',
) );
// Footer SideBar
register_sidebar( array(
	'name'          => esc_html__( 'Footer Sidebar A', 'the-margo' ),
	'id'            => 'footer-sidebar-A',
	'description'   => '',
	'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Sidebar B', 'the-margo' ),
	'id'            => 'footer-sidebar-B',
	'description'   => '',
	'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Sidebar C', 'the-margo' ),
	'id'            => 'footer-sidebar-C',
	'description'   => '',
	'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Sidebar D', 'the-margo' ),
	'id'            => 'footer-sidebar-D',
	'description'   => '',
	'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>',
) );

// Unregister default widgets
unregister_widget( 'WP_Widget_Recent_Posts' );
unregister_widget( 'WP_Widget_Categories' );
unregister_widget( 'WP_Widget_Pages' );
unregister_widget( 'WP_Widget_Calendar' );
unregister_widget( 'WP_Widget_Search' );
unregister_widget( 'WP_Widget_Recent_Comments' );
unregister_widget( 'WP_Widget_Meta' );

// Register Widgets
register_widget( 'margo_recents_posts_widget' );
register_widget( 'margo_categories_widget' );
register_widget( 'margo_pages_widget' );
register_widget( 'margo_search_widget' );
register_widget( 'margo_calendar_widget' );
register_widget( 'margo_comments_widget' );
register_widget( 'margo_meta_widget' );