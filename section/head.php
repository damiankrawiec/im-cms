<?php

echo '<meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="'.$s_sectionData['global-path'].'app/composer/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="'.$s_sectionData['global-path'].'module/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="'.$s_sectionData['global-path'].'module/animate/animate.min.css">';

if($s_sectionData['name'] === 'back' or $s_sectionData['name'] === 'front') {

    echo '<link rel="stylesheet" href="' . $s_sectionData['global-path'] . 'app/composer/vendor/datatables/datatables/media/css/dataTables.bootstrap4.min.css">
          <link rel="stylesheet" href="' . $s_sectionData['global-path'] . 'module/lightcase/css/lightcase.css">
          <link rel="stylesheet" href="' . $s_sectionData['global-path'] . 'module/nice-select/nice-select.css">
          <link rel="stylesheet" href="' . $s_sectionData['global-path'] . 'module/datapicker/datepicker.min.css">
          <link rel="stylesheet" href="' . $s_sectionData['global-path'] . 'module/chosen/component-chosen.min.css">
          <link rel="stylesheet" href="' . $s_sectionData['global-path'] . 'module/fix/icon_font/css/icon_font.css">
          <link rel="stylesheet" href="' . $s_sectionData['global-path'] . 'module/multijs/multi.min.css">
          ';
}