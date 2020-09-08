function validation($form){

    $($form + ' .text-danger').remove();

    var $icon = $('#warning-icon').html();

    var $submit = true;
    $($form + ' .validation').each(function(){

        var $this = $(this);

        if($this.attr('class').indexOf(':') > -1){

            var $check = true;

            var $typeValidation = $this.attr('class').split(':')[1];

            //!!!Define type of validation field
            if($typeValidation === 'text')
                $check = text($this.val());

            if($typeValidation === 'select')
                $check = select($this.val());

            if($typeValidation === 'email')
                $check = email($this.val());

            if($typeValidation === 'icon')
                $check = icon($this.val());

            if($typeValidation === 'password')
                $check = password($this.val());

            if($typeValidation === 'file')
                $check = file($this.val());

            if($typeValidation === 'source')
                $check = source($this.val());

            if($typeValidation.indexOf( 'textarea') > -1)
                $check = textarea($this.parent().find('.tox-tinymce').find('.tox-edit-area').html());

            if(!$check){

                $this.after($icon);

                $submit = false;
            }

        }

    });

    $($form + ' .size').each(function(){

        var $this = $(this);

        var $check = true;

        $check = size($this.val(), $this.attr('size'));

        if(!$check){

            $this.after($icon);

            $submit = false;
        }

    });

    return $submit;

}
function processButton($this){

    $this.children('i').remove();

    $this.append($('#process-button').html());

    setTimeout(function () {
        $this.children('i').fadeOut();
    }, 500);

}
function currentSystem($interval){

    setInterval(function(){

        $('#current-system .animated').toggleClass('flash');

    }, $interval);

}

function modalInit($this){

    let $formParent = $this.parent();

    if($formParent.find('.modal-data')) {

        let $modalDataJson = $formParent.find('.modal-data').text();

        $modalData = JSON.parse($modalDataJson);

        $('#modal .modal-body').text($modalData.text);

        if($modalData.html) {

            let $htmlData = '';

            let $html = $modalData.html;

            if($html.select) {

                let $htmlSelect = $html.select;
                let $htmlSelectCount = $htmlSelect.length;

                $htmlData = '<select class="form-control"><option>' + $('#select-value').val() + '</option>';

                let $i;
                for($i = 0; $i < $htmlSelectCount; $i++) {

                    $htmlData += '<option>' + $htmlSelect[$i] + '</option>';

                }

                $htmlData += '</select>';

                modalSelect($formParent);

            }

            if($htmlData !== '')
                $('#modal .modal-body').append($htmlData);

        }

        $('#modal').modal();

        modalButton($this, $modalData.save, $modalData.cancel);

    }

}

function modalButton($this, $save, $cancel){

    $('.modal-button').click(function(){

        if($(this).attr('id') === 'modal-cancel') {

            if($cancel !== '') {
                //List of events fix to cancel
                if ($cancel === 'reload') {

                    window.location = $('#url-full').val();

                }
                if ($cancel === 'this-option-reset') {

                    //Nice select plugin are specify dom structure
                    $this.next().children('.current').text($('#url-system').val());

                    $this.next().children('.list').children('li').each(function(){

                        if($(this).text() === $('#url-system').val()) {

                            $(this).addClass('selected');

                        }else{

                            $(this).removeClass('selected');

                        }

                    });

                }
            }

        }
        if($(this).attr('id') === 'modal-save') {

            if($save !== '') {
                //List of events fix to cancel
                if ($save === 'link-this-val') {

                    window.location = $this.val();

                }

                if ($save === 'submit-next-form') {

                    $this.next().submit();

                }

                if ($save === 'submit-form-with-set-value') {

                    $this.parent().find('.modal-form').children('input[type="hidden"]').val($this.val());

                    $this.parent().find('.modal-form').submit();

                }

            }

        }

    });

}

function modalSelect($parent){

    $('#modal .modal-body').on('change', 'select', function() {

        $parent.find('form').children(':first-child').val($(this).val());

    });

}

