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

    var $slideShow = '';

    if($direction === 'im-left') {

        $object = $first.prevAll('.im-hide-pagination:not(.im-hide-category)');

        $slideShow = ' fadeInLeft';

    }

    if($direction === 'im-right') {

        $object = $last.nextAll('.im-hide-pagination:not(.im-hide-category)');

        $slideShow = ' fadeInRight';

    }

    if($object.length > 0) {

        $('.' + $label + ' .object').each(function(){

            $(this).removeClass('fadeInLeft fadeInRight');

            $(this).addClass('im-hide-pagination animated' + $slideShow);

        });

        var $count = 0;
        $object.each(function(){

            if($(this).attr('class').indexOf('im-hide-category') === -1) {

                if ($count < $number) {

                    $(this).removeClass('im-hide-pagination');

                    $count++;

                }

            }

        });

        $('#scroll-top').trigger('click');

    }

}
function initSection($start, $time) {

    $('#process').show();

    setTimeout(function() {

        $('body').animate({
            opacity: 1
        }, $time, function () {

            $('#process').fadeOut();

        });

    }, $start);

}

function translation() {

    if($('#translation').length > 0) {

        var $translationJson = $('#translation').text();

        if($translationJson != '') {

            var $translation = JSON.parse($translationJson);

            for($t in $translation) {

                $('#' + $t).text($translation[$t]);

            }

        }

    }

}
function scrollEvent() {

    var $window = $(window);

    var $position = $window.scrollTop();

    var $labelScroll = labelScroll();

    var $direction = '';

    $window.scroll(function() {

        clearTimeout($.data(this, 'scrollTimer'));

        if($window.scrollTop() > 300) {

            $('#scroll-top').fadeIn();

        }else{

            $('#scroll-top').fadeOut();

        }

        var $scroll = $window.scrollTop();

        if($scroll > $position) {

            $direction = 'down';

        } else {

            $direction = 'up';

        }

        $position = $scroll;

        $.data(this, 'scrollTimer', setTimeout(function() {

            nextScroll($labelScroll, $position, $direction);

        }, 250));

    });

    $('#scroll-top').click(function(){

        $('html').animate({scrollTop: '0'}, 1000);

    });

}
function editor() {

    if($('.editor').length > 0) {

        tinymce.init({
            selector: '.editor',
            height: 300,
            menubar: false,
            plugins: "emoticons lists",
            toolbar: 'undo redo | fontsizeselect | bold italic underline strikethrough superscript subscript forecolor backcolor bullist | alignleft aligncenter alignright alignjustify | emoticons'
        });

    }

}
function niceSelect() {

    $('.select').niceSelect();

}
function gallery() {

    //At the end init gallery effect
    $('a[data-rel^=lightcase]').lightcase();

}
function datepicker() {

    $('.datepicker-here').datepicker();

}
function nextScroll($currentTop, $scrollArray, $direction) {

        var $scrollCount = $scrollArray.length;

        var $up = 0;
        var $down = 0;
        var $i;
        for($i = 0; $i < $scrollCount; $i++){

            if($scrollArray[$i][1] < $currentTop) {

                $up = $scrollArray[$i][0];

            }

            if($scrollArray[$i][1] > $currentTop && $down !== 0) {

                $down = $scrollArray[$i][0];

            }

        }

        if($direction === 'up')
            $directionLabel = $up;

        if($direction === 'down')
            $directionLabel = $down;

        $('body').scrollTo($directionLabel);


}
function labelScroll() {

    var $labelScroll = [];

    $('body .scroll').each(function () {

        var $this = $(this);

        var $offset = $this.offset();

        $labelScroll.push([$this.attr('title'), $offset.top]);

    });

    return $labelScroll;

}