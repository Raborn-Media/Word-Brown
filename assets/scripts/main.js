// Import everything from autoload folder
import './autoload/**/*'; // eslint-disable-line

// Import local dependencies
import './plugins/lazyload';
import './plugins/modernizr.min';
import 'slick-carousel';
import 'jquery-match-height';
import objectFitImages from 'object-fit-images';
// import '@fancyapps/fancybox/dist/jquery.fancybox.min';
import { jarallax, jarallaxElement } from 'jarallax';
// import ScrollOut from 'scroll-out';

/**
 * Import scripts from Custom Divi blocks
 */
// eslint-disable-next-line import/no-unresolved
// import '../blocks/divi/**/index.js';

/**
 * Import scripts from Custom Elementor widgets
 */
// eslint-disable-next-line import/no-unresolved
// import '../blocks/elementor/**/index.js';

/**
 * Import scripts from Custom ACF Gutenberg blocks
 */
// eslint-disable-next-line import/no-unresolved
// import '../blocks/gutenberg/**/index.js';

/**
 * Init foundation
 */
$(document).foundation();

/**
 * Fit slide video background to video holder
 */
function resizeVideo() {
  let $holder = $('.videoHolder');
  $holder.each(function () {
    let $that = $(this);
    let ratio = $that.data('ratio') ? $that.data('ratio') : '16:9';
    let width = parseFloat(ratio.split(':')[0]);
    let height = parseFloat(ratio.split(':')[1]);
    $that.find('.video').each(function () {
      if ($that.width() / width > $that.height() / height) {
        $(this).css({
          width: '100%',
          height: 'auto',
        });
      } else {
        $(this).css({
          width: ($that.height() * width) / height,
          height: '100%',
        });
      }
    });
  });
}

/**
 * Scripts which runs after DOM load
 */
$(document).on('ready', function () {
  $('.black-logos-container .companies-list__item').on(
    'mouseenter',
    function () {
      $(this).removeClass('black-logos');
      $(this).addClass('gray-bg');
    }
  );
  $('.black-logos-container .companies-list__item').on(
    'mouseleave',
    function () {
      $('.companies-list__item').addClass('black-logos');
      $('.companies-list__item').removeClass('gray-bg');
    }
  );
  // quoteSlider();
  // if (window.matchMedia('(max-width: 640px)').matches) {
  //   /* the viewport is less than 768 pixels wide */
  //   $('.quotes-list').slick();
  // }

  // $('svg path, svg polygon').each(function () {
  //   var originalColor = $(this).css('fill');
  //
  //   $(this).on('mouseenter', function () {
  //     $(this).css('fill', originalColor);
  //   });
  //
  //   $(this).on('mouseleave', function () {
  //     $(this).css('fill', '#000000'); // Set the default color
  //   });
  // });
  /**
   * Scroll to top
   */
  $('.scroll-to-up').click(function (event) {
    event.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 'slow');
    return false;
  });
  /**
   * Make elements equal height
   */
  $('.matchHeight').matchHeight();

  /**
   * IE Object-fit cover polyfill
   */
  if ($('.of-cover').length) {
    objectFitImages('.of-cover');
  }

  /**
   * Add fancybox to images
   */
  // $('.gallery-item')
  //   .find('a[href$="jpg"], a[href$="png"], a[href$="gif"]')
  //   .attr('rel', 'gallery')
  //   .attr('data-fancybox', 'gallery');
  // $(
  //   '.fancybox, a[rel*="album"], a[href$="jpg"], a[href$="png"], a[href$="gif"]'
  // ).fancybox({
  //   minHeight: 0,
  //   helpers: {
  //     overlay: {
  //       locked: false,
  //     },
  //   },
  // });

  /**
   * Init parallax
   */
  jarallaxElement();
  jarallax(document.querySelectorAll('.jarallax'), {
    speed: 0.5,
  });
  jarallax(document.querySelectorAll('.jarallax-keep-img'), {
    keepImg: true,
  });

  /**
   * Detect element appearance in viewport
   */
  // ScrollOut({
  //   offset: function() {
  //     return window.innerHeight - 200;
  //   },
  //   once: true,
  //   onShown: function(element) {
  //     if ($(element).is('.ease-order')) {
  //       $(element)
  //         .find('.ease-order__item')
  //         .each(function(i) {
  //           let $this = $(this);
  //           $(this).attr('data-scroll', '');
  //           window.setTimeout(function() {
  //             $this.attr('data-scroll', 'in');
  //           }, 300 * i);
  //         });
  //     }
  //   },
  // });

  /**
   * Remove placeholder on click
   */
  const removeFieldPlaceholder = () => {
    $('input, textarea').each((i, el) => {
      $(el)
        .data('holder', $(el).attr('placeholder'))
        .on('focusin', () => {
          $(el).attr('placeholder', '');
        })
        .on('focusout', () => {
          $(el).attr('placeholder', $(el).data('holder'));
        });
    });
  };

  removeFieldPlaceholder();

  $(document).on('gform_post_render', () => {
    removeFieldPlaceholder();
  });

  /**
   * Scroll to Gravity Form confirmation message after form submit
   */
  $(document).on('gform_confirmation_loaded', function (event, formId) {
    let $target = $('#gform_confirmation_wrapper_' + formId);
    if ($target.length) {
      $('html, body').animate({ scrollTop: $target.offset().top - 50 }, 500);
      return false;
    }
  });

  /**
   * Hide gravity forms required field message on data input
   */
  $('body').on(
    'change keyup',
    '.gfield input, .gfield textarea, .gfield select',
    function () {
      let $field = $(this).closest('.gfield');
      if ($field.hasClass('gfield_error') && $(this).val().length) {
        $field.find('.validation_message').hide();
      } else if ($field.hasClass('gfield_error') && !$(this).val().length) {
        $field.find('.validation_message').show();
      }
    }
  );

  /**
   * Add 'is-active' class to menu-icon button on Responsive menu toggle
   * And remove it on breakpoint change
   */
  $(window)
    .on('toggled.zf.responsiveToggle', function () {
      $('.menu-icon').toggleClass('is-active');
    })
    .on('changed.zf.mediaquery', function () {
      $('.menu-icon').removeClass('is-active');
    });

  /**
   * Close responsive menu on orientation change
   */
  $(window).on('orientationchange', function () {
    setTimeout(function () {
      if ($('.menu-icon').hasClass('is-active') && window.innerWidth < 641) {
        $('[data-responsive-toggle="main-menu"]').foundation('toggleMenu');
      }
    }, 200);
  });

  resizeVideo();
});

