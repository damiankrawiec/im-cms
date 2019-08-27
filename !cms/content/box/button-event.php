<?php
echo '<div class="button-event">';

    echo '<a class="btn btn-secondary" href="' . $addition->getUrl(2) . '">' . $translation['button']['cancel'] . ' '.$icon['button']['cancel'].'</a>';

    echo '<a class="btn btn-info" href="' . $addition->getUrl(2) . '">' . $translation['button']['save'] . ' '.$icon['button']['save'].'</a>';

echo '</div>';