var $dataTableName;
function dataTables() {

    var $arrow = $('#arrow-type').html().split(',');

    $dataTableName = $('.data-table').DataTable({
        'pagingType': 'full_numbers',
        'stateSave': true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "ordering": false,
        'language': {
            'url': 'content/box/table/polish.json',
            'oPaginate': {
                'sFirst': $arrow[0],
                'sPrevious': $arrow[1],
                'sNext': $arrow[2],
                'sLast': $arrow[3]
            }
        }
    });

}
function niceSelect() {

    $('.select').niceSelect();

}
function gallery() {

    //At the end init gallery effect
    $('a[data-rel^=lightcase]').lightcase();

}
function fileDelete() {

    $('.file-delete-status').click(function() {

        var $currentStatus = $(this).attr('id');

        if($currentStatus === 'true') {

            $('#url').hide();

            $('.delete-file-alert').show();

            $('#url').prop('disabled', true);

            $('#file-delete').prop('disabled', false);

        }

        if($currentStatus === 'false') {

            $('#url').show();

            $('#url').prop('disabled', false);

            $('.delete-file-alert').hide();

            $('#file-delete').prop('disabled', true);

        }

    });

}
function activeMenu() {

    if($('.navbar li.active').length === 0) {

        $('.navbar').find($('#' + $('#url-section').val())).parents('.nav-item').addClass('active');

    }
}
function closeAlertTop() {

    if($('.im-alert-top').length > 0) {

        var $alert = $('.im-alert-top');

        setTimeout(function(){

            $alert.slideUp();

        }, 10000);

    }

}
function datepicker() {

    $('.im-datepicker').datepicker();

    $('.im-datepicker').val($('.im-datepicker').next().val());

}

function editor() {

    if ($('.editor').length > 0) {

        tinymce.init({
            selector: '.editor',
            height: 300,
            menubar: false,
            plugins: "code lists table wordcount link image preview",
            toolbar: 'undo redo | fontsizeselect | bold italic underline strikethrough superscript subscript forecolor backcolor bullist | alignleft aligncenter alignright alignjustify | image link table | code | wordcount | preview',
            valid_elements: '*[*]'
        });

    }

}
function switchStatus($this) {

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

    return [$switchStatus, $classNew];

}

var $currentShow = 10;
function currentShow() {

    $dataTableName.on('draw', function() {

        var $select = $('.dataTables_length select').val();

        if($select != -1)
            $currentShow = $select;

    });

}
function sortStatus($this) {

    $this.hide();

    $this.next().show();

    var $sortable = document.getElementById('sortable');

    $dataTableName.page.len(-1).draw();

    $('.dataTables_length label, .data-table tbody a, .add-new, .filter-box, .dataTables_filter').css('opacity', 0);

    var $sortableCurrent = new Sortable($sortable, {
        animation: 150
    });

    $('#sort-save').click(function(){

        saveSort($dataTableName, $currentShow);

    });

    $('#sort-cancel').click(function(){

        $('body').css('opacity', 0);

        $dataTableName.page.len($currentShow).draw();

        window.location = $('#url-full').val();

    });

}
function copyField($this) {

    var $places = $this.split(':');

    var $places1 = $('#' + $places[1]);

    $places1.val($('#' + $places[0]).val());

    if($places1.hasClass('size')) {

        inputLengthOneField($places1);

    }

}
function fix() {

    var $search = $('#search-fix').val();

    $('.edit .collection').each(function() {

        var $this = $(this);

        var $select = document.getElementById($this.attr('id'));

        var $titleArray = $this.attr('title').split(':');

        multi($select, {
            non_selected_header: $titleArray[0],
            selected_header: $titleArray[1],
            enable_search: true,
            search_placeholder: $search
        });

    });

}
function fixSort($this) {

    var $id = $this.attr('id') + '-fix';

    var $next = $this.next().find('.selected-wrapper');

    $next.attr('id', $id);

    var $sortable = document.getElementById($id);

    new Sortable($sortable, {
        animation: 150
    });

}
function collection() {

    $('.edit .multi-wrapper').each(function() {

        var $this = $(this);

        var $currentId = '';
        $this.children('.selected-wrapper').children('a').each(function() {

            $currentId += ($(this).attr('data-value')) + ',';

        });

        if($currentId != '') {

            $currentId = $currentId.substring(0, $currentId.length - 1);

            $this.next().val($currentId);

        }else $this.next().val('0');

    });

}
function filter($value) {

    window.location = $('#url-section').val() + ',' + $value;

}
function scrollEvent() {

    var $window = $(window);

    $window.scroll(function() {

        if($window.scrollTop() > 200){

            //$('#content-top').addClass('position-fixed');

            $('#scroll-top').fadeIn();

        }else{

            //$('#content-top').removeClass('position-fixed');

            $('#scroll-top').fadeOut();

        }

    });

    $('#scroll-top').click(function(){

        $('html').animate({scrollTop: '0'}, 1000);

    });

}

