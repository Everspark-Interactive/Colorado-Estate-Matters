<!DOCTYPE html>
<html lang="en-US">

<head>

	
	
<?php if ( is_paged() ) { ?>
	<meta name="robots" content="noindex,follow" />
<?php } ?>
  <!-- Title -->
  <title><?php bloginfo('name'); ?></title>

  <!-- Meta Stuff -->
  <meta charset="utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
  <meta name = "format-detection" content = "telephone=no">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png">

  <link href="https://fonts.googleapis.com/css?family=Roboto|Montserrat:300,400,700,800,900&display=swap" rel="stylesheet">
  <!-- WordPress Header Hook - Prints scripts or data in the head tag on the front end -->
  <?php wp_head(); ?>

  <!-- Analytics -->
  <?php the_field('analytics_code', 'option'); ?>
	
  <meta name="facebook-domain-verification" content="r7cenfw1y0m93s2zp4tgi4dgx0u0lb" />
  
</head>

	<body <?php body_class(); ?> >
    <header class="site-header">
      <div class="header-container">
        <div class="site-logo">
          <a href="<?php echo site_url() ?>">
            <img src="<?php echo get_field('header_logo','option') ?>">
          </a>
        </div>
        <div class="header-menu">
          <div class="main-nav">
             <?php 
                  wp_nav_menu(
                    array(
                      'theme_location'  => 'header-menu',
                      'menu'            => '',
                      'container'       => 'div',
                      'container_id'    => '',
                      'menu_class'      => 'main-nav',
                      'menu_id'         => '',
                      'echo'            => true,
                      'fallback_cb'     => 'wp_page_menu',
                      'before'          => '',
                      'after'           => '',
                      'link_before'     => '',
                      'link_after'      => '',
                      'items_wrap'      => '<ul class="main-menu">%3$s</ul>',
                      'depth'           => 3,
                      'walker'          => ''
                    )
                  );
               ?>
          </div>
          
        </div>
         <div class="header-right">
         <?php 
               //if ( is_user_logged_in() ) {
               echo '<div class="search-element">';
               echo do_shortcode('[elementor-template id="23165"]');
               echo '</div>';
               //}
          ?>
          <div class="phone-header">
            <a href="<?php echo get_field('cta_link','option') ?>" class="btn-header">
              <?php echo get_field('cta_text', 'option') ?>
            </a>
            <div class="heading-phone">
              <?php $phone = get_field('phone_number','option') ?>
              <?php $phone_text = get_field('phone_text','option') ?>
              <div class="phone-text"><?php echo $phone_text ?></div>
              <a href="tel:+1<?php echo preg_replace("/[^0-9]/",'', $phone); ?>" class="h-phone">
                <?php echo $phone ?>
              </a>
            </div>
          </div>
        </div>
          
        </div>
      </div>

      <div class="mobile-menu">
        <button class="hamburger hamburger--collapse" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
          <span class="hamburger-label">Menu</span>
        </button>
      </div>
    </header>
     <div class="main-nav full-width">
         <?php 
              wp_nav_menu(
                array(
                  'theme_location'  => 'header-menu',
                  'menu'            => '',
                  'container'       => 'div',
                  'container_id'    => '',
                  'menu_class'      => 'main-nav',
                  'menu_id'         => '',
                  'echo'            => true,
                  'fallback_cb'     => 'wp_page_menu',
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '<ul class="main-menu">%3$s</ul>',
                  'depth'           => 3,
                  'walker'          => ''
                )
              );
           ?>

           <div class="seminars-tablet tablet-mobile-only">
             <div class="seminars-tablet-warp tablet-only">
               <a href="<?php echo get_field('cta_link','option') ?>">Tap <span>here</span> for our seminars</a>
             </div>
             <div class="mobile-only">
             <div class="phone-text"><?php echo $phone_text ?></div>
                <a href="tel: +1<?php echo preg_replace("/[^0-9]/",'', $phone); ?>" class="h-phone">
                  <?php echo $phone ?>
                </a>
              </div>
           </div>
     </div>

     <div class="menu-mobile yes">
		 <?php 
               //if ( is_user_logged_in() ) {
               echo '<div class="search-element">';
               echo do_shortcode('[elementor-template id="23165"]');
               echo '</div>';
               //}
          ?>
       <?php 
            wp_nav_menu(
              array(
                'theme_location'  => 'header-menu',
                'menu'            => '',
                'container'       => 'div',
                'container_id'    => 'mobile-nav',
                'menu_class'      => 'main-nav',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul class="main-menu">%3$s</ul>',
                'depth'           => 3,
                'walker'          => ''
              )
            );
         ?> 
     </div>