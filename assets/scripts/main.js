// Import everything from autoload folder
import './autoload/**/*'; // eslint-disable-line

// Import local dependencies
import './plugins/lazyload';
import './plugins/modernizr.min';
import 'slick-carousel';
import skrollr from 'skrollr';
import MobileDetect from 'mobile-detect';
import 'jquery-match-height';
import objectFitImages from 'object-fit-images';
import '@fancyapps/fancybox/dist/jquery.fancybox.min';
import { jarallax, jarallaxElement } from 'jarallax';
import ScrollOut from 'scroll-out';

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

window.filters = {
  news: 'all',
  videos: 'all',
};

function fetchNews() {
  jQuery.getJSON(
    '/wp-json/media-feeds/v1/news/' + window.filters.news + '/0/4',
    function (response) {
      var list = jQuery('#blog-list');
      // var listArchive = jQuery('#blog-list-archive');
      list.empty();
      if (response.results.length) {
        for (var i = 0; i < response.results.length; i++) {
          var result = response.results[i];
          var imageElement = '';
          if (result.thumbnail) {
            imageElement =
              '<div class="post-image">' +
              '<a target="blank" href="' +
              result.href +
              '">' +
              '<img src="' +
              result.thumbnail +
              '" alt="Image">' +
              '</a>' +
              '</div>';
          }
          list.append(
            '<li class="lazy-load feed-post">' +
              imageElement + // Insert the image element if thumbnail is not empty
              '<div class="post-content">' +
              '<a target="blank" href="' +
              result.href +
              '">' +
              '<h3>' +
              result.title +
              '</h3>' +
              '</a>' +
              '<div class="post-info">' +
              '<div class="post-date">' +
              result.date +
              '</div>' +
              '<div class="post-resource">' +
              result.source +
              '</div>' +
              '</div>' +
              '<div class="list-filter-date">' +
              result.list_filter_date +
              '</div>' +
              '<p>' +
              result.description +
              '</p>' +
              '<a target="blank" class="read-more" href="' +
              result.href +
              '">' +
              'Read more' +
              '</a>' +
              '</div>' +
              '</li>'
          );
        }
      }
    }
  );
}
function listElem(elem) {
  let list =
    '<li class="archive-item">' +
    '<div class="archive-date" data-date="' +
    elem +
    '">' +
    elem +
    '</div>' +
    '</li>';
  return list;
}
function fetchArchiveDatesSingle() {
  jQuery.getJSON(
    '/wp-json/media-feeds/v1/news/' + window.filters.news + '/0/99',
    function (response) {
      var listArchive = jQuery('#blog-list-archive__single');
      var addedDates = [];
      let years = {};

      if (response.results.length) {
        for (var i = 0; i < response.results.length; i++) {
          var result = response.results[i];
          if (years[result.archive_year]) {
            if (!years[result.archive_year].includes(result.archive_date)) {
              years[result.archive_year].push(result.archive_date);
            }
          } else {
            years[result.archive_year] = [];
            years[result.archive_year].push(result.archive_date);
          }
          // console.log(years);
          if (addedDates.indexOf(result.archive_date) === -1) {
            var selectElement = jQuery('#archiveSelect__single');
            var option = new Option(result.archive_date, result.archive_date);
            selectElement.append(option);

            // Add the archive_date to the addedDates array
            addedDates.push(result.archive_date);
          }
        }
        let list = '';

        jQuery.each(years, function (index, element) {
          let listItems = '';
          jQuery.each(element, function (i, e) {
            listItems += listElem(e);
          });
          list +=
            '<li class="archive-item">' +
            '<div class="archive-year">' +
            index +
            '</div>' +
            '<ul class="months">' +
            listItems +
            '</ul>';
          listArchive.append(list);
        });

        listArchive.find('.archive-date').click(function () {
          var clickedDate = jQuery(this).data('date');
          var list = jQuery('#blog-list__single');
          list.empty();

          for (var i = 0; i < response.results.length; i++) {
            var result = response.results[i];
            if (result.list_filter_date === clickedDate) {
              var imageElement = '';
              if (result.thumbnail) {
                imageElement =
                  '<div class="post-image">' +
                  '<a target="blank" href="' +
                  result.href +
                  '">' +
                  '<img src="' +
                  result.thumbnail +
                  '" alt="Image">' +
                  '</a>' +
                  '</div>';
              }
              list.append(
                '<li class="lazy-load feed-post">' +
                  imageElement +
                  '<div class="post-content">' +
                  '<a target="blank" href="' +
                  result.href +
                  '">' +
                  '<h3>' +
                  result.title +
                  '</h3>' +
                  '</a>' +
                  '<div class="post-info">' +
                  '<div class="post-date">' +
                  result.date +
                  '</div>' +
                  '<div class="post-resource">' +
                  result.source +
                  '</div>' +
                  '</div>' +
                  '<div class="list-filter-date">' +
                  result.list_filter_date +
                  '</div>' +
                  '<p>' +
                  result.description +
                  '</p>' +
                  '<a target="blank" class="read-more" href="' +
                  result.href +
                  '">' +
                  'Read more' +
                  '</a>' +
                  '</div>' +
                  '</li>'
              );
            }
          }
        });

        jQuery('#archiveSelect__single').change(function () {
          var selectedDate = jQuery(this).val();
          var list = jQuery('#blog-list__single');
          list.empty();

          for (var i = 0; i < response.results.length; i++) {
            var result = response.results[i];
            if (result.list_filter_date === selectedDate) {
              var imageElement = '';
              if (result.thumbnail) {
                imageElement =
                  '<div class="post-image">' +
                  '<a target="blank" href="' +
                  result.href +
                  '">' +
                  '<img src="' +
                  result.thumbnail +
                  '" alt="Image">' +
                  '</a>' +
                  '</div>';
              }
              list.append(
                '<li class="lazy-load feed-post">' +
                  imageElement +
                  '<div class="post-content">' +
                  '<a target="blank" href="' +
                  result.href +
                  '">' +
                  '<h3>' +
                  result.title +
                  '</h3>' +
                  '</a>' +
                  '<div class="post-info">' +
                  '<div class="post-date">' +
                  result.date +
                  '</div>' +
                  '<div class="post-resource">' +
                  result.source +
                  '</div>' +
                  '</div>' +
                  '<div class="list-filter-date">' +
                  result.list_filter_date +
                  '</div>' +
                  '<p>' +
                  result.description +
                  '</p>' +
                  '<a target="blank" class="read-more" href="' +
                  result.href +
                  '">' +
                  'Read more' +
                  '</a>' +
                  '</div>' +
                  '</li>'
              );
            }
          }
        });
      }
    }
  );
}

