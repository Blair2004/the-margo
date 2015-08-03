<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
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

if( $the_margo_show_footer )
{
?>
<footer>
    <div class="container">
        <div class="row footer-widgets">
            
            <!-- Start Subscribe & Social Links Widget -->
            <div class="col-md-3">
                <?php dynamic_sidebar( 'footer-sidebar-A' ); ?>
            </div><!-- .col-md-3 -->
            <!-- End Subscribe & Social Links Widget -->
            
            
            <!-- Start Twitter Widget -->
            <div class="col-md-3">
                <?php dynamic_sidebar( 'footer-sidebar-B' ); ?>
            </div><!-- .col-md-3 -->
            <!-- End Twitter Widget -->


            <!-- Start Flickr Widget -->
            <div class="col-md-3">
                <?php dynamic_sidebar( 'footer-sidebar-C' ); ?>
            </div><!-- .col-md-3 -->
            <!-- End Flickr Widget -->

            
            <!-- Start Contact Widget -->
            <div class="col-md-3">
				<?php dynamic_sidebar( 'footer-sidebar-D' ); ?>
            </div><!-- .col-md-3 -->
            <!-- End Contact Widget -->

        
        </div><!-- .row -->
        
        <!-- Start Copyright -->
        <div class="copyright-section">
            <div class="row">
                <div class="col-md-6">
                    <p>© 2014 Margo -  All Rights Reserved</p>
                </div>
                <div class="col-md-6">
                		<?php wp_nav_menu( array( 
								'theme_location' 	=> 'footer', 
								'menu_id' 			=> 'footer-menu',
								'menu_class'		=>	'footer-nav', 
								'depth'				=>	1,
								'fallback_cb'		=>	false,
								'echo'				=>	true,
								'container'			=>	false
							) ); ?>
                </div>						
            </div>
        </div>
        <!-- End Copyright -->
        
    </div>
</footer>
<?php 
}
?>

<?php wp_footer(); ?>

</body>
</html>
