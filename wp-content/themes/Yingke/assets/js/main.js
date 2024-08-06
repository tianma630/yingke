jQuery(document).ready(function($) {
    var header = $("header.elementor-section").first();
    if (header) {
    	var sticky = header.offset().top;

        $(window).scroll(function() {
          if ($(this).scrollTop() > sticky) {
            header.addClass("sticky");
          } else {
            header.removeClass("sticky");
          }
        })
    }
    
    $('.premium-hamburger-toggle').on('click', function (e) {
       $(this).parents('#masthead').toggleClass('expand');
    });
    
    $('.open-top-search').on('click', function(e) {
    	e.preventDefault();
        $('#top-search').addClass('active');
    })
    $('#close-top-search').on('click', function(e) {
    	e.preventDefault();
        $('#top-search').removeClass('active');
    })
    $(window).click(function() {
    	if ($('#top-search').hasClass('active')) {
        	$('#top-search').removeClass('active');
        }
    });
    $('#top-search, .open-top-search').click(function(event){
      event.stopPropagation();
    });
});