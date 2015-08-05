<?php require get_template_directory() . '/inc/globals.php'; ?>

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
                <h4 class="classic-title"><span><?php the_title();?></span></h4>
                <div class="page-content">
                	<?php the_content();?>
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
            <div class="col-md-3 sidebar right-sidebar">
                <!-- Search Widget -->
                <?php dynamic_sidebar( $the_margo_right_sidebar ); ?>
            </div>
            <!--End sidebar-->