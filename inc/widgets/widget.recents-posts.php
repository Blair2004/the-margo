<?php
class margo_recents_posts_widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct( 'widget-popular-posts' , __( 'Margo WordPress Posts' , 'the-margo' ) , array(
			'description'	=>	__( 'Displays Posts in your sidebar' )
		) );
	}
	
	function widget( $args , $instance )
	{
		$title	=	apply_filters( 'widget_tilte' , $instance[ 'title' ] );		
		$args[ 'before_widget' ]	=	str_replace( 'widget_widget-popular-posts' , 'widget-popular-posts' , $args[ 'before_widget' ] );

	
		echo $args[ 'before_widget' ];
		echo ! empty( $title ) ? $args[ 'before_title' ] . $title . $args[ 'after_title' ] : '';
		if( $instance[ 'order' ] === 'most_commented' )
		{
			$popular = new WP_Query('orderby=comment_count&posts_per_page=' . $instance[ 'number' ] );
			if( $popular->have_posts() )
			{
            echo '<ul>';
				while( $popular->have_posts() ): $popular->the_post();
					$widget_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $popular->ID ), 'widget-thumb' );
					// var_dump( $widget_thumb );
					?>
               <li>
               <?php
					if( $widget_thumb ): // if thumb exists
						// if well sized thumb exists
						if( $widget_thumb[3] === true )
						{
						?>
                  <div class="widget-thumb">
                     <a href="<?php the_title();?>"><img src="<?php echo $widget_thumb[0];?>" alt="<?php the_title();?>"></a>
                  </div>
						<?php						
						}
						else
						{
						?>
                  <div class="widget-thumb">
                     <a href="<?php the_title();?>"><img src="<?php echo $widget_thumb[0];?>" alt="<?php the_title();?>"></a>
                  </div>
						<?php
						}
					endif;
					?>
                  <div class="widget-content">
                     <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                     <?php
							if( isset( $instance[ 'showdate' ] ) )
							{
								if( $instance[ 'showdate' ] === 'yes' )
								{
							?>
                     <span><?php the_date();?></span>
                     <?php
								}
							}
							?>
                  </div>
                  <div class="clearfix"></div>
               </li>         
               <?php
				endwhile;
				echo '</ul>';
			}
		}
		else if( $instance[ 'order' ] === 'recents' )
		{
			 global $post;
			 $myposts = get_posts('numberposts=5&offset=1&tag=tagslug,tagslug2');
			 foreach($myposts as $post) :
			setup_postdata($post);
	 		?>
    		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
 			<?php 
			endforeach; 
		}
		echo $args[ 'after_widget' ];
	}
	
	function form( $instance )
	{
		$title		=	__( 'Post Widgets' , 'the-margo' );
		$order		=	isset( $instance[ 'order' ] ) ? $instance[ 'order' ] : 'recents';
		$number		=	isset( $instance[ 'number' ] ) ? $instance[ 'number' ] : 10;
		$showdate	=	isset( $instance[ 'showdate' ] ) ? $instance[ 'showdate' ] : 'no';
		if( isset( $instance[ 'title' ] ) )
		{
			$title	=	$instance[ 'title' ];
		}
		?>
      <label for="<?php echo $this->get_field_id( 'title' );?>">
      	<?php _e( 'Title' , 'the-margo' );?> :
      </label>
      <br />
      <input type="text" name="<?php echo $this->get_field_name( 'title' );?>" value="<?php echo esc_attr( $title );?>" />
      <br />
      <br />
      <label for="<?php echo $this->get_field_id( 'order' );?>">
      	<?php _e( 'Order By' , 'the-margo' );?> :
      </label>
      <br />
      <select name="<?php echo $this->get_field_name( 'order' );?>">
      	<option <?php echo $order == 'recents' ? 'selected="selected"' : '';?> value="recents"><?php _e( 'Most recents' , 'the-margo' );?></option>
         <option <?php echo $order == 'most_commented' ? 'selected="selected"' : '';?> value="most_commented"><?php _e( 'Most Commented' , 'the-margo' );?></option>
         <option <?php echo $order == 'old_ones' ? 'selected="selected"' : '';?> value="old_ones"><?php _e( 'Old One' , 'the-margo' );?></option>
      </select>
      <br />
      <br />
      <label for="<?php echo $this->get_field_id( 'showdate' );?>">
      	<?php _e( 'Display date ?' , 'the-margo' );?> :
      </label>
      <br />
      <select name="<?php echo $this->get_field_name( 'showdate' );?>">
      	<option <?php echo $showdate == 'yes' ? 'selected="selected"' : '';?> value="yes"><?php _e( 'Yes' , 'the-margo' );?></option>
         <option <?php echo $showdate == 'no' ? 'selected="selected"' : '';?> value="no"><?php _e( 'No' , 'the-margo' );?></option>
      </select>
      <br />
      <br />
      <label for="<?php echo $this->get_field_id( 'number' );?>">
      	<?php _e( 'How many posts' , 'the-margo' );?> :
      </label>
      <br />
      <input type="text" name="<?php echo $this->get_field_name( 'number' );?>" value="<?php echo esc_attr( $number );?>" />
      <br />
      <br />
      <?php
	}
	
	function update( $new_instance , $old_instance )
	{
		$instance	=	array();
		$instance[ 'title' ]	=	( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
		$instance[ 'order' ]	=	( ! empty( $new_instance[ 'order' ] ) ) ? strip_tags( $new_instance[ 'order' ] ) : '';
		$instance[ 'number' ]	=	( ! empty( $new_instance[ 'number' ] ) ) ? strip_tags( $new_instance[ 'number' ] ) : '';
		$instance[ 'showdate' ]	=	( ! empty( $new_instance[ 'showdate' ] ) ) ? strip_tags( $new_instance[ 'showdate' ] ) : '';
		return $instance;
	}
}