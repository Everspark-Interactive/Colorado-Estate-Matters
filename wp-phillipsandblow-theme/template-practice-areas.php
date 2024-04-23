<?php
/*
 * Template Name: Practice Areas Grid
 */
?>

<?php get_header();?>
 
 <?php get_template_part( 'hero-inner' ); ?> 

 <div class="default-page full-width content" id="internal-page">
  
  <div class="default-page-container practices_areas">
    
    <h1 class="page-title txt-center"><?php the_title();?></h1>

    <div class="practice-areas-grid">
      <?php if( have_rows('practices_areas') ): while ( have_rows('practices_areas') ) : the_row(); ?>
        <div class="practice-area-item">
          <h3><?php the_sub_field('category_name'); ?></h3>
          <?php $menu_id = get_sub_field('practice_area_menu'); ?>
          <?php wp_nav_menu( array(
            'theme_location'  => '',
            'menu'            => $menu_id,
            'container'       => 'div',
            'container_class' => 'menu-practices-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => $menu_id,
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
          ) ); ?>
        </div>
      <?php endwhile; else : endif; ?>
    </div>
  </div>
</div>

<?php get_footer();?>


