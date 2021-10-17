window.onscroll = function () {
    scrollIndicator();
};

$(document).ready(function () {

    // Home doctor slider
    $('.doctorSlider').slick({
        dots: false,
        arrows: false,
        prevArrow: "<button type='button' class='btnLeft'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='btnRight'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        infinite: true,
        slidesToShow: 4,
        slidesPerRow: 4,
        slidesToScroll: 1,
        speed: 250,
        autoplay: true,
        autoplaySpeed: 1500,
        fade: false,
        cssEase: 'linear',
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }],
    });
});

// Botton Navigator
let oldValue = 0;
var bottomNavigator = document.getElementById("bottom-navigator-container");
window.addEventListener('scroll', function (e) {

    // Get the new Value
    newValue = window.pageYOffset;

    //Subtract the two and conclude
    if (oldValue - newValue < 0) {
        bottomNavigator.classList.replace("d-block", "d-none");
    } else if (oldValue - newValue > 0) {
        bottomNavigator.classList.replace("d-none", "d-block");
    }

    // Update the old value
    oldValue = newValue;
});

function scrollIndicator() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("scrollIndicator").style.width = scrolled + "%";
}

$(document).ready(function () {

    // Scroll To Top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('#backToTop').fadeIn();
        } else {
            $('#backToTop').fadeOut();
        }
    });
    $('#backToTop').click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1);
        return false;
    });


    // Animated Counter
    $(window).scroll(startCounter);
    function startCounter() {

        if (window.location.pathname == "/") {
            var statistics = $("#home-statistics");
            var position = Math.round(statistics.position().top);
            var height = Math.round(statistics.outerHeight());

            if ($(window).scrollTop() > (position - height)) {

                $(window).off("scroll", startCounter);
                $('.statistics-counter').each(function () {
                    var $this = $(this);
                    jQuery({
                        Counter: 0
                    }).animate({
                        Counter: $this.text()
                    }, {
                        duration: 5000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.ceil(this.Counter));
                        }
                    });
                });
            }
        }
    }

});