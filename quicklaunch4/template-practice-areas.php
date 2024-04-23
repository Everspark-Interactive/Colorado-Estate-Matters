<?php
/*
 * Template Name: Practice Areas
 */
?>

<?php get_header();?>

  <div class="practice-areas-page" id="internal-page">
    <div class="practice-areas-page-container">
      <h1 class="tablet-mobile-only"><?php the_title();?></h1>

      <div class="practice-area-menus">
        <?php if( have_rows('practice_areas_menu') ): while ( have_rows('practice_areas_menu') ) : the_row(); ?>
          <h3><?php the_sub_field('practice_area_parent_title'); ?></h3>
          <?php the_sub_field('menu'); ?>
        <?php endwhile; else : endif; ?>
      </div>
    </div>
  </div>

<?php get_footer();?>