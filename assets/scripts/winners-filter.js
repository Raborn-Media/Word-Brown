/*global  ajax_object*/
import ScrollOut from 'scroll-out';

jQuery(document).ready(function ($) {
  var formID = '#gform_3';
  var submitButton = $(formID + ' button[type="submit"]');
  var requiredFields = $(
    formID +
      ' .gfield_contains_required input, ' +
      formID +
      ' .gfield_contains_required select, ' +
      formID +
      ' .gfield_contains_required textarea'
  );

  // Disable submit button initially
  submitButton.prop('disabled', true);

  // Function to check if all required fields are filled
  function checkRequiredFields() {
    var allFilled = true;

    requiredFields.each(function () {
      var input = $(this);
      if (input.val() === '') {
        allFilled = false;
        return false; // Exit the loop early if any field is empty
      }
    });

    return allFilled;
  }

  // Enable/disable submit button based on required fields on field change
  requiredFields.on('input', function () {
    if (checkRequiredFields()) {
      submitButton.prop('disabled', false);
    } else {
      submitButton.prop('disabled', true);
    }
  });

  $('.dropdown-year').on('click', function () {
    $(this).toggleClass('dropdown-year__active');
    $('.category-list-wrap').toggleClass('category-list-wrap__open');
  });

  var categoriesArray = [];

  $('.category-list__item').on('click', function () {
    $('.category-list-wrap').removeClass('category-list-wrap__open');
    // $(this).toggleClass('active-category');
    // var selectedCategories = $(this).data('category');
    // if (!categoriesArray.includes(selectedCategories)) {
    //   categoriesArray.push(selectedCategories);
    // }

    $(this).toggleClass('active-category');

    var selectedCategories = $(this).data('category');

    if ($(this).hasClass('active-category')) {
      // Add selected category to categoriesArray if it has the 'active-category' class
      if (!categoriesArray.includes(selectedCategories)) {
        categoriesArray.push(selectedCategories);
      }
    } else {
      // Remove selected category from categoriesArray if the 'active-category' class is removed
      var index = categoriesArray.indexOf(selectedCategories);
      if (index !== -1) {
        categoriesArray.splice(index, 1);
      }
    }

    console.log(categoriesArray);
    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'filter_winners',
        category: categoriesArray,
        paged: 1,
      },
      success: function (response) {
        $('.winners-list').html(response);
        ScrollOut({
          once: false,
        });
      },
      error: function (errorThrown) {
        console.log(errorThrown);
      },
    });
  });

  $('.clear-selection').on('click', function () {
    $('.category-list__item').removeClass('active-category');
    categoriesArray = [];
    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'clear_filter_winners',
        paged: 1,
      },
      success: function (response) {
        $('.winners-list').html(response);
        ScrollOut({
          once: false,
        });
      },
      error: function (errorThrown) {
        console.log(errorThrown);
      },
    });
  });

  $(document).on('click', '.winners-more-button', function () {
    let page = $(this).data('paged');
    let currButton = $('.more-button-wrap');
    $.ajax({
      type: 'POST',
      url: ajax_object.ajax_url,
      data: {
        action: 'filter_winners',
        category: categoriesArray,
        paged: page,
      },
      beforeSend() {},
      success: function (response) {
        currButton.remove();
        $('.winners-list').append(response);
        ScrollOut({
          once: false,
        });
      },
    });
  });
});
