<?php

if(!isset($sectionPath))
    $sectionPath = '';

echo '<meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="'.$sectionPath.'app/composer/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="'.$sectionPath.'module/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="'.$sectionPath.'module/animate/animate.min.css">';

if(!isset($minHeadBody)) {

    echo '<link rel="stylesheet" href="' . $sectionPath . 'app/composer/vendor/datatables/datatables/media/css/dataTables.bootstrap4.min.css">
          <link rel="stylesheet" href="' . $sectionPath . 'module/lightcase/css/lightcase.css">
          <link rel="stylesheet" href="' . $sectionPath . 'module/nice-select/nice-select.css">';
}