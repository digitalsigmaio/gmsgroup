/**
 * Created by Manson on 11/29/2017.
 */
$(document).ready(function () {
    $('#changePassword').on('click', function () {
        $('#newPassword').toggle();
    });

    $('.card').mouseenter(function () {
        $(this).animate({
            bottom: 3,
            opacity: 1
        });
    });

    $('.card').mouseleave(function () {
        $(this).animate({
            bottom: 0,
            opacity: 0.9
        });
    });
});