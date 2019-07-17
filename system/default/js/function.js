function filterObject($label, $category) {

    setFilter($label, $category);

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

    if($('.' + $label + ' .object:visible').length == 0) {

        $('.' + $label + ' .no-data').show();

    }

}

function filterSetSelect($label, $category) {

    $('select#' + $label + ' option[value="' + $category + '"]').prop('selected', true);

}