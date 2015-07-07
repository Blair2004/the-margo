<?php
if( have_posts() )
{
	while( have_posts() ): the_post();
	?>
	<?php if( has_post_thumbnail() ):?>
		<?php	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-posts' );?>
         <!-- Post Thumb -->
   
   		<div class="post-head"> 
         	<a class="lightbox" title="<?php the_title();?>" href="<?php echo $large_image_url[0];?>">
      		<div class="thumb-overlay"><i class="fa fa-arrows-alt"></i>
				</div>
      		<img alt="<?php the_title();?>" src="<?php echo $large_image_url[0];?>"> </a> 
			</div>
   <?php 
	endif;
	
	the_content();
	
	endwhile;
}
?>
