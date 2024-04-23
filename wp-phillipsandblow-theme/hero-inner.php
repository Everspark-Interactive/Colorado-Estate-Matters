<?php 
    $header_background_image = get_field('header_background_image');
    $header_heading = get_field('header_heading');
    $header_cta_text = get_field('header_cta_text');
    $header_cta_link = get_field('header_cta_link');
    $hero_icon = get_field('hero_icon', 'option');

    if (empty($header_background_image)) {
      $header_background_image = get_field('default_header_image', 'option');
      
      if (empty($header_heading)) {
        $header_heading = get_field('hero_title','option');
      }

      if (empty($header_heading)) {
        $header_heading = get_the_title();
      }

      if (empty($header_cta_text)) {
        $header_cta_text = get_field('hero_cta', 'option');
      }
    }
  ?>
  <?php if ( get_field('disable') != 'yes'): ?>
    
    <?php if ( $header_background_image ): ?>
       <div class="inner-hero" style="background-image: url(<?php echo $header_background_image ?>);">
          <div class="inner-container">
            <div class="hero-title image-sec">
              <div class="hero-inner-title"><?php echo $header_heading ?></div>
				<div id="aboutus-sec" class="hero-inner-title about-sec">
				<strong>Firm</strong>
					 
				</div>
              <a href="#contact" class="btn">
                <?php echo $header_cta_text ?>
              </a>
            </div>
          </div>
       </div>
    <?php endif ?>

  <?php endif ?>