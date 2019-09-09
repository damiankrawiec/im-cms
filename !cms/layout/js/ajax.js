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