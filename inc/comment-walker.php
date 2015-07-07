<?php
class Margo_Comments_Walker extends Walker_Comment {
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	// constructor – wrapper for the comments list
	function __construct() { ?>

		<ol class="comments-list">

	<?php }

	// start_lvl – wrapper for child comments list
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>
		
		<ul>

	<?php }

	// end_lvl – closing wrapper for child comments list
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>

		</ul>

	<?php }

	// start_el – HTML for comment template
	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 

		if ( 'article' == $args['style'] ) {
			$tag = 'article';
			$add_below = 'comment';
		} else {
			$tag = 'article';
			$add_below = 'comment';
		} ?>
      <li>
		<div <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent' ) . ' comment-box clearfix' ) ?> itemprop="comment" itemscope itemtype="http://schema.org/Comment" id="comment-<?php comment_ID() ?>">
			<div class="avatar"><?php echo get_avatar( $comment, 65 ); ?></div>
			<div class="comment-content" role="complementary">
         	<div class="comment-meta" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"> 
            	<span class="comment-by"><a class="comment-author-link" href="<?php echo comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a></span> 
               <span class="comment-date"><?php echo sprintf( __( '%s at %s' , 'the-margo' ) , get_comment_date('jS F Y') , get_comment_time() ) ?></span> 
               <span class="reply-link"><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));?></span> 
               <!-- <a href="#comment-<?php comment_ID() ?>" itemprop="url">Reply</a> -->
               <?php edit_comment_link( __( 'Edit this comment' , 'the-margo' ) ,'',''); ?>
               
				</div>				
				<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-meta-item">Your comment is awaiting moderation.</p>
				<?php endif; ?>
            <p><?php comment_text() ?></p>
			</div>
		</div>
	<?php 
	}

	// end_el – closing HTML for comment template
	function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

      </li>

	<?php }

	// destructor – closing wrapper for the comments list
	function __destruct() { ?>

		</ul>
	
	<?php }

}
?>