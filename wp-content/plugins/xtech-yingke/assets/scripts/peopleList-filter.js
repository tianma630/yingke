(function ($) {
  $(document).ready(function () {
    $(document).on("click", ".region-filter-item", function (e) {
      e.preventDefault();
      $('.region-filter-item').removeClass('active');
      $(this).addClass('active');
      const filterItem = $(this).data('region');

      if (filterItem === 'all') {
        $('.xtech-people-col').removeClass('hide')

        $('.region-filter-action').addClass('invisible')
      } else {
       	$('.xtech-people-col[data-region~="' + filterItem + '"]').removeClass('hide')
        
        $('.xtech-people-col:not([data-region~="' + filterItem + '"])').addClass('hide')

        $('.region-filter-action').removeClass('invisible')

        $('#filter-value span').text($(this).text())
      }

    });

    $(document).on("click", "#clear-filter-value, #filter-value", function (e) {
      e.preventDefault();

      $(".region-filter-item").removeClass('active')

      $(".region-filter-item[data-region=all]").addClass('active')

      $('.xtech-people-col').removeClass('hide')

      $('.region-filter-action').addClass('invisible')
    });
  });

})(jQuery);