function translationMove($target) {

    $('#translation-move').attr('action', $target);

    $('#translation-move').submit();

}

function objectMove($target) {

    $('#object-move').attr('action', $target);

    $('#object-move').submit();

}

function insertToOption($multiple, $type) {

    $multiple.find('a').each(function(){

        var $text = $(this).text();

        var $file = $text.substr($text.indexOf(':') + 2, $text.length);

        var $fileDom;
        if($type === 'image')
            $fileDom = '<img src="../system/' + $('#url-system').val() + '/public/' + $file + '" alt="' + $file + '" style="height: 50px">';

        if($type === 'file')
            $fileDom = '<a href="../system/' + $('#url-system').val() + '/public/' + $file + '" title="' + $file + '" download>' + $('#download-icon').html() + '</a>';

        if($type === 'movie')
            $fileDom = '<video src="../system/' + $('#url-system').val() + '/public/' + $file + '" style="height: 100px" controls></video><br>';

        $(this).html($fileDom + ' ' + $text);

    });

}

function eventAfterStatus($target, $status) {

    if($('table#im_type').length > 0) {

        var $targetObject = $target.replace(/:/g, '');

        if($status.indexOf('on') > -1)
            $('#' + $targetObject).removeClass('im-hide');

        if($status.indexOf('off') > -1)
            $('#' + $targetObject).addClass('im-hide');

        checkSubmenuIsEmpty();

    }

}

function checkSubmenuIsEmpty() {

    var $empty = true;
    $('#menu-object .dropdown-menu a').each(function() {

        if ($(this).attr('class').indexOf('im-hide') === -1) {

            $empty = false;

        }

    });

    $('#menu-object .dropdown-menu > i').remove();

    if($empty) {

        $('#menu-object .dropdown-menu').append($('#warning-icon').html());

    }

}

function inputLength($this) {

    $('.' + $this.attr('id') + ' .size').each(function(){

        inputLengthOneField($(this));

    });

}
function inputLengthOneField($thisSize) {

    var $leftChar = parseInt($thisSize.attr('size')) - $thisSize.val().length;

    var $nextSpan = $thisSize.nextAll('span');

    $nextSpan.text($leftChar);

    if($leftChar < 0) {

        $nextSpan.removeClass('badge-info');
        $nextSpan.addClass('badge-warning');

    }else{

        $nextSpan.removeClass('badge-warning');
        $nextSpan.addClass('badge-info');

    }

}

//Add custom icon to cms editor
function iconToEditor() {

    if($('.tox-tinymce').length > 0) {

        var $iconArray = [];

        var $domInsert = '<div role="group" class="tox-toolbar__primary"><div title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1" class="tox-toolbar__group">';

        $('#icon-to-editor > div').each(function() {

            var $this = $(this);

            var $icon = $this.html();

            var $idElement = $this.attr('id');

            $iconArray.push($idElement);

            $domInsert += '<button aria-label="Preview" title="Preview" type="button" tabindex="-1" class="tox-tbtn" id="' + $idElement + '">' + $icon + '</button>';

        });

        $domInsert += '</div></div>';

        $('.tox-toolbar-overlord').append($domInsert);

        iconListener($iconArray);

    }

}

function iconListener($iconArray) {

    var $iconArrayCount = $iconArray.length;

    var $i;

    for($i = 0; $i < $iconArrayCount; $i++) {

        $('#' + $iconArray[$i]).on('click', function() {

            $('.' + $(this).attr('id')).fadeIn();

        });

    }

    $('.editor-data > .im-close').click(function() {

        $(this).parent().fadeOut();

    });

    $('.editor-data > table tr').click(function() {

        var $this = $(this);

        if($this.find('.img').length > 0) {

            var $img = $this.find('.img img');

            tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('img', {src: $img.attr('src'), title: $img.attr('title'), style: $img.attr('style'), class: 'content-img'}));

        }

    });

}