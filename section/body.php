<?php

if(!isset($sectionPath))
    $sectionPath = '';

require_once $sectionPath.'section/top.php';

echo '<script src="'.$sectionPath.'app/composer/vendor/components/jquery/jquery.min.js"></script>
      <script src="'.$sectionPath.'app/composer/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>';

//User and logged in cms
if(!isset($minHeadBody)) {

      echo '<script src="'.$sectionPath.'module/lightcase/js/lightcase.js"></script>
            <script src="'.$sectionPath.'app/composer/vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
            <script src="'.$sectionPath.'app/composer/vendor/datatables/datatables/media/js/dataTables.bootstrap4.min.js"></script>
            <script src="'.$sectionPath.'module/nice-select/jquery.nice-select.min.js"></script>
            <script src="'.$sectionPath.'app/composer/vendor/tinymce/tinymce/tinymce.min.js"></script>
            <script src="'.$sectionPath.'module/datapicker/datepicker.min.js"></script>
            <script src="'.$sectionPath.'module/datapicker/pl.js"></script>
            <script src="'.$sectionPath.'module/chosen/chosen.jquery.min.js"></script>
            <script src="'.$sectionPath.'module/sortable/Sortable.min.js"></script>
            <script src="'.$sectionPath.'module/multijs/multi.min.js"></script>
            ';

    //Only logged in cms (js from section is load automatic)
    if ($sectionPath != '')
        echo '<script src="' . $sectionPath . 'section/js/send-form.js"></script>';
}

//CMS form and inside
if($sectionPath != '')
    echo '<script src="'.$sectionPath.'section/js/validation.js"></script>';

if(isset($GLOBALS['hash']))
    echo '<script src="'.$sectionPath.'module/sha1/sha1.min.js"></script>';