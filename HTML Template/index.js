$(document).ready(function() {


  
    $("#featured_products .owl-carousel").owlCarousel({
        dots:true,
        nav:true,
        loop:true,
        responsive: {
            0: {
                items:1
            },
            600: {
                items:2
            },
            1000: {
                items:5
            }

        }
    });


  
    var $grid = $(".grid").isotope({
        itemSelector :'.grid-item',
        layoutMode : 'fitRows'
    });

    //filter

    $(".button-group").on("click","button",function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter:filterValue});
    });
});