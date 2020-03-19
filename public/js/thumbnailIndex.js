
$(document).ready(function(){

    // let currCell = $('td').first().focus();
    // let link = $("a").first();
    let editing = false;

    // User clicks on a cell
    $('td').click(function() {
        currCell = $(this);
    });

    // User navigates table using keyboard
    $('table').keydown(function (e) {
        let c = "";
        if (e.which == 39) {
            // Right Arrow
            c = currCell.next();
        } else if (e.which == 37) {
            // Left Arrow
            c = currCell.prev();
        } else if (e.which == 38) {
            // Up Arrow
            c = currCell.closest('tr').prev().find('td:eq(' +
            currCell.index() + ')');
        } else if (e.which == 40) {
            // Down Arrow
            c = currCell.closest('tr').next().find('td:eq(' +
            currCell.index() + ')');
        } else if (!editing && (e.which == 13 || e.which == 32)) {
            // Enter or Spacebar - edit cell
           const link = currCell.find("a").attr("href");
           window.location.href = link;
        } else if (!editing && (e.which == 9 && !e.shiftKey)) {
            // Tab
            e.preventDefault();
            c = currCell.next();
        } else if (!editing && (e.which == 9 && e.shiftKey)) {
            // Shift + Tab
            e.preventDefault();
            c = currCell.prev();
        }

        // If we didn't hit a boundary, update the current cell
        if (c.length > 0) {
            currCell = c;
            currCell.focus();
        }
    });



})

$("table").click(function () {

    let currCell = $("td").first().focus();
})
