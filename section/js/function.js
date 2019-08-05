function filterObject($label, $category) {

    setFilter($label, $category);

}

function labelProperty($label, $type = false){

    if($label !== 'all' && ($type && $type == 0)) {

        showAllInLabel($label);

    }

    filterObjectLabel();

    if($('#label').length > 0) {

        var $labelJson = $('#label').text();

        if($labelJson != '') {

            var $label = JSON.parse($labelJson);

            for($l in $label) {

                if(!noData($l)) {

                    setPagination($l);

                }

            }

        }

    }

}

function filterObjectLabel() {

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

    $('.' + $label + ' .object').each(function(){

        $(this).removeClass('im-hide-pagination');

        $(this).addClass('im-hide-category');

    });

    $('.' + $label + ' .object.' + $category).each(function(){

        $(this).removeClass('im-hide-category');

    });

}

function showAllInLabel($label) {

    $('.' + $label + ' .object').each(function(){

        $(this).removeClass('im-hide-category');

    });

}

function hideNoData($label) {

    $('.' + $label).find('.no-data').hide();

}

function filterSetSelect($label, $category) {

    $('select#' + $label + ' option[value="' + $category + '"]').prop('selected', true);

}

function setPagination($label) {

    if ($('.' + $label + ' .pagination-arrow').length > 0) {

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

function noData($label) {

    if($('.' + $label + ' .object:visible').length == 0) {

        $('.' + $label + ' .no-data').show();

        return true;

    }else return false;

}

function move($direction, $paginationData) {

    var $label = $paginationData[0];

    var $number = $paginationData[1];

    var $first = false;

    var $last = false;

    $('.' + $label + ' .object:visible').each(function(){

        if(!$first)
            $first = $(this);

        $last = $(this);


    });

    var $object = false;

    if($direction === 'im-left') {

        $object = $first.prevAll('.im-hide-pagination');

    }

    if($direction === 'im-right') {

        $object = $last.nextAll('.im-hide-pagination');

    }

    if($object.length > 0) {

        $first.addClass('im-hide-pagination');

        $last.addClass('im-hide-pagination');

        $object.each(function($i){

            if($i < $number) {

                $(this).removeClass('im-hide-pagination');

            }

        });

    }

}
function initSection($time) {

    $('.process').show();

    $('body').animate({
        opacity: 1
    }, $time, function () {

        $('.process').fadeOut();

    });

}

function translation() {

    if($('#translation').length > 0) {

        var $translationJson = $('#translation').text();

        if($translationJson != '') {

            var $translation = JSON.parse($translationJson);

            $('body .translation').each(function () {

                for($t in $translation) {

                    if($(this).attr('id') === $t) {

                        $(this).text($translation[$t]);

                    }

                }

            });

        }

    }

}