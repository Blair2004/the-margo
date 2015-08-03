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
 
 global 
 	$the_margo_show_footer, 
	$the_margo_show_top_bar, 
	$the_margo_show_banner, 
	$the_margo_bkg_pattern, 
	$the_margo_sidebar,
	$the_margo_container_class;
 
?>

<?php if( have_posts() ): while( have_posts() ): the_post();?>

<div class="page-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <h2><?php the_title();?></h2>
            <p>Blog Page With Right Sidebar</p>
         </div>
         <div class="col-md-6">
            <?php echo the_margo_breadcrumbs();?>
         </div>
      </div>
   </div>
</div>

<!-- Start Content -->
<div id="content">
   <div class="container">
      <div class="row blog-post-page">
				<?php if( $the_margo_sidebar == 'sidebar_left' ): // left sidebar?>
            
				<?php get_template_part( 'single' , 'sidebar-left' );?>
            
            <?php elseif( $the_margo_sidebar == 'sidebar_right' ): // sidebar right;?>
            
            <?php get_template_part( 'single' , 'sidebar-right' );?>
            
            <?php elseif( $the_margo_sidebar == 'no_sidebar' ): // no sidebar?>
            
            <?php get_template_part( 'single' , 'no-sidebar' );?>
            
            <?php endif;?>
         
      </div>
   </div>
</div>
<!-- End content -->

<?php endwhile;?>
            
<?php else:?>

<?php endif;?>

<?php get_footer(); ?>
