$(document).ready(function(){
  $('.owl-carousel:not(.not-dqowl)').each(function() {
            var xs_item = $(this).attr('data-xs-items');
            var md_item = $(this).attr('data-md-items');
            var sm_item = $(this).attr('data-sm-items');
            var margin = $(this).attr('data-margin');
            var dot = $(this).attr('data-dot');
            if (typeof margin !== typeof undefined && margin !== false) {} else {
              margin = 30;
            }
            if (typeof xs_item !== typeof undefined && xs_item !== false) {} else {
              xs_item = 1;
            }
            if (typeof sm_item !== typeof undefined && sm_item !== false) {

            } else {
              sm_item = 3;
            }
            if (typeof md_item !== typeof undefined && md_item !== false) {} else {
              md_item = 3;
            }
            if (typeof dot !== typeof undefined && dot !== true) {
              dot = true;
            } else {
              dot = false;
            }
            $(this).owlCarousel({
              loop: false,
              margin: Number(margin),
              responsiveClass: true,
              dots: dot,
              nav: true,
              responsive: {
                0: {
                  items: Number(xs_item)
                },
                600: {
                  items: Number(sm_item)
                },
                1000: {
                  items: Number(md_item)
                }
              }
            })
          })
});






    