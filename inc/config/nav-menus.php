<?php
// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => esc_html__( 'Header Menu', 'the-margo' ),
	'footer' => esc_html__( 'Footer (Small)', 'the-margo' ),
) );