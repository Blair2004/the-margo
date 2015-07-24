<form action="<?php echo  home_url( '/' );?>" method="get">
   <input type="search" value="<?php the_search_query(); ?>" name="s" placeholder="<?php _e( 'Enter your search here...' , 'the-margo' );?>">
   <input type="hidden" value="post" name="post_type" id="post_type" />
   <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
</form>
