<?php
/*
 * Template Name: Profile
 */
?>

<?php get_header();?>

  <div class="profile-page" id="internal-page">
    <div class="profile-page-container">
      <div class="profile-left">
        <img src="<?php the_field('profile_picture'); ?>">

        <p><span>PHONE</span> <a href="tel:<?php echo str_replace(['-', '(', ')', ' '], '', get_field('phone_number')); ?>"><?php the_field('phone_number'); ?></a></p>
        <p><span>FAX</span> <?php the_field('fax_number'); ?></p>
        <p><span>EMAIL</span> <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
      </div>

      <div class="profile-right">
        <div class="profile-header">
          <h1><?php the_field('name'); ?></h1>
          <h2><?php the_field('position'); ?></h2>
        </div>

        <div class="tablet-mobile-only profile-left">
          <img src="<?php the_field('profile_picture'); ?>">

          <div class="profile-info-tablet-mobile">
            <p><span>PHONE</span> <a href="tel:<?php echo str_replace(['-', '(', ')', ' '], '', get_field('phone_number')); ?>"><?php the_field('phone_number'); ?></a></p>
            <p><span>FAX</span> <?php the_field('fax_number'); ?></p>
            <p><span>EMAIL</span> <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
          </div>
        </div>

        <div class="profile-content">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; // end of the loop. ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer();?>