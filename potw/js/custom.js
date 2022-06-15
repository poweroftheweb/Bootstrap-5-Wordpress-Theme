// Developer: Packy Savvenas





      var offset = 100;

      var duration = 100;



      jQuery(window).scroll(function() {

        if (jQuery(this).scrollTop() > offset) {

          jQuery('.return-top').fadeIn(duration);

        } else {

          jQuery('.return-top').fadeOut(duration);

        }

      });



      $( document ).on('click', '.return-top', function(event){

        event.preventDefault();

        jQuery('html, body').animate({scrollTop: 0}, duration);

        return false;

      });






//  Apply header classes



function windowScroll() {

    const navbar = document.getElementById("header");

    if (navbar) {

        if (

            document.body.scrollTop >= 50 ||

            document.documentElement.scrollTop >= 50

        ) {

            navbar.classList.add("container-fixed");

        } else {

            navbar.classList.remove("container-fixed");

        }

    }

}



window.addEventListener('scroll', (ev) => {

    ev.preventDefault();

    windowScroll();

})





//  Apply animation classes





$(window).scroll(function(){

    if ($(this).scrollTop() > 50) {

       $('.animate__animated').addClass('animate__slideInDown');

    } else {

       $('.animate__animated').removeClass('animate__slideInDown');

    }

});



  

  

  // SMOOTH SCROLL

  if ($('.scroll').length > 0) {

    $(".scroll").on("click", function(event){

      event.preventDefault();

      //calculate destination place

      var dest=0;

      var destOffset = 180;

      if($(this.hash).offset().top > $(document).height()-$(window).height()){

        dest=$(document).height()-$(window).height();

      }else{

        dest=$(this.hash).offset().top;

      }

      //go to destination

      $('html,body').animate({scrollTop:dest-destOffset}, 1000,'swing');

    });

  }





        $(document).on('click', '.potw-search > a.control-search', function(){

        if($(this).hasClass('search-open')){

          $(this).parents('.potw-search').removeClass('open');

          $(this).removeClass('search-open');

        }else{

          $(this).parents('.potw-search').addClass('open');

          $(this).addClass('search-open');

        }

      });







(function ($) {

  "use strict";



  // Submenu dropdown toggler



  if ($(".main-menu li.menu-item-has-children ul").length) {

    $(".main-menu li.menu-item-has-children").append(

      '<div class="dropdown-btn"><i class="flaticon flaticon-arrow-down-sign-to-navigate"></i></div>'

    );



    // Dropdown Button

    $(".main-menu li.menu-item-has-children .dropdown-btn").on(

      "click",

      function () {

        $(this).prev("ul").slideToggle(500);

      }

    );



    // Disable dropdown parent link

    $(

      ".main-menu .navigation li.menu-item-has-children > a, .hidden-bar .side-menu li.menu-item-has-children > a"

    ).on("click", function () {

      e.preventDefault();

    });

  }



  // mobile nav hide / show

  if ($(".mobile-menu").length) {

    var mobileMenuContent = $("#top-navigation .navigation").html();



    $(".mobile-menu .navigation").append(mobileMenuContent);



    $(".sticky-header .navigation").append(mobileMenuContent);



    $(".mobile-menu .close-btn").on("click", function () {

      $("body").removeClass("mobile-menu-visible");

    });



    // Dropdown Button

    $(".mobile-menu li.menu-item-has-children .dropdown-btn").on(

      "click",

      function () {

        $(this).prev("ul").slideToggle(500);

      }

    );



    // Menu Toggle button

    $(".mobile-nav-toggler").on("click", function () {

      $("body").addClass("mobile-menu-visible");

    });



    // Menu Toggle button

    $(".mobile-menu .menu-backdrop, .mobile-menu .close-btn").on(

      "click",

      function () {

        $("body").removeClass("mobile-menu-visible");

      }

    );

  }

})(jQuery);




$(document).ready(function() {
  $(window).on("scroll", function() {
    console.log($(this).scrollTop())
    if($(this).scrollTop() >= 30){
      // set to new image
      $(".brand-logo img").attr("src","http://localhost/poweroftheweb/wp-content/themes/potw/assets/img/logo-color.png");
    } else {
      //back to default
      $(".brand-logo img").attr("src","http://localhost/poweroftheweb/wp-content/themes/potw/assets/img/logo.png");
    }
  })
})