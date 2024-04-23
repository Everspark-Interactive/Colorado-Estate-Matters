/* Functions that run on the homepage only. */


//Scripts to run after all content is completely loaded
jQuery(window).on('load', function() {

});



//Scripts to run after all html is completely loaded
jQuery(document).ready(function() {



  /* Run Functions on Resize
   --------------------------------------------------------------------------------------- */

  var resizeTimerInternal;
  jQuery(window).on('resize', function() {

    clearTimeout(resizeTimerInternal)

    resizeTimerInternal = setTimeout(function() {
      checkWidthSellingPointsSlider();
      checkWidthResultsSlider();
    }, 100)

  });




  /* Waypoints
   --------------------------------------------------------------------------------------- */

  function createWaypoint(triggerElementId, animatedElement, className, offsetVal, functionName, reverse) {
    var waypoint = new Waypoint({
      element: document.getElementById(triggerElementId),
      handler: function(direction) {
        if (direction === 'down') {
          jQuery(animatedElement).addClass(className);

          if (typeof functionName === 'function') {
            functionName.call();
          }
        } else {

          if (reverse) {
            jQuery(animatedElement).removeClass(className);

            if (typeof functionName === 'function') {
              functionName.call();
            }
          }

        }
      },
      offset: offsetVal
      // Integer or percent
      // 500 means when element is 500px from the top of the page, the event triggers
      // 50% means when element is 50% from the top of the page, the event triggers
    });
  }

  //Waypoint Instance - Add Class To Element
  //Template -> createWaypoint('id-name', '.class-name', 'class-to-be-added', offset-value, null, true);
  //Example -> createWaypoint('section-2', '.section-2-orange-dot', 'section-2-orange-dot-active', 500, null, true);

  //Waypoint Instance - Call Function
  //Template -> createWaypoint('id-name', null, null, 0, function-name, true);
  //Example -> createWaypoint('section-2', null, null, 0, test, true);






  /* Slick Carousel ( http://kenwheeler.github.io/slick/ )
   --------------------------------------------------------------------------------------- */

  jQuery('.section-3-container').slick({
    autoplay: true,
    dots: true,
    slidesToShow: 4,
    sidesToScroll: 1,
    responsive: [{
      breakpoint: 1199,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 550,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });

  jQuery('.section-5-slider').slick({
    autoplay: false,
    arrows: true,
    dots: false,
    slidesToShow: 3,
    sidesToScroll: 1,
    prevArrow: '#section-5-prev',
    nextArrow: '#section-5-next',
    responsive: [{
      breakpoint: 1199,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },{
      breakpoint: 700,
      settings: {
        arrows: false,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });



  function checkWidthSellingPointsSlider() {
    if (jQuery(window).width() < 1199) {
      if(jQuery('.selling-points').hasClass('slick-initialized')) {

      }
      else {
        jQuery('.selling-points').slick({
          dots: true,
          arrows: false,
          slidesToShow: 1,
          autoplay: true
        });
      }
    } else {
      if(jQuery('.selling-points').hasClass('slick-initialized')) {
        jQuery('.selling-points').slick("unslick");
      }
    }
  }
  checkWidthSellingPointsSlider();



  function checkWidthResultsSlider() {
    if (jQuery(window).width() < 1199) {
      if(jQuery('.section-2-results').hasClass('slick-initialized')) {

      }
      else {
        jQuery('.section-2-results').slick({
          dots: true,
          arrows: false,
          slidesToShow: 1,
          autoplay: true
        });
      }
    } else {
      if(jQuery('.section-2-results').hasClass('slick-initialized')) {
        jQuery('.section-2-results').slick("unslick");
      }
    }
  }
  checkWidthResultsSlider();




  /* End Document Ready
   --------------------------------------------------------------------------------------- */

});