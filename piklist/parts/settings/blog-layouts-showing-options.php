<?php
/*
Title: Theme Elements
Setting: the_margo_layout
Tab: Blog
*/


piklist( 'field' , array(
	'type'				=>	'select',
	'field'				=>	'blog_show_topbar',
	'label'				=>	__( 'Displays the top bar' , 'the-margo' ),
	'description'		=>	__( 'With this, you can enable or disable top bar on the blog.' , 'the-margo' ),
	'choices'			=>	array(
		'yes'		=>	__( 'Yes' , 'the-margo' ),
		'no'	=>	__( 'No' , 'the-margo' )
	) 
) );

piklist( 'field' , array(
	'type'				=>	'select',
	'field'				=>	'blog_show_footer',
	'label'				=>	__( 'Displays the Footer' , 'the-margo' ),
	'description'		=>	__( 'With this, you can enable or disable footer on the blog.' , 'the-margo' ),
	'choices'			=>	array(
		'yes'		=>	__( 'Yes' , 'the-margo' ),
		'no'	=>	__( 'No' , 'the-margo' )
	) 
) );

piklist( 'field' , array(
	'type'				=>	'select',
	'field'				=>	'blog_show_banner',
	'label'				=>	__( 'Displays the Banner section' , 'the-margo' ),
	'description'		=>	__( 'With this, you can enable or disable banner section.' , 'the-margo' ),
	'choices'			=>	array(
		'yes'		=>	__( 'Yes' , 'the-margo' ),
		'no'	=>	__( 'No' , 'the-margo' )
	) 
) );
