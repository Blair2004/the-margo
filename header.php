<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package the margo
 */
 global 
 	$the_margo_show_footer, 
	$the_margo_show_top_bar, 
	$the_margo_show_banner, 
	$the_margo_bkg_pattern, 
	$the_margo_sidebar,
	$the_margo_container_class;
 
 $panel_settings		=	get_option( 'the_margo_layout' );
 if( is_home() || $is_single	=	is_single() ):
 	
	$panel_settings[ 'blog_layout' ] 				= isset( $panel_settings[ 'blog_layout' ] ) 				? $panel_settings[ 'blog_layout' ] : 'full_width';
	$panel_settings[ 'blog_pattern' ] 				= isset( $panel_settings[ 'blog_pattern' ] ) 			? $panel_settings[ 'blog_pattern' ] : 'brown_wood';
	$panel_settings[ 'blog_show_topbar' ] 			= isset( $panel_settings[ 'blog_show_topbar' ] ) 		? $panel_settings[ 'blog_show_topbar' ] : 'yes';
	$panel_settings[ 'blog_show_footer' ] 			= isset( $panel_settings[ 'blog_show_footer' ] ) 		? $panel_settings[ 'blog_show_footer' ] : 'yes';
	$panel_settings[ 'blog_show_banner' ] 			= isset( $panel_settings[ 'blog_show_banner' ] ) 		? $panel_settings[ 'blog_show_banner' ] : 'yes';
	$panel_settings[ 'blog_sidebar' ]				= isset( $panel_settings[ 'blog_sidebar' ] ) 			? $panel_settings[ 'blog_sidebar' ] : 'sidebar_left';
	
	// Saving general options
	$the_margo_container_class		=	( $panel_settings[ 'blog_layout' ] == 'boxed' ) ? 'boxed-page' : '';
	$the_margo_bkg_pattern			=	the_margo_background_pattern( $panel_settings[ 'blog_pattern' ] );	
	$the_margo_show_top_bar			=	$panel_settings[ 'blog_show_topbar' ] === 'yes' ? true : false;
	$the_margo_show_footer			=	$panel_settings[ 'blog_show_footer' ] === 'yes' ? true : false;
	$the_margo_show_banner			=	$panel_settings[ 'blog_show_banner' ] ===  'yes' ? true : false;
	$the_margo_sidebar				=	$panel_settings[ 'blog_sidebar' ];
	
	// Check if for single custom options has been saved
	if( is_single() )
	{
		/**
		 * Every blog settings are replaced if something has been changed from post/page editor
		**/

		global $post;
		
		$single_layout 				= 
			( $single_layout			= get_post_meta( $post->ID, 'single_layout', true) ) != '' 	? $single_layout : $panel_settings[ 'blog_layout' ];

		$single_pattern 				= 
			( $single_pattern 		= get_post_meta( $post->ID, 'single_pattern', true) ) != '' 	? $single_pattern : $panel_settings[ 'blog_pattern' ];

		$single_show_topbar 			= 
			( $single_show_topbar 	= get_post_meta( $post->ID, 'single_show_topbar', true) ) != ''	? $single_show_topbar : $panel_settings[ 'blog_show_topbar' ];

		$single_show_footer			= 
			( $single_show_footer 	= get_post_meta( $post->ID, 'single_show_footer', true) ) != '' ? $single_show_footer  : $panel_settings[ 'blog_show_footer' ];
			
		$single_show_banner			= 
			( $single_show_banner 	= get_post_meta( $post->ID, 'single_show_banner', true) ) != '' ? $single_show_banner : $panel_settings[ 'blog_show_banner' ];
			
		$single_sidebar				= 
			( $single_sidebar 		= get_post_meta( $post->ID, 'single_sidebar', true) ) != ''	? $single_sidebar : $panel_settings[ 'blog_sidebar' ];
		
		// Saving general options
		$the_margo_container_class		=	( $single_layout == 'boxed' ) ? 'boxed-page' : '';
		$the_margo_bkg_pattern			=	the_margo_background_pattern( $single_pattern );
		$the_margo_show_top_bar			=	$single_show_topbar === 'yes' ? true : false;
		$the_margo_show_footer			=	$single_show_footer === 'yes' ? true : false;
		$the_margo_show_banner			=	$single_show_banner ===  'yes' ? true : false;
		$the_margo_sidebar				=	$single_sidebar;
	};
	
 elseif( is_404() ):
 
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
 
 else: // page layout options
 	
	$panel_settings[ 'page_layout' ] 				= isset( $panel_settings[ 'page_layout' ] ) 			? $panel_settings[ 'page_layout' ] 			: 'full_width';
	$panel_settings[ 'page_pattern' ] 				= isset( $panel_settings[ 'page_pattern' ] ) 		? $panel_settings[ 'page_pattern' ] 		: 'brown_wood';
	$panel_settings[ 'page_show_topbar' ] 			= isset( $panel_settings[ 'page_show_topbar' ] ) 	? $panel_settings[ 'page_show_topbar' ] 	: 'yes';
	$panel_settings[ 'page_show_footer' ] 			= isset( $panel_settings[ 'page_show_footer' ] ) 	? $panel_settings[ 'page_show_footer' ] 	: 'yes';
	$panel_settings[ 'page_show_banner' ] 			= isset( $panel_settings[ 'page_show_banner' ] ) 	? $panel_settings[ 'page_show_banner' ] 	: 'yes';
	$panel_settings[ 'page_sidebar' ] 				= isset( $panel_settings[ 'page_sidebar' ] ) 		? $panel_settings[ 'page_sidebar' ] 		: 'yes';
	
	// Saving general options
	$the_margo_container_class							=	( $panel_settings[ 'page_layout' ] == 'boxed' ) ? 'boxed-page' : '';	
	$the_margo_bkg_pattern						=	the_margo_background_pattern( $panel_settings[ 'page_pattern' ] );
	$the_margo_show_top_bar					=	$panel_settings[ 'page_show_topbar' ] === 'yes' ? true : false;
	$the_margo_show_footer					=	$panel_settings[ 'page_show_footer' ] === 'yes' ? true : false;
	$the_margo_show_banner					=	$panel_settings[ 'page_show_banner' ] ===  'yes' ? true : false;
	$the_margo_sidebar						=	$panel_settings[ 'page_sidebar' ];
	
 endif;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<style>
