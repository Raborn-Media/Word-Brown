/*global  ajax_object*/

jQuery(document).ready(function ($) {
  var categoriesArray = [];

  $('.category-list__item').on('click', function () {
    $(this).addClass('active-category');
    var selectedCategories = $(this).data('category');
    if (!categoriesArray.includes(selectedCategories)) {
      categoriesArray.push(selectedCategories);
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
      },
      error: function (errorThrown) {
        console.log(errorThrown);
      },
    });
  });

  $(document).on('click', '.winners-more-button', function () {
    let page = $(this).data('paged');
    let currButton = $(this);
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
      },
    });
  });
});
