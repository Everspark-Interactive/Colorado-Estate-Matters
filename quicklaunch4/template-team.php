<?php
/*
 * Template Name: Team
 */
?>

<?php get_header();?>

  <div class="team-page" id="internal-page">
    <div class="team-page-container">
      <h1 class="tablet-mobile-only"><?php the_title();?></h1>
      <div class="team-grid">
        <?php if( have_rows('team_page') ): while ( have_rows('team_page') ) : the_row(); ?>
          <div class="team-member-item">
            <div class="team-member-picture" style="background: url(<?php the_sub_field('member_image'); ?>) center center / cover no-repeat;">
              <a href="<?php the_sub_field('member_page_link'); ?>">VIEW PROFILE</a>
            </div>

            <h4><?php the_sub_field('member_name'); ?></h4>
            <h5><?php the_sub_field('member_position'); ?></h5>
          </div>
        <?php endwhile; else : endif; ?>
      </div>

    </div>
  </div>

<?php get_footer();?>