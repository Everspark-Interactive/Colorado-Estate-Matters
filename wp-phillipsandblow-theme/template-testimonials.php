<?php
/*
 * Template Name: Testimonials
 */
?>

<?php get_header();?>
 
 <?php get_template_part( 'hero-inner' ); ?> 

 <div class="default-page full-width content" id="testimonials">
  
  <div class="default-page-container testimonials">

    <h1 class="page-title txt-center">
      <?php echo get_field('title') ?>
    </h1>

    <div class="subtitle"><?php echo get_field('subtitle') ?></div>

    <div class="testimonials-list">
      <?php $testimonials = get_field('testimonials') ?>
      <?php foreach ($testimonials as $testimonial): ?>
        <div class="testimonial-item">
          <div class="test-icon">
            <img src="<?php echo get_field('stars_icon') ?>">
          </div>
          <div class="test-copy"><?php echo $testimonial['copy'] ?></div>
          <div class='tst-meta'>
            <?php echo $testimonial['author'] ?>
            <?php if ($testimonial['author'] && $testimonial['company'] ): ?>
              <span class="tst-sep">|</span>
            <?php endif ?>
            <?php echo $testimonial['company'] ?>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<?php get_footer();?>


