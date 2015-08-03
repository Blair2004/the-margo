            <!-- Start Blog Posts -->
            <div class="col-md-9 blog-box">            
            	<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'the-margo' ); ?></p><br />

					<?php get_search_form(); ?><br />
					
               <div class="sidebar">
					
					<?php the_widget( 'margo_recents_posts_widget' ); ?>
               
					<?php if ( the_margo_categorized_blog() ) :?>
               
               <?php the_widget( 'margo_categories_widget' );?>
               
               <?php endif;?>
               
               </div>

					<?php
					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'the-margo' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
            </div>
            <!-- End Blog Posts -->
            <!--Sidebar-->
            <div class="col-md-3 sidebar right-sidebar">
                <!-- Search Widget -->
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
            </div>
            <!--End sidebar-->