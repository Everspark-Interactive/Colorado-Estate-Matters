<?php
/*
 * Template Name: Contact
 */
?>
<?php get_header();?>
<?php get_template_part( 'hero-inner' ); ?>
  <div class="default-page content" id="internal-page">


    <div class="default-page-container contact-us">

      <h1 class="page-title txt-center tablet-mobile-only"><?php the_title();?></h1>
      <div class="default-main">
      
          
      <div class="footer-socket contact-page">
         <div class="container">
            <div class="footer-col-left">
               <div class="footer-icon">
                  <img src="<?php echo get_field('footer_icon','option') ?>">
               </div>
               <div class="footer-about">
                  <div class="heading"><?php echo get_field('footer_heading','option') ?></div>
                  <div class="copy"><?php echo get_field('footer_heading_copy','option') ?></div>
               </div> 

            </div>
            <div class="footer-col-right">
               <div class="main-office-box">
                  <div class="f-heading"><?php echo get_field('main_office_heading', 'option') ?></div>
                  <div class="address">
                     <?php echo get_field('address', 'option') ?>
                  </div>
                  <?php if (get_field('get_directions_link', 'option')): ?>
                     <a href="<?php echo get_field('get_directions_link', 'option') ?>" rel="noopener" class="direction-link" target="_blank">
                        Get Directions
                     </a>
                  <?php endif ?>
               </div>
               <div class="main-office-box">
                  <div class="f-heading"><?php echo get_field('secondary_office_heading', 'option') ?></div>
                  <div class="address">
                     <?php echo get_field('address_secondary', 'option') ?>
                  </div>
                  <?php if (get_field('get_directions_link_secondary', 'option')): ?>
                     <a href="<?php echo get_field('get_directions_link_secondary', 'option') ?>" rel="noopener" class="direction-link" target="_blank">
                        Get Directions
                     </a>
                  <?php endif ?>
               </div>
               <div class="satellite-box">
                  <div class="f-heading"><?php echo get_field('call_now_heading') ?></div>
                  <div class="call-note"><?php echo get_field('call_now_copy') ?></div>

                  <div class="f-phone">
                     <?php $phone = get_field('get_directions_link_copy', 'option') ?>
                     <a href="tel: +1<?php echo preg_replace("/[^0-9]/",'', $phone); ?>">
                      <?php echo $phone ?>
                    </a>
                  </div>
               </div>
            </div>
         </div>
      </div> 
          
      </div>  

  </div>

   <div id="contact-page">
    <div class="container">
      <div class="sat-heading">
        
        <div class="heading"><?php echo get_field('satellite_offices_heading1') ?></div>
        <div class="sat-note"><?php echo get_field('satellite_offices_note','option') ?></div>

      </div>
      <?php $offices = get_field('satellite_offices') ?>
      <div class="sat-offices-list">
        <?php foreach ($offices as $office): ?>
          <div class="office-item">
            <div class="office-city">
              <?php echo $office['city'] ?>
            </div>
            <div class="office-address">
              <?php echo $office['address'] ?>
            </div>
            <div class="get-dirction">
              <a href="<?php echo $office['get_directions_link'] ?>" rel="noopener" target="_blank">
                get directions
              </a>
            </div>
            <div class="office-phone">
              <?php $phone = $office['phone'] ?>
              <a href="tel: +1<?php echo preg_replace("/[^0-9]/",'', $phone); ?>">
                  <?php echo $phone ?>
                </a>
            </div>
          </div>
        <?php endforeach ?>
      </div>

    </div>
  </div>

</div>

</div>
<?php get_footer();?>