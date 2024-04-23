<?php
/*
 * Template for displaying blog posts in the specific category.
 */
get_header();
get_template_part( 'blog-header' );
?>

<div class="default-page has-sidebar" id="internal-page">
  <div class="default-page-container has-sidebar inner-container">

    <div class="default-main content">
		<h1 class="main-heading"><?php echo get_field('blog_title', 'option') ?></h1>
		<?php
		if ((is_home() && ! is_front_page()) || (is_category() && is_archive())) {
            echo do_shortcode('[blog_category_filter]');
        }
		?>

      <div class="blog-posts">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="blog-post">
          <h2 class="blog-title"><a href="<?php the_permalink();?>" class=""><?php the_title();?></a></h2>
          <p class="blog-time"><?php the_time('F j, Y'); ?> Posted In <?php the_category(',');?>  <br> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a> </p>
          <?php the_excerpt();?>
          <a href="<?php echo get_permalink() ?>" class="read-more">
            read more
          </a>
        </div>

      <?php endwhile; else : ?>
        <p><?php ( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
      </div>
      
      <div class="navigation">
        <?php wp_pagenavi(); ?>
      </div>

    </div>

    <div class="default-sidebar">
      <?php bulk_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>