function fetchArchiveDates() {
  jQuery.getJSON(
    '/wp-json/media-feeds/v1/news/' + window.filters.news + '/0/99',
    function (response) {
      var listArchive = jQuery('#blog-list-archive');
      var addedDates = [];
      let years = {};

      if (response.results.length) {
        for (var i = 0; i < response.results.length; i++) {
          var result = response.results[i];
          if (years[result.archive_year]) {
            if (!years[result.archive_year].includes(result.archive_date)) {
              years[result.archive_year].push(result.archive_date);
            }
          } else {
            years[result.archive_year] = [];
            years[result.archive_year].push(result.archive_date);
          }
          if (addedDates.indexOf(result.archive_date) === -1) {
            var selectElement = jQuery('#archiveSelect');
            var option = new Option(result.archive_date, result.archive_date);
            selectElement.append(option);

            // Add the archive_date to the addedDates array
            addedDates.push(result.archive_date);
          }
        }
        let datesList = '';

        jQuery.each(years, function (index, element) {
          let listItems = '';
          jQuery.each(element, function (i, e) {
            listItems += listElem(e);
          });
          datesList +=
            '<li class="archive-item">' +
            '<div class="archive-year">' +
            index +
            '</div>' +
            '<ul class="months">' +
            listItems +
            '</ul>';
          listArchive.append(datesList);
        });

        listArchive.find('.archive-date').click(function () {
          var clickedDate = jQuery(this).data('date');
          var list = jQuery('#blog-list');
          list.empty();

          for (var i = 0; i < response.results.length; i++) {
            var result = response.results[i];
            if (result.list_filter_date === clickedDate) {
              var imageElement = '';
              if (result.thumbnail) {
                imageElement =
                  '<div class="post-image">' +
                  '<a target="blank" href="' +
                  result.href +
                  '">' +
                  '<img src="' +
                  result.thumbnail +
                  '" alt="Image">' +
                  '</a>' +
                  '</div>';
              }
              list.append(
                '<li class="lazy-load feed-post">' +
                  imageElement +
                  '<div class="post-content">' +
                  '<a target="blank" href="' +
                  result.href +
                  '">' +
                  '<h3>' +
                  result.title +
                  '</h3>' +
                  '</a>' +
                  '<div class="post-info">' +
                  '<div class="post-date">' +
                  result.date +
                  '</div>' +
                  '<div class="post-resource">' +
                  result.source +
                  '</div>' +
                  '</div>' +
                  '<div class="list-filter-date">' +
                  result.list_filter_date +
                  '</div>' +
                  '<p>' +
                  result.description +
                  '</p>' +
                  '<a target="blank" class="read-more" href="' +
                  result.href +
                  '">' +
                  'Read more' +
                  '</a>' +
                  '</div>' +
                  '</li>'
              );
            }
          }
        });

        jQuery('#archiveSelect').change(function () {
          var selectedDate = jQuery(this).val();
          var list = jQuery('#blog-list');
          list.empty();

          for (var i = 0; i < response.results.length; i++) {
            var result = response.results[i];
            if (result.list_filter_date === selectedDate) {
              var imageElement = '';
              if (result.thumbnail) {
                imageElement =
                  '<div class="post-image">' +
                  '<a target="blank" href="' +
                  result.href +
                  '">' +
                  '<img src="' +
                  result.thumbnail +
                  '" alt="Image">' +
                  '</a>' +
                  '</div>';
              }
              list.append(
                '<li class="lazy-load feed-post">' +
                  imageElement +
                  '<div class="post-content">' +
                  '<a target="blank" href="' +
                  result.href +
                  '">' +
                  '<h3>' +
                  result.title +
                  '</h3>' +
                  '</a>' +
                  '<div class="post-info">' +
                  '<div class="post-date">' +
                  result.date +
                  '</div>' +
                  '<div class="post-resource">' +
                  result.source +
                  '</div>' +
                  '</div>' +
                  '<div class="list-filter-date">' +
                  result.list_filter_date +
                  '</div>' +
                  '<p>' +
                  result.description +
                  '</p>' +
                  '<a target="blank" class="read-more" href="' +
                  result.href +
                  '">' +
                  'Read more' +
                  '</a>' +
                  '</div>' +
                  '</li>'
              );
            }
          }
        });
      }
    }
  );
}

