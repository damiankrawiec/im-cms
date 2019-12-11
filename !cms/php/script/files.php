<?php

if(isset($field['option'])) {

    $currentFile = false;

    $filePath = '../system/' . $eventData['system'] . '/public/';

    if (stristr($field['option'], 'preview')) {

        $filePathAll = $filePath . $eventData['record']->url;

        if ($addition->fileExists($filePathAll)) {

            if($field['type'] == 'image')
                $aAttribute = ' data-rel="lightcase:collection"';

            if($field['type'] == 'file')
                $aAttribute = ' download='. $eventData['record']->url;

            echo '<a href="' . $filePathAll . '" title="' . $eventData['record']->url . '"'.$aAttribute.'>';

            if($field['type'] == 'image')
                echo '<br><img src="' . $filePathAll . '" alt="' . $eventData['record']->url . '" style="width: ' . $s_previewImage . '">';

            if($field['type'] == 'file')
                echo '<br>'.$eventData['record']->url;

            echo '</a>';

            $currentFile =  $eventData['record']->url;

        }else echo $icon['warning']['empty'];

    }

    if (stristr($field['option'], 'add')) {

        echo ' <input type="file" name="'.$i.'" class="'.$require.'" id="'.$i.'">';

        echo '<input type="hidden" name="path" value="'.$filePath.'">';

        if($field['type'] == 'image')
            echo '<input type="hidden" name="permitted" value="'.$s_permittedImage.'">';

        if ($currentFile)
            echo '<input type="hidden" name="current" value="'.$currentFile.'">';

    }

}