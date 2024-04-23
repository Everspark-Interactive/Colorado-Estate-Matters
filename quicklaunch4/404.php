<?php
/*
 * 404 Error Page
 */
?>

<?php get_header();?>

<div class="default-page" id="internal-page">
  <div class="default-page-container">
    <div class="default-main">
      <h1><?php the_title();?></h1>

      <h1>404</h1>

      <p>The page you were looking for appears to have been moved, deleted or does not exist.
        You could <a class="go-back" onclick="history.back();" href="#">go back</a> to where
        you were or head straight to our <a href="<?php echo site_url();?>">home page</a>
      </p>

    </div>

    <div class="default-sidebar">
      <div class="default-sidebar-form">
        <h3>Request Your <span>Free Consultation</span></h3>
        <?php gravity_form(3, false, false, false, '', true, 12); ?>
        <p>ALL FIELDS REQUIRED <span>*</span></p>
      </div>

      <div class="default-sidebar-menu">
        <h3>Practice Areas</h3>
        <?php wp_nav_menu( array('menu' => 'Sidebar Menu' )); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer();?>
