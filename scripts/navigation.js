let element = $('.subNav');
let header = $('header').height() + 1;
let nav = element.height();
let p = $('nav > p').height() + 20;
$(function () {
    let top = 0;
    if (top === 0) element.css('top', header);
    $(window).scroll(function () {
        top = $(this).scrollTop();
        if (top < header + p) {
            element.css('top', (header - top));
            element.css('box-shadow', '0 2px 3px 0 #999');
        } else {
            element.css('top', -p);
            element.css('box-shadow', '0 5px 10px 0 #999');
        }
    });
});
$('main').css('padding-top', nav + 20);




/*
$(document).ready(function() {

    let nav = $('nav');
    let scrollPrev = 0;

    $(window).scroll(function() {
        let scrolled = $(window).scrollTop();
        let firstScrollUp = false;
        let firstScrollDown = false;

        if ( scrolled > 0 ) {
            // Если текущее значение скролла > предыдущего, т.е. скроллим вниз
            if ( scrolled > scrollPrev ) {
                firstScrollUp = false; // Обнуляем параметр начала скролла вверх
                // Если меню видно
                if ( scrolled < nav.height() + nav.offset().top ) {
                    // Если только начали скроллить вниз
                    if ( firstScrollDown === false ) {
                        var topPosition = nav.offset().top; // Фиксируем текущую позицию меню
                        nav.css({
                            "top": topPosition + "px"
                        });
                        firstScrollDown = true;
                    }
                    // Позиционируем меню абсолютно
                    nav.css({
                        "position": "absolute"
                    });
                    // Если меню НЕ видно
                } else {
                    // Позиционируем меню фиксированно вне экрана
                    nav.css({
                        "position": "fixed",
                        "top": "-" + nav.height() + "px"
                    });
                }

                // Если текущее значение скролла < предыдущего, т.е. скроллим вверх
            } else {
                firstScrollDown = false; // Обнуляем параметр начала скролла вниз
                // Если меню не видно
                if ( scrolled > nav.offset().top ) {
                    // Если только начали скроллить вверх
                    if ( firstScrollUp === false ) {
                        topPosition = nav.offset().top; // Фиксируем текущую позицию меню
                        nav.css({
                            "top": topPosition + "px"
                        });
                        firstScrollUp = true;
                    }
                    // Позиционируем меню абсолютно
                    nav.css({
                        "position": "absolute"
                    });
                } else {
                    // Убираем все стили
                    nav.removeAttr("style");
                }
            }
            // Присваеваем текущее значение скролла предыдущему
            scrollPrev = scrolled;
        }
    });
});
*/
