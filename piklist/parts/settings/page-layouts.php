<?php
/*
Title: Pages Layout
Setting: the_margo_layout
*/


piklist( 'field' , array(
	'type'				=>	'select',
	'field'				=>	'page_sidebar',
	'label'				=>	__( 'Displays Sidebar' , 'the-margo' ),
	'description'		=>	__( 'This setting can be overrided on each pages.' , 'the-margo' ),
	'help'				=>	__( 'Default setting for pages is set to "sidebar left"' , 'the-margo' ),
	'choices'			=>	array(
		'sidebar_left'		=>	__( 'Sidebar Left' , 'the-margo' ),
		'sidebar_right'	=>	__( 'Sidebar Right' , 'the-margo' ),
		'no_sidebar'		=>	__( 'No Sidebar' , 'the-margo' ),
	) 
) );

piklist( 'field' , array(
	'type'				=>	'select',
	'field'				=>	'page_layout',
	'label'				=>	__( 'Layout for pages' , 'the-margo' ),
	'description'		=>	__( 'This setting can be overrided on each pages.' , 'the-margo' ),
	'help'				=>	__( 'Default setting for pages is set to "full width"' , 'the-margo' ),
	'choices'			=>	array(
		'boxed'			=>	__( 'Boxed' , 'the-margo' ),
		'full_width'	=>	__( 'Full width' , 'the-margo' )
	) 
) );
