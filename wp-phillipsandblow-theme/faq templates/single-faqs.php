<?php
/*
 * Default Template
 */
?>

<?php get_header();?>
  
  <div class="default-page-wrap" id="internal-page">
    <div class="default-page-container has-sidebar">
      <div class="default-main content">
      <div class="back-link"><a href="/faqs">Back to all FAQs</a></div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          
          <div class="blog-post-single">
            <h1 class="blog-title"><?php the_title();?></h1>
            <!-- <p class="blog-time"><?php the_time('F j, Y'); ?> Posted In <?php the_category(',');?> <br> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a>
            </p> -->
            <?php the_content();?>
          </div>
          
        <?php endwhile; endif; ?>

      </div>

      <div class="default-sidebar">
        <?php bulk_sidebar(); ?>
      </div>
    </div>
  </div>

<?php get_footer();?>
