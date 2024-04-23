<?php
/*
 * Template Name: Homepage
 */

 $hero_desktop = get_field('hero_desktop');     
 $hero_laptop = get_field('hero_laptop');     
 $hero_tablet = get_field('hero_tablet');     
 $hero_mobile = get_field('hero_mobile'); 

?>

<?php get_header();?>

   <!-- Home Hero -->
  <div class="home-hero">
    <div class="hero-bg">
      <?php if ($hero_desktop): ?>
        <div class="desktop-only" style="background-image: url(<?php echo $hero_desktop ?>);"></div>
      <?php endif ?>
      <?php if ($hero_laptop): ?>
        <div class="laptop-only" style="background-image: url(<?php echo $hero_laptop ?>);"></div>
      <?php endif ?>
      <?php if ($hero_tablet): ?>
        <div class="tablet-only" style="background-image: url(<?php echo $hero_tablet ?>);"></div>
      <?php endif ?>
      <?php if ($hero_mobile): ?>
        <div class="mobile-only" style="background-image: url(<?php echo $hero_mobile ?>);"></div>
      <?php endif ?>
    </div>
    <div class="hero-headings">
      <div class="container">
        <div class="headings-wrap">
          <div class="home-hero-subtitle"><?php echo get_field('hero_subtitle') ?></div>
          <div class="home-hero-title"><?php echo get_field('hero_title') ?></div>
        </div>
        <a href="#contact" class="hero-btn">
          <span>Click here for a free consultation</span>
        </a>
      </div>
    </div>
    <div class="hero-headings-footer">
      <div class="container">
        <div class="home-footer-title"><?php echo get_field('hero_footer_title') ?></div>
        <div class="home-footer-copy"><?php echo get_field('hero_footer_copy') ?></div>
      </div>
    </div>

  </div>

  <a href="#contact" class="hero-btn btn tablet-mobile-only">
    <span>Click here for a free consultation</span>
  </a>

  <!-- Selling Points -->
  <div class="selling-points">
      <div class="selling-points-grid">
        <?php $selling_points = get_field('selling_points') ?>
        <?php foreach ($selling_points as $selling_point): ?>
          <div class="selling-point">
            <div class="normal">
              <div class="sp-title"><?php echo $selling_point['heading'] ?></div>
              <div class="sp-subtitle"><?php echo $selling_point['subheading'] ?></div>
              <div class="dots-sep">
                <span></span>
              </div>
            </div>
            <div class="hovered">
              <div class="hover-heading"><?php echo $selling_point['hover_heading'] ?></div>
              <div class="dots-sep">
                <span></span>
              </div>
              <div class="hover-copy"><?php echo $selling_point['hover_copy'] ?></div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
  </div>

  <!-- Content One -->
  <div class="content-one-home content">
    <?php $content1 = get_field('content_one'); ?>
  	<div class="container">
       <div class="content-one-headings">
         <div class="subheading"><?php echo $content1['subheading'] ?></div>
         <h1 class="c1-heading">
           <?php echo $content1['heading'] ?>
         </h1>
       </div>
       <div class="content-one-wrap">
         
         <div class="content1-right">
           <?php echo $content1['content'] ?>
         </div>

         <div class="side-menu-right">
           <?php $menu_id = $content1['sidebar']; ?>
            <?php wp_nav_menu( array(
              'theme_location'  => '',
              'menu'            => $menu_id,
              'container'       => 'div',
              'container_class' => 'practice-side-home',
              'container_id'    => '',
              'menu_class'      => 'menu',
              'menu_id'         => 'home-side',
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
         
      </div>
  	</div>
  </div>

  <div class="content-one-bottom content">
    <div class="container">
      <?php echo $content1['content_one_bottom']; ?>
    </div>
  </div>


  <div class="practice-areas-home">
    <div class="pa-heading"><?php echo get_field('pa_heading') ?></div>
    <?php $practice_areas = get_field('practice_areas'); ?>
    <div class="practice-areas-grid-hp">
      <?php foreach ($practice_areas as $practice_area): ?>
        <div class="pa-item" style="background-image: url(<?php echo $practice_area['background_image'] ?>);">
          <a href="<?php echo $practice_area['link'] ?>">
            <?php echo $practice_area['title'] ?>

            <span class="dots-wrap">
              <span class="dots-sep"></span>
            </span>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>

  <div class="mobile-only">
    <a href="<?php echo get_field('view_all_practice_area_link') ?>" class="btn pa-view">
      tap here for all practice areas
    </a>
  </div>

  <div class="content-two-home content">
    <div class="client-reveiews-sidebar">
      <?php $client_reviews = get_field('reviews'); ?>
      <div class="reveiew-heading"><?php echo get_field('cr_heading') ?></div>
      <div class="clients-reviews">
        <?php foreach ($client_reviews as $review): ?>
          <div class="review-item">
            <div class="rating-stars"></div>
            <div class="review-copy">
              <?php echo $review['copy'] ?>
            </div>
            <div class="review-meta">
              <span><?php echo $review['author']; ?></span>
              <span class="sep">|</span>
              <span><?php echo $review['designation']; ?></span>
            </div>
          </div>
        <?php endforeach ?>

        <a href="<?php echo get_field('view_all_reviews') ?>" class="btn">
          view all testimonials
        </a>
      </div>
    </div>
    <div class="content-two">
      <?php echo get_field('content_right') ?>
    </div>
  </div>

<?php get_footer();?>