let element = $('nav');
let title = $('.title').height() + 1;
let nav = element.height();
$(function () {
    let top = 0;
    if (top === 0) element.css('top', title);
    $(window).scroll(function () {
        top = $(this).scrollTop();
        if (top < title) {
            element.css('top', (title - top));
            element.css('box-shadow', '0 2px 3px 0 #999');
        } else {
            element.css('top', 0);
            element.css('box-shadow', '0 5px 10px 0 #999');
        }
    });
});
$('main').css('padding-top', nav + 20);
