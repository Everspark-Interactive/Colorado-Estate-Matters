/* Functions that run on all pages. */


//Scripts to run after all content is completely loaded
jQuery(window).on('load', function() {

  new WOW().init();

});



//Scripts to run after all html is completely loaded
jQuery(document).ready(function() {


  /* Menu
   --------------------------------------------------------------------------------------- */

  jQuery('.menu-button').click(function() {
    jQuery(this).toggleClass('menu-button-active')
    jQuery('.menu-overlay').fadeToggle();
    jQuery('.slide-menu').toggleClass('slide-menu-active');
  });

  jQuery('#menu-main-menu > .menu-item-has-children > .sub-menu').addClass('first-sub');
  jQuery('#menu-main-menu .menu-item-has-children .sub-menu .menu-item-has-children .sub-menu').addClass('last-sub');

  jQuery('#menu-main-menu > .menu-item-has-children a').click(function() {
    jQuery(this).siblings('.first-sub').slideToggle();
  });

  jQuery('#menu-main-menu > .menu-item-has-children > .first-sub > .menu-item-has-children a').click(function() {
    jQuery(this).siblings('.last-sub').slideToggle();
  });




  /* Smooth Scroll
   --------------------------------------------------------------------------------------- */

  jQuery(function() {
    jQuery('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = jQuery(this.hash);
        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          jQuery('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });




  /* End Document Ready
   --------------------------------------------------------------------------------------- */

});