<?php
//Custom editor dom after custom icon activated

foreach ($iconEditor as $i => $ie) {

    switch($i) {

        case 'editor-gallery':
            $sql = 'select name, url from im_image';
            break;

    }

    $db->prepare($sql);

    $editorData = $db->run('all');

    if($editorData) {

        echo '<div class="editor-data ' . $i . '">';

        echo '<button class="btn btn-outline-secondary im-close">' . $translation['button']['close'] . '</button>';

            echo '<table class="table table-hover">';
                echo '<tbody>';

                foreach ($editorData as $ed) {

                    echo '<tr>';

                    echo '<td>' . $ed['name'] . '</td>';

                    if($i == 'editor-gallery') {

                        $srcPath = '../system/' . $eventData['system'] . '/public/'.$ed['url'];

                        echo '<td class="img">';

                        if($addition->fileExists($srcPath))
                            echo '<img src="'.$srcPath.'" title="' . $ed['name']  . '" style="max-width: ' . $s_previewImageBig . '">';

                        echo '</td>';

                    }

                    echo '</tr>';

                }

                echo '</tbody>';
            echo '</table>';

        echo '</div>';

    }

}
