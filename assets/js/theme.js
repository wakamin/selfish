$(document).ready(function () {
    function show_comment_form() {
        $('#fake-comment').hide();
        $('#respond form').show();
        $('#comment').focus();
    }

    $('.comment-reply-link').click(function () {
        show_comment_form();
    })

    $('#fake-comment').click(function () {
        show_comment_form();
    });

    function scrollTop() {
        return $(window).scrollTop()
    }

    $(window).scroll(function () {
        if (!$(body).hasClass('home-grid')) {
            if (scrollTop() > 100) {
                $('.top-nav').addClass('fixed-top');
                $('.navbar-brand').removeClass('d-lg-none');
            } else {
                $('.top-nav').removeClass('fixed-top');
                $('.navbar-brand').addClass('d-lg-none');
            }
        }

    })

    if ($(window).width() > 768) {
        $('.nav-item.dropdown').mouseover(function () {
            $(this).addClass('show')
            $(this).children('.dropdown-menu').addClass('show')
        });
        $('.nav-item.dropdown').mouseout(function () {
            $(this).removeClass('show')
            $(this).children('.dropdown-menu').removeClass('show')
        });
    }
});