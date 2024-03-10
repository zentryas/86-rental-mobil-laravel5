// Click to Scroll TOP
var $backToTop = $(".backTop");
$backToTop.hide();
$(window).on('scroll', function () {
    if ($(this).scrollTop() > 100) {
        $backToTop.fadeIn();
    } else {
        $backToTop.fadeOut();
    }
});

$backToTop.on('click', function (e) {
    $("html, body").animate({
        scrollTop: 0
    }, 500);
});
//Scroll TOP End

$(document).ready(function () {
    $(".preloader").fadeOut();
});
