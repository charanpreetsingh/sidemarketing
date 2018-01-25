(function($){

    'use strict';
    
    //WOW
    var wow = new WOW({
		mobile: false
	});
	wow.init();

    //Header slider
    $('#header-slider').owlCarousel({
        items: 1,
        autoplay: true,
        autoplayTimeout: 10000,
        loop: true
    });
    
    //Screenshot carousel
    $(".owl-carousel").owlCarousel({
        autoplay : true,
        slideBy : 'page',
        responsive: {
            0 : { items: 1 },
            480 : { items: 2 },
            992 : {items: 3}
        }
    });
    
    //Animate ProgressBar
    function animateProgressBar(pb) {
        if ($.fn.visible && $(pb).visible() && !$(pb).hasClass('animated')) {
            $(pb).css('width', $(pb).attr('aria-valuenow') + '%');
            $(pb).addClass('animated');
        }
    }
    
    function initProgressBar() {
        var progressBar = $('.progress-bar');
        progressBar.each(function () {
            animateProgressBar(this);
        });
    }
    
    initProgressBar();
    
    //CountTo
    function animateCountTo(ct) {
        if ($.fn.visible && $(ct).visible() && !$(ct).hasClass('animated')) {
            $(ct).countTo({speed: 2000});
            $(ct).addClass('animated');
        }
    }
    
    function initCountTo() {
        var counter = $('.timer');
        counter.each(function () {
            animateCountTo(this);
        });
    }
    
    initCountTo();
    
    //Form submit
    $('#contactform').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: 'mailer.php',
            data: formData
        }).done(function (response) {
            $('#contact-validation').text(response);
            $(this).children('input').val('');
        }).fail(function (data) {
            if (data.responseText !== '') {
                $('#contact-validation').text(data.responseText);
            } else {
                $('#contact-validation').text('Oops! your message couldn\'t send for some error');
            }
        });
    });
	
	
	
	
	
	// Magnific Popup JS
	$('.image-large').magnificPopup({
        type: 'image',
         gallery:{
            enabled:true
          }
    });
    $('.play-video').magnificPopup({
        type: 'iframe'
    });
    $.extend(true, $.magnificPopup.defaults, {
    iframe: {
        patterns: {
           youtube: {
              index: 'youtube.com/', 
              id: 'v=', 
              src: 'http://www.youtube.com/embed/%id%?autoplay=1' 
          }
        }
    }
    });
    
    $(window).on('scroll', function () {
        initProgressBar();
        initCountTo();
    });
  
	
})(jQuery);