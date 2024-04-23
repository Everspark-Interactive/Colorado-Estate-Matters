<?php
/*
 * Template Name: Attoney
 */
?>

<?php get_header();?>
<?php get_template_part( 'hero-inner' ); ?>
  <div class="default-page content" id="internal-page">
   
    <div class="default-page-container attorney">
              
      <div class="default-main attorney-wrapper">

        <div class="attorney-sidebar">
            <div class="headshot">
              <img src="<?php echo get_field('headshot') ?>">
            </div>
            <?php if (get_field('awards_link')): ?>
              <a href="<?php echo get_field('awards_link') ?>" class="btn btn-awards" target="_blank" rel="noopener">
                view Avvo.com reviews
              </a>
            <?php endif ?>
        </div>

        <div class="attorney-content">
            
            
            <div class="headshot tablet-mobile-only">
              <img src="<?php echo get_field('headshot') ?>">
              <?php if (get_field('awards_link')): ?>
                <a href="<?php echo get_field('awards_link') ?>" class="btn btn-awards" target="_blank" rel="noopener">
                  view Avvo.com reviews
                </a>
              <?php endif ?>
            </div>

            <h1 class="page-title"><?php the_title();?></h1>

            <h2 class="designation"><?php echo get_field('designation') ?></h2>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php the_content();?>
            <?php endwhile; endif; ?>

          </div>

        </div>

      </div>

  </div>

<?php get_footer();?>