jQuery(document).ready(function ($) {
    $('.navbar-toggler-custom').hide();
    $('#toggle-button-nav').on('click', function () {
        $('.navbar-toggler-icon, .navbar-toggler-custom').toggle();
    });

    $('#navbarSupportedContent').on('shown.bs.collapse', function () {
        $('.navbar-toggler-icon').hide();
        $('.navbar-toggler-custom').show();
    });

    $('#navbarSupportedContent').on('hidden.bs.collapse', function () {
        $('.navbar-toggler-icon').show();
        $('.navbar-toggler-custom').hide();
    });
});


jQuery(document).ready(function($) {
    var mySwiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.custom-button-next',
            prevEl: '.custom-button-prev',
        },
        effect: 'fade',
        autoplay: {
            delay: 3000, 
            disableOnInteraction: false, 
          },
        loop:true,
        breakpoints: {
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            992: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            1200: {
                slidesPerView: 1,
                spaceBetween: 20
            }
            
        }
    });
});
jQuery(document).ready(function($) {
    var mySwiper21 = new Swiper('.swiper-container-property-page', {
        navigation: {
            nextEl: '.custom-button-next',
            prevEl: '.custom-button-prev',
        },
        effect: 'fade',
        loop:true,
        breakpoints: {
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            992: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            1200: {
                slidesPerView: 1,
                spaceBetween: 20
            }
            
        }
    });
});
jQuery(document).ready(function($) {
    var mySwiper234 = new Swiper('.swiper-container-property-page-album', {
        navigation: {
            nextEl: '.custom-button-next',
            prevEl: '.custom-button-prev',
        },
        // effect: 'fade',
        loop:true,
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            576: {
                slidesPerView: 4,
            },
            768: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 20
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 20
            }
            
        }
    });
});
jQuery(document).ready(function($) {
    var swiper2 = new Swiper('.swiper-container-properties', {
        loop:true,
        navigation:{
            nextEl:'.slider-button-next',
            prevEl:'.slider-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 30
            }
            
        }
    });
});
jQuery(document).ready(function($) {
    var swiper390 = new Swiper('.testimonial-slider', {
        loop:true,
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 30
            }
            
        }
    });
});
jQuery(document).ready(function($) {
    var swiper390 = new Swiper('.blogs-swiper-container', {
        loop:false,
        navigation:{
            nextEl:'.blog-slider-button-next',
            prevEl:'.blog-slider-button-prev',
        },
        
        pagination: {
            el: '.swiper-pagination-blogs',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 30
            }
            
        }
    });
});
jQuery(document).ready(function($) {
    var swiper4 = new Swiper('.swiper-slide-unique', {
        loop:true,
        navigation:{
            nextEl:'.unique-button-next',
            prevEl:'.unique-button-prev',
        },
        effect:"fade",
        fadeEffect: {
            crossFade: true
        },
        pagination: {
            el: '.unique-pagination',
            clickable: true,
        },
        breakpoints: {
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            1200: {
                slidesPerView: 1,
                spaceBetween: 30
            }
            
        }
    });
});
jQuery(document).ready(function($) {
    var swiper6 = new Swiper('.swiper-slider-3', {
        loop:true,
        navigation:{
            nextEl:'.unique-button-next',
            prevEl:'.unique-button-prev',
        },
        pagination: {
            el: '.unique-pagination',
            clickable: true,
            
        },
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 3,
                spaceBetween:13,
            },
            768: {
                slidesPerView: 3,
                spaceBetween:13,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 13,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 13,
            }
            
        }
    });
});

// jQuery(document).ready(function($) {
//     $('.search').on('click', function(e) {
//         e.preventDefault();
//         // $('.sub-header').submit();

//         var keyword = $('input[name="s"]').val();
//         var location = $('#locations').val();
//         var status = $('#status').val();
//         var type = $('#type').val(); 
//         var cost= $('#cost').val(); 
//         var url = search_results_ajax.url;
//         url += '?keyword=' + encodeURIComponent(keyword);
//         url += '&location=' + encodeURIComponent(location);
//         url += '&status=' + encodeURIComponent(status);
//         url += '&type=' + encodeURIComponent(type);
//         url += '&cost=' + encodeURIComponent(cost);
//         window.location.href = url;
//     });
// });

jQuery(document).ready(function($) {
    
    $('#account-icon').on('click', function(event) {
    
        event.preventDefault();
        
        $('#accountModal').modal('show');
    });
});

jQuery(document).ready(function($) {
    
    var costRange = $('#cost');

    
    var selectedCostElement = $('#selectedCost');
  
    function updateSelectedCost() {
        var formattedCost = parseInt(costRange.val()).toLocaleString();
        selectedCostElement.text("Selected Cost: ₹" + formattedCost);
    }
    updateSelectedCost();
    costRange.on('input', updateSelectedCost);
});
jQuery(document).ready(function($) {
    $('.search').on('click', function(e) {
        e.preventDefault();
        
        var form = $(this).closest('form');

        var keyword = form.find('input[name="s"]').val();
        var location = form.find('#locations').val();
        var status = form.find('#status').val();
        var type = form.find('#type').val(); 
        var cost = form.find('#cost').val(); 

        var url = search_results_ajax.url;
        url += '?keyword=' + encodeURIComponent(keyword);
        url += '&location=' + encodeURIComponent(location);
        url += '&status=' + encodeURIComponent(status);
        url += '&type=' + encodeURIComponent(type);
        url += '&cost=' + encodeURIComponent(cost);

        window.location.href = url;
    });
});





