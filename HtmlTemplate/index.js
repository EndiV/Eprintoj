$(document).ready(function(){

    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1,
        autoplay:true,
        autoplayTimeout:3500,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplayHoverPause:false,
        loop:true
        
    });

   // top sale owl carousel
   $("#top-sale .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    responsive : {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000 : {
            items: 5
        }
    }
});
// sa produkte do te shfaqen ne 0 px 600 px 1000px

    // isotope filter
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',
        layoutMode : 'fitRows'
    });
       // filter items on button click
       $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue});
    })
    // new products owl carousel
    $("#new-Products .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000 : {
                items: 5
            }
        }
    });
        // blogs owl carousel
        $("#blogs .owl-carousel").owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            responsive : {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                }
            }
        })
    


});