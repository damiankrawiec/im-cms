<?php

if(isset($field['option'])) {

    $currentFile = false;

    $filePath = '../system/' . $eventData['system'] . '/public/';

    if (stristr($field['option'], 'preview')) {

        $imagePath = $filePath . $eventData['record']->url;

        if ($addition->fileExists($imagePath)) {

            echo '<a href="' . $imagePath . '" title="' . $eventData['record']->url . '" data-rel="lightcase:collection">';

            echo '<img src="' . $imagePath . '" alt="' . $eventData['record']->url . '" style="width: '.$s_previewImage.'">';

            echo '</a>';

            $currentFile =  $eventData['record']->url;

        }else echo $icon['warning']['empty'];

    }

    if (stristr($field['option'], 'add')) {

        echo '<input type="file" name="'.$i.'" class="'.$require.'" id="'.$i.'">';

        echo '<input type="hidden" name="path" value="'.$filePath.'">';

        echo '<input type="hidden" name="permitted" value="'.$s_permittedImage.'">';

        if ($currentFile)
            echo '<input type="hidden" name="current" value="'.$currentFile.'">';

    }

}