<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package the margo
 */

get_header(); 

 global 
 	$the_margo_show_footer, 
	$the_margo_show_top_bar, 
	$the_margo_show_banner, 
	$the_margo_bkg_pattern, 
	$the_margo_sidebar,
	$the_margo_container_class;

?>

<div class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'the-margo' ); ?></h2>
                <p>Blog Page With Right Sidebar</p>
            </div>
            <div class="col-md-6">
                <?php echo the_margo_breadcrumbs();?>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row blog-page">

				<?php if( $the_margo_sidebar == 'sidebar_left' ): // left sidebar?>
            
				<?php get_template_part( '404' , 'sidebar-left' );?>
            
            <?php elseif( $the_margo_sidebar == 'sidebar_right' ): // sidebar right;?>
            
            <?php get_template_part( '404' , 'sidebar-right' );?>
            
            <?php elseif( $the_margo_sidebar == 'no_sidebar' ): // no sidebar?>
            
            <?php get_template_part( '404' , 'no-sidebar' );?>
            
            <?php endif;    ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
