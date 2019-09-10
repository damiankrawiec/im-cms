<?php

if(!isset($sectionPath))
    $sectionPath = '';

echo '<script src="'.$sectionPath.'module/jquery/jquery.min.js"></script>
      <script src="'.$sectionPath.'app/composer/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>';

if(!isset($minHeadBody)) {

      echo '<script src="'.$sectionPath.'module/lightcase/js/lightcase.js"></script>
            <script src="'.$sectionPath.'app/composer/vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
            <script src="'.$sectionPath.'app/composer/vendor/datatables/datatables/media/js/dataTables.bootstrap4.min.js"></script>
            <script src="'.$sectionPath.'module/nice-select/jquery.nice-select.min.js"></script>
            <script src="'.$sectionPath.'app/composer/vendor/xdan/jodit/build/jodit.min.js"></script>
            <script src="'.$sectionPath.'module/datapicker/datepicker.min.js"></script>
            <script src="'.$sectionPath.'module/datapicker/pl.js"></script>
            <script src="'.$sectionPath.'module/chosen/chosen.jquery.min.js"></script>
            <script src="'.$sectionPath.'app/composer/vendor/components/jqueryui/jquery-ui.min.js"></script>
            ';
}