<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package the margo
 */
?>

<?php get_header(); ?>

<div class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><?php echo bloginfo( 'name' );?></h2>
                <p>Blog Page With Right Sidebar</p>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row blog-page">
				<?php
				$panel_settings		=	get_option( 'the_margo_layout' );
				// var_dump( $panel_settings );
				$panel_settings[ 'blog_sidebar' ]	=	isset( $panel_settings[ 'blog_sidebar' ] ) ? $panel_settings[ 'blog_sidebar' ] : 'sidebar_left';
				?>
				
				<?php if( $panel_settings[ 'blog_sidebar' ] == 'sidebar_left' ): // left sidebar?>
            
				<?php get_template_part( 'blog' , 'sidebar-left' );?>
            
            <?php elseif( $panel_settings[ 'blog_sidebar' ] == 'sidebar_right' ): // sidebar right;?>
            
            <?php get_template_part( 'blog' , 'sidebar-right' );?>
            
            <?php elseif( $panel_settings[ 'blog_sidebar' ] == 'no_sidebar' ): // no sidebar?>
            
            <?php get_template_part( 'blog' , 'no-sidebar' );?>
            
            <?php endif;    ?>
        </div>
    </div>
</div>
			
<?php get_footer(); ?>