   	<div id="contact">

         <div class="form-container">
            <div class="form-headings-wrap">
               <div class="form-heading"><?php echo get_field('form_heading','option') ?></div>
            </div>
            <div class="form-wrap">
               <?php echo apply_filters( 'the_content', get_field('form_shortcode', 'option') ) ?>
               <div class="required-label"><?php echo get_field('required_fields_label', 'option') ?></div>
            </div>
         </div>
      </div>   
   	
      <div class="footer-socket">
         <div class="footer-container">
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
				   <div class="social-icons">
                <!-- Facebook Icon -->
                <a href="https://www.facebook.com/ColoradoEstateMattersLtd" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
</svg></a>
                <!-- LinkedIn Icon -->
                <a href="https://www.linkedin.com/company/colorado-estate-matters-ltd/" target="_blank" class="linkedin-icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
</svg></a>
            </div>
                  <?php endif ?>
                  <div class="f-phone">
                     <?php $phone = get_field('get_directions_link_copy', 'option') ?>
                  </div>
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
				   <div class="social-icons">
                <!-- Facebook Icon -->
                <a href="https://www.facebook.com/ColoradoEstateMattersLtd" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
</svg></a>
                <!-- LinkedIn Icon -->
                <a href="https://www.linkedin.com/company/colorado-estate-matters-ltd/" target="_blank" class="linkedin-icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
</svg></a>
            </div>
                  <?php endif ?>
                  <div class="f-phone">
                     <?php $phone = get_field('get_directions_link_copy', 'option') ?>
                     <a href="tel:+1<?php echo preg_replace("/[^0-9]/",'', $phone); ?>">
                      <?php echo $phone ?>
                    </a>
                  </div>
               </div>
               <?php if( get_field('satellite_offices', 'option') ): ?>
               <div class="satellite-box">
                  <div class="f-heading"><?php echo get_field('satellite_offices_heading','option') ?></div>
                  <div class="sat-note"><?php echo get_field('satellite_offices_note','option') ?></div>

                  <div class="offices-list">
                     <?php $offices = get_field('satellite_offices', 'option') ?>
                     <?php foreach ($offices as $office): ?>
                        <div class="office-item">
                           <?php echo $office['city'] ?>
                        </div>
                     <?php endforeach ?>
                  </div>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>

    	<footer class="site-footer">

      	<div class="copyrights">
   			<div class="copyright-text">
   				<?php echo apply_filters( 'the_content', get_field('copyright_text', 'option') ) ?>
   			</div>
   			<a class="esi-footer-logo" target="_blank" style="display: flex; align-items: center; justify-content: center;" href="https://www.eversparkinteractive.com"><img  style="width:200px;" src="https://www.coloradoestatematters.com/wp-content/uploads/2023/04/everspark-interactive-b-logo.png" alt="everspark interactive logo" ></a>
  			</div>


      </footer>
    <?php wp_footer(); ?>

<!-- Intaker -->
<script>(function (w,d,s,v,odl){(w[v]=w[v]||{})['odl']=odl;;
var f=d.getElementsByTagName(s)[0],j=d.createElement(s);j.async=true;
j.src='https://intaker.azureedge.net/widget/chat.min.js';
f.parentNode.insertBefore(j,f);
})(window, document, 'script','Intaker', 'coloradoestatematters');
</script>

	</body>

</html>