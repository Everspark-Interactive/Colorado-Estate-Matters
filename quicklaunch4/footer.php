      <footer>
        <div id="footer-form">
          <div class="footer-form-container">
            <h3>Request Your <span>Free Consultation</span></h3>
            <?php gravity_form(2, false, false, false, '', true, 12); ?>
            <p>ALL FIELDS REQUIRED <span>*</span></p>
          </div>
        </div>

        <div class="footer-info">
          <div class="footer-info-container">
            <div class="footer-boxes">
              <div class="footer-box">
                <h4>Office Location</h4>
                <p><?php the_field('firm_street_address', 'option'); ?></p>
                <p><?php the_field('firm_city_state_zip', 'option'); ?></p>
                <a href="<?php the_field('firm_directions_link', 'option'); ?>">GET DIRECTIONS</a>
              </div>

              <div class="footer-box">
                <h4>Phone Number</h4>
                <p>OFFICE: <a href="tel:<?php echo str_replace(['-', '(', ')', ' '], '', get_field('firm_number_toll_free', 'option')); ?>"><?php the_field('firm_number_toll_free', 'option'); ?></a></p>
                <p>FAX: <?php the_field('firm_fax_number', 'option'); ?></p>
              </div>

              <div class="footer-box">
                <h4>Social</h4>
                <div class="social">
                  <a href="<?php the_field('facebook_link', 'option'); ?>">
                    <?php include("svgs/social-fb.php"); ?>
                  </a>

                  <a href="<?php the_field('twitter_link', 'option'); ?>">
                    <?php include("svgs/social-twitter.php"); ?>
                  </a>

                  <a href="<?php the_field('linked_in_link', 'option'); ?>">
                    <?php include("svgs/social-linked-in.php"); ?>
                  </a>

                  <a href="<?php the_field('google_plus_link', 'option'); ?>">
                    <?php include("svgs/social-google.php"); ?>
                  </a>
                </div>
              </div>

              <div class="footer-box">
                <p>COPYRIGHT &copy; <?php echo date('Y'); ?> <?php the_field('firm_name', 'option'); ?> <br class="mobile-only"> <a href="<?=get_permalink(150); ?>">DISCLAIMER</a></p>
                <?php include("svgs/ilawyerlogo.php"); ?>
              </div>
            </div>

            <div class="footer-copy">
              <p>COPYRIGHT &copy; <?php echo date('Y'); ?> <?php the_field('firm_name', 'option'); ?> | <a href="<?=get_permalink(150); ?>">DISCLAIMER</a></p>
              <a href="http://www.ilawyermarketing.com">
                <?php include("svgs/ilawyerlogo.php"); ?>
              </a>
            </div>
          </div>
        </div>
      </footer>

    <?php wp_footer(); ?>

	</body>

</html>