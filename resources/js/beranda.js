// Load color dynamic navbar
var target = $('.target');
var btn = $('#register');
var umum = $('#umum');
var sd = $('#sd');
var smp = $('#smp');

var top = 0;
var dataBottomUmum = umum.offset().top + umum.outerHeight() - target.height();
var dataBottomSd = sd.offset().top + sd.outerHeight() - target.height();
var dataBottomSmp = smp.offset().top + smp.outerHeight() - target.height();

$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll > top) {
        target.attr('class', 'umum-nav target custom-nav-shadows');
        btn.attr('class', 'waves-effect waves-dark btn white button-umum');
        target.css('transition', 'background 0.6s');
        target.css('-webkit-transition', 'background 0.6s');
        target.css('-moz-transition', 'background 0.6s');
        btn.css('transition', 'color 0.6s');
        btn.css('-webkit-transition', 'color 0.6s');
        btn.css('-moz-transition', 'color 0.6s')
    }
    if (scroll > dataBottomUmum) {
        target.attr('class', 'sd-nav target custom-nav-shadows');
        btn.attr('class', 'waves-effect waves-dark btn white button-sd');
        target.css('transition', 'background 0.6s');
        target.css('-webkit-transition', 'background 0.6s');
        target.css('-moz-transition', 'background 0.6s');
        btn.css('transition', 'color 0.6s');
        btn.css('-webkit-transition', 'color 0.6s');
        btn.css('-moz-transition', 'color 0.6s')
    }
    if (scroll > dataBottomSd) {
        target.attr('class', 'smp-nav target custom-nav-shadows');
        btn.attr('class', 'waves-effect waves-dark btn white button-smp');
        target.css('transition', 'background 0.6s');
        target.css('-webkit-transition', 'background 0.6s');
        target.css('-moz-transition', 'background 0.6s');
        btn.css('transition', 'color 0.6s');
        btn.css('-webkit-transition', 'color 0.6s');
        btn.css('-moz-transition', 'color 0.6s')
    }
    if (scroll > dataBottomSmp) {
        target.attr('class', 'informal-nav target custom-nav-shadows');
        btn.attr('class', 'waves-effect waves-dark btn  white button-informal');
        target.css('transition', 'background 0.6s');
        target.css('-webkit-transition', 'background 0.6s');
        target.css('-moz-transition', 'background 0.6s');
        btn.css('transition', 'color 0.6s');
        btn.css('-webkit-transition', 'color 0.6s');
        btn.css('-moz-transition', 'color 0.6s')
    }
});

// Scrollspy
$('.scrollspy').scrollSpy();

// Js card desc hover
var footerCard = $('.card-action');
footerCard.hover(function () {
    var idDesc = $(this).attr('data-target');
    var descCard = $('#' + idDesc);
    descCard.css('height', '100%');
    descCard.css('transition', 'height 0.6s');
    descCard.css('-webkit-transition', 'height 0.6s');
    descCard.css('-moz-transition', 'height 0.6s');

    var childDesc = descCard.children();
    childDesc.css('visibility', 'visible');
    childDesc.css('opacity', '1');
    childDesc.css('transition', 'visibility 0.6s, opacity 0.5s linear');
    childDesc.css('-webkit-transition', 'visibility 0.6s, opacity 0.5s linear');
    childDesc.css('-moz-transition', 'visibility 0.6s, opacity 0.5s linear');
}, function () {
    var idDesc = $(this).attr('data-target');
    var descCard = $('#' + idDesc);
    descCard.css('height', '0');

    var childDesc = descCard.children();
    childDesc.css('visibility', 'hidden');
    childDesc.css('opacity', '0');
}
);
