<?php
/*
 * Template for single blog posts.
 */
?>

<?php get_header();?>

<div class="default-page" id="internal-page">
  <div class="default-page-container">
    <div class="default-main">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <p class="blog-time">Posted on <span><?php the_time('F j, Y'); ?></span> in <?php the_category(',');?></p>
        <?php the_content();?>

      <?php endwhile; else : ?>
        <p><?php ( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>

    </div>

    <div class="default-sidebar">
      <?php dynamic_sidebar( 'blog-sidebar' ); ?>
    </div>
  </div>
</div>

<?php get_footer();?>