function fetchVideos() {
  jQuery.getJSON(
    '/wp-json/media-feeds/v1/videos/' + window.filters.videos + '/0/8',
    function (response) {
      var list = jQuery('#video-list');

      list.empty();

      if (response.results.length) {
        for (var i = 0; i < response.results.length; i++) {
          var result = response.results[i];

          setTimeout(
            function (result) {
              list.append(
                '<li class="lazy-load">' +
                  '<a class="video-wrap " video="' +
                  result.href +
                  '">' +
                  // '<a href="' + result.href + '">' +
                  '<img src="' +
                  result.thumbnail +
                  '" />' +
                  '</a>' +
                  '</div>' +
                  '<div class="video-footer">' +
                  '<h4>' +
                  result.title +
                  '</h4>' +
                  '<p class="post-date">' +
                  result.date +
                  '</p>' +
                  '<p>' +
                  result.author +
                  '</p>' +
                  '</div>' +
                  '</li>'
              );
            },
            i * 100,
            result
          );
        }
      }
    }
  );
}

/**
 * Scripts which runs after DOM load
 */
$(document).on('ready', function () {
  // Initialize FancyBox
  $('[data-fancybox]').fancybox();

  // Handle click event on .open-modal
  $('.open-modal').click(function (e) {
    e.preventDefault();

    // Get the target modal ID
    var targetModalID = $(this).attr('href');

    // Open the modal using FancyBox
    $.fancybox.open({
      src: targetModalID,
      type: 'inline',
    });
  });

  // Handle click event on .next-modal
  $('.next-modal').click(function (e) {
    e.preventDefault();

    // Find the current modal
    var currentModal = $(this).closest('.modal');

    // Find the next modal
    var nextModal = currentModal.next('.modal');

    // If there is a next modal, open it using FancyBox
    if (nextModal.length) {
      $.fancybox.open({
        src: nextModal,
        // type: 'inline',
      });
    }
  });

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

  $('#youtube-lightbox .fa').click(function () {
    $('#youtube-lightbox').addClass('hidden');
    $('body').removeClass('fixed');
    var lightbox = $('#youtube-lightbox');
    lightbox.find('.wrapper').html('<iframe src="" />');
  });

  $('body').on('click', '[video]', function () {
    var lightbox = $('#youtube-lightbox');
    var video = $(this).attr('video').replace('watch?v=', 'embed/');

    lightbox.find('.wrapper').html('<iframe src="' + video + '" />');
    lightbox.removeClass('hidden');
    $('body').addClass('fixed');
  });

  $('[filter-news-press]').click(function (e) {
    var filter = $(this).attr('filter-news-press');

    $('[filter-news-press]').parent().removeClass('active');
    $(this).parent().addClass('active');

    window.filters.news = filter;

    fetchNews();

    e.preventDefault();
    return false;
  });

  $('[filter-videos]').click(function (e) {
    var filter = $(this).attr('filter-videos');

    $('[filter-videos]').parent().removeClass('active');
    $(this).parent().addClass('active');

    window.filters.videos = filter;

    fetchVideos();

    e.preventDefault();
    return false;
  });

  fetchNews();
  fetchArchiveDates();
  fetchArchiveDatesSingle();
  fetchVideos();
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
  ScrollOut({
    offset: function () {
      return window.innerHeight - 100;
    },
    // once: true,
    onShown: function (element) {
      if ($(element).is('.ease-order')) {
        $(element)
          .find('.ease-order__item')
          .each(function (i) {
            let $this = $(this);
            $(this).attr('data-scroll', '');
            window.setTimeout(function () {
              $this.attr('data-scroll', 'in');
            }, 300 * i);
          });
      }
    },
  });

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
      $('html, body').animate({ scrollTop: $target.offset().top - 150 }, 500);
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
    $('header').addClass('header-bg');
    $('.mobile-header-contacts-wrapper').addClass('scroll-hide');
    $('.navbar-collapse').css('top', headerHeight);
  } else if (Y < 1) {
    $('header').removeClass('header-bg');
    $('.mobile-header-contacts-wrapper').removeClass('scroll-hide');
    $('.navbar-collapse').css('top', headerHeight);
  }
});

