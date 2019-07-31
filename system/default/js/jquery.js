$(function(){

    //Filter object by category in label box of each section
    $('.object-category').change(function(){

        //label, categoryId
        filterObject($(this).attr('id'), $(this).val());

    });

    $('#change-language li').click(function(){

        //system name of selected language
        setLanguage($(this).attr('id'));

    });

    filterObjectStart();

    $('.im-move').click(function(){

        var $side = $(this).attr('id');

        var $paginationData = $(this).parent().attr('id').split(':');

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

        if($side == 'im-left') {

            $object = $first.prevAll('.im-hide-pagination');

        }

        if($side == 'im-right') {

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

    });

    //At the end init gallery effect
    $('a[data-rel^=lightcase]').lightcase();

});