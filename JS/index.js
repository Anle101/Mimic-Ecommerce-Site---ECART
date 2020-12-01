function App() {}

    App.prototype.setState = function(state) {
        localStorage.setItem('checked', state);
    }

    App.prototype.getState = function() {
        
        return localStorage.getItem('checked');
    }

    function init() {
    var app = new App();
    var state = app.getState();
    var checkbox = document.querySelector('#themeswitch');

    if (state == 'true') {
        $("#main").attr("data-theme", "dark");
        checkbox.checked = true;
    }
    else {
         $("#main").attr("data-theme", "light");
    }

    checkbox.addEventListener('click', function() {
        app.setState(checkbox.checked);
    });
}



$(document).ready(function() {
    init();
    $("#featured_products .owl-carousel").owlCarousel({
        dots:true,
        nav:true,
        loop:true,
        responsive: {
            0: {
                items:1
            },
            600: {
                items:3
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

    $("#themeswitch").change(function() {
        if ($(this).is( ":checked")){
            $("#main").attr("data-theme", "dark");
        }
        else {
            $("#main").attr("data-theme", "light");
        }
    });
});

