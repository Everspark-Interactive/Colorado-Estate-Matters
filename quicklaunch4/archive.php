<?php
/*
 * Template for displaying blog posts in the specific category.
 */
?>

<?php get_header();?>

<div class="default-page" id="internal-page">
  <div class="default-page-container">
    <div class="default-main">
      <h1 class="tablet-mobile-only"><?php the_archive_title();?></h1>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="blog-post">
          <p class="blog-title"><a href="<?php the_permalink();?>" class=""><?php the_title();?></a></p>
          <p class="blog-time">Posted in <?php the_category(',');?> on <?php the_time('F j, Y'); ?></p>
          <?php the_excerpt();?>
        </div>

      <?php endwhile; else : ?>
        <p><?php ( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>

      <div class="navigation"><p><?php posts_nav_link(' - ','« Previous','Next »'); ?></p></div>


    </div>

    <div class="default-sidebar">
      <?php dynamic_sidebar( 'blog-sidebar' ); ?>
    </div>
  </div>
</div>

<?php get_footer();?>

