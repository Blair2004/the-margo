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
register_widget( 'margo_recents_posts_widget' );

// Register Widgets