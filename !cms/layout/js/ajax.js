function changeStatus($this) {

    var $class = $this.children().attr('class');

    if($class.indexOf('-on') > -1) {

        var $switchStatus = 'off';

        var $classNew = $class.replace('on', $switchStatus);

        $classNew = $classNew.replace('info', 'secondary');

    }

    if($class.indexOf('-off') > -1) {

        var $switchStatus = 'on';

        var $classNew = $class.replace('off', $switchStatus);

        $classNew = $classNew.replace('secondary', 'info');

    }

    $.ajax({
        method: "POST",
        url: "ajax/change-status.php",
        data: {
            event: $switchStatus,
            table: $this.attr('id')
        },
        beforeSend: function(){

            $('#process').show();

        },
        complete: function(){

            $('#process').fadeOut(1000);

        }
    }).done(function() {

        $this.children().attr('class', $classNew);

    });

}