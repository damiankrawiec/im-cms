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

            setPagination($s);

            noData($s);

        }

    }

}

function filterObjectDisplay($label, $category) {

    $('.' + $label + ' .object').each(function(){

        $(this).addClass('im-hide-category');

    });

    $('.' + $label + ' .object.' + $category).each(function(){

        $(this).removeClass('im-hide-category');

    });

}

function setPagination($label){

    if($('.' + $label + ' .pagination-arrow').length > 0) {

        var $paginationData = $('.' + $label + ' .pagination-arrow').attr('id').split(':');

        var $number = $paginationData[1];

        $('.' + $label + ' .object').each(function () {

            $(this).removeClass('im-hide-pagination');

        });

        $('.' + $label + ' .object:not(.im-hide-category)').each(function ($i) {

            if ($i >= $number)
                $(this).addClass('im-hide-pagination');

        });

    }

}

function filterSetSelect($label, $category) {

    $('select#' + $label + ' option[value="' + $category + '"]').prop('selected', true);

}

function noData($label) {

    if($('.' + $label + ' .object:visible').length == 0) {

        $('.' + $label + ' .no-data').show();

    }

}