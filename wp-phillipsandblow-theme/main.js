/* Custom JS */

(function(){


  /* ------------------- JS to run after all content (html + images) is completely loaded ------------------- */

  jQuery(window).on('load', function($) {

    new WOW().init();

  });


  /* ------------------- JS to run after all html is completely loaded ------------------- */

  jQuery(document).ready(function($) {

    if ( jQuery('.inner-hero, .home-hero').length < 1 ){
      jQuery('body').addClass('no-hero');
    }

    if (jQuery(window).width() < 1201) {
      jQuery('body').removeClass('no-hero');
    }

    jQuery(window).on('resize orientationchange', function(){
        if (jQuery(window).width() < 1201) {
          jQuery('body').removeClass('no-hero');
        }else{
          if ( jQuery('.inner-hero, .home-hero').length < 1 ){
            jQuery('body').addClass('no-hero');
          }
        }
    }); 


    /* Modernizr - check if browser supports webp. if it does add class webp to html tag
     --------------------------------------------------------------------------------------- */

    Modernizr.on('webp', function(result) {});

    /* Waypoints
     --------------------------------------------------------------------------------------- */

    function createWaypoint(triggerElementId, animatedElement, className, offsetVal, functionName, reverse) {
      if(jQuery('#' + triggerElementId).length) {
        var waypoint = new Waypoint({
          element: document.getElementById(triggerElementId),
          handler: function (direction) {
            if (direction === 'down') {
              jQuery(animatedElement).addClass(className);

              if (typeof functionName === 'function') {
                functionName();
                this.destroy();
              }

            } else if (direction === 'up') {
              if (reverse) {
                jQuery(animatedElement).removeClass(className);
              }

            }
          },
          offset: offsetVal
          // Integer or percent
          // 500 means when element is 500px from the top of the page, the event triggers
          // 50% means when element is 50% from the top of the page, the event triggers
        });
      }
    }

    /* Smooth Scroll down to section on click (<a href="#id_of_section_to_be_scrolled_to">)
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





    /* Long Page Title - If the page/blog title (h1) is very long, add a class so we can make the font size smaller.
      --------------------------------------------------------------------------------------- */

    if ( jQuery(".single .default-main h1").text().length > 28 ) {
      jQuery(".single .default-main h1").addClass("page-title-long");
    }

    if ( jQuery(".page-template-default .default-main h1").text().length > 28 ) {
      jQuery(".page-template-default .default-main h1").addClass("page-title-long");
    }

    /* Wistia - Call function when script needs to be loaded either by hover or waypoints
     --------------------------------------------------------------------------------------- */

    function wistiaLoad() {
      jQuery.getScript('https://fast.wistia.com/assets/external/E-v1.js', function(data, textStatus, jqxhr) {
        console.log('wistia load:', textStatus); // Success
      });
    }

    // examples:

    // jQuery(".banner-box-1").one("mouseenter", function(e){
    //   wistiaLoad();
    // });

    // createWaypoint('section-1', null, null, '100%', wistiaLoad, false)







    /* Load Images - Call function when you reach the a section with images using waypoints
       BG image - <div data-src=""></div>   ,   Image - <img data-src="">
      --------------------------------------------------------------------------------------- */

    function loadImages() {
      // images
      jQuery('img').each(function () {
        if (jQuery(this).attr('data-src')) {
          var img = jQuery(this).data('src');
          jQuery(this).attr('src', img);
        }
      });

      // background images
      jQuery('div, section').each(function () {
        if (jQuery(this).attr('data-src')) {
          var backgroundImg = jQuery(this).data('src');
          jQuery(this).css('background-image', 'url(' + backgroundImg + ')');
        }
      });

      console.log('images loaded');
    }

    // createWaypoint('section-1', null, null, '100%', loadImages, false)

    /* Slick Carousel ( http://kenwheeler.github.io/slick/ )
     --------------------------------------------------------------------------------------- */

      jQuery('.mobile-menu').click(function(e){
        e.preventDefault();
        jQuery('html').toggleClass('menu-opened');
        // jQuery('.hamburger').toggleClass('is-active');
      });

    function init_carousel(){

      if( jQuery(window).width() < 1201 ){
          if ( !jQuery('.selling-points-grid').hasClass('slick-slider') ) {
            jQuery('.selling-points-grid').slick({
              arrows: true,
              dots: false,
              slidesToShow: 1,
              sidesToScroll: 1,
              adaptiveHeight: true
            }); 
          }
        } else {
         if (jQuery('.selling-points-grid').hasClass('slick-slider')) {
            jQuery('.selling-points-grid').slick('unslick');
          }
      } 
    }
    init_carousel();


    $('ul.main-menu li.menu-item-has-children > a').click(function(e){
      e.preventDefault();
      jQuery(this).closest('li').toggleClass('active');
    })

    jQuery('.default-sidebar ul.children').closest('li').addClass('parent');
    
    $('.default-sidebar ul.menu li.menu-item-has-children > a,.default-sidebar li.parent > a').on('click', function(e){
      e.preventDefault();
      jQuery(this).closest('li').toggleClass('active');
    });

    // jQuery('.default-sidebar .widget_nav_menu ul.menu > li.menu-item-has-children > a').click(function(e){
    //     e.preventDefault();
    //     jQuery(this).closest('li').toggleClass('active');
    //   });

    /* Run Functions on Resize if needed
      --------------------------------------------------------------------------------------- */

    // var resizeTimerInternal;
    // jQuery(window).on('resize', function() {
    //
    //   clearTimeout(resizeTimerInternal)
    //
    //   resizeTimerInternal = setTimeout(function() {
    //     //add functions here to fire on resize
    //   }, 100)
    //
    // });

    // Gravity forms labels

    function bind_focus_and_blur() {
      $('body .gform_body > ul > .gfield textarea, body .gform_body > ul > .gfield input[type="text"], body .gform_body > ul > .gfield input[type="email"]').on('focus', function() {
        $(this).closest('.gfield').addClass('has-focus');
      });
      $('body .gform_body > ul > .gfield textarea, body .gform_body > ul > .gfield input[type="text"], body .gform_body > ul > .gfield input[type="email"]').on('blur', function() {
        if( $(this).val() == '' ) $(this).closest('.gfield').removeClass('has-focus');
      });
    }

    $(document).bind('gform_post_render', function(){
      $('body .gform_body > ul > .gfield textarea, body .gform_body > ul > .gfield input[type="text"], body .gform_body > ul > .gfield input[type="email"]').each(function() {
        if( $(this).val() == '' ) $(this).closest('.gfield').removeClass('has-focus');
        else $(this).closest('.gfield').addClass('has-focus');
      });
      bind_focus_and_blur();
    });
    bind_focus_and_blur();

    $('.default-sidebar h3.widgettitle').click(function(){
      $(this).toggleClass('closed');
    });

    if( jQuery('.previouspostslink').length > 0 ){
      $('.nextpostslink').addClass('has-prev');
    }

    /* End Document Ready
     --------------------------------------------------------------------------------------- */

  });



}());


