<?php
class margo_comments_widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 
			'classname' 	=> 'widget-popular-posts', 
			'description' 	=> __( 'Your site&#8217;s most recent comments.' ) 
		);
		parent::__construct('recent-comments', __( 'Margo Recent Comments' , 'the-margo' ), $widget_ops);
		$this->alt_option_name = 'widget_recent_comments';

		if ( is_active_widget(false, false, $this->id_base) )
			add_action( 'wp_head', array($this, 'recent_comments_style') );

		add_action( 'comment_post', array($this, 'flush_widget_cache') );
		add_action( 'edit_comment', array($this, 'flush_widget_cache') );
		add_action( 'transition_comment_status', array($this, 'flush_widget_cache') );
	}

	public function recent_comments_style() {

		/**
		 * Filter the Recent Comments default widget styles.
		 *
		 * @since 3.1.0
		 *
		 * @param bool   $active  Whether the widget is active. Default true.
		 * @param string $id_base The widget ID.
		 */
		if ( ! current_theme_supports( 'widgets' ) // Temp hack #14876
			|| ! apply_filters( 'show_recent_comments_widget_style', true, $this->id_base ) )
			return;
		?>
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<?php
	}

	public function flush_widget_cache() {
		wp_cache_delete('widget_recent_comments', 'widget');
	}

	public function widget( $args, $instance ) {
		global $comments, $comment;

		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get('widget_recent_comments', 'widget');
		}
		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		$output = '';

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments' );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		$word_limit 	= ( ! empty( $instance['word_limit'] ) ) ? absint( $instance['word_limit'] ) : 5;
		if ( ! $number )
			$number = 5;

		/**
		 * Filter the arguments for the Recent Comments widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Comment_Query::query() for information on accepted arguments.
		 *
		 * @param array $comment_args An array of arguments used to retrieve the recent comments.
		 */
		$comments = get_comments( apply_filters( 'widget_comments_args', array(
			'number'      => $number,
			'status'      => 'approve',
			'post_status' => 'publish'
		) ) );

		$output .= $args['before_widget'];
		if ( $title ) {
			$output .= $args['before_title'] . $title . $args['after_title'];
		}

		$output .= '<ul id="recentcomments" class="">';
		if ( $comments ) {
			// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
			$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

			foreach ( (array) $comments as $comment ) {
				// var_dump( $comment );
				$comment_content 	= ( $word_limit > 0 ) ? wp_trim_words( $comment->comment_content , $word_limit ) :  $comment->comment_content;
				$authorlink			=	get_comment_author_link();
				ob_start();
				?>
            <li>
               <div class="widget-thumb">
                  <a href="<?php echo $authorlink;?>"><?php echo get_avatar( esc_url( $comment->comment_author_email ) , 65 );?></a>
               </div>
               <div class="widget-content">
                  <p> 
							<?php echo sprintf( __( '%s said : ' , 'the-author' ) , $authorlink ); ?>
                  	<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ;?>"><?php echo $comment_content; ;?></a>
                     <a href="<?php echo esc_url( $comment->guid );?>"> <?php echo get_the_title( $comment->comment_post_ID ) ;?></a>
						</p>
                  <span><?php echo comment_date( 'M j, Y' , $comment->comment_ID );?></span>
               </div>
               <div class="clearfix"></div>
            <?php
				$output .= ob_get_clean();
			}
		}
		$output .= '</ul>';
		$output .= $args['after_widget'];

		echo $output;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = $output;
			wp_cache_set( 'widget_recent_comments', $cache, 'widget' );
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = absint( $new_instance['number'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_comments']) )
			delete_option('widget_recent_comments');

		return $instance;
	}

	public function form( $instance ) {
		$title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$word_limit = isset( $instance[ 'word_limit' ] ) ? absint( $instance[ 'word_limit' ] ) : 0;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of comments to show:' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
      
		<p><label for="<?php echo $this->get_field_id( 'word_limit' ); ?>"><?php _e( 'Max words per comments:' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'word_limit' ); ?>" name="<?php echo $this->get_field_name( 'word_limit' ); ?>" type="text" value="<?php echo $word_limit; ?>" size="3" /></p>
<?php
	}
}