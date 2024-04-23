/* Functions that run on the internal pages only. */

jQuery(document).ready(function() {


  /* Accordion Dropdown Menu for Sidebar Menu in Internal Page
   --------------------------------------------------------------------------------------- */

  jQuery('#menu-sidebar-menu > .menu-item-has-children > .sub-menu').addClass('first-sub');
  jQuery('#menu-sidebar-menu .menu-item-has-children .sub-menu .menu-item-has-children .sub-menu').addClass('last-sub');

  jQuery('#menu-sidebar-menu > .menu-item-has-children a').click(function() {
    jQuery(this).siblings('.first-sub').slideToggle();
  });

  jQuery('#menu-sidebar-menu > .menu-item-has-children > .first-sub > .menu-item-has-children a').click(function() {
    jQuery(this).siblings('.last-sub').slideToggle();
  });




  /* Long Blog Title
   --------------------------------------------------------------------------------------- */

  if ( jQuery(".single .default-main h1").text().length > 28 ) {
    jQuery(".single .default-main h1").addClass("blog-title-long");
  }



  /* End Document Ready
   --------------------------------------------------------------------------------------- */

});