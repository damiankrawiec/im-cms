function changeStatus($this) {

    var $switchStatus = switchStatus($this);

    $.ajax({
        method: "POST",
        url: "ajax/change-status.php",
        data: {
            system: $('#url-system').val(),
            event: $switchStatus[0],
            table: $this.attr('id')
        },
        beforeSend: function(){

            $('#process').show();

        },
        complete: function(){

            $('#process').fadeOut(1000);

        }
    }).done(function() {

        $this.children().attr('class', $switchStatus[1]);

        $('.data-table tr').removeClass('last-record');

        $this.parents('tr').addClass('last-record');

        eventAfterStatus($this.attr('id'), $this.children().attr('class'));

    });

}
function saveSort($dataTableName, $currentShow) {

    var $table = $('.data-table tbody');

    var $ids = [];
    $table.children('tr').each(function(){

        $ids.push($(this).attr('id'));

    });
    $idsString = $ids.join(',');

    $.ajax({
        method: "POST",
        url: "ajax/save-sort.php",
        data: {
            system: $('#url-system').val(),
            id: $idsString,
            table: $('.data-table').attr('id')
        },
        beforeSend: function(){

            $('body').css('opacity', 0);

        }
    }).done(function() {

        $dataTableName.page.len($currentShow).draw();

        window.location = $('#url-full').val();

    });

}