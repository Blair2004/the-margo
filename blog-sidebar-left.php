<?php require get_template_directory() . '/inc/globals.php';?>
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
					
					$fa_icon	=	'fa-picture-o';
					$current_post_format	=	get_post_format( get_the_ID() );
					switch( $current_post_format )
					{
						default 			: 	$fa_icon	=	'newspaper-o'; break;
						case 'quote' 	: 	$fa_icon	=	'quote-left'; break;
						case 'image'	:	$fa_icon	=	'image'; break;
						case 'gallery'	:	$fa_icon = 	'image'; break;
						case 'video'	:	$fa_icon	=  'file-video-o'; break;
					}
					$fa_icon		=	'fa-' . $fa_icon;
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
                        <a class="lightbox" title="<?php the_title();?>" href="<?php echo $large_image_url[0];?>">
                            <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                            <img alt="" src="<?php echo $large_image_url[0];?>">
                        </a>
                    </div>
                 <?php endif;?>
                 <!-- Post Content -->
                 <div class="post-content">
                     <div class="post-type">
                     <i class="fa <?php echo $fa_icon;?>"></i></div>
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
            <!--Sidebar-->
            <div class="col-md-3 sidebar left-sidebar">
                <!-- Search Widget -->
                <?php dynamic_sidebar( 'left-sidebar' ); ?>
            </div>
            <!--End sidebar-->