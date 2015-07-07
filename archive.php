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
                <h2>Blog</h2>
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
            
            
            <!--Sidebar-->
            <div class="col-md-3 sidebar left-sidebar">
                
                <!-- Search Widget -->
                <?php dynamic_sidebar( 'left-sidebar' ); ?>

            </div>
            <!--End sidebar-->
            
            
            <!-- Start Blog Posts -->
            <div class="col-md-9 blog-box">
            
            	<?php
				if( have_posts() )
				{
					while( have_posts() ): the_post();
					
					$categories		=	 get_the_category();
					$category_link	=	'';

					foreach( $categories as $index => $category )
					{
						if( count( $categories ) - 1 > $index )
						{
							$category_link .= '<a href="' . get_category_link( $category->cat_ID ) . '">' . esc_html( $category->name ) . '</a>, ';
						}
						else
						{
							$category_link .= '<a href="' . get_category_link( $category->cat_ID ) . '">' . esc_html( $category->name ) . '</a>';
						}
					}
					
					// Comments String
					$comments	=	get_comments_number( get_the_ID() );
					if( $comments == 0 )
					{
						$comment_string	=	__( 'No Comment' , 'the-margo' );
					}
					else
					{
						$comment_string = sprintf( __( '%s Comments' , 'the-margo' ) , $comments );
					}
					?>
                <!-- Start Post -->
                <div class="blog-post image-post">
                	<?php if( has_post_thumbnail() ):?>
                    <?php
					// Thumb
					$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-posts' );
					// var_dump( $large_image_url );
					?>
                    <!-- Post Thumb -->
                    <div class="post-head">
                        <a class="lightbox" title="This is an image title" href="images/blog-01.jpg">
                            <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                            <img alt="" src="<?php echo $large_image_url[0];?>">
                        </a>
                    </div>
                    <?php endif;?>
                    <!-- Post Content -->
                    <div class="post-content">
                        <div class="post-type"><i class="fa fa-picture-o"></i></div>
                        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        <ul class="post-meta">
                            <li><?php _e( 'By' , 'the-margo' );?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author();?></a></li>
                            <li><?php echo get_the_date();?></li>
                            <li><?php echo $category_link;?></li>
                            <li><a href="#"><?php echo $comment_string;?></a></li>
                        </ul>
                        <p><?php the_excerpt();?></p>
                        <a class="main-button" href="<?php the_permalink();?>"><?php _e( 'Read More' , 'the-margo' );?> <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- End Post -->    
                    <?php
					endwhile;
				}
				?>
                <!-- Start Pagination -->
                <?php the_margo_pagination();?>
                <!-- End Pagination -->
                
                

            </div>
            <!-- End Blog Posts -->
            
            
        </div>
    </div>
</div>
			
<?php get_footer(); ?>