/**
 * Scripts which runs after all elements load
 */
$(window).on('load', function () {
  // jQuery code goes here

  let $preloader = $('.preloader');
  if ($preloader.length) {
    $preloader.addClass('preloader--hidden');
  }
});

/**
 * Scripts which runs at window resize
 */
$(window).on('resize', function () {
  // jQuery code goes here
  resizeVideo();
});

/**
 * Scripts which runs on scrolling
 */
$(window).on('scroll', function () {
  // jQuery code goes here
  //jQuery code goes here
  var Y = window.scrollY;
  // console.log(Y)
  if (Y > 100) {
    $('.scroll-to-up').css('opacity', '1');
  } else if (Y < 100) {
    $('.scroll-to-up').css('opacity', '0');
  }
  // Get the height of the header element
  var headerHeight = $('.header').outerHeight();

  if (Y > 1) {
    $('.page-template-template-contact header').addClass('header-bg');
    $('.page-template-default header').addClass('header-bg');
    $('.mobile-header-contacts-wrapper').addClass('scroll-hide');
    $('.navbar-collapse').css('top', headerHeight);
  } else if (Y < 1) {
    $('.page-template-template-contact header').removeClass('header-bg');
    $('.page-template-default header').removeClass('header-bg');
    $('.mobile-header-contacts-wrapper').removeClass('scroll-hide');
    $('.navbar-collapse').css('top', headerHeight);
  }
});

$(window).on('load resize orientationchange', function () {
  $('.carousel').each(function () {
    var $carousel = $(this);
    /* Initializes a slick carousel only on mobile screens */
    // slick on mobile
    if ($(window).width() > 800) {
      if ($carousel.hasClass('slick-initialized')) {
        $carousel.slick('unslick');
      }
    } else {
      if (!$carousel.hasClass('slick-initialized')) {
        $carousel.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          mobileFirst: true,
          adaptiveHeight: true,
        });
      }
    }
  });
  if ($(window).width() <= 1024) {
    // Get the height of the first gallery__image element
    var imageHeight = $('.gallery__image').height();

    // Calculate the desired height for the gallery element
    var galleryHeight = imageHeight * 2 + 15;
    console.log(galleryHeight);
    // Set the height of the gallery element
    $('.gallery').height(galleryHeight);
  } else {
    $('.gallery').height('auto');
  }
});
