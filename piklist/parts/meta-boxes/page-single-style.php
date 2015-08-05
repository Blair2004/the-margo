<?php
/*
Post Type: post, page
Title: Theme settings
*/

?>
<style>
#theme-settings-tab .tabs-panel
{
	max-height:none !important;
}
</style>
<div id="theme-settings-tab" class="categorydiv">
   <ul id="category-tabs" class="category-tabs">
      <li class="tabs"><a href="#layout"><?php _e( 'Layout' , 'the-margo' );?></a></li>
      <li class="hide-if-no-js"><a href="#style"><?php _e( 'Theme Elements' , 'the-margo' );?></a></li>
      <li class="hide-if-no-js"><a href="#sidebar"><?php _e( 'Sidebars' , 'the-margo' );?></a></li>
   </ul>
   <div id="layout" class="tabs-panel" style="display: none;max-height:none;">
      <?php
		piklist( 'field' , array(
			'type'				=>	'select',
			'field'				=>	'single_sidebar',
			'label'				=>	__( 'Displays Sidebar' , 'the-margo' ),
			'description'		=>	__( 'This setting will override blog settings.' , 'the-margo' ),
			'help'				=>	__( 'Default setting for pages is set to "sidebar left"' , 'the-margo' ),
			'choices'			=>	array(
				'default'			=>	__( 'Default' , 'the-margo' ),
				'sidebar_left'		=>	__( 'Sidebar Left' , 'the-margo' ),
				'sidebar_right'	=>	__( 'Sidebar Right' , 'the-margo' ),
				'no_sidebar'		=>	__( 'No Sidebar' , 'the-margo' ),
			) 
		) );
		
		piklist( 'field' , array(
			'type'				=>	'select',
			'field'				=>	'single_layout',
			'label'				=>	__( 'Layout for pages' , 'the-margo' ),
			'description'		=>	__( 'This setting will override blog settings.' , 'the-margo' ),
			'help'				=>	__( 'Default setting for pages is set to "full width"' , 'the-margo' ),
			'choices'			=>	array(
				'default'			=>	__( 'Default' , 'the-margo' ),
				'boxed'			=>	__( 'Boxed' , 'the-margo' ),
				'full_width'	=>	__( 'Full width' , 'the-margo' )
			) 
		) );
		
		piklist( 'field' , array(
			'type'				=>	'radio',
			'field'				=>	'single_pattern',
			'label'				=>	__( 'Background Pattern' , 'the-margo' ),
			'description'		=>	__( 'This setting will override blog settings.' , 'the-margo' ),
			'help'				=>	__( 'Default setting for pages is set to "full width"' , 'the-margo' ),
			'choices'			=>	array(
				'default'			=>	__( 'Default' , 'the-margo' ),
				'brown_wood'	=>	__( 'Brown Wood' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/1.png' . '">',
				'clean_wood'	=>	__( 'Clean Wood' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/2.png' . '">',
				'smooth_ice'	=>	__( 'Smooth Ice' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/3.png' . '">',
				'gridded_ice'	=>	__( 'Gridded Ice' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/4.png' . '">',
				'iced_floor'	=>	__( 'Iced Floor' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/5.png' . '">',
				'mosaical'	=>	__( 'Mosaïcal' , 'the-margo' ) . '<img style="width:30px;height:30px;margin-left:10px;border:solid 1px #666;" src="' . get_template_directory_uri() . '/images/patterns/6.png' . '">',
			) 
		) );

		?>
   </div>
   <div id="sidebar" class="tabs-panel" style="display:none;">
   <?php
	$global_sidebars		=	array( 
		'default'			=>	__( 'Default' , 'the-margo' )
	);
	foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar )
	{
		$global_sidebars[ $sidebar[ 'id' ] ] 	=	$sidebar[ 'name' ];
	}
	piklist( 'field' , array(
		'type'				=>	'select',
		'field'				=>	'single_left_sidebar',
		'label'				=>	__( 'Sidebar to display on left side' , 'the-margo' ),
		'description'		=>	__( 'You can use default sidebar, or select your custom sidebar' , 'the-margo' ),
		'choices'			=>	$global_sidebars 
	) );
	
	piklist( 'field' , array(
		'type'				=>	'select',
		'field'				=>	'single_right_sidebar',
		'label'				=>	__( 'Sidebar to display on right side' , 'the-margo' ),
		'description'		=>	__( 'You can use default sidebar, or select your custom sidebar' , 'the-margo' ),
		'choices'			=>	$global_sidebars
	) );
	
	piklist( 'field' , array(
		'type'				=>	'select',
		'field'				=>	'single_footerA_sidebar',
		'label'				=>	__( 'Sidebar to display on bottom (replace footer sidebar A) ' , 'the-margo' ),
		'description'		=>	__( 'You can use default sidebar, or select your custom sidebar' , 'the-margo' ),
		'choices'			=>	$global_sidebars
	) );
	
	piklist( 'field' , array(
		'type'				=>	'select',
		'field'				=>	'single_footerB_sidebar',
		'label'				=>	__( 'Sidebar to display on bottom (replace footer sidebar B) ' , 'the-margo' ),
		'description'		=>	__( 'You can use default sidebar, or select your custom sidebar' , 'the-margo' ),
		'choices'			=>	$global_sidebars
	) );
	
	piklist( 'field' , array(
		'type'				=>	'select',
		'field'				=>	'single_footerC_sidebar',
		'label'				=>	__( 'Sidebar to display on bottom (replace footer sidebar C) ' , 'the-margo' ),
		'description'		=>	__( 'You can use default sidebar, or select your custom sidebar' , 'the-margo' ),
		'choices'			=>	$global_sidebars
	) );
	
	piklist( 'field' , array(
		'type'				=>	'select',
		'field'				=>	'single_footerD_sidebar',
		'label'				=>	__( 'Sidebar to display on bottom (replace footer sidebar D) ' , 'the-margo' ),
		'description'		=>	__( 'You can use default sidebar, or select your custom sidebar' , 'the-margo' ),
		'choices'			=>	$global_sidebars
	) );

// foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar )
	?>
   </div>
   <div id="style" class="tabs-panel" style="display: none;">
      <?php
		
piklist( 'field' , array(
	'type'				=>	'select',
	'field'				=>	'single_show_topbar',
	'label'				=>	__( 'Displays the top bar' , 'the-margo' ),
	'description'		=>	__( 'With this, you can enable or disable top bar on the page.' , 'the-margo' ),
	'choices'			=>	array(
		'default'			=>	__( 'Default' , 'the-margo' ),
		'yes'		=>	__( 'Yes' , 'the-margo' ),
		'no'	=>	__( 'No' , 'the-margo' )
	) 
) );

piklist( 'field' , array(
	'type'				=>	'select',
	'field'				=>	'single_show_footer',
	'label'				=>	__( 'Displays the Footer' , 'the-margo' ),
	'description'		=>	__( 'With this, you can enable or disable footer on the page.' , 'the-margo' ),
	'choices'			=>	array(
		'default'			=>	__( 'Default' , 'the-margo' ),
		'yes'		=>	__( 'Yes' , 'the-margo' ),
		'no'	=>	__( 'No' , 'the-margo' )
	) 
) );

piklist( 'field' , array(
	'type'				=>	'select',
	'field'				=>	'single_show_banner',
	'label'				=>	__( 'Displays the Banner section' , 'the-margo' ),
	'description'		=>	__( 'With this, you can enable or disable banner section.' , 'the-margo' ),
	'choices'			=>	array(
		'default'			=>	__( 'Default' , 'the-margo' ),
		'yes'		=>	__( 'Yes' , 'the-margo' ),
		'no'	=>	__( 'No' , 'the-margo' )
	) 
) );

// foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar )
		?>
   </div>
</div>
<script>
jQuery( document ).ready( function($){
	$( '#theme-settings-tab ul li a' ).bind( 'click' , function(){
		$( '#theme-settings-tab ul' ).siblings( 'div' ).each( function(){
			$(this).hide();
		});
		
		$( '#theme-settings-tab ul li' ).each( function(){
			$(this).removeClass( "tabs" );
		});
		
		$(this).parent( 'li' ).addClass( "tabs" );
		$( $(this).attr( 'href' ) ).show();		
		return false;
	});
	
	$( '#theme-settings-tab ul li a' ).eq(0).trigger( 'click' );
});
</script>

