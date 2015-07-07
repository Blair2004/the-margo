<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package the margo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">
	<?php if ( have_comments() ) : ?>
	<h2 class="comments-title">
	<?php
	printf( // WPCS: XSS OK.
		esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'the-margo' ) ),
		number_format_i18n( get_comments_number() ),
		'<span>' . get_the_title() . '</span>'
	);
	?>
   </h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'the-margo' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'the-margo' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'the-margo' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<?php
         wp_list_comments( array(
            'max_depth'		=>	3,
            'walker'			=>	new Margo_Comments_Walker,
            'style'      	=> 'ol',
            'short_ping' 	=> true,
         ) );
      ?>
		<!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'the-margo' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'the-margo' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'the-margo' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'the-margo' ); ?></p>
	<?php endif; ?>
	<?php
	$args	=	array(
		'comment_field'	=>		'<div class="row">
			<div class="col-md-12">
				<label for="comment">Add Your Comment</label>
				<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
			</div>
		</div>'	,
		
		'comment_notes_after' => '<p class="form-allowed-tags">' .
    sprintf(
      __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
      ' <code>' . allowed_tags() . '</code>'
    ) . '</p><br>'
		
	);
	?>
   <!-- Start Respond Form -->
   <?php comment_form( $args ); ?>      
	<!-- End Respond Form -->

</div><!-- #comments -->
