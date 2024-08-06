// news ajax require
(function ($) {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  
  var paged = 1;
  var offset = $('.xtech-news-col').length;
  
  const formValues = $('.xtech-news-filter').serializeArray().reduce(function (obj, item) {
        if (!obj[item.name]) {
            obj[item.name] = item.name.includes('[]') ? [item.value] : item.value;
        } else {
            obj[item.name].push(item.value);
        }
        return obj;
  }, {});
  
  function fetchPosts() {
    $.ajax({
      url: wpAjax.ajaxUrl+'morePosts',
      data: {
        ...formValues,
        paged,
        offset,
      },
      type: "get",
      contentType: "application/javascript",
      beforeSend: function (xhr) {
        $(".load-more-news .text").text('Loading...'); // changing the button label
      },
      success: function (result) {
        $(".load-more-news .text").text('Load more'); // changing the button label
        if ($.trim(result) != "") {
          $("#no-result").hide();
          $(".load-more-news").show();
          $("#news-response .xtech-news-row").append(result);
          offset = $(".xtech-news-col").length;
        } else {
          if (paged === 1) {
              $("#no-result").show();
          }
          $(".load-more-news").hide();
        }

      },
      error: function (result) {
        console.warn(result);
      },
    });
  }

  $(".load-more-news").on("click", function (e) {
    e.preventDefault();
    
    paged++;
    
    fetchPosts(offset);
  });

  const params = new URL(location.href).searchParams;
  const s = params.get('s');
  const postTag = params.get('post_tag');
  var searchPage = 1;
  
  $(".load-more-search").on("click", function (e) {
      e.preventDefault();
      $.ajax({
          url: wpAjax.ajaxUrl + 'search',
          data: {
            s,
            paged: searchPage,
            post_tag: postTag,
          },
          type: "get",
          contentType: "application/javascript",
          beforeSend: function (xhr) {
            $(".load-more-search .text").text('Loading...'); // changing the button label
          },
          success: function (result) {
              $(".load-more-search .text").text('Load more');
              
              if ($.trim(result) === "") {
                  $("#no-result").show();
                  $(".load-more-search").hide();
                  return;
              }
              
              $("#no-result").hide();
              
              $(".page-content").append(result);
              searchPage++;
          },
          error: function (result) {
            console.warn(result);
          },
      });
  });
  $(document).ready(() => {
      if ($(".load-more-search")) {
          $(".load-more-search").click();
      }
  });
  
  $(".xtech-news-filter-options .form-check:first-child .form-check-input").on("click", function(e) {
      if (!$(this).is(':checked')) {
          e.preventDefault();
      }
  });
  
  $(".xtech-news-filter-options-section input[type=checkbox]").on("change", function (e) {
      const optionType = $(this).parents(".xtech-news-filter-options-section").data("option");
      const optionAll = optionType + "-all";
      const optionCounter = optionType + "-counter";
      const count = $(this).parents(".xtech-news-filter-options-section").find('input:not(#' + optionAll + '):checked').length;
      
      if ($(this).attr('id') !== optionAll) {
          $('#' + optionAll).prop('checked', false);
          $('#' + optionCounter).text(count)
      } else {
          $(this).parents(".xtech-news-filter-options-section").find("input[type=checkbox]:not(" + '#' + optionAll + ")").prop('checked', false);
          $('#' + optionCounter).text('all')
      }
      
      formValues[optionType + '[]'] = $('input[name="' + optionType + '[]"]:checked').map(function () {
          return this.value;
      }).get();
      
      $("#news-response .xtech-news-row").html('');
      paged = 1;
      offset = 0;
      
      fetchPosts();
  });
  
  $(".xtech-news-filter #search").keypress(function (e) {
    if (e.which == 13) {
      formValues.s = $(this).val();
      
      $("#news-response .xtech-news-row").html('');
      paged = 1;
      offset = 0;
      
      fetchPosts();
      
      return false;
    }
  })
  
})(jQuery);