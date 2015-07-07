<?php
/*
Template Name: Sidebar Left
*/
?>

<?php get_header(); ?>

<div class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Blog</h2>
                <p>Blog Page With Right Sidebar</p>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row blog-page">
            
            
            <!--Sidebar-->
            <div class="col-md-3 sidebar left-sidebar">                
                <!-- Search Widget -->
                <?php dynamic_sidebar( 'left-sidebar' ); ?>
            </div>
            <!--End sidebar-->
            
            
            <!-- Start Blog Posts -->
            <div class="col-md-9 blog-box">            
            <?php get_template_part( 'page' , 'content' );?>
            </div>
            <!-- End Blog Posts -->
            
            
        </div>
    </div>
</div>
			
<?php get_footer(); ?>