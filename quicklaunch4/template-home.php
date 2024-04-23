<?php
/*
 * Template Name: Homepage
 */
 ?>

<?php get_header();?>

  <!-- Section 1 - Content 1
   --------------------------------------------------------------------------------------- -->

  <section id="section-1">
    <div class="section-1-container">
      <div class="section-1-left">
        <?php the_field('content_1'); ?>
      </div>

      <div class="section-1-right">
        <h4>Practice Areas</h4>
        <?php wp_nav_menu( array('menu' => 'Sidebar Menu' )); ?>
      </div>
    </div>
  </section>


  <!-- Section 2 - Results
   --------------------------------------------------------------------------------------- -->

  <section id="section-2">
    <div class="section-2-results">
      <?php if( have_rows('homepage_results') ): while ( have_rows('homepage_results') ) : the_row(); ?>
        <div class="result-item">
          <h4>$<?php the_sub_field('result_amount'); ?></h4>
          <h5><?php the_sub_field('result_type'); ?></h5>
          <p><?php the_sub_field('result_summary'); ?></p>
        </div>
      <?php endwhile; else : endif; ?>
    </div>
  </section>


  <!-- Section 3 - Awards
   --------------------------------------------------------------------------------------- -->

  <section id="section-3">
    <div class="section-3-container">
      <?php if( have_rows('homepage_awards') ): while ( have_rows('homepage_awards') ) : the_row(); ?>
          <div><img src="<?php the_sub_field('award_icon'); ?>"></div>
      <?php endwhile; else : endif; ?>
    </div>
  </section>


  <!-- Section 4 - Testimonial
   --------------------------------------------------------------------------------------- -->

  <section id="section-4">
    <div class="section-4-container">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/stars.png">
      <p><?php the_field('testimonial_content'); ?></p>
      <h4><?php the_field('testimonial_author_and_location'); ?></h4>

      <a href="<?=get_permalink(52); ?>">VIEW ALL TESTIMONIALS</a>
    </div>
  </section>


  <!-- Section 5 - Team
   --------------------------------------------------------------------------------------- -->

  <section id="section-5">
    <h3>MEET OUR TEAM</h3>

    <div class="section-5-container">
      <div class="section-5-slider">
        <?php if( have_rows('homepage_team') ): while ( have_rows('homepage_team') ) : the_row(); ?>
          <div class="team-member-item">
            <div class="team-member-picture" style="background: url(<?php the_sub_field('member_image'); ?>) center center / cover no-repeat;">
              <a href="<?php the_sub_field('member_page_link'); ?>">VIEW PROFILE</a>
            </div>

            <h4><?php the_sub_field('member_name'); ?></h4>
            <h5><?php the_sub_field('member_position'); ?></h5>
          </div>
        <?php endwhile; else : endif; ?>
      </div>

      <div class="section-5-arrow" id="section-5-prev">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png">
      </div>

      <div class="section-5-arrow" id="section-5-next">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png">
      </div>
    </div>

    <a class="section-5-button" href="<?=get_permalink(58); ?>">VIEW ALL ATTORNEYS</a>
  </section>



<?php get_footer();?>