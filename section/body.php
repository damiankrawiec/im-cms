<?php

if(!isset($sectionPath))
    $sectionPath = '';

echo '<script src="'.$sectionPath.'app/composer/vendor/components/jquery/jquery.min.js"></script>
      <script src="'.$sectionPath.'app/composer/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="'.$sectionPath.'module/lightcase/js/lightcase.js"></script>
      <script src="'.$sectionPath.'app/composer/vendor/datatables/datatables/media/js/jquery.dataTables.js"></script>';