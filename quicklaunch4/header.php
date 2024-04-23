<!DOCTYPE html>
<html lang="en-US">

<head>

  <!-- Meta Stuff -->
  <meta charset="utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
  <meta name = "format-detection" content = "telephone=no">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Playfair+Display:400,700,700i" rel="stylesheet">


  <!-- Title -->
  <title><?php bloginfo('name'); ?></title>

  <!-- WordPress Header Hook - Prints scripts or data in the head tag on the front end -->
  <?php wp_head(); ?>

  <!-- Schema -->
  <?php the_field('schema_code', 'option'); ?>

  <!-- Analytics -->
  <?php the_field('analytics_code', 'option'); ?>

</head>

	<body <?php body_class(); ?> >

    <!-- Slide Menu -->
    <div class="slide-menu">
      <?php wp_nav_menu( array('menu' => 'Main Menu' )); ?>
    </div>

    <div class="menu-overlay"></div>

    <!-- Header -->
    <header>
      <!-- Navbar -->
      <div class="navbar">
        <a href="<?=get_permalink(10); ?>">
          <img class="logo" src="<?php the_field('firm_logo', 'option'); ?>">
        </a>

        <div class="navbar-number desktop-tablet-only">
          <p>CALL US TODAY!</p>
          <a href="tel:<?php echo str_replace(['-', '(', ')', ' '], '', get_field('firm_number_toll_free', 'option')); ?>"><?php the_field('firm_number_toll_free', 'option'); ?></a>
        </div>

        <a class="mobile-only" href="tel:<?php echo str_replace(['-', '(', ')', ' '], '', get_field('firm_number_toll_free', 'option')); ?>">
          <div class="navbar-number-mobile">
            <?php include("svgs/phone.php"); ?>
            <p>CALL</p>
          </div>
        </a>

        <div class="menu-button">
          <div></div>
          <div></div>
          <div></div>
          <p>MENU</p>
        </div>
      </div>

      <!-- Banner -->
      <div class="banner">
        <div class="banner-content">

          <?php if ( is_page(10) || is_page_template( 'template-profile.php' ) ): ?>
            <h3><?php the_field('banner_header_text', 'option'); ?></h3>
            <h4><?php the_field('banner_sub_header_text', 'option'); ?></h4>
          <?php elseif ( is_archive() ): ?>
            <h1><?php the_archive_title();?></h1>
          <?php elseif ( is_single() ): ?>
            <h1><?php the_title();?></h1>
          <?php elseif ( is_home() ): ?>
            <h1>Our Blog</h1>
          <?php else: ?>
            <h1><?php the_title();?></h1>
          <?php endif ?>


        </div>

        <div class="selling-points">
          <div class="selling-point">
            <i class="fa <?php the_field('selling_point_1_icon'); ?> fa-4x"></i>
            <h4><?php the_field('selling_point_1_title'); ?></h4>
            <p><?php the_field('selling_point_1_text'); ?></p>
          </div>

          <div class="selling-point">
            <i class="fa <?php the_field('selling_point_2_icon'); ?> fa-4x"></i>
            <h4><?php the_field('selling_point_2_title'); ?></h4>
            <p><?php the_field('selling_point_2_text'); ?></p>
          </div>

          <div class="selling-point">
            <i class="fa <?php the_field('selling_point_3_icon'); ?> fa-4x"></i>
            <h4><?php the_field('selling_point_3_title'); ?></h4>
            <p><?php the_field('selling_point_3_text'); ?></p>
          </div>
        </div>
      </div>

      <a class="header-button" href="#footer-form">REQUEST YOUR FREE CONSULTATION</a>
    </header>


    <!-- Top Form -->
    <div class="top-form">
      <div class="top-form-container desktop-only">
        <p>Request your <span>Free Consultation</span></p>
        <?php gravity_form(1, false, false, false, '', true, 12); ?>
        <h4>ALL FIELDS REQUIRED <span>*</span></h4>
      </div>

      <a class="top-form-button tablet-mobile-only" href="#footer-form">REQUEST YOUR FREE CONSULTATION</a>
    </div>





