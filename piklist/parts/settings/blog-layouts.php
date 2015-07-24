<?php
/*
Title: Blog Layout
Setting: the_margo_layout
Tab: Blog
*/


piklist( 'field' , array(
	'type'				=>	'select',
	'field'				=>	'blog_sidebar',
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
	'field'				=>	'blog_layout',
	'label'				=>	__( 'Layout for pages' , 'the-margo' ),
	'description'		=>	__( 'This setting can be overrided on each pages.' , 'the-margo' ),
	'help'				=>	__( 'Default setting for pages is set to "full width"' , 'the-margo' ),
	'choices'			=>	array(
		'boxed'			=>	__( 'Boxed' , 'the-margo' ),
		'full_width'	=>	__( 'Full width' , 'the-margo' )
	) 
) );

piklist( 'field' , array(
	'type'				=>	'radio',
	'field'				=>	'blog_pattern',
	'label'				=>	__( 'Background Pattern' , 'the-margo' ),
	'description'		=>	__( 'This setting can be overrided on each pages.' , 'the-margo' ),
	'help'				=>	__( 'Default setting for pages is set to "full width"' , 'the-margo' ),
	'choices'			=>	array(
		'brown_wood'	=>	__( 'Brown Wood' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/1.png' . '">',
		'clean_wood'	=>	__( 'Clean Wood' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/2.png' . '">',
		'smooth_ice'	=>	__( 'Smooth Ice' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/3.png' . '">',
		'gridded_ice'	=>	__( 'Gridded Ice' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/4.png' . '">',
		'iced_floor'	=>	__( 'Iced Floor' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/5.png' . '">',
		'mosaical'	=>	__( 'Mosaïcal' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/6.png' . '">',
	) 
) );
