<?php
/*
 * Template Name: FAQs Category
 */

get_header();
get_template_part('blog-header');
?>

<div class="default-page has-sidebar" id="internal-page">
  <div class="default-page-container has-sidebar inner-container">
    <div class="default-main content">
      <h1 class="main-heading"><?php single_term_title(); ?></h1>
      <?php
      echo do_shortcode('[faqs_category_filter]');
      ?>
      <div class="blog-posts test">

        <?php
        // Custom query to fetch FAQs for the current FAQ category
        $args = array(
          'post_type' => 'faqs',
          'posts_per_page' => -1, // Display all FAQs
          'tax_query' => array(
            array(
              'taxonomy' => 'faqs_category',
              'field'    => 'slug',
              'terms'    => get_queried_object()->slug,
            ),
          ),
        );
        $faq_query = new WP_Query($args);
        if ($faq_query->have_posts()) :
          while ($faq_query->have_posts()) : $faq_query->the_post();
        ?>
            <div class="blog-post">
              <h2 class="blog-title"><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></h2>
              <!-- <p class="blog-time"><?php the_time('F j, Y'); ?> Posted In <?php the_category(','); ?>  <br> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> </p> -->
              <?php the_excerpt(); ?>
              <a href="<?php echo get_permalink() ?>" class="read-more">
                read more
              </a>
            </div>
        <?php
          endwhile;
          wp_reset_postdata(); // Reset the query
        else :
          echo 'Sorry, no FAQs found.';
        endif;
        ?>
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