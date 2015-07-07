<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package the margo
 */
 
/*
Template Name: No Sidebar
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
      <div class="page-content">
         <div class="row"> 
            <!-- Start Blog Posts -->
            <div class="col-md-12 blog-box">
               <?php get_template_part( 'page' , 'content' );?>
            </div>
            <!-- End Blog Posts --> 
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>