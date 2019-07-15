function filterObject($label, $category) {

    $.ajax({
        method: "POST",
        url: "ajax/setFilter.php",
        data: {
            label: $label,
            category: $category
        },
        beforeSend: function(){
            $('.process').show();
        },
        complete: function(){
            $('.process').fadeOut('slow');
        }
    }).done(function () {

        if($category > 0) {

            filterObjectDisplay($label, $category);

        }else{

            $('.' + $label + ' .object').show();

        }

    });

}
function filterObjectStart() {

    var $sessionJson = $('#session').text();

    if($sessionJson != '') {

        var $session = JSON.parse($sessionJson);

        for($s in $session) {

            if($.isNumeric($session[$s])) {

                filterObjectDisplay($s, $session[$s]);

                filterSetSelect($s, $session[$s]);

            }

        }

    }

}

function filterObjectDisplay($label, $category) {

    $('.' + $label + ' .object').hide();

    $('.' + $label + ' .object.' + $category).show();

}

function filterSetSelect($label, $category) {

    $('select#' + $label + ' option[value="' + $category + '"]').prop('selected', true);

}