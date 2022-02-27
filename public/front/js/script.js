let scroll = $(window).scrollTop();

$(".onpage-link").click(function (e) {
    var targetLink = $(this).attr("href");
    var idElement = targetLink.substr(targetLink.indexOf("#"));
    $("html, body").animate(
        {
            scrollTop: $(idElement).offset().top - 70,
        },
        500
    );
    return false;
});

if (scroll > 10) {
    $(".navbar-top").addClass("bg-dark shadow nav-scroll");
    $(".nav-link").addClass("text-white");
} else {
    $(".navbar-top").removeClass("bg-dark shadow nav-scroll");
    $(".nav-link").removeClass("text-white");
}

$(window).scroll(function () {
    let scroll = $(window).scrollTop();
    if (scroll > 10) {
        $(".navbar-top").addClass("bg-dark shadow nav-scroll");
        $(".nav-link").addClass("text-white");
    } else {
        $(".navbar-top").removeClass("bg-dark shadow nav-scroll");
        $(".nav-link").removeClass("text-white");
    }
});
