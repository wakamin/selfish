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
});