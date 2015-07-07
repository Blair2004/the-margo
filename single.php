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

<!-- Start Content -->
<div id="content">
   <div class="container">
      <div class="row blog-post-page">
         <div class="col-md-9 blog-box">
            <?php if( have_posts() ): while( have_posts() ): the_post();?>
            <?php
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
				// Post tags
				$tags			=	wp_get_post_tags( get_the_ID() , array(
					'orderby'	=>	'name',
					'order'		=>	'ASC',
					'fields'		=>	'all'
				) );
				
				$tags_string	=	'';
				foreach( $tags as $tag )
				{
					$tags_string	.= '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a> ';
				}
				
				?>
            <!-- Start Single Post Area -->
            <div class="blog-post gallery-post"> 
               
               <!-- Start Single Post (Gallery Slider) -->
               <?php if( true == false ): // only if slider is enabled ?>
               <div class="post-head">
                  <div class="touch-slider post-slider">
                     <div class="item"> <a class="lightbox" title="This is an image title" href="images/blog-02.jpg" data-lightbox-gallery="gallery1">
                        <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                        <img alt="" src="images/blog-02.jpg"> </a> </div>
                     <div class="item"> <a class="lightbox" title="This is an image title" href="images/blog-03.jpg" data-lightbox-gallery="gallery1">
                        <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                        <img alt="" src="images/blog-03.jpg"> </a> </div>
                     <div class="item"> <a class="lightbox" title="This is an image title" href="images/blog-04.jpg" data-lightbox-gallery="gallery1">
                        <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                        <img alt="" src="images/blog-04.jpg"> </a> </div>
                  </div>
               </div>
               <?php elseif( has_post_thumbnail() ):?>
               <div class="post-head">
               	<?php the_post_thumbnail( 'blog-posts' );?>
               </div>
               <?php endif ;?>
               <!-- End Single Post (Gallery) --> 
               
               <!-- Start Single Post Content -->
               <div class="post-content">
                  <div class="post-type"><i class="fa fa-picture-o"></i></div>
                  <h2><?php the_title();?></h2>
                  <ul class="post-meta">
                      <li><?php _e( 'By' , 'the-margo' );?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author();?></a></li>
                      <li><?php echo get_the_date();?></li>
                      <li><?php echo $category_link;?></li>
                      <li><a href="#"><?php echo $comment_string;?></a></li>
                  </ul>
                  <p><?php the_content();?></p>
                  <div class="post-bottom clearfix">
                     <div class="post-tags-list"> <?php echo $tags_string;?> </div>
                     <div class="post-share"> <span>Share This Post:</span> <a class="facebook" href="#"><i class="fa fa-facebook"></i></a> <a class="twitter" href="#"><i class="fa fa-twitter"></i></a> <a class="gplus" href="#"><i class="fa fa-google-plus"></i></a> <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a> <a class="mail" href="#"><i class="fa fa-envelope"></i></a> </div>
                  </div>
                  <div class="author-info clearfix">
                     <div class="author-image"> <a href="#"><img alt="" src="images/author.png" /></a> </div>
                     <div class="author-bio">
                        <h4>About The Author</h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia desrut mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                     </div>
                  </div>
               </div>
               <!-- End Single Post Content --> 
               
            </div>
            <!-- End Single Post Area -->
            
            <!-- Start Comment Area --> 
            <?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>            
            <!-- End Comment Area --> 
            
            <?php endwhile;?>
            
            <?php else:?>
            
            <?php endif;?>
            
         </div>
         
         <!-- Sidebar -->
         <div class="col-md-3 sidebar right-sidebar"> 
            
            <!-- Search Widget -->
            <div class="widget widget-search">
               <form action="#">
                  <input type="search" placeholder="Enter Keywords..." />
                  <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
               </form>
            </div>
            
            <!-- Categories Widget -->
            <div class="widget widget-categories">
               <h4>Categories <span class="head-line"></span></h4>
               <ul>
                  <li> <a href="#">Brandign</a> </li>
                  <li> <a href="#">Design</a> </li>
                  <li> <a href="#">Development</a> </li>
                  <li> <a href="#">Graphic</a> </li>
               </ul>
            </div>
            
            <!-- Popular Posts widget -->
            <div class="widget widget-popular-posts">
               <h4>Popular Post <span class="head-line"></span></h4>
               <ul>
                  <li>
                     <div class="widget-thumb"> <a href="#"><img src="images/blog-mini-01.jpg" alt="" /></a> </div>
                     <div class="widget-content">
                        <h5><a href="#">How To Download The Google Fonts Catalog</a></h5>
                        <span>Jul 29 2013</span> </div>
                     <div class="clearfix"></div>
                  </li>
                  <li>
                     <div class="widget-thumb"> <a href="#"><img src="images/blog-mini-02.jpg" alt="" /></a> </div>
                     <div class="widget-content">
                        <h5><a href="#">How To Download The Google Fonts Catalog</a></h5>
                        <span>Jul 29 2013</span> </div>
                     <div class="clearfix"></div>
                  </li>
                  <li>
                     <div class="widget-thumb"> <a href="#"><img src="images/blog-mini-03.jpg" alt="" /></a> </div>
                     <div class="widget-content">
                        <h5><a href="#">How To Download The Google Fonts Catalog</a></h5>
                        <span>Jul 29 2013</span> </div>
                     <div class="clearfix"></div>
                  </li>
               </ul>
            </div>
            
            <!-- Video Widget -->
            <div class="widget">
               <h4>Video <span class="head-line"></span></h4>
               <div>
                  <iframe src="http://player.vimeo.com/video/63322694?byline=0&amp;portrait=0&amp;badge=0" width="800" height="450"></iframe>
               </div>
            </div>
            
            <!-- Tags Widget -->
            <div class="widget widget-tags">
               <h4>Tags <span class="head-line"></span></h4>
               <div class="tagcloud"> <a href="#">Portfolio</a> <a href="#">Theme</a> <a href="#">Mobile</a> <a href="#">Design</a> <a href="#">Wordpress</a> <a href="#">Jquery</a> <a href="#">CSS</a> <a href="#">Modern</a> <a href="#">Theme</a> <a href="#">Icons</a> <a href="#">Google</a> </div>
            </div>
         </div>
         <!--End sidebar--> 
         
      </div>
   </div>
</div>
<!-- End content -->
<?php get_footer(); ?>