body {
  background: url(<?php echo $the_margo_bkg_pattern;?>) fixed repeat;
}
</style>
</head>

<body <?php // body_class(); ?>>
	<div id="container" class="<?php echo $the_margo_container_class;?>">
    	<!-- Start Header Section --> 
        <div class="hidden-header"></div>
        <header class="clearfix" <?php if( is_user_logged_in() && is_admin_bar_showing() ):?> style="top:32px;"<?php endif;?>>
            
            <?php if( $the_margo_show_top_bar ):?>
            <!-- Start Top Bar -->
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- Start Contact Info -->
                            <ul class="contact-details">
                                <li><a href="#"><i class="fa fa-map-marker"></i> House-54/A, London, UK</a>
                                </li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> info@yourcompany.com</a>
                                </li>
                                <li><a href="#"><i class="fa fa-phone"></i> +12 345 678 000</a>
                                </li>
                            </ul>
                            <!-- End Contact Info -->
                        </div><!-- .col-md-6 -->
                        <div class="col-md-5">
                            <!-- Start Social Links -->
                            <ul class="social-list">
                                <li>
                                    <a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a class="google itl-tooltip" data-placement="bottom" title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a class="dribbble itl-tooltip" data-placement="bottom" title="Dribble" href="#"><i class="fa fa-dribbble"></i></a>
                                </li>
                                <li>
                                    <a class="linkdin itl-tooltip" data-placement="bottom" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a class="flickr itl-tooltip" data-placement="bottom" title="Flickr" href="#"><i class="fa fa-flickr"></i></a>
                                </li>
                                <li>
                                    <a class="tumblr itl-tooltip" data-placement="bottom" title="Tumblr" href="#"><i class="fa fa-tumblr"></i></a>
                                </li>
                                <li>
                                    <a class="instgram itl-tooltip" data-placement="bottom" title="Instagram" href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a class="vimeo itl-tooltip" data-placement="bottom" title="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a>
                                </li>
                                <li>
                                    <a class="skype itl-tooltip" data-placement="bottom" title="Skype" href="#"><i class="fa fa-skype"></i></a>
                                </li>
                            </ul>
                            <!-- End Social Links -->
                        </div><!-- .col-md-6 -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .top-bar -->
            <!-- End Top Bar -->
            <?php endif; // show top bar.?>
            
            
            <!-- Start  Logo & Naviagtion  -->
            <div class="navbar navbar-default navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- End Toggle Nav Link For Mobiles -->
                        <a class="navbar-brand" href="index.html">
                            <img alt="" src="<?php echo get_header_image();?>">
                        </a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Stat Search -->
                        <div class="search-side">
                            <a href="#" class="show-search"><i class="fa fa-search"></i></a>
                            <div class="search-form">
                                <form autocomplete="off" role="search" method="get" class="searchform" action="#">
                                    <input type="text" value="" name="s" id="s" placeholder="Search the site...">
                                </form>
                            </div>
                        </div>
                        <!-- End Search -->
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav navbar-right">
                            <?php wp_nav_menu( array( 
										'theme_location' 	=> 'primary', 
										'menu_id' 			=> 'primary-menu', 
										'depth'				=>	2,
										'fallback_cb'		=>	false,
										'echo'				=>	true,
										'walker'				=>	new Margo_Nav_Menu,
										'items_wrap'      => '%3$s',
										'container'			=>	false
									) ); ?>
                            <!-- 
                            <li>
                                <a class="active" href="index.html">Home</a>
                                <ul class="dropdown">
                                    <li><a class="active" href="index.html">Home Main Version</a>
                                    </li>
                                    <li><a href="index-01.html">Home Version 1</a>
                                    </li>
                                    <li><a href="index-02.html">Home Version 2</a>
                                    </li>
                                    <li><a href="index-03.html">Home Version 3</a>
                                    </li>
                                    <li><a href="index-04.html">Home Version 4</a>
                                    </li>
                                    <li><a href="index-05.html">Home Version 5</a>
                                    </li>
                                    <li><a href="index-06.html">Home Version 6</a>
                                    </li>
                                    <li><a href="index-07.html">Home Version 7</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="about.html">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="about.html">About</a>
                                    </li>
                                    <li><a href="services.html">Services</a>
                                    </li>
                                    <li><a href="right-sidebar.html">Right Sidebar</a>
                                    </li>
                                    <li><a href="left-sidebar.html">Left Sidebar</a>
                                    </li>
                                    <li><a href="404.html">404 Page</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Shortcodes</a>
                                <ul class="dropdown">
                                    <li><a href="tabs.html">Tabs</a>
                                    </li>
                                    <li><a href="buttons.html">Buttons</a>
                                    </li>
                                    <li><a href="action-box.html">Action Box</a>
                                    </li>
                                    <li><a href="testimonials.html">Testimonials</a>
                                    </li>
                                    <li><a href="latest-posts.html">Latest Posts</a>
                                    </li>
                                    <li><a href="latest-projects.html">Latest Projects</a>
                                    </li>
                                    <li><a href="pricing.html">Pricing Tables</a>
                                    </li>
                                    <li><a href="animated-graphs.html">Animated Graphs</a>
                                    </li>
                                    <li><a href="accordion-toggles.html">Accordion & Toggles</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="portfolio-3.html">Portfolio</a>
                                <ul class="dropdown">
                                    <li><a href="portfolio-2.html">2 Columns</a>
                                    </li>
                                    <li><a href="portfolio-3.html">3 Columns</a>
                                    </li>
                                    <li><a href="portfolio-4.html">4 Columns</a>
                                    </li>
                                    <li><a href="single-project.html">Single Project</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="blog.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog.html">Blog - right Sidebar</a>
                                    </li>
                                    <li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a>
                                    </li>
                                    <li><a href="single-post.html">Blog Single Post</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a>
                            </li>
                            -->
                        </ul>
                        <!-- End Navigation List -->
                    </div>
                </div>
            </div>
            <!-- End Header Logo & Naviagtion -->
            
        </header> 
        
        <!-- End Header Section -->
        <?php return;?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the-margo' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'the-margo' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
