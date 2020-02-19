<?php

if(isset($field['option'])) {

    $currentFile = false;

    $filePath = '../system/' . $eventData['system'] . '/public/';

    $filePathAll = $filePath;
    if(isset($eventData['record']))
        $filePathAll .= $eventData['record']->url;

    if (stristr($field['option'], 'preview')) {

        if ($addition->fileExists($filePathAll)) {

            if($field['type'] == 'image')
                $aAttribute = ' data-rel="lightcase:collection"';

            if($field['type'] == 'file')
                $aAttribute = ' download='. $eventData['record']->url;

            echo '<br><a href="' . $filePathAll . '" title="' . $eventData['record']->url . '"'.$aAttribute.'>';

            if($field['type'] == 'image')
                echo '<img src="' . $filePathAll . '" alt="' . $eventData['record']->url . '" style="max-width: ' . $s_previewImage . '">';

            if($field['type'] == 'file')
                echo $eventData['record']->url;

            echo '</a>';

            $currentFile =  $eventData['record']->url;

        }else echo $icon['warning']['empty'];

    }

    if (stristr($field['option'], 'delete') and $addition->fileExists($filePathAll)) {

        echo ' <a href="#" class="btn btn-light file-delete-status" id="true">'.$icon['button']['delete'].'</a>';

        echo '<input type="hidden" id="file-delete" name="file_delete" value="' . $filePathAll . '" disabled>';

    }

    if (stristr($field['option'], 'add')) {

        //Space between current file and new file input
        echo ' <input type="file" name="'.$i.'" class="'.$require.'" id="'.$i.'">';

        echo '<input type="hidden" name="path" value="'.$filePath.'">';

        if($field['type'] == 'image')
            echo '<input type="hidden" name="permitted" value="'.$s_permittedImage.'">';

        if ($currentFile)
            echo '<input type="hidden" name="current" value="'.$currentFile.'">';

    }

    echo '<p class="delete-file-alert im-hide text-danger">'.$icon['message']['alert'].' '.$translation['edit']['file_delete'].' <a href="#" class="file-delete-status" id="false">'.$translation['edit']['file_delete_cancel'].'</a></p>';

}