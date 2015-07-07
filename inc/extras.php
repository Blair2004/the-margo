<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package the margo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function the_margo_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'the_margo_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function the_margo_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'the-margo' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'the_margo_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function the_margo_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'the_margo_render_title' );
endif;

/**
 * Pagination Function
**/

if( ! function_exists( 'the_margo_pagination' ) ){
	function the_margo_pagination()
	{
		$prev_arrow = is_rtl() ? '&rarr;' : '&larr;';
        $next_arrow = is_rtl() ? '&larr;' : '&rarr;';
        global $wp_query;
        $total = $wp_query->max_num_pages;

        $big = 999999999; // need an unlikely integer
        if( $total > 1 )  {
             if( !$current_page = get_query_var('paged') )
                 $current_page = 1;
             if( get_option('permalink_structure') ) {
                 $format 	= 'page/%#%/';
             } else {
                 $format 	= '&paged=%#%';
             }
            $pagination		=	 paginate_links(array(
                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'        => $format,
                'current'       => $current	=	max( 1, get_query_var('paged') ),
                'total'         => $total,
                'mid_size'      => 3,
                'type'          => 'array',
                'prev_text'     => $prev_arrow,
                'next_text'     => $next_arrow,
             ) );
			 // var_dump( $pagination );
			 ?>
             <div id="pagination">
             	<span class="all-pages"><?php echo sprintf( __( 'Page %s of %s' , 'the-margo' ) , $current , $total );?></span>
             	<?php 
				foreach( $pagination as $page )
				{
					echo str_replace( 'page-numbers' , 'page-num' , $page );
				}
				?>
                <!--<span class="all-pages">Page 1 of 3</span>
                <span class="current page-num">1</span>
                <a class="page-num" href="#">2</a>
                <a class="page-num" href="#">3</a>
                <a class="next-page" href="#">Next</a>-->
            </div>
             <?php
        }

	}
}


/**
 * Filter For Comments Form
**/

add_filter( 'comment_form_default_fields' , 'the_margo_comment_form_fields' );

function the_margo_comment_form_fields( $fields )
{
	$fields[ 'author' ]	=	'<div class="row">
	<div class="col-md-4">
		<label for="author">' . __( 'Name' ) . '<span class="required">*</span></label>
		<input id="author" name="author" type="text" value="" size="30" aria-required="true">
	</div>';
	
	$fields[ 'email' ]	=	
	'<div class="col-md-4">
		<label for="author">' . __( 'Email' ) . '<span class="required">*</span></label>
		<input id="author" name="email" type="email" value="" size="30" aria-required="true">
	</div>';
	
	$fields[ 'url' ]	=	
	'<div class="col-md-4">
		<label for="author">' . __( 'Website' ) . '<span class="required">*</span></label>
		<input id="author" name="email" type="url" value="" size="30" aria-required="true">
	</div>
	</div>';
	
	return $fields;
}