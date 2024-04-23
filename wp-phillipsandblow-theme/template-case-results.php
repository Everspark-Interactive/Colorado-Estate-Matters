<?php
/*
 * Template Name: Case Results
 */
?>

<?php get_header();?>
  
  <?php get_template_part( 'hero-inner' ); ?>

  <div class="default-page content">
    <div class="default-page-container has-sidebar">
      <div class="default-main">
        <h1 class="page-title"><?php the_title();?></h1>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content();?>
        <?php endwhile; endif; ?>

        <div class="case_results-list">
          <?php $case_results = get_field('case_results') ?>
          <?php foreach ($case_results as $case_result): ?>
            <div class="case_result-item">
              <div class="cr-worth"><?php echo $case_result['worth'] ?></div>
              <h4 class="cr-title"><?php echo $case_result['title'] ?></h4>
              <div class="cr-description"><?php echo $case_result['description'] ?></div>
            </div>
          <?php endforeach ?>
        </div>

      </div>

      <div class="default-sidebar">
        <?php bulk_sidebar(); ?>
      </div>
    </div>
  </div>

<?php get_footer();?>

