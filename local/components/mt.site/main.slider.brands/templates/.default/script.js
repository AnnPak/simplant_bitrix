$(document).ready(function() { 
  $('.client-block_slider-wrap').slick({
    arrows: true,
    lazyLoad: 'ondemand',
    slidesToShow: 6,
    slidesToScroll: 3,
    rows: 2,
    dots: false,
    prevArrow: '<div class="arrow-prev"></div>',
    nextArrow: '<div class="arrow-next"></div>',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 810,
        settings: {
            slidesToShow: 3
        }
      },
      {
        breakpoint: 610,
        settings: {
            slidesToShow: 2
        }
      }, 
    ]
  });
});