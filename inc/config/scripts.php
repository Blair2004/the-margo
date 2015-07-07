<?php
// Js include
$js_dir	=	opendir( get_template_directory() . '/js' );
while( FALSE !== ( $file = readdir( $js_dir ) ) )
{
	if( substr( $file , -2 ) == 'js' )
	{
		wp_enqueue_script( 'the-margo-' . $file , get_template_directory_uri() . '/js/' . $file , array(), '20120206', true );
	}
}
closedir( $js_dir );unset( $js_dir );

// CSS include
$css_dir	=	opendir( get_template_directory() . '/css' );
while( FALSE !== ( $file = readdir( $css_dir ) ) )
{
	if( substr( $file , -3 ) == 'css' )
	{
		wp_enqueue_style( 'the-margo-' . $file , get_template_directory_uri() . '/css/' . $file , array(), '20120206', 'screen' );
	}
}
closedir( $css_dir );unset( $css_dir );

wp_enqueue_style( 'the-margo-style', get_stylesheet_uri() );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
}
