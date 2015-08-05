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
 get_header();
 
 require get_template_directory() . '/inc/globals.php';
		
?>
<?php if( $the_margo_show_banner ): // show page banner?>
<div class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><?php echo bloginfo( 'name' );?></h2>
                <p>Blog Page With Right Sidebar</p>
            </div>
            <div class="col-md-6">
                <?php echo the_margo_breadcrumbs();?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>

<div id="content">
    <div class="container">
        <div class="row blog-page">
				
				<?php if( $the_margo_sidebar == 'sidebar_left' ): // left sidebar?>
            
				<?php get_template_part( 'page' , 'sidebar-left' );?>
            
            <?php elseif( $the_margo_sidebar == 'sidebar_right' ): // sidebar right;?>
            
            <?php get_template_part( 'page' , 'sidebar-right' );?>
            
            <?php elseif( $the_margo_sidebar == 'no_sidebar' ): // no sidebar?>
            
            <?php get_template_part( 'page' , 'no-sidebar' );?>
            
            <?php endif;    ?>
        </div>
    </div>
</div>
			
<?php get_footer(); ?>