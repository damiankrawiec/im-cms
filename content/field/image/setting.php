<?php

if ($img['link'] == '') {

    if ($img['section'] > 0) {

        $dataRel = '';

        $imageUrl = $this->getSectionUrl($img['section']);

        $href = $this->translationUrl($this->currentLanguage, $imageUrl);

    } else {

        $dataRel = ' data-rel="lightcase:collection-' . $this->objectCounter . '"';

        $href = $this->path . $this->systemName . '/content/public/' . $img['url'];

    }

} else {

    $dataRel = ' target="_blank"';

    $href = $img['link'];

}

$classDescription = '';
if($img['description'] === 'on')
    $classDescription = ' d-md-block';