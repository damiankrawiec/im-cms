<?php

echo '<div id="scroll-top"><i class="fal fa-chevron-up fa-3x"></i></div>';

echo '<script src="'.$s_sectionData['global-path'].'app/composer/vendor/components/jquery/jquery.min.js"></script>
      <script src="'.$s_sectionData['global-path'].'app/composer/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>';

if($s_sectionData['name'] === 'back' or $s_sectionData['name'] === 'front') {

      echo '<script src="'.$s_sectionData['global-path'].'module/lightcase/js/lightcase.js"></script>
            <script src="'.$s_sectionData['global-path'].'app/composer/vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
            <script src="'.$s_sectionData['global-path'].'app/composer/vendor/datatables/datatables/media/js/dataTables.bootstrap4.min.js"></script>
            <script src="'.$s_sectionData['global-path'].'module/nice-select/jquery.nice-select.min.js"></script>
            <script src="'.$s_sectionData['global-path'].'app/composer/vendor/tinymce/tinymce/tinymce.min.js"></script>
            <script src="'.$s_sectionData['global-path'].'module/datapicker/datepicker.min.js"></script>
            <script src="'.$s_sectionData['global-path'].'module/datapicker/pl.js"></script>
            <script src="'.$s_sectionData['global-path'].'module/chosen/chosen.jquery.min.js"></script>
            <script src="'.$s_sectionData['global-path'].'module/sortable/Sortable.min.js"></script>
            <script src="'.$s_sectionData['global-path'].'module/multijs/multi.min.js"></script>
            <script src="'.$s_sectionData['global-path'].'module/anime/anime.min.js"></script>
            ';

    //Only logged in cms (js from section is load automatic)
    if ($s_sectionData['name'] === 'back')
        echo '<script src="' . $s_sectionData['global-path'] . 'section/js/send-form.js"></script>';
}

//CMS form and inside
if($s_sectionData['name'] === 'back' or $s_sectionData['name'] === 'auth')
    echo '<script src="'.$s_sectionData['global-path'].'section/js/validation.js"></script>';

if(isset($GLOBALS['hash']))
    echo '<script src="'.$s_sectionData['global-path'].'module/sha1/sha1.min.js"></script>';