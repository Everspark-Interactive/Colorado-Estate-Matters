<?php
/*
 * Default Template
 */
?>

<?php get_header();?>
  
  <?php get_template_part( 'hero-inner' ); ?>

  <div class="default-page content">
    <div class="default-page-container has-sidebar">
      <div class="default-main">
        <h1 class="page-title"><?php the_title();?></h1>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content();?>
        <?php endwhile; else : ?>
          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>

      </div>

      <div class="default-sidebar">
        <?php bulk_sidebar(); ?>
      </div>
    </div>
  </div>

<?php get_footer();?>