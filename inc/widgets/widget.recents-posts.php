<?php
class margo_recents_posts_widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct( 'margo_posts_widget' , __( 'Margo WordPress Posts' , 'the-margo' ) , array(
			'description'	=>	__( 'Displays Posts in your sidebar' )
		) );
	}
	
	function widget( $args , $instance )
	{
		$title	=	apply_filters( 'widget_tilte' , $instance[ 'title' ] );
		var_dump( $instance );
		
		echo $args[ 'before_widget' ];
		echo ! empty( $title ) ? $args[ 'before_title' ] . $title . $args[ 'after_title' ] : '';
		echo $args[ 'after_widget' ];
	}
	
	function form( $instance )
	{
		$title		=	__( 'Post Widgets' , 'the-margo' );
		$order		=	isset( $instance[ 'order' ] ) ? $instance[ 'order' ] : 'recents';
		$number		=	isset( $instance[ 'number' ] ) ? $instance[ 'number' ] : 10;
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
      <label for="<?php echo $this->get_field_id( 'order' );?>">
      	<?php _e( 'How many posts' , 'the-margo' );?> :
      </label>
      <br />
      <input type="text" name="<?php echo $this->get_field_name( 'number' );?>" value="<?php echo esc_attr( $number );?>" />
      <br />
      <?php
	}
	
	function update( $new_instance , $old_instance )
	{
		$instance	=	array();
		$instance[ 'title' ]	=	( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
		$instance[ 'order' ]	=	( ! empty( $new_instance[ 'order' ] ) ) ? strip_tags( $new_instance[ 'order' ] ) : '';
		$instance[ 'number' ]	=	( ! empty( $new_instance[ 'number' ] ) ) ? strip_tags( $new_instance[ 'number' ] ) : '';
		return $instance;
	}
}