$(window).on('load resize orientationchange', function () {
  $('.quotes-list').each(function () {
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
          arrows: false,
          dots: true,
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
    // console.log(galleryHeight);
    // Set the height of the gallery element
    $('.gallery').height(galleryHeight);
  } else {
    $('.gallery').height('auto');
  }
});

var md = new MobileDetect(window.navigator.userAgent);

function enableSkrollr() {
  // Enable Skroll
  var s = skrollr.init();
  s.destroy();
  skrollr.init({
    skrollrBody: 'culture-desktop',
    smoothScrolling: true,
    smoothScrollingDuration: 500,
    forceHeight: false,
    easing: {
      inverted: function (p) {
        return 1 - p * p * p * p * p;
      },
    },
  });
  //alert('enable');
}

function disableSkrollr() {
  var s = skrollr.init();
  s.destroy();
  //alert('disable');
}

var desktopView = function () {
  //alert('desktop');
  $('#culture-mobile, #culture-desktop').removeClass('visible-module');
  $('#culture-desktop').addClass('visible-module');
};

var mobileView = function () {
  //alert('mobile');
  $('#culture-mobile, #culture-desktop').removeClass('visible-module');
  $('#culture-mobile').addClass('visible-module');
};

if (md.mobile()) {
  disableSkrollr();
  mobileView();
} else {
  $(window).on('load resize', function () {
    if (window.matchMedia('(min-width: 64em)').matches) {
      desktopView();
      enableSkrollr();
    } else {
      disableSkrollr();
      mobileView();
    }
  });
}
