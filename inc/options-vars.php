<?php

 $panel_settings		=	get_option( 'the_margo_layout' );
 
 	if( is_home() || $is_single	=	is_single() )
	{
 	
	$panel_settings[ 'blog_layout' ] 				= isset( $panel_settings[ 'blog_layout' ] ) 				? $panel_settings[ 'blog_layout' ] : 'full_width';
	$panel_settings[ 'blog_pattern' ] 				= isset( $panel_settings[ 'blog_pattern' ] ) 			? $panel_settings[ 'blog_pattern' ] : 'brown_wood';
	$panel_settings[ 'blog_show_topbar' ] 			= isset( $panel_settings[ 'blog_show_topbar' ] ) 		? $panel_settings[ 'blog_show_topbar' ] : 'yes';
	$panel_settings[ 'blog_show_footer' ] 			= isset( $panel_settings[ 'blog_show_footer' ] ) 		? $panel_settings[ 'blog_show_footer' ] : 'yes';
	$panel_settings[ 'blog_show_banner' ] 			= isset( $panel_settings[ 'blog_show_banner' ] ) 		? $panel_settings[ 'blog_show_banner' ] : 'yes';
	$panel_settings[ 'blog_sidebar' ]				= isset( $panel_settings[ 'blog_sidebar' ] ) 			? $panel_settings[ 'blog_sidebar' ] : 'sidebar_left';
	// Sidebars vars from dashboard
	$panel_settings[ 'blog_left_sidebar' ]			= isset( $panel_settings[ 'blog_left_sidebar' ] ) 		? $panel_settings[ 'blog_left_sidebar' ] : 'left-sidebar';
	$panel_settings[ 'blog_right_sidebar' ]		= isset( $panel_settings[ 'blog_right_sidebar' ] ) 	? $panel_settings[ 'blog_right_sidebar' ] : 'right-sidebar';
	$panel_settings[ 'blog_footerA_sidebar' ]		= isset( $panel_settings[ 'blog_footerA_sidebar' ] ) 	? $panel_settings[ 'blog_footerA_sidebar' ] : 'footer-sidebar-A';
	$panel_settings[ 'blog_footerB_sidebar' ]		= isset( $panel_settings[ 'blog_footerB_sidebar' ] ) 	? $panel_settings[ 'blog_footerB_sidebar' ] : 'footer-sidebar-B';
	$panel_settings[ 'blog_footerC_sidebar' ]		= isset( $panel_settings[ 'blog_footerC_sidebar' ] )  ? $panel_settings[ 'blog_footerC_sidebar' ] : 'footer-sidebar-C';
	$panel_settings[ 'blog_footerD_sidebar' ]		= isset( $panel_settings[ 'blog_footerD_sidebar' ] )  ? $panel_settings[ 'blog_footerD_sidebar' ] : 'footer-sidebar-D';	
	
	/**
	 * Saving general options
	 * This options can be called using global
	**/
	
	$the_margo_container_class		=	( $panel_settings[ 'blog_layout' ] == 'boxed' ) ? 'boxed-page' : '';
	$the_margo_bkg_pattern			=	the_margo_background_pattern( $panel_settings[ 'blog_pattern' ] );	
	$the_margo_show_top_bar			=	$panel_settings[ 'blog_show_topbar' ] === 'yes' ? true : false;
	$the_margo_show_footer			=	$panel_settings[ 'blog_show_footer' ] === 'yes' ? true : false;
	$the_margo_show_banner			=	$panel_settings[ 'blog_show_banner' ] ===  'yes' ? true : false;
	$the_margo_sidebar				=	$panel_settings[ 'blog_sidebar' ];
	// Sidebars
	$the_margo_left_sidebar			=	$panel_settings[ 'blog_left_sidebar' ] === 'defaut' ? 'left-sidebar' : $panel_settings[ 'blog_left_sidebar' ];
	$the_margo_right_sidebar		=	$panel_settings[ 'blog_right_sidebar' ] === 'defaut' ? 'right-sidebar' : $panel_settings[ 'blog_right_sidebar' ];
	$the_margo_footerA_sidebar		=	$panel_settings[ 'blog_footerA_sidebar' ] === 'defaut' ? 'foooter-sidebar-A' : $panel_settings[ 'blog_footerA_sidebar' ];
	$the_margo_footerB_sidebar		=	$panel_settings[ 'blog_footerB_sidebar' ] === 'defaut' ? 'foooter-sidebar-B' : $panel_settings[ 'blog_footerB_sidebar' ];
	$the_margo_footerC_sidebar		=	$panel_settings[ 'blog_footerC_sidebar' ] === 'defaut' ? 'foooter-sidebar-C' : $panel_settings[ 'blog_footerC_sidebar' ];
	$the_margo_footerD_sidebar		=	$panel_settings[ 'blog_footerD_sidebar' ] === 'defaut' ? 'foooter-sidebar-D' : $panel_settings[ 'blog_footerD_sidebar' ];
	
	/**
	 * End of Global Options
	**/
	
		// Check if for single custom options has been saved
		if( is_single() || is_page() )
		{
			/**
			 * Every blog settings are replaced if something has been changed from post/page editor
			**/
	
			global $post;
			
			$single_layout					= get_post_meta( $post->ID, 'single_layout', true);
			$single_pattern 				= get_post_meta( $post->ID, 'single_pattern', true);
			$single_show_topbar 			= get_post_meta( $post->ID, 'single_show_topbar', true);
			$single_show_footer 			= get_post_meta( $post->ID, 'single_show_footer', true);
			$single_show_banner 			= get_post_meta( $post->ID, 'single_show_banner', true);
			$single_sidebar 				= get_post_meta( $post->ID, 'single_sidebar', true);
			$single_left_sidebar			= get_post_meta( $post->ID, 'single_left_sidebar', true);
			$single_right_sidebar		= get_post_meta( $post->ID, 'single_right_sidebar', true);
			$single_footerA_sidebar		= get_post_meta( $post->ID, 'single_footerA_sidebar', true);
			$single_footerB_sidebar		= get_post_meta( $post->ID, 'single_footerB_sidebar', true);
			$single_footerC_sidebar		= get_post_meta( $post->ID, 'single_footerC_sidebar', true);
			$single_footerD_sidebar		= get_post_meta( $post->ID, 'single_footerD_sidebar', true);
			
			$single_layout 				=  ! in_array( $single_layout , array( '' , 'default' ) ) 	
				? $single_layout : $panel_settings[ 'blog_layout' ];
	
			$single_pattern 				= 	! in_array( $single_pattern , array( '' , 'default' ) ) 	
				? $single_pattern : $panel_settings[ 'blog_pattern' ];
	
			$single_show_topbar 			= 	! in_array( $single_show_topbar , array( '' , 'default' ) )	
				? $single_show_topbar : $panel_settings[ 'blog_show_topbar' ];
	
			$single_show_footer			= 	! in_array( $single_show_footer , array( '' , 'default' ) ) 
				? $single_show_footer  : $panel_settings[ 'blog_show_footer' ];
				
			$single_show_banner			= 	! in_array( $single_show_banner , array( '' , 'default' ) ) 
				? $single_show_banner : $panel_settings[ 'blog_show_banner' ];
				
			$single_sidebar				= 	! in_array( $single_sidebar , array( '' , 'default' ) )	
				? $single_sidebar : $panel_settings[ 'blog_sidebar' ];
			//	
			$single_left_sidebar				= 	! in_array( $single_left_sidebar , array( '' , 'default' ) )	
				? $single_left_sidebar : $panel_settings[ 'blog_left_sidebar' ];
				
			$single_right_sidebar				= 	! in_array( $single_right_sidebar , array( '' , 'default' ) )	
				? $single_right_sidebar : $panel_settings[ 'blog_right_sidebar' ];

			$single_footerA_sidebar				= 	! in_array( $single_footerA_sidebar , array( '' , 'default' ) )	
				? $single_footerA_sidebar : $panel_settings[ 'blog_footerA_sidebar' ];
				
			$single_footerB_sidebar				= 	! in_array( $single_footerB_sidebar , array( '' , 'default' ) )	
				? $single_footerB_sidebar : $panel_settings[ 'blog_footerB_sidebar' ];			
				
			$single_footerC_sidebar				= 	! in_array( $single_footerC_sidebar , array( '' , 'default' ) )	
				? $single_footerC_sidebar : $panel_settings[ 'blog_footerC_sidebar' ];
				
			$single_footerD_sidebar				= 	! in_array( $single_footerD_sidebar , array( '' , 'default' ) )	
				? $single_footerD_sidebar : $panel_settings[ 'blog_footerD_sidebar' ];
			
			// Saving general options
			$the_margo_container_class		=	( $single_layout == 'boxed' ) ? 'boxed-page' : '';
			$the_margo_bkg_pattern			=	the_margo_background_pattern( $single_pattern );
			$the_margo_show_top_bar			=	$single_show_topbar === 'yes' ? true : false;
			$the_margo_show_footer			=	$single_show_footer === 'yes' ? true : false;
			$the_margo_show_banner			=	$single_show_banner ===  'yes' ? true : false;
			$the_margo_sidebar				=	$single_sidebar;
			$the_margo_left_sidebar			=	$single_left_sidebar;
			$the_margo_right_sidebar		=	$single_right_sidebar;
			$the_margo_footerA_sidebar		=	$single_footerA_sidebar;
			$the_margo_footerB_sidebar		=	$single_footerB_sidebar;
			$the_margo_footerC_sidebar		=	$single_footerC_sidebar;
			$the_margo_footerD_sidebar		=	$single_footerD_sidebar;
		};
	
	} 
	elseif( is_404() ){
 
 	$panel_settings[ '404page_layout' ] 				= isset( $panel_settings[ '404page_layout' ] ) 			? $panel_settings[ '404page_layout' ] 			: 'full_width';
	$panel_settings[ '404page_pattern' ] 				= isset( $panel_settings[ '404page_pattern' ] ) 		? $panel_settings[ '404page_pattern' ] 		: 'brown_wood';
	$panel_settings[ '404page_show_topbar' ] 			= isset( $panel_settings[ '404page_show_topbar' ] ) 	? $panel_settings[ '404page_show_topbar' ] 	: 'yes';
	$panel_settings[ '404page_show_footer' ] 			= isset( $panel_settings[ '404page_show_footer' ] ) 	? $panel_settings[ '404page_show_footer' ] 	: 'yes';
	$panel_settings[ '404page_show_banner' ] 			= isset( $panel_settings[ '404page_show_banner' ] ) 	? $panel_settings[ '404page_show_banner' ] 	: 'yes';
	$panel_settings[ '404page_sidebar' ] 				= isset( $panel_settings[ '404page_sidebar' ] ) 		? $panel_settings[ '404page_sidebar' ] 		: 'yes';
	
	// Saving general options
	$the_margo_container_class				=	( $panel_settings[ '404page_layout' ] == 'boxed' ) ? 'boxed-page' : '';	
	$the_margo_bkg_pattern					=	the_margo_background_pattern( $panel_settings[ '404page_pattern' ] );
	$the_margo_show_top_bar					=	$panel_settings[ '404page_show_topbar' ] === 'yes' ? true : false;
	$the_margo_show_footer					=	$panel_settings[ '404page_show_footer' ] === 'yes' ? true : false;
	$the_margo_show_banner					=	$panel_settings[ '404page_show_banner' ] ===  'yes' ? true : false;
	$the_margo_sidebar						=	$panel_settings[ '404page_sidebar' ];
 
	} 
	else { // page layout options 
 	
	$panel_settings[ 'page_layout' ] 				= isset( $panel_settings[ 'page_layout' ] ) 			? $panel_settings[ 'page_layout' ] 			: 'full_width';
	$panel_settings[ 'page_pattern' ] 				= isset( $panel_settings[ 'page_pattern' ] ) 		? $panel_settings[ 'page_pattern' ] 		: 'brown_wood';
	$panel_settings[ 'page_show_topbar' ] 			= isset( $panel_settings[ 'page_show_topbar' ] ) 	? $panel_settings[ 'page_show_topbar' ] 	: 'yes';
	$panel_settings[ 'page_show_footer' ] 			= isset( $panel_settings[ 'page_show_footer' ] ) 	? $panel_settings[ 'page_show_footer' ] 	: 'yes';
	$panel_settings[ 'page_show_banner' ] 			= isset( $panel_settings[ 'page_show_banner' ] ) 	? $panel_settings[ 'page_show_banner' ] 	: 'yes';
	$panel_settings[ 'page_sidebar' ] 				= isset( $panel_settings[ 'page_sidebar' ] ) 		? $panel_settings[ 'page_sidebar' ] 		: 'yes';
	// Sidebars vars from dashboard
	$panel_settings[ 'page_left_sidebar' ]			= isset( $panel_settings[ 'page_left_sidebar' ] ) 		? $panel_settings[ 'page_left_sidebar' ] : 'left-sidebar';
	$panel_settings[ 'page_right_sidebar' ]		= isset( $panel_settings[ 'page_right_sidebar' ] ) 	? $panel_settings[ 'page_right_sidebar' ] : 'right-sidebar';
	$panel_settings[ 'page_footerA_sidebar' ]		= isset( $panel_settings[ 'page_footerA_sidebar' ] ) 	? $panel_settings[ 'page_footerA_sidebar' ] : 'footer-sidebar-A';
	$panel_settings[ 'page_footerB_sidebar' ]		= isset( $panel_settings[ 'page_footerB_sidebar' ] ) 	? $panel_settings[ 'page_footerB_sidebar' ] : 'footer-sidebar-B';
	$panel_settings[ 'page_footerC_sidebar' ]		= isset( $panel_settings[ 'page_footerC_sidebar' ] )  ? $panel_settings[ 'page_footerC_sidebar' ] : 'footer-sidebar-C';
	$panel_settings[ 'page_footerD_sidebar' ]		= isset( $panel_settings[ 'page_footerD_sidebar' ] )  ? $panel_settings[ 'page_footerD_sidebar' ] : 'footer-sidebar-D';	
	
	// Saving general options
	$the_margo_container_class				=	( $panel_settings[ 'page_layout' ] == 'boxed' ) ? 'boxed-page' : '';	
	$the_margo_bkg_pattern					=	the_margo_background_pattern( $panel_settings[ 'page_pattern' ] );
	$the_margo_show_top_bar					=	$panel_settings[ 'page_show_topbar' ] === 'yes' ? true : false;
	$the_margo_show_footer					=	$panel_settings[ 'page_show_footer' ] === 'yes' ? true : false;
	$the_margo_show_banner					=	$panel_settings[ 'page_show_banner' ] ===  'yes' ? true : false;
	$the_margo_sidebar						=	$panel_settings[ 'page_sidebar' ];
	// Sidebar
	$the_margo_left_sidebar					=	$panel_settings[ 'page_left_sidebar' ] === 'defaut' ? 'left-sidebar' : $panel_settings[ 'page_left_sidebar' ];
	$the_margo_right_sidebar				=	$panel_settings[ 'page_right_sidebar' ] === 'defaut' ? 'right-sidebar' : $panel_settings[ 'page_right_sidebar' ];
	$the_margo_footerA_sidebar				=	$panel_settings[ 'page_footerA_sidebar' ] === 'defaut' ? 'foooter-sidebar-A' : $panel_settings[ 'page_footerA_sidebar' ];
	$the_margo_footerB_sidebar				=	$panel_settings[ 'page_footerB_sidebar' ] === 'defaut' ? 'foooter-sidebar-B' : $panel_settings[ 'page_footerB_sidebar' ];
	$the_margo_footerC_sidebar				=	$panel_settings[ 'page_footerC_sidebar' ] === 'defaut' ? 'foooter-sidebar-C' : $panel_settings[ 'page_footerC_sidebar' ];
	$the_margo_footerD_sidebar				=	$panel_settings[ 'page_footerD_sidebar' ] === 'defaut' ? 'foooter-sidebar-D' : $panel_settings[ 'page_footerD_sidebar' ];

	
		if( is_page() )
		{
			/**
			 * Every blog settings are replaced if something has been changed from post/page editor
			**/
	
			global $post;
			
			$single_layout					= get_post_meta( $post->ID, 'single_layout', true);
			$single_pattern 				= get_post_meta( $post->ID, 'single_pattern', true);
			$single_show_topbar 			= get_post_meta( $post->ID, 'single_show_topbar', true);
			$single_show_footer 			= get_post_meta( $post->ID, 'single_show_footer', true);
			$single_show_banner 			= get_post_meta( $post->ID, 'single_show_banner', true);
			$single_sidebar 				= get_post_meta( $post->ID, 'single_sidebar', true);
			// Sidebars
			$single_left_sidebar			= get_post_meta( $post->ID, 'single_left_sidebar', true);
			$single_right_sidebar		= get_post_meta( $post->ID, 'single_right_sidebar', true);
			$single_footerA_sidebar		= get_post_meta( $post->ID, 'single_footerA_sidebar', true);
			$single_footerB_sidebar		= get_post_meta( $post->ID, 'single_footerB_sidebar', true);
			$single_footerC_sidebar		= get_post_meta( $post->ID, 'single_footerC_sidebar', true);
			$single_footerD_sidebar		= get_post_meta( $post->ID, 'single_footerD_sidebar', true);
			
			$single_layout 				= 
				! in_array( $single_layout , array( '' , 'default' ) ) 	? $single_layout : $panel_settings[ 'page_layout' ];
	
			$single_pattern 				= 
				! in_array( $single_pattern , array( '' , 'default' ) ) 	? $single_pattern : $panel_settings[ 'page_pattern' ];
	
			$single_show_topbar 			= 
				! in_array( $single_show_topbar , array( '' , 'default' ) )	? $single_show_topbar : $panel_settings[ 'page_show_topbar' ];
	
			$single_show_footer			= 
				! in_array( $single_show_footer , array( '' , 'default' ) ) ? $single_show_footer  : $panel_settings[ 'page_show_footer' ];
				
			$single_show_banner			= 
				! in_array( $single_show_banner , array( '' , 'default' ) ) ? $single_show_banner : $panel_settings[ 'page_show_banner' ];
				
			$single_sidebar				= 
				! in_array( $single_sidebar , array( '' , 'default' ) )	? $single_sidebar : $panel_settings[ 'page_sidebar' ];
			// Sidebars
			$single_left_sidebar				= 	! in_array( $single_left_sidebar , array( '' , 'default' ) )	
				? $single_left_sidebar : $panel_settings[ 'page_left_sidebar' ];
				
			$single_right_sidebar				= 	! in_array( $single_right_sidebar , array( '' , 'default' ) )	
				? $single_right_sidebar : $panel_settings[ 'page_right_sidebar' ];

			$single_footerA_sidebar				= 	! in_array( $single_footerA_sidebar , array( '' , 'default' ) )	
				? $single_footerA_sidebar : $panel_settings[ 'page_footerA_sidebar' ];
				
			$single_footerB_sidebar				= 	! in_array( $single_footerB_sidebar , array( '' , 'default' ) )	
				? $single_footerB_sidebar : $panel_settings[ 'page_footerB_sidebar' ];			
				
			$single_footerC_sidebar				= 	! in_array( $single_footerC_sidebar , array( '' , 'default' ) )	
				? $single_footerC_sidebar : $panel_settings[ 'page_footerC_sidebar' ];
				
			$single_footerD_sidebar				= 	! in_array( $single_footerD_sidebar , array( '' , 'default' ) )	
				? $single_footerD_sidebar : $panel_settings[ 'page_footerD_sidebar' ];
			
			// Saving general options
			$the_margo_container_class		=	( $single_layout == 'boxed' ) ? 'boxed-page' : '';
			$the_margo_bkg_pattern			=	the_margo_background_pattern( $single_pattern );
			$the_margo_show_top_bar			=	$single_show_topbar === 'yes' ? true : false;
			$the_margo_show_footer			=	$single_show_footer === 'yes' ? true : false;
			$the_margo_show_banner			=	$single_show_banner ===  'yes' ? true : false;
			$the_margo_sidebar				=	$single_sidebar;
			// Sidebars
			$the_margo_left_sidebar			=	$single_left_sidebar;
			$the_margo_right_sidebar		=	$single_right_sidebar;
			$the_margo_footerA_sidebar		=	$single_footerA_sidebar;
			$the_margo_footerB_sidebar		=	$single_footerB_sidebar;
			$the_margo_footerC_sidebar		=	$single_footerC_sidebar;
			$the_margo_footerD_sidebar		=	$single_footerD_sidebar;
		};
	
}
