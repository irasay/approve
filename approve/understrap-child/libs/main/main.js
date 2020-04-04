var $ = jQuery;

$(function() {

	$("").submit(function() { 
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "/wp-content/themes/iwebmoscow/libs/mailphp/mail.php",
			data: th.serialize()
		}).done(function() {
			alert("Мы свяжемся с вами в ближайшее время!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});

	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });
	
});

$(document).ready(function($) {
    
    // Фиксированное меню при скролле
    // $(window).scroll(function(){
    //       if ($(this).scrollTop() > 200) {
    //           $('.topline').addClass('fixed');
    //       } else {
    //           $('.topline').removeClass('fixed');
    //       }
    // });
    
    // Маска для номеров
	
	
	// Счетчик цифр от 0 до ...
	$('.counter').each(function() {
    $(this).prop('Counter', 0).animate({
      Counter: $(this).text()
    }, {
      duration: 2500,
      easing: 'swing',
      step: function(now) {
        $(this).text(Math.ceil(now));
      }
    });
  });

	// Слайдер
  $('.realty-slider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<img class="slider-arrow slider-arrow__left" src="/wp-content/themes/understrap-child/img/arrow-prev.png">',
    nextArrow: '<img class="slider-arrow slider-arrow__right" src="/wp-content/themes/understrap-child/img/arrow-next.png">',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

});