function load_maps() {
  ;(function ( $, window, undefined ) {

    $('.contact-location-map').each(function() {
      var lat = parseFloat($(this).attr('data-lat'));
      var lng = parseFloat($(this).attr('data-lng'));
      var center_lat_lng = new google.maps.LatLng(lat, lng);
      var map = new google.maps.LatLng(lat, lng);
      
      var settings = {
          zoom: 14,
          center: center_lat_lng,
          disableDefaultUI: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"saturation":"-100"},{"lightness":"57"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"lightness":"1"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"visibility":"off"},{"color":"#484848"}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.bus","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.bus","elementType":"labels.text.fill","stylers":[{"saturation":"0"},{"lightness":"0"},{"gamma":"1.00"},{"weight":"1"}]},{"featureType":"transit.station.bus","elementType":"labels.icon","stylers":[{"saturation":"-100"},{"weight":"1"},{"lightness":"0"}]},{"featureType":"transit.station.rail","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.rail","elementType":"labels.text.fill","stylers":[{"gamma":"1"},{"lightness":"40"}]},{"featureType":"transit.station.rail","elementType":"labels.icon","stylers":[{"saturation":"-100"},{"lightness":"30"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#d2d2d2"},{"visibility":"on"}]}]
      };

      var contact = new google.maps.Map( $(this).get(0), settings );

      var marker1= new google.maps.Marker({
          position: map,
          map: contact,
      });


    });
  }(jQuery, window));
}