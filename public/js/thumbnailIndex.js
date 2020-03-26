"use strict"

$(document).ready(function () {
    const NUMBER_OF_COLUMNS = 3;

    const LEFT_ARROW = 37;
    const UP_ARROW = 38;
    const RIGHT_ARROW = 39;
    const DOWN_ARROW = 40;

    $(".videoGrid").click(function () {
        $(".videoItem").first().focus();
    })

    $('.videoGrid').keydown(function (e) {
        let currentVideo = $('.videoItem:focus');
        let currentVideoSequenceNumber = currentVideo.data('sequence-number');

        if (e.which === RIGHT_ARROW) {
            $(`.videoItem[data-sequence-number=${++currentVideoSequenceNumber}]`).focus();
        } else if (e.which === LEFT_ARROW) {
            $(`.videoItem[data-sequence-number=${--currentVideoSequenceNumber}]`).focus();
        } else if (e.which === UP_ARROW) {
            $(`.videoItem[data-sequence-number=${currentVideoSequenceNumber -= NUMBER_OF_COLUMNS}]`).focus();
        } else if (e.which === DOWN_ARROW) {
            $(`.videoItem[data-sequence-number=${currentVideoSequenceNumber += NUMBER_OF_COLUMNS}]`).focus();
        }
    });
})
