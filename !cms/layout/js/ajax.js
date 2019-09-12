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

    });

}
function saveSort($dataTableName) {

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

        window.location.reload(true